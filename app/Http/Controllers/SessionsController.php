<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('clientViews.login-session');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($attributes)) {
            session()->regenerate();
            $user = Auth::user();
            if ($user->role == 'Administrador') {
                return redirect('dashboard')->with(['success' => 'You are logged in as an admin.']);
            }

            return redirect('home')->with(['success' => 'You are logged in as a user.']);
        }

        return back()->withErrors([
            'email' => 'Email or password invalid.',
            'password' => 'Email or password invalid.',
        ]);
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/login')->with(['success'=>'You\'ve been logged out.']);
    }
}
