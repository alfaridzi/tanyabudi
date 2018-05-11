<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
class referalController extends Controller
{
    public function list() {
    	$user = User::where('referal',Auth::user()->referal_main)->get();
    	return view('agen/list_referral', compact('user'));
    }
}//
