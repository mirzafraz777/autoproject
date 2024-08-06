<?php

namespace App\Http\Controllers;

use App\Models\Withdrawals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawalsController extends Controller
{
    public function index(){
        $user = Auth::user();
        $details = Withdrawals::where('u_id', $user->id)->get();
        return view('user.withdrawls', compact('details'));
    }
}
