<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\Karyawan\TambahKaryawanRequest;
use App\Http\Requests\Admin\Karyawan\EditKaryawanRequest;
use Carbon\Carbon;
use App\Model\Admin\Karyawan;
use App\Model\Admin\Log;

class KaryawanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:menu karyawan']);
    }

    public function index()
    {
    	$karyawan = DB::table('tbl_karyawan')->addSelect('tbl_karyawan.*', 'tbl_karyawan.id_karyawan as id_karyawan')->addSelect('tbl_divisi.*')->addSelect('tbl_jabatan.*')->addSelect('tbl_admin.id_admin')->leftJoin('tbl_divisi', 'tbl_karyawan.kode_divisi', '=', 'tbl_divisi.kode_divisi')->leftJoin('tbl_jabatan', 'tbl_karyawan.kode_jabatan', '=', 'tbl_jabatan.kode_jabatan')->leftJoin('tbl_admin', 'tbl_karyawan.id_karyawan', '=', 'tbl_admin.id_karyawan')->paginate(10);

    	return view('admin.karyawan.karyawan', compact('karyawan'));
    }

    public function create()
    {
    	$divisi = DB::table('tbl_divisi')->get();
    	$provinsi = DB::table('provinces')->get();
    	return view('admin.karyawan.tambah_karyawan', compact('divisi', 'provinsi'));
    }

    public function store(TambahKaryawanRequest $request)
    {
    	$input = $request->all();
    	$input['kode_divisi'] = $request->divisi;
    	$input['kode_jabatan'] = $request->jabatan;
    	Karyawan::create($input);

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Menambahkan karyawan baru dengan nama karyawan '.$request->nama;
        $log->save();

    	return redirect('index/admin/karyawan')->withSuccess('Berhasil Menambahkan Karyawan Baru');
    }

    public function edit($id_karyawan)
    {
    	$karyawan = Karyawan::findOrFail($id_karyawan);
    	$divisi = DB::table('tbl_divisi')->get();
    	$jabatan = DB::table('tbl_jabatan')->where('kode_divisi', $karyawan->kode_divisi)->get();
    	$provinsi = DB::table('provinces')->get();
    	$kota = DB::table('regencies')->where('province_id', $karyawan->provinsi)->get();
    	$kecamatan = DB::table('districts')->where('regency_id', $karyawan->kota)->get();
    	$kelurahan = DB::table('villages')->where('district_id', $karyawan->kecamatan)->get();

    	return view('admin.karyawan.edit_karyawan', compact('karyawan', 'divisi', 'jabatan', 'provinsi', 'kota', 'kecamatan', 'kelurahan'));
    }

    public function update(EditKaryawanRequest $request, $id_karyawan)
    {
    	$karyawan = Karyawan::findOrFail($id_karyawan);
    	$input = $request->all();
    	$input['kode_divisi'] = $request->divisi;
    	$input['kode_jabatan'] = $request->jabatan;
    	$input['updated_at'] = Carbon::now();
    	$karyawan->update($input);

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Mengubah data karyawan dengan nama karyawan '.$request->nama;
        $log->save();

    	return redirect('index/admin/karyawan')->withSuccess('Berhasil Mengubah Data');
    }

    public function delete($id_karyawan)
    {
    	$karyawan = Karyawan::findOrFail($id_karyawan);
        $nama_karyawan = $karyawan->nama_karyawan;
        $admin = Admin::where('id_karyawan', $id_karyawan)->delete();
    	$karyawan->delete();

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Menghapus karyawan dengan nama karyawan '.$nama_karyawan;
        $log->save();

    	return redirect()->back()->withSuccess('Berhasil Menghapus Karyawan');
    }
}
