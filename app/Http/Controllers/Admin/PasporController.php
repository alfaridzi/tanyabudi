<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Paspor\EditPasporRequest;

use App\Model\Admin\Paspor;

class PasporController extends Controller
{
    public function edit($id_paspor)
    {
    	$paspor = Paspor::findOrFail($id_paspor);
    	$dataProvinsi = DB::table('provinces');
    	$dataKota = DB::table('regencies');
    	$dataKecamatan = DB::table('districts');
    	$dataKelurahan = DB::table('villages');
    	if (!is_null($paspor->provinsi)) {
    		$dataProvinsi->where('id', $paspor->provinsi);
    	}
    	if(!is_null($paspor->kota)){
    		$dataKota->where('id', $paspor->kota);
    	}
    	if(!is_null($paspor->kecamatan)){
    		$dataKecamatan->where('id', $paspor->kecamatan);
    	}
    	if (!is_null($paspor->kelurahan)) {
    		$dataKelurahan->where('id', $paspor->kelurahan);
    	}
    	$provinsi = $dataProvinsi->get();
    	$kota = $dataKota->get();
    	$kecamatan = $dataKecamatan->get();
    	$kelurahan = $dataKelurahan->get();

    	return view('admin.data_booking.paspor.edit_paspor', compact('paspor', 'provinsi', 'kota', 'kecamatan', 'kelurahan'));
    }

    public function update(EditPasporRequest $request, $id_paspor)
    {
    	$paspor = Paspor::findOrFail($id_paspor);

    	$paspor->nomor_paspor = $request->nomor_paspor;
    	$paspor->nama_paspor = $request->nama;
    	$paspor->jenis_kelamin = $request->jenis_kelamin;
    	$paspor->tempat_lahir = $request->tempat_lahir;
    	$paspor->tanggal_lahir = $request->tanggal_lahir;
    	$paspor->no_hp_paspor = $request->nomor_hp;
    	$paspor->provinsi = $request->provinsi;
    	$paspor->kota = $request->kota;
    	$paspor->kecamatan = $request->kecamatan;
    	$paspor->kelurahan = $request->kelurahan;
    	$paspor->alamat = $request->alamat;
    	$paspor->tanggal_issued = $request->tanggal_issued;
    	$paspor->tanggal_expired = $request->tanggal_expired;
    	$paspor->keterangan;

    	$paspor->save();
    	
    	return redirect('index/admin/data-booking/jamaah')->withSuccess('Berhasil Mengubah Data Paspor');
    }
}
