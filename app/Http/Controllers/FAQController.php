<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FAQController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index']]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('faqs')->get();

        return view('faq.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /*if(!Auth::user()->is_admin){
            abort(403, 'Only admins can create FAQ questions');
        }*/

        $categories = Category::all();

        return view('faq.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'question' => 'required',
            'answer' => 'required',
        ]);

        FAQ::create([
            'category_id' => $request->input('category_id'),
            'question' => $request->input('question'),
            'answer' => $request->input('answer'),
        ]);

        return redirect()->route('faq/index')->with('success', 'The has been succesfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $faq = FAQ::find($id);
        $categories = Category::all();

        if($faq->user_id != Auth::user()->id){
            abort(403);
        }

        return view('faq.edit', compact('faq', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $faq = FAQ::find($id);

        if($faq->user_id != Auth::user()->id){
            abort(403);
        }

        $request->validate([
            'category_id' => 'required',
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq->category_id = $request->input('category_id');
        $faq->question = $request->input('question');
        $faq->answer = $request->input('answer');
        $faq->save();

        return redirect()->route('faq/index')->with('success', 'La question a été mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!Auth::user()->is_admin){
            abort(403, 'Only admins can delete FAQ Questions');
          }

        $faq = FAQ::find($id);

        $faq->delete();

        return redirect()->route('faq/index')->with('success', 'La question a été supprimée avec succès.');
    }
}
