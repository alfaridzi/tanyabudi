<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class dashboardController extends Controller
{
    public function index() {
    	if(Auth::user()->type == '1') {
    		return view('user.index');
    	}else {
    		return view('agen.index');
    	}
    }
}

