<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
    	return view('umum.pengaturan');
    }

    public function update(Request $request)
    {
    	
    }
}