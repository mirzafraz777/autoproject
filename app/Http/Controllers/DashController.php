<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Auth;

class DashController extends Controller
{
    public function index()
    {
        $data = UserDetail::all();
        return $data;
        return view('layout.admin', compact('data'));
    }
}
