<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class loginController
{

    public function index()
    {
        return view('dashboard.peminjam.login', [
            'title' => 'login',
            'active' => 'login',
        ]);
    }

    public function indexAdmin()
    {
        return view('dashboard.admin.loginadmin', [
            'title' => 'login',
            'active' => 'login',
        ]);
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => 'required|max:25|min:3',
            'password' => 'required|min:3|max:10',
        ]);

        // dd($credentials);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard-peminjam');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function authenticate2(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => 'required|max:25|min:3',
            'password' => 'required|min:3|max:10',
        ]);

        // dd($credentials);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
