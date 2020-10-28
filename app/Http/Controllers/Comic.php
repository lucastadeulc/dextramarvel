<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{

    public function showAllComics()
    {
        return response()->json(Comic::all());
    }

    public function showOneComic($id)
    {
        return response()->json(Comic::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $comic = Comic::create($request->all());

        return response()->json($comic, 201);
    }

    public function update($id, Request $request)
    {
        $comic = Comic::findOrFail($id);
        $comic->update($request->all());

        return response()->json($comic, 200);
    }

    public function delete($id)
    {
        Comic::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}