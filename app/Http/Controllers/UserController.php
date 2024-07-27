<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::with('users_info')
        ->get();
        // return $users;
        return view('admin.users', compact('users') );
    }

    public function create(){
        return view('admin.user_create');
    }

}
