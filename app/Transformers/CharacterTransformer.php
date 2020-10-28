<?php

namespace App\Transformers;

use App\Character;
use Illuminate\Support\Facades\App;
use League\Fractal\TransformerAbstract;

class CharacterTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'comics' , 'series' , 'stories' , 'events' , 'urls'
    ];

    public function transform(Character $character)
    {
        return [
	        'id'      => (int)  $character->id,
	        'name'          =>  $character->name,
	        'description'   =>  $character->description,
	        'modified'      =>  $character->modified,
	        'thumbnail'     =>  [
                                    'path' => $character->thumbnail,
                                    'extension' => 'jpg',
                                ],
	        'resourceURI'   =>  $_ENV['APP_URL'].'/v1/public/characters/'.$character->id,
	    ];
    }

    public function includeComics(Character $character)
    {
        $comics = Character::find($character->getId())->comics;
        return $this->collection($comics, new ComicsTransformer, 'comics');
    }

    public function includeSeries(Character $character)
    {
        $series = Character::find($character->getId())->series;
        return $this->collection($series, new SeriesTransformer, 'series');
    }
    
    public function includeStories(Character $character)
    {
        $stories = Character::find($character->getId())->stories;
        return $this->collection($stories, new StoriesTransformer, 'stories');
    }
    
    public function includeEvents(Character $character)
    {
        $events = Character::find($character->getId())->events;
        return $this->collection($events, new EventsTransformer, 'events');
    }
    
    public function includeUrls(Character $character)
    {
        $urls = Character::find($character->getId())->urls;
        return $this->collection($urls, new UrlsTransformer, 'urls');
    }   

}
