<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $user->update($request->all());
        return redirect()->route('admin.users')->with('success', 'User has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User has been deleted');
    }

    public function makeAdmin($id)
    {
        if (!Auth::user()->is_admin) {
            abort(403, "You don't have access");
        }

        $user = User::findOrFail($id);
        $user->is_admin = true;
        $user->save();
        return redirect()->route('admin/users')->with('success', 'The user role has been updated');

    }

    public function demoteAdmin($id) {
        if (!Auth::user()->is_admin) {
            abort(403, "You don't have access");
        }

        $user = User::findOrFail($id);
        $user->is_admin = false;
        $user->save();
        return redirect()->route('admin/users')->with('success', 'The user role has been updated');
    }
}
