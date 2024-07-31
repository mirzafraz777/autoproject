<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail;
use App\Models\User;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user_details = $user->users_info()->create([
            'u_id' => $user->id,
            'ref_code' => Str::random(10),
            'img' => 'images/profile/default.png',
        ]);
        return redirect()->route('login')->with('message', 'Account created successfully.');
    }


    // -------------------------LogIn----------------------------------------
    public function showLoginForm()
    {

        if (Auth::check()) {
            return redirect()->route('user.index');
        } else {
            return view('login');
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->role == 0) {
                return redirect()->route('user.index')->with('message', 'Logged In Successfully.');
            } else {
                Auth::logout();
                return redirect()->route('home')->with('message', 'You are not authorized.');
            }
        }
        return back()->with('message', 'The provided credentials do not match our records.');
    }

    // ------------------------- LogOut ---------------------
    public function logout(Request $request)
    {

        // Log the user out
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('message', 'Logout Successfully.');
    }


    public function resetPassword(Request $request)
    {

        if ($request->isMethod('POST')) {
            $request->validate([
                'email' => ['required', 'email'],
            ]);
            $user =  User::where('email', $request->email)->first();
            if ($user) {
                $user->verification_token = Str::random();
                $user->email_verified_at = now();
                $user->save();

                return redirect()->route('login')->with('message', 'Reset link successfully send to your email address.');
                //    Send User Email
                //   URL = http://www.example.com/reset-password/token/$user->verification_token         
            } else {
                return back()->with('message', 'User with this email does not exists.');
            }
        } else {

            return view('reset-password');
        }
    }

    public function passwordUpdate($token, Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->validate([
                'password' => 'required|string|min:4|confirmed',
            ]);
            $user =  User::where('verification_token', $token)->first();
            if ($user) {
                $user->verification_token = '';
                $user->email_verified_at = now();
                $user->password = Hash::make($request->password);
                $user->save();

                return redirect()->route('login')->with('message', 'Password Update Successfully.');
            } else {
                return redirect()->route('login')->with('message', 'Bad Request.');
            }
        } else {

            return view('update-password', compact('token'));
        }
    }
}
