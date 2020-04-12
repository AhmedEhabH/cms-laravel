<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    //
    public function index()
    {
        return view('users.index')->with('users', User::all());
    }

    public function makeAdmin(User $user)
    {
        # code...
        $user->role = 'admin';

        $user->save();

        session()->flash('success', 'User made admin successfully');

        return redirect(route('users.index'));
    }
}
