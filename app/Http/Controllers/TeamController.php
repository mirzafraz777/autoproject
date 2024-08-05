<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function teamShow(Request $request){

        $refcode = Auth::user()->ref_code;
        $users = UserDetail::with('team_info')->where('user_details.ref_code', $refcode)->paginate('5');

        return view('user.team', ['users' => $users]);
    }
}
