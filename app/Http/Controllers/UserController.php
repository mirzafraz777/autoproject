<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

// ------- User Panel User Details Code ----- //

    public function loggedUser()
    {
        if (Auth::check()) {
            $loggedUser = Auth::user()->getAuthIdentifier();
            $user = User::where('id', $loggedUser)
                ->with(['users_info','latestOrder'])
                ->first();
                // return $user;
            return view('user.index', compact('user'));
        } else {
            return redirect()->route('login');
        }
    }


    public function userOrderDetails()
    {
        if (Auth::check()) {
            $loggedUser = Auth::user()->getAuthIdentifier();
            $user = User::where('id', $loggedUser)
                ->with(['users_info','allOrders'])
                ->first();
                return $user;
            return view('user.order', compact('user'));
        } else {
            return redirect()->route('login');
        }
    }


// ------- Admin Panel User Details Code ----- //

    public function index()
    {
        $users = User::with('users_info')
            ->get();
        return view('admin.users', compact('users'));
    }

    // update status
    public function updateStatus($userId)
    {
        $user = User::findOrFail($userId);

        if ($user) {
            if ($user->users_info->status) {
                // Toggle the status
                $user->users_info->status = 0;
            } else {
                $user->users_info->status = 1;
            }
            $user->users_info->save();
        }
        // Redirect back with a success message
        return back();
    }
}
