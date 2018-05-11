<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

use App\Model\Admin\Informasi;
use App\Model\Admin\Log;

class InformasiController extends Controller
{
	public function __construct()
	{
		$this->middleware(['permission:menu informasi']);
	}

    public function index()
    {
    	$informasi = DB::table('tbl_informasi')->orderBy('id_informasi', 'desc')->paginate(10);
    	return view('admin.informasi.informasi', compact('informasi'));
    }

    public function create()
    {
    	return view('admin.informasi.tambah_informasi');
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'judul' => 'required|string|max:30',
            'isi' => 'required|string|max:150',
    		'kategori' => 'required|string|max:20',
    		'role' => ['required',Rule::in(["1", "2"])],
    	]);

    	$informasi = new Informasi;
    	$informasi->judul = $request->judul;
        $informasi->isi = $request->isi;
    	$informasi->kategori = $request->kategori;
    	$informasi->role = $request->role;
    	$informasi->save();

    	$log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Menambahkan informasi baru dengan judul '.$informasi->judul;
        $log->save();

    	return redirect('index/admin/pengaturan/informasi')->withSuccess('Berhasil Menambahkan Informasi Baru');
    }

    public function edit($id_informasi)
    {
    	$informasi = Informasi::findOrFail($id_informasi);
    	return view('admin.informasi.edit_informasi', compact('informasi'));
    }

    public function update(Request $request, $id_informasi)
    {
    	$this->validate($request,[
    		'judul' => 'required|string|max:30',
            'isi' => 'required|string|max:150',
    		'kategori' => 'required|string|max:20',
    		'role' => ['required',Rule::in(["1", "2"])],
    	]);

    	$informasi = Informasi::findOrFail($id_informasi);
    	$informasi->judul = $request->judul;
        $informasi->isi = $request->isi;
    	$informasi->kategori = $request->kategori;
    	$informasi->role = $request->role;
    	$informasi->save();

    	$log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Mengubah data informasi dengan judul '.$informasi->judul;
        $log->save();

    	return redirect('index/admin/pengaturan/informasi')->withSuccess('Berhasil Mengubah Informasi');
    }

    public function delete($id_informasi)
    {
    	$informasi = Informasi::findOrFail($id_informasi);
    	$judul = $informasi->judul;
    	$informasi->delete();

    	$log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Menghapus informasi dengan judul '.$judul;
        $log->save();

    	return redirect('index/admin/pengaturan/informasi')->withSuccess('Berhasil Menghapus Informasi');
    }
}
