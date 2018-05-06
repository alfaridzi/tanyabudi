<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Kloter\TambahKloterRequest;
use App\Http\Requests\Admin\Kloter\EditKloterRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

use App\Model\Admin\Kloter;

class KloterController extends Controller
{
    public function index()
    {
    	$kloter = DB::table('tbl_kloter as t1')->leftJoin('tbl_kuota_kloter as t2', 't1.id_kloter', '=', 't2.id_kloter')->select('t1.*', DB::raw("count(t2.id_kloter) as hitung_seat"))->groupBy('t1.id_kloter')->orderBy('t1.id_kloter', 'desc')->paginate(15);

    	return view('admin.data_kloter.kloter.kloter', compact('kloter'));
    }

    public function search(Request $request)
    {
    	$keyword = $request->search;
    	$tanggal_keberangkatan = $request->tanggal_keberangkatan;
    	$tanggal_kepulangan = $request->tanggal_kepulangan;

    	$kloter = DB::table('tbl_kloter as t1')->leftJoin('tbl_kuota_kloter as t2', 't1.id_kloter', '=', 't2.id_kloter')->select('t1.*', DB::raw("count(t2.id_kloter) as hitung_seat"))->where(function($q) use($tanggal_kepulangan, $tanggal_keberangkatan){
    		$q->where('tanggal_keberangkatan', $tanggal_keberangkatan)->orWhere('tanggal_kepulangan', $tanggal_kepulangan);
    	})->orWhere(function($q) use($keyword){
    		$q->where('nama_kloter', 'like', '%'.$keyword.'%')->orWhere('kode_flight', 'like', '%'.$keyword.'%')->orWhere('maskapai_keberangkatan', 'like', '%'.$keyword.'%')->orWhere('via', 'like', '%'.$keyword.'%')->orWhere('maskapai_kepulangan', 'like', '%'.$keyword.'%')->orWhere('seat_leader', 'like', '%'.$keyword.'%')->orWhere('total_seat', $keyword)->orderBy('id_kloter', 'desc');	
    	})->groupBy('t1.id_kloter')->paginate(15);

    	return view('admin.data_kloter.kloter.kloter', compact('kloter'));
    }

    public function create()
    {
    	return view('admin.data_kloter.kloter.tambah_kloter');
    }

    public function store(TambahKloterRequest $request)
    {
    	$kloter = new Kloter;
    	$kloter->nama_kloter = $request->nama_kloter;
    	$kloter->kode_flight = $request->kode_flight;
    	$kloter->tanggal_keberangkatan = $request->tanggal_keberangkatan;
    	$kloter->maskapai_keberangkatan = $request->maskapai_keberangkatan;
    	$kloter->via = $request->via;
    	$kloter->tanggal_kepulangan = $request->tanggal_kepulangan;
    	$kloter->maskapai_kepulangan = $request->maskapai_kepulangan;
    	$kloter->seat_leader = $request->seat_leader;
    	$kloter->total_seat = $request->total_seat;
    	$kloter->jumlah_hari = $request->jumlah_hari;
    	$kloter->save();

    	return redirect('index/admin/data-kloter/kloter')->withSuccess('Berhasil Menambahkan Kloter Baru');
    }

    public function edit($id_kloter)
    {
    	$kloter = Kloter::findOrFail($id_kloter);

    	return view('admin.data_kloter.kloter.edit_kloter', compact('kloter'));
    }

    public function update(EditKloterRequest $request, $id_kloter)
    {
    	$kloter = Kloter::findOrFail($id_kloter);
    	$kloter->nama_kloter = $request->nama_kloter;
    	$kloter->kode_flight = $request->kode_flight;
    	$kloter->tanggal_keberangkatan = $request->tanggal_keberangkatan;
    	$kloter->maskapai_keberangkatan = $request->maskapai_keberangkatan;
    	$kloter->via = $request->via;
    	$kloter->tanggal_kepulangan = $request->tanggal_kepulangan;
    	$kloter->maskapai_kepulangan = $request->maskapai_kepulangan;
    	$kloter->seat_leader = $request->seat_leader;
    	$kloter->total_seat = $request->total_seat;
    	$kloter->jumlah_hari = $request->jumlah_hari;
    	$kloter->save();

    	return redirect('index/admin/data-kloter/kloter')->withSuccess('Berhasil Mengubah Kloter');
    }

    public function delete($id_kloter)
    {
        DB::beginTransaction();
        try {
            $kloter = Kloter::findOrFail($id_kloter);
            $bus = DB::table('tbl_bus')->where('id_kloter', $kloter->id_kloter);
            $kamar = DB::table('tbl_kamar')->where('id_kloter', $kloter->id_kloter);

            $dataBus = $bus->implode('id_bus', ',');
            $dataKamar = $kamar->implode('id_kamar', ',');

            $kuotaKamar = DB::table('tbl_kuota_kamar')->whereIn('id_kamar', [$dataKamar])->delete();
            $kamar->delete();
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()
                ->withErrors($e->getErrors());
        } catch(\Exception $e) {
            DB::rollback();
            throw $e;
        }

        try {
            $kuotaBus = DB::table('tbl_kuota_bus')->whereIn('id_bus', [$dataBus])->delete();
            $bus->delete();
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()
                ->withErrors($e->getErrors());
        } catch(\Execption $e){
            DB::rollback();
            throw $e;
        }

        try {
            $kuotaKloter = DB::table('tbl_kuota_kloter')->where('id_kloter', $id_kloter)->delete();
            $kloter->delete();
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()
                ->withErrors($e->getErrors());
        } catch(\Execption $e){
            DB::rollback();
            throw $e;
        }

        DB::commit();
        return redirect()->back()->withSuccess('Berhasil Menghapus Data');
    }


    /* Bagian List Kuota Kloter */


    public function list_jamaah($id_kloter)
    {
    	$kloter = DB::table('tbl_kuota_kloter')->leftJoin('tbl_jamaah', 'tbl_kuota_kloter.id_jamaah', '=', 'tbl_jamaah.id_jamaah')->leftJoin('tbl_paspor', 'tbl_jamaah.id_jamaah', '=', 'tbl_paspor.id_jamaah')->where('id_kloter', $id_kloter)->get();

    	return view('admin.data_kloter.kloter.list_jamaah', compact('kloter', 'id_kloter'));
    }

    public function isi_kuota($id_kloter)
    {
    	$kloter = DB::table('tbl_jamaah')->addSelect('tbl_jamaah.*', 'tbl_jamaah.id_jamaah as id_jamaah')->addSelect('tbl_paspor.*')->leftJoin('tbl_paspor', 'tbl_jamaah.id_jamaah', '=', 'tbl_paspor.id_jamaah')->leftJoin('tbl_kuota_kloter as t2', 'tbl_jamaah.id_jamaah', '=', 't2.id_jamaah')->whereNull('t2.id_jamaah')->get();

    	$total_seat = Kloter::find($id_kloter)->total_seat;

    	$seat_terpakai = DB::table('tbl_kuota_kloter')->where('id_kloter', $id_kloter)->count();

    	$seat = $total_seat - $seat_terpakai;
    	if ($seat < 0) {
    		return redirect()->back()->withErrors(['msg'=>'Seat Sudah Penuh']);
    	}

    	return view('admin.data_kloter.kloter.isi_kuota', compact('kloter', 'id_kloter', 'seat'));
    }

    public function store_isi_kuota(Request $request, $id_kloter)
    {
    	$jamaah = explode(',', $request->tampungJamaah);

    	$arrayJamaah = array();
    	foreach ($jamaah as $key => $dataJamaah) {
    		$arrayJamaah[] = array('id_kloter' => $id_kloter,'id_jamaah' => $dataJamaah, 'created_at' => date('Y-m-d H:i:s'));
    	}

    	DB::table('tbl_kuota_kloter')->insert($arrayJamaah);
    	return redirect('index/admin/data-kloter/kloter/list-jamaah/'.$id_kloter)->withSuccess('Berhasil Menambahkan Jamaah');
    }

    public function delete_kuota(Request $request)
    {
    	$jamaah = explode(',', $request->tampungJamaah);
    	$kloter = DB::table('tbl_kuota_kloter')->whereIn('id_jamaah', $jamaah);
    	$kloter->delete();

    	$bus = DB::table('tbl_kuota_kloter')->whereIn('id_jamaah', $jamaah);
    	$bus->delete();

    	return redirect()->back()->withSuccess('Berhasil Menghapus Jamaah');
    }
}
