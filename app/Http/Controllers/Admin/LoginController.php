<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Model\Admin\Admin;

class LoginController extends Controller
{
    public function index()
    {
    	return view('admin.login');
    }

    public function login(Request $request)
    {
    	$username = $request->username;
    	$password = $request->password;

    	if (Auth::guard('admin')->attempt(['username' => $username, 'password' => $password])) {
    		return redirect()->intended('index/admin/dashboard');
    	}else{
    		return redirect()->back()->withErrors(['msg' => 'Username atau password salah']);
    	}
    }

    public function logout()
    {
    	Auth::guard('admin')->logout();
    	return redirect('index/login');
    }
}
