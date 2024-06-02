<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class registerController
{
    public function index()
    {
        return view('dashboard.peminjam.register',[
            'title' => 'register',
            'active' => 'register',
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|max:25|min:3',
            'password' => 'required|min:3|max:10',
            'confirmPassword' => 'required|min:3|max:10|same:password',
        ]);

        User::create($validated);

        // $request->session()->flash('succes', 'request succes full please login');

        // The blog post is valid...

        return redirect('/login');
    }
}
