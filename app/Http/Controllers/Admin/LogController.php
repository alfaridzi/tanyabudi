<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Model\Admin\Log;
use App\Model\Admin\Admin;
use Carbon\Carbon;

class LogController extends Controller
{
	public function __construct()
	{
		$this->middleware(['permission:menu report admin']);
	}

    public function index()
    {
    	$admin = Admin::all()->load('log', 'get_karyawan');

        $tanggal_awal_hari = Carbon::now()->startOfDay();
        $tanggal_akhir_hari = Carbon::now()->endOfDay();

        $tanggal_awal_bulan = Carbon::now()->startOfMonth();
        $tanggal_akhir_bulan = Carbon::now()->endOfMonth();

    	return view('admin.report.admin.admin', compact('admin', 'tanggal_awal_hari', 'tanggal_akhir_hari', 'tanggal_awal_bulan', 'tanggal_akhir_bulan'));
    }

    public function rincian($id_admin)
    {
    	$log = DB::table('tbl_log_admin')->where('id_admin', $id_admin)->orderBy('id_log', 'desc')->get();

    	return view('admin.report.admin.rincian', compact('log'));
    }
}
