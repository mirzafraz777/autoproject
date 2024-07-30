<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
    // update status
    public function updateStatus($userId)
    {
        $user = User::findOrFail($userId);

        if($user){
            if ($user->users_info->status) {
                // Toggle the status
                $user->users_info->status = 0;
            }else{
                $user->users_info->status = 1;
            }
            $user->users_info->save();
        }
        // Redirect back with a success message
        return back();
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
            $user = Auth::user();
            // return $user;
            if (Auth::user()->role == 0) {
                return redirect()->route('user.index');
            }else{
                return redirect()->route('user.index');
            }
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function Userindex()
    {
        return view('user.index');
    }
     // ------------------------- LogOut ---------------------
    public function logout(Request $request)
    {

        // Log the user out
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
