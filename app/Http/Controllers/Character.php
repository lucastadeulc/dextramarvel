<?php

namespace App\Http\Controllers;

use App\Character;
use App\Transformers\CharacterTransformer;
use App\Transformers\ComicTransformer;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CharacterController extends Controller
{
    /**
     * @var Manager
     */
    private $fractal;

    /**
     * @var CharacterTransformer
     */
    private $characterTransformer;

    const allowed_filters = [ 'comics' , 'series' , 'stories' , 'events' , 'urls'];

    function __construct(Manager $fractal, CharacterTransformer $characterTransformer)
    {
        $this->fractal = $fractal;
        $this->characterTransformer = $characterTransformer;
    }

    public function showAllCharacters(Request $request)
    {
        $charactersPaginator = Character::paginate(10);

        $characters = new Collection($charactersPaginator->items(), $this->characterTransformer);
        $characters->setPaginator(new IlluminatePaginatorAdapter($charactersPaginator));

        $this->fractal->parseIncludes($request->get('include', ''));
        $characters = $this->fractal->createData($characters);

        return $characters->toArray();
    }

    public function showOneCharacter($id)
    {
        try{
            $characters = Character::findOrFail($id);
        }
        catch(ModelNotFoundException $e){
            return response()->json(['error' => "We couldn't find that character"], 404);
        }

        $characters = new Item($characters, $this->characterTransformer);
        $characters = $this->fractal->createData($characters);

        return $characters->toArray();
    }

    public function showOneFiltered($id , $filter)
    {
        if ( in_array($filter, self::allowed_filters)){
            try{
                $result = Character::findOrFail($id)->$filter;
            }
            catch(ModelNotFoundException $e){
                return response()->json(['error' => "We couldn't find that character"], 404);
            }

            $transformerName = '\App\Transformers\\'.ucfirst($filter).'Transformer';
            $transformerObj = new $transformerName();
            $result = new Collection($result, $transformerObj );
            $result = $this->fractal->createData($result);

            return $result->toArray();
        }
        else{
            return response()->json(['error' => "ResourceNotFound"], 404);
        }
    }

}
