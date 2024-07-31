<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail;
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
        return back();
    }
    // -------------------------LogIn----------------------------------------
    public function showLoginForm(){
        return view('login');
    }
    // user login
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('user.index');
        }
        return redirect()->route('login')->with('message', 'The provided credentials do not match our records');
    }


        // User Dashboard
        public function userDash(Request $request){
            if (Auth::check()) {
                $data = UserDetail::all();
                $balance = $data->sum('current_balance');
                $total_earning = $data->sum('total_earning');
                $ref_bonus = $data->sum('ref_bonus');
                $total = $total_earning + $ref_bonus;

                return view('user.index', compact('balance', 'total', 'ref_bonus'));
            } else {
                return redirect()->route('login');
            }
        }

    // admin login
    public function Adminlogin(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user->role == 1){
                return view('admin.index');
            }
            return redirect()->route('admin.login')->with('message', 'The provided credentials do not match our records.');
        }
    }

        // Admin Dashboard
        public function adminDash(Request $request){
            if (Auth::check()) {
                $data = UserDetail::all();
                $balance = $data->sum('current_balance');
                $total_earning = $data->sum('total_earning');
                $ref_bonus = $data->sum('ref_bonus');
                $total = $total_earning + $ref_bonus;

                return view('admin.index', compact('balance', 'total', 'ref_bonus'));
            } else {
                return redirect()->route('admin.login');
            }
        }

        // user logout
        public function userLogout(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('login');
        }
     // Admin LogOut ---------------------
    public function adminLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('admin.login');
    }
}
