<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;
use Auth;

class AuthController extends Controller
{
    public function create()
    {
        return view('register');
    }
    public function signUp(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Account created successfully.');
    }

    // -------------------------LogIn----------------------------------------
    public function showLoginForm(){
        return view('login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('register');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

     // ------------------------- LogOut ---------------------
    public function logout(Request $request)
    {
         // Log the user out
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

         // Redirect to the homepage or login page
        return redirect('/');
    }
}
