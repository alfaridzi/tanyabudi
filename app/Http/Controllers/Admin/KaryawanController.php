<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\Karyawan\TambahKaryawanRequest;
use App\Http\Requests\Admin\Karyawan\EditKaryawanRequest;
use Carbon\Carbon;
use App\Model\Admin\Karyawan;

class KaryawanController extends Controller
{
    public function index()
    {
    	$karyawan = DB::table('tbl_karyawan')->join('tbl_divisi', 'tbl_karyawan.kode_divisi', '=', 'tbl_divisi.kode_divisi')->join('tbl_jabatan', 'tbl_karyawan.kode_jabatan', '=', 'tbl_jabatan.kode_jabatan')->paginate(10);

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

    	return redirect('index/admin/karyawan')->withSuccess('Berhasil Mengubah Data');
    }

    public function delete($id_karyawan)
    {
    	$karyawan = Karyawan::findOrFail($id_karyawan);
    	$karyawan->delete();
    	return redirect()->back()->withSuccess('Berhasil Menghapus Karyawan');
    }
}
