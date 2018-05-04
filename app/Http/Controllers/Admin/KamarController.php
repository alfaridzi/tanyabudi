<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\Kamar\TambahKamarRequest;
use App\Http\Requests\Admin\Kamar\EditKamarRequest;
use App\Http\Controllers\Controller;

use App\Model\Admin\Kamar;

class KamarController extends Controller
{
    public function index()
    {
    	$kamar = DB::table('tbl_kamar as t1')->leftJoin('tbl_kuota_kamar as t2', 't1.id_kamar', '=', 't2.id_kamar')->leftJoin('tbl_kloter as t3', 't1.id_kloter', '=', 't3.id_kloter')->select('t1.*', 't3.*', DB::raw("count(t2.id_kamar) as hitung_kuota"))->groupBy('t1.id_kamar')->orderBy('t1.id_kamar', 'desc')->paginate(15);

    	return view('admin.data_kloter.kamar.kamar', compact('kamar'));
    }

    public function create()
    {
    	$kloter = DB::table('tbl_kloter')->orderBy('id_kloter', 'desc')->get();

    	return view('admin.data_kloter.kamar.tambah_kamar', compact('kloter'));
    }

    public function store(TambahKamarRequest $request)
    {
    	$kamar = new Kamar;
    	$kamar->id_kloter = $request->kloter;
    	$kamar->kode_kamar = $request->kode_kamar;
    	$kamar->tipe_kamar = $request->tipe_kamar;
    	$kamar->kuota = $request->kuota;
    	$kamar->save();

    	return redirect('index/admin/data-kloter/kamar')->withSuccess('Berhasil Menambahkan Kamar Baru');
    }

    public function edit($id_kamar)
    {
    	$kamar = Kamar::findOrFail($id_kamar);
    	$kloter = DB::table('tbl_kloter')->orderBy('id_kloter', 'desc')->get();

    	return view('admin.data_kloter.kamar.edit_kamar', compact('kamar', 'kloter'));
    }

    public function update(EditKamarRequest $request, $id_kamar)
    {
    	$kamar = Kamar::findOrFail($id_kamar);
    	$kamar->id_kloter = $request->kloter;
    	$kamar->kode_kamar = $request->kode_kamar;
    	$kamar->tipe_kamar = $request->tipe_kamar;
    	$kamar->kuota = $request->kuota;
    	$kamar->save();

    	return redirect('index/admin/data-kloter/kamar')->withSuccess('Berhasil Mengubah Kamar');
    }

    public function delete($id_kamar)
    {
    	$kamar = Kamar::findOrFail($id_kamar);
    	$kamar->delete();
    	$kuota_kamar = DB::table('tbl_kuota_kamar')->where('id_kamar', $id_kamar)->delete();

    	return redirect('index/admin/data-kloter/kamar')->withSuccess('Berhasil Menghapus Kamar');
    }

    /* Bagian List Jamaah */

    public function list_jamaah($id_kamar)
    {
    	$kamar = DB::table('tbl_kuota_kamar')->leftJoin('tbl_jamaah', 'tbl_kuota_kamar.id_jamaah', '=', 'tbl_jamaah.id_jamaah')->leftJoin('tbl_paspor', 'tbl_jamaah.id_jamaah', '=', 'tbl_paspor.id_jamaah')->where('tbl_kuota_kamar.id_kamar', $id_kamar)->get();

    	return view('admin.data_kloter.kamar.list_jamaah', compact('kamar', 'id_kamar'));
    }

    public function isi_kuota($id_kamar)
    {
    	$dataKamar = Kamar::findOrFail($id_kamar);
    	$id_kloter = $dataKamar->id_kloter;

    	$kamar = DB::table('tbl_kuota_kloter as t1')->addSelect('t2.*', 't2.id_jamaah as id_jamaah')->addSelect('t3.*')->addSelect('t1.*')->leftJoin('tbl_jamaah as t2', 't1.id_jamaah', '=', 't2.id_jamaah')->leftJoin('tbl_paspor as t3', 't2.id_jamaah', '=', 't3.id_jamaah')->leftJoin('tbl_kuota_kamar as t4', 't1.id_jamaah', '=', 't4.id_jamaah')->whereNull('t4.id_jamaah')->where('t1.id_kloter', $id_kloter)->get();

    	$kuota = $dataKamar->kuota;

    	$kuota_terisi = DB::table('tbl_kuota_kamar')->where('id_kamar', $id_kamar)->count();

    	$seat = $kuota - $kuota_terisi;
    	if ($seat < 0) {
    		return redirect()->back()->withErrors(['msg'=>'Kamar Sudah Penuh']);
    	}

    	return view('admin.data_kloter.kamar.isi_kuota', compact('kamar', 'id_kamar', 'seat'));
    }

    public function store_isi_kuota(Request $request, $id_kamar)
    {
    	$jamaah = explode(',', $request->tampungJamaah);

    	$arrayJamaah = array();
    	foreach ($jamaah as $key => $dataJamaah) {
    		$arrayJamaah[] = array('id_kamar' => $id_kamar,'id_jamaah' => $dataJamaah, 'created_at' => date('Y-m-d H:i:s'));
    	}

    	DB::table('tbl_kuota_kamar')->insert($arrayJamaah);
    	return redirect('index/admin/data-kloter/kamar/list-jamaah/'.$id_kamar)->withSuccess('Berhasil Menambahkan Jamaah');
    }

    public function delete_kuota(Request $request)
    {
    	$jamaah = explode(',', $request->tampungJamaah);
    	$kloter = DB::table('tbl_kuota_kamar')->whereIn('id_jamaah', $jamaah);
    	$kloter->delete();

    	return redirect()->back()->withSuccess('Berhasil Menghapus Jamaah');
    }
}
