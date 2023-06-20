<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $genres = Genre::all();

        return view ('genres/index-genre', compact('genres'));
    }

    public function edit(string $id)
    {
        $genre = Genre::find($id);
        return view('genres/edit-genre', compact('genre'));
    }

    public function update(Request $request, string $id)
    {
        $genre = Genre::find($id);

        $request->validate([
            'name' => 'required|unique:genres,name,' . $genre->id,
        ]);

        $genre->update([
            'name' => $request->name,
        ]);

        return redirect()->route('genres/index-genre')->with('success', 'The genre has been modified');

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

    public function destroy(string $id)
    {
        $genre = Genre::find($id);

        $genre->delete();
        return redirect()->route('genres/index-genre')->with('success', 'The genre has been deleted');

    }
}
