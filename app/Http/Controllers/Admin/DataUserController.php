<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\User;

class DataUserController extends Controller
{
    public function index_agen()
    {
    	$user = DB::table('users')->where('type', 2)->orderBy('id')->paginate(15);
    	return view('admin.data_user.agen.agen', compact('user'));
    }

    public function search_agen(Request $request)
    {
    	$keyword = $request->search;
    	$status = $request->status;

    	$user = DB::table('users')->where('type', 2)->where(function($q) use($status){
    		$q->where('status', $status);
    	})->where(function($q) use($keyword){
    		$q->where('name', 'like', '%'.$keyword.'%')->orWhere('nohp', 'like', '%'.$keyword.'%')->orWhere('email', 'like', '%'.$keyword.'%')->orWhere('name', 'like', '%'.$keyword.'%');
    	})->paginate(15);
    	return view('admin.data_user.agen.agen', compact('user'));
    }

    public function index_user()
    {
    	$user = DB::table('users')->where('type', 1)->orderBy('id')->paginate(15);
    	return view('admin.data_user.user.user', compact('user'));
    }

    public function search_user(Request $request)
    {
    	$keyword = $request->search;

    	$user = DB::table('users')->where('type', 1)->where(function($q) use($keyword){
    		$q->where('name', 'like', '%'.$keyword.'%')->orWhere('nohp', 'like', '%'.$keyword.'%')->orWhere('email', 'like', '%'.$keyword.'%')->orWhere('name', 'like', '%'.$keyword.'%');
    	})->paginate(15);
    	return view('admin.data_user.user.user', compact('user'));
    }

    public function konfirmasi($id_user)
    {
    	$user = User::find($id_user);
    	$user->update(['status' => 1]);

    	return redirect()->back()->withSuccess('Berhasil Mengubah Status User');
    }
}
