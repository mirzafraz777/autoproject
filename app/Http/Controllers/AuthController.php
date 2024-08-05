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

        if(!empty($request->ref_code)){
            $reference = User::where('ref_code', $request->ref_code)->first();
            // dd($reference->id);
            if(!empty($reference)){

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'ref_code' => Str::random(10),
            ]);

            $user_details = $user->users_info()->create([
                'u_id' => $user->id,
                'parent_user_id' => $reference->id,
                'ref_code' => $request->ref_code,
                'img' => 'images/profile/default.png',
            ]);

            return redirect()->route('login')->with('message', 'Account created successfully.');

            }else{
                return redirect()->route('register')->with('message', 'Invalid Refferal Code.');
            }

        }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'ref_code' => Str::random(10),
            ]);

            $user_details = $user->users_info()->create([
                'u_id' => $user->id,
                'img' => 'images/profile/default.png',
            ]);

            return redirect()->route('login')->with('message', 'Account created successfully.');

    }


    // -------------------------LogIn----------------------------------------
    public function showLoginForm()
    {
        if (Auth::check() && Auth::user()->role == 1) {

            return redirect()->route('admin.index');

        } elseif(Auth::check() && Auth::user()->role == 0) {

            return redirect()->route('user.index');

        }else{

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
                return redirect()->route('home')->with('message', 'Logged In Successfully.');
            } else {
                // Auth::logout();
                return redirect()->route('admin.index')->with('message', 'Logged In Successfully.');
            }
        }
        return back()->with('message', 'The provided credentials do not match our records.');
    }

    // admin login
    // public function Adminlogin(Request $request){
    //     $credentials = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required'],
    //     ]);

    //     if (Auth::attempt($credentials)) {
    //         $user = Auth::user();
    //         if($user->role == 1){
    //             return view('admin.index');
    //         }
    //         return redirect()->route('admin.login')->with('message', 'The provided credentials do not match our records.');
    //     }
    // }

        // user logout
        // public function userLogout(Request $request)
        public function logout(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('login');
        }
    //  // Admin LogOut ---------------------
    // public function adminLogout(Request $request)
    // {
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    //     return redirect()->route('home')->with('message', 'Logout Successfully.');
    // }

    // reset password
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

    // update password
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
