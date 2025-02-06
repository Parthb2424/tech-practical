<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.customer-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'No account found with this email.']);
        }

        if ($user->role !== 'customer') {
            return back()->withErrors(['email' => 'You are not allowed to login from here.']);
        }

        if (!$user->hasVerifiedEmail()) {
            return back()->withErrors(['email' => 'You need to verify your account before login.']);
        }

        if
        (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['password' => 'Invalid password.']);
    }
}
