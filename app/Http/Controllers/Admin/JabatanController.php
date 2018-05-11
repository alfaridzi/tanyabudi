<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Jabatan\TambahJabatanRequest;
use App\Http\Requests\Admin\Jabatan\EditJabatanRequest;

use App\Model\Admin\Jabatan;
use App\Model\Admin\Divisi;
use App\Model\Admin\Log;

class JabatanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:menu jabatan']);
    }

    public function index()
    {
    	$jabatan = Jabatan::paginate(5);
    	return view('admin.jabatan.jabatan', compact('jabatan'));
    }

    public function create()
    {
    	$divisi = Divisi::all();
    	return view('admin.jabatan.tambah_jabatan', compact('divisi'));
    }

    public function store(TambahJabatanRequest $request)
    {
    	$jabatan = new Jabatan;

    	$jabatan->kode_jabatan = $request->kode_jabatan;
    	$jabatan->kode_divisi = $request->divisi;
    	$jabatan->nama_jabatan = $request->nama_jabatan;
    	$jabatan->deskripsi = $request->deskripsi;
    	$jabatan->wilayah = $request->wilayah;
        $jabatan->kode_cabang = $request->kode_cabang;
    	$jabatan->save();

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Menambahkan jabatan baru dengan kode jabatan '.$jabatan->kode_jabatan;
        $log->save();
    	
    	return redirect('index/admin/jabatan')->withSuccess('Berhasil Menambahkan Jabatan Baru');
    }

    public function edit($kode_jabatan)
    {
    	$jabatan = Jabatan::findOrFail($kode_jabatan);
    	$divisi = Divisi::all();
    	return view('admin.jabatan.edit_jabatan', compact('divisi', 'jabatan'));
    }

    public function update(EditJabatanRequest $request, $kode_jabatan)
    {
    	$jabatan = Jabatan::findOrFail($kode_jabatan);

    	$jabatan->kode_jabatan = $request->kode_jabatan;
    	$jabatan->kode_divisi = $request->divisi;
    	$jabatan->nama_jabatan = $request->nama_jabatan;
    	$jabatan->deskripsi = $request->deskripsi;
    	$jabatan->wilayah = $request->wilayah;
        $jabatan->kode_cabang = $request->kode_cabang;
    	$jabatan->update();

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Mengubah data jabatan dengan kode jabatan '.$jabatan->kode_jabatan;
        $log->save();

    	return redirect('index/admin/jabatan')->withSuccess('Berhasil Mengubah Jabatan');
    }

    public function delete($kode_jabatan)
    {
    	$jabatan = Jabatan::findOrFail($kode_jabatan);
        $kode_jabatan = $jabatan->kode_jabatan;
		$jabatan->delete();

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Menghapus jabatan dengan kode jabatan '.$kode_jabatan;
        $log->save();

		return redirect()->back()->withSuccess('Berhasil Menghapus Jabatan');
    }
}
