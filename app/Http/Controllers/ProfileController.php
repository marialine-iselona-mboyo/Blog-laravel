<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct()
    //{
    //    $this->middleware('auth');
    //}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($name)
    {
        $user = User::where('name', '=', $name)->firstOrFail();
        return view('users.profile', compact('user'));
    }

    public function show($id){
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
      }

    public function store(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image',
        ]);

        $avatarName = time().'.'.$request->avatar->getClientOriginalExtension();
        $request->avatar->move(public_path('avatars'), $avatarName);

        $user = Auth()->user;
        $user->avatar = $avatarName;
        $user->save();

        return back()->with('success', 'Avatar updated successfully.');
    }

    public function edit()
    {

        $user = Auth::user();
        return view('users/edit', compact('user'));

    }


    public function update($id, Request $request){
        $user = User::findOrFail($id);

        if($user->user_id != Auth::user()->id){
          abort(403);
        }

        $validated = $request->validate([
            'username'      => 'required|min:3',
            'email'         => 'required|min:10',
            'date_of_birth' => 'required|date',
            'about_me'      => 'required|min:20',
            'update_at'     => now(),
        ]);

        $user->username = $validated['username'];
        $user->email = $validated['email'];
        $user->date_of_birth = $validated['date_of_birth'];
        $user->about_me = $validated['about_me'];
        $user->save();

        return redirect()->route('users/profile')->with('status', 'Profile Succesfully Edited');

      }

    public function adminIndex()
    {
        return view('admin/profile');
    }

}
