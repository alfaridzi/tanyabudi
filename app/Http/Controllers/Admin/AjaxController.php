<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function get_jabatan($kode_divisi)
    {
    	$jabatan = DB::table('tbl_jabatan')->where('kode_divisi', $kode_divisi)->pluck('kode_jabatan', 'nama_jabatan')->all();
    	$data = view('admin.ajax.select_jabatan',compact('jabatan'))->render();
    	return response()->json(['options' => $data]);
    }

    public function get_kota($province_id)
    {
    	$kota = DB::table('regencies')->where('province_id', $province_id)->pluck('id', 'name')->all();
    	$data = view('admin.ajax.select_kota',compact('kota'))->render();
    	return response()->json(['options' => $data]);
    }

    public function get_kecamatan($regency_id)
    {
    	$kecamatan = DB::table('districts')->where('regency_id', $regency_id)->pluck('id', 'name')->all();
    	$data = view('admin.ajax.select_kecamatan',compact('kecamatan'))->render();
    	return response()->json(['options' => $data]);
    }

	public function get_kelurahan($district_id)
    {
    	$kelurahan = DB::table('villages')->where('district_id', $district_id)->pluck('id', 'name')->all();
    	$data = view('admin.ajax.select_kelurahan',compact('kelurahan'))->render();
    	return response()->json(['options' => $data]);
    }

    public function detail_karyawan($id_karyawan)
    {
    	$karyawan = DB::table('tbl_karyawan')->addSelect('tbl_karyawan.*')->addSelect('tbl_divisi.*')->addSelect('tbl_jabatan.*')->addSelect('provinces.name as nama_provinsi')->addSelect('regencies.name as nama_kota')->addSelect('districts.name as nama_kecamatan')->addSelect('villages.name as nama_kelurahan')->join('tbl_divisi', 'tbl_karyawan.kode_divisi', '=', 'tbl_divisi.kode_divisi')->join('tbl_jabatan', 'tbl_karyawan.kode_jabatan', '=', 'tbl_jabatan.kode_jabatan')->join('provinces', 'tbl_karyawan.provinsi', '=', 'provinces.id')->join('regencies', 'tbl_karyawan.kota', '=', 'regencies.id')->join('districts', 'tbl_karyawan.kecamatan', '=', 'districts.id')->join('villages', 'tbl_karyawan.kelurahan', '=', 'villages.id')->first();
    	return response()->json(['options' => $karyawan]);
    }
}
