<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Bus\TambahBusRequest;
use App\Http\Requests\Admin\Bus\EditBusRequest;

use App\Model\Admin\Bus;

class BusController extends Controller
{
    public function index()
    {
    	$bus = DB::table('tbl_bus as t1')->leftJoin('tbl_kuota_bus as t2', 't1.id_bus', '=', 't2.id_bus')->leftJoin('tbl_kloter as t3', 't1.id_kloter', '=', 't3.id_kloter')->select('t1.*', 't3.*', DB::raw("count(t2.id_bus) as hitung_seat"))->groupBy('t1.id_bus')->orderBy('t1.id_bus', 'desc')->paginate(15);
    	return view('admin.data_kloter.bus.bus', compact('bus'));
    }

    public function search(Request $request)
    {
    	$keyword = $request->search;

    	$bus = DB::table('tbl_bus as t1')->leftJoin('tbl_kuota_bus as t2', 't1.id_bus', '=', 't2.id_bus')->leftJoin('tbl_kloter as t3', 't1.id_kloter', '=', 't3.id_kloter')->select('t1.*', 't3.*', DB::raw("count(t2.id_bus) as hitung_seat"))->where('kode_bus', 'like', '%'.$keyword.'%')->orWhereExists(function($q) use($keyword){
    		$q->select(DB::raw('kode_flight, nama_kloter'))->from('tbl_kloter')->where('tbl_kloter.kode_flight', 'like', '%'.$keyword.'%')->orWhere('tbl_kloter.nama_kloter', 'like', '%'.$keyword.'%');
    	})->orWhere('nama_bus', 'like', '%'.$keyword.'%')->orWhere('seat_bus', $keyword)->groupBy('t1.id_bus')->orderBy('t1.id_bus', 'desc')->paginate(15);

    	return view('admin.data_kloter.bus.bus', compact('bus'));
    }

    public function create()
    {
    	$kloter = DB::table('tbl_kloter')->orderBy('id_kloter', 'desc')->get();

    	return view('admin.data_kloter.bus.tambah_bus', compact('kloter'));
    }

    public function store(TambahBusRequest $request)
    {
    	$bus = new Bus;
    	$bus->id_kloter = $request->kloter;
    	$bus->nama_bus = $request->nama_bus;
    	$bus->kode_bus = $request->kode_bus;
    	$bus->seat_bus = $request->seat_bus;
    	$bus->save();

    	return redirect('index/admin/data-kloter/bus')->withSuccess('Berhasil Menambahkan Bus Baru');
    }

    public function edit($id_bus)
    {
    	$bus = Bus::findOrFail($id_bus);
    	$kloter = DB::table('tbl_kloter')->orderBy('id_kloter', 'desc')->get();

    	return view('admin.data_kloter.bus.edit_bus', compact('bus', 'kloter'));
    }

    public function update(EditBusRequest $request, $id_bus)
    {
    	$bus = Bus::findOrFail($id_bus);
    	$bus->id_kloter = $request->kloter;
    	$bus->nama_bus = $request->nama_bus;
    	$bus->kode_bus = $request->kode_bus;
    	$bus->seat_bus = $request->seat_bus;
    	$bus->save();

    	return redirect('index/admin/data-kloter/bus')->withSuccess('Berhasil Mengubah Bus');
    }

    public function delete($id_bus)
    {
    	$bus = Bus::findOrFail($id_bus);
    	$bus->delete();
    	$kuota_bus = DB::table('tbl_kuota_bus')->where('id_bus', $id_bus)->delete();

    	return redirect()->back()->withSuccess('Berhasil Delete Bus');
    }

    /* Bagian List Jamaah */

    public function list_jamaah($id_bus)
    {
    	$bus = DB::table('tbl_kuota_bus')->leftJoin('tbl_jamaah', 'tbl_kuota_bus.id_jamaah', '=', 'tbl_jamaah.id_jamaah')->leftJoin('tbl_paspor', 'tbl_jamaah.id_jamaah', '=', 'tbl_paspor.id_jamaah')->where('tbl_kuota_bus.id_bus', $id_bus)->get();

    	return view('admin.data_kloter.bus.list_jamaah', compact('bus', 'id_bus'));
    }

    public function isi_kuota($id_bus)
    {

    	$dataBus = Bus::findOrFail($id_bus);
    	$id_kloter = $dataBus->id_kloter;

    	$bus = DB::table('tbl_kuota_kloter as t1')->addSelect('t2.*', 't2.id_jamaah as id_jamaah')->addSelect('t3.*')->addSelect('t1.*')->leftJoin('tbl_jamaah as t2', 't1.id_jamaah', '=', 't2.id_jamaah')->leftJoin('tbl_paspor as t3', 't2.id_jamaah', '=', 't3.id_jamaah')->leftJoin('tbl_kuota_bus as t4', 't1.id_jamaah', '=', 't4.id_jamaah')->whereNull('t4.id_jamaah')->where('t1.id_kloter', $id_kloter)->get();

    	$total_seat = $dataBus->seat_bus;

    	$seat_terpakai = DB::table('tbl_kuota_bus')->where('id_bus', $id_bus)->count();

    	$seat = $total_seat - $seat_terpakai;
    	if ($seat < 0) {
    		return redirect()->back()->withErrors(['msg'=>'Seat Sudah Penuh']);
    	}

    	return view('admin.data_kloter.bus.isi_kuota', compact('bus', 'id_bus', 'seat'));
    }

    public function store_isi_kuota(Request $request, $id_bus)
    {
    	$jamaah = explode(',', $request->tampungJamaah);

    	$arrayJamaah = array();
    	foreach ($jamaah as $key => $dataJamaah) {
    		$arrayJamaah[] = array('id_bus' => $id_bus,'id_jamaah' => $dataJamaah, 'created_at' => date('Y-m-d H:i:s'));
    	}

    	DB::table('tbl_kuota_bus')->insert($arrayJamaah);
    	return redirect('index/admin/data-kloter/bus/list-jamaah/'.$id_bus)->withSuccess('Berhasil Menambahkan Jamaah');
    }

    public function delete_kuota(Request $request)
    {
    	$jamaah = explode(',', $request->tampungJamaah);
    	$kloter = DB::table('tbl_kuota_bus')->whereIn('id_jamaah', $jamaah);
    	$kloter->delete();

    	return redirect()->back()->withSuccess('Berhasil Menghapus Jamaah');
    }
}
