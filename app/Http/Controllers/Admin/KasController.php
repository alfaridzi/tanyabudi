<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Kas\TambahKasRequest;
use App\Http\Requests\Admin\Kas\EditKasRequest;
use Auth;
use File;

use App\Model\Admin\Kas;
use App\Model\Admin\Log;

class KasController extends Controller
{
    public function index()
    {
    	$jabatan = DB::table('tbl_jabatan')->groupBy('kode_cabang')->get();
    	$kas = DB::table('tbl_kas')->orderBy('id_kas', 'desc')->paginate(15);
   		return view('admin.kas.kas', compact('kas', 'jabatan'));
    }

    public function search(Request $request)
    {
    	$jabatan = DB::table('tbl_jabatan')->groupBy('kode_cabang')->get();
    	$kas = DB::table('tbl_kas')->where(function($q) use($request){
    		$q->where('kode_kantor', $request->kode_kantor)->orWhere('tipe', $request->tipe);
    	})->orWhere(function($q) use($request){
    		$q->where('keterangan', 'like', '%'.$request->search.'%')->orWhere('admin_penginput', 'like', '%'.$request->search.'%')->orWhere('admin_update', '%'.$request->search.'$');
    	})->orWhere(function($q) use($request){
    		$q->whereBetween('tanggal_transaksi', [$request->tanggal_awal, $request->tanggal_akhir]);
    	})->orderBy('id_kas', 'desc')->paginate(15);

    	return view('admin.kas.kas', compact('kas', 'jabatan'));
    }

    public function create()
    {
    	$jabatan = DB::table('tbl_jabatan')->groupBy('kode_cabang')->get();
    	return view('admin.kas.tambah_kas', compact('jabatan'));
    }

    public function store(TambahKasRequest $request)
    {
    	$user = Auth::guard('admin')->user();

    	DB::beginTransaction();
    		try {
		    	$kas = new Kas;
		    	$kas->nomor_bukti = $request->nomor_bukti;
		    	$kas->kode_kantor = $request->kode_kantor;
		    	$kas->tanggal_transaksi = $request->tanggal_transaksi;
		    	$kas->tipe = $request->tipe;
		    	$kas->keterangan = $request->keterangan;
		    	if (!is_null($request->file('bukti'))) { // jika gambar tidak kosong
					$bukti = $request->file('bukti');
		    		$extension = $bukti->getClientOriginalExtension();
		    		$namaFile = $request->tanggal_transaksi.'-'.str_random(5).'.'.$extension;
		    		$bukti->move('admin/images/kas/',$namaFile);
		    		$kas->bukti = $namaFile;
				}else{
					$kas->bukti = null;
				}
		    	$kas->bukti;
		    	$kas->admin_penginput = $user->username;
		    	$kas->admin_update = null;
		    	$kas->save();
	    	} catch (ValidationException $e) {
	            DB::rollback();
	            return redirect()->back()
	                ->withErrors($e->getErrors());
	        } catch(\Execption $e){
	            DB::rollback();
	            throw $e;
	        }

	    	try {
		    	$log = new Log;
		        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
		        $log->isi_log = 'Menambahkan pengeluaran/pemasukkan dengan nomor bukti '.$kas->nomor_bukti;
		        $log->save();
	        } catch (ValidationException $e) {
	            DB::rollback();
	            return redirect()->back()
	                ->withErrors($e->getErrors());
	        } catch(\Execption $e){
	            DB::rollback();
	            throw $e;
	        }

    	DB::commit();

    	return redirect('index/admin/kas')->withSuccess('Berhasil Mengambahkan Pengeluaran/Pemasukkan');
    }

    public function edit($id_kas)
    {
    	$kas = Kas::findOrFail($id_kas);
    	$jabatan = DB::table('tbl_jabatan')->groupBy('kode_cabang')->get();
    	return view('admin.kas.edit_kas', compact('jabatan', 'kas'));
    }

    public function update(EditKasRequest $request, $id_kas)
    {
    	$kas = Kas::findOrFail($id_kas);

    	$user = Auth::guard('admin')->user();

    	DB::beginTransaction();
    		try {
		    	$kas->nomor_bukti = $request->nomor_bukti;
		    	$kas->kode_kantor = $request->kode_kantor;
		    	$kas->tanggal_transaksi = $request->tanggal_transaksi;
		    	$kas->tipe = $request->tipe;
		    	$kas->keterangan = $request->keterangan;
		    	if (!is_null($request->file('bukti'))) { // jika gambar tidak kosong
		    		if (File::exists('admin/images/kas/'.$kas->bukti)) {
		                File::delete('admin/images/kas/'.$kas->bukti);
		            }
					$bukti = $request->file('bukti');
		    		$extension = $bukti->getClientOriginalExtension();
		    		$namaFile = $request->tanggal_transaksi.'-'.str_random(5).'.'.$extension;
		    		$bukti->move('admin/images/kas/',$namaFile);
		    		$kas->bukti = $namaFile;
				}
		    	$kas->bukti;
		    	$kas->admin_update = $user->username;
		    	$kas->save();
	    	} catch (ValidationException $e) {
	            DB::rollback();
	            return redirect()->back()
	                ->withErrors($e->getErrors());
	        } catch(\Execption $e){
	            DB::rollback();
	            throw $e;
	        }

	    	try {
		    	$log = new Log;
		        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
		        $log->isi_log = 'Mengubah data pengeluaran/pemasukkan dengan nomor bukti '.$kas->nomor_bukti;
		        $log->save();
	        } catch (ValidationException $e) {
	            DB::rollback();
	            return redirect()->back()
	                ->withErrors($e->getErrors());
	        } catch(\Execption $e){
	            DB::rollback();
	            throw $e;
	        }

    	DB::commit();
    	return redirect('index/admin/kas')->withSuccess('Berhasil Mengambahkan Pengeluaran/Pemasukkan');
    }

    public function delete($id_kas)
    {
    	$kas = Kas::findOrFail($id_kas);

    	DB::beginTransaction();

    	try {
    		if (File::exists('admin/images/kas/'.$kas->bukti)) {
                File::delete('admin/images/kas/'.$kas->bukti);
            }
            $kas->delete();
    	} catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()
                ->withErrors($e->getErrors());
        } catch(\Execption $e){
            DB::rollback();
            throw $e;
        }

    	try {
    		$log = new Log;
	        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
	        $log->isi_log = 'Menghapus pengeluaran/pemasukkan dengan nomor bukti '.$kas->nomor_bukti;
	        $log->save();
    	} catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()
                ->withErrors($e->getErrors());
        } catch(\Execption $e){
            DB::rollback();
            throw $e;
        }

    	DB::commit();
    	return redirect()->back()->withSuccess('Berhasil Menghapus Kas');
    }
}
