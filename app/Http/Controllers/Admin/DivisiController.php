<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Divisi\TambahDivisiRequest;
use App\Http\Requests\Admin\Divisi\EditDivisiRequest;
use Carbon\Carbon;

use App\Model\Admin\Divisi;
use App\Model\Admin\Log;

class DivisiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:menu divisi']);
    }

    public function index()
    {
    	$divisi = Divisi::paginate(10);
    	return view('admin.divisi.divisi', compact('divisi'));
    }

    public function create()
    {
    	return view('admin.divisi.tambah_divisi');
    }

    public function store(TambahDivisiRequest $request)
    {
    	$input = $request->all();
    	Divisi::create($input);

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Menambahkan divisi baru dengan kode divisi '.$request->kode_divisi;
        $log->save();

    	return redirect('index/admin/divisi')->withSuccess('Berhasil Menambahkan Divisi Baru');
    }

    public function edit($kode_divisi)
    {
    	$divisi = Divisi::findOrFail($kode_divisi);
    	return view('admin.divisi.edit_divisi', compact('divisi'));
    }

    public function update(EditDivisiRequest $request, $kode_divisi)
    {
    	$divisi = Divisi::findOrFail($kode_divisi);
    	$input = $request->all();
    	$input['updated_at'] = Carbon::now();
    	$divisi->update($input);

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Mengubah data divisi dengan kode divisi '.$divisi->kode_divisi;
        $log->save();

    	return redirect('index/admin/divisi')->withSuccess('Berhasil Mengubah Divisi');
    }

    public function delete($kode_divisi)
    {
    	$divisi = Divisi::findOrFail($kode_divisi);
        $kode_divisi = $divisi->kode_divisi;
    	$divisi->delete();

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Menghapus divisi dengan kode divisi '.$kode_divisi;
        $log->save();

    	return redirect()->back()->withSuccess('Berhasil Menghapus Divisi');
    }
}
