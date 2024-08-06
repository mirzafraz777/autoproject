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

    public function refBonus(){
        $user = Auth::user();

        if ($user->ref_code) {
            $referredUserDetail = UserDetail::with('team_info')
                ->where('ref_code', $user->ref_code)
                ->first();
                if ($referredUserDetail) {
                    $user->ref_bonus += 100; // Example bonus amount
                    $referredUserDetail->save();
                }
            }else{
                return response()->json(['no refral found']);
            }
    }
}
