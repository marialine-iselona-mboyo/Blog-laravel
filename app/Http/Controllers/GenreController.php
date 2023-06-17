<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index(){
        $genres = Genre::all();

        return view ('genres/index-genre', compact('genres'));
    }

    public function create()
    {
        return view('genres/create-genre');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
        ]);

        $genre = new Genre();
        $genre->name = $validated['name'];
        $genre->save();

        return redirect()->route('genres/index-genre');
    }


}
