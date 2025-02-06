<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = \App\Models\User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'No account found with this email.']);
        }

        if (!$user->hasVerifiedEmail()) {
            return back()->withErrors(['email' => 'You need to verify your account before login.']);
        }
        if ($user->role !== 'admin') {
            return back()->withErrors(['email' => 'You are not allowed to login from here.']);
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['password' => 'Invalid password.']);
    }
}

