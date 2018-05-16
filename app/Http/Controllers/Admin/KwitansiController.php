<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Kwitansi\BuatTransaksiRequest;
use Auth;

use App\Model\Admin\Kwitansi;
use App\payment;
use App\tabungan;
use Carbon\Carbon;
use App\User;
use App\Model\Admin\Log;

class KwitansiController extends Controller
{
	public function __construct()
	{
		$this->middleware('permission:menu kwitansi');
	}

	public function index()
	{
		$kwitansi = DB::table('tbl_kwitansi')->orderBy('id_kwitansi', 'desc')->paginate(15);
		return view('admin.kwitansi.kwitansi', compact('kwitansi'));
	}

	public function ubah_status($id_kwitansi)
	{
		$kwitansi = Kwitansi::findOrFail($id_kwitansi);
		$kwitansi->status = '0';
		$kwitansi->update();

		$log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Mengubah status kwitansi dengan nomor kwitansi '.$kwitansi->nomor_kwitansi;
        $log->save();

		return redirect()->back()->withSuccess('Berhasil Mengubah Status Kwitansi');
	}

	public function buat_transaksi()
	{
		$produk = DB::table('tbl_produk')->orderBy('id', 'desc')->get();
		return view('admin.kwitansi.buat_transaksi', compact('produk'));
	}

	public function store_transaksi(BuatTransaksiRequest $request)
	{
		$cek = Payment::orderBy('counter','asc')->get()->last();
		$tipe_produk = $request->tipe_produk;

		if ($tipe_produk == 5) {
			$request->produk = '3910';
		}

		if(is_null($cek)) {
			$last = 1;
		} else {
			$last = $cek->counter + 1;
		}

		$id_transaksi = 'TRX'.$last.$request->produk.'.'.date('Ymd').'.'.$request->user;

		$user = Auth::guard('admin')->user();
        $kwitansi = Kwitansi::orderBy('id_kwitansi', 'desc')->limit(1)->first();
        $tanggal = Carbon::parse($kwitansi->created_at)->format('Y-m-d') == date('Y-m-d') ? true : false;
        $tanggal_gabung = date('y').date('m');
        if (is_null($kwitansi) || !$tanggal) {
            $nomor = '0001';
            $format_kwitansi = 'KW'.$user->id_admin.'.'.$tanggal_gabung.$user->get_karyawan->get_jabatan->kode_cabang.$nomor;
        }elseif($tanggal){
            $nomor_kwitansi = ++$kwitansi->nomor_kwitansi;
            $format_kwitansi = $nomor_kwitansi;
        }

		DB::beginTransaction();

			try {
				$payment = new payment;
				$payment->id_user = $request->user;
				$payment->id_prod = $request->produk;
				$payment->status = '1';
				$payment->jumlah_pembayaran = $request->jumlah_bayar;
				$payment->tgl_pembayaran = Carbon::now()->format('Y-m-d');
				$payment->foto = '';
				$payment->counter = $last;
				$payment->id = $id_transaksi;
				$payment->save();
			} catch (ValidationException $e) {
	            DB::rollback();
	            return redirect()->back()
	                ->withErrors($e->getErrors());
	        } catch(\Execption $e){
	            DB::rollback();
	            throw $e;
	        }

	        if ($tipe_produk == 1 || $tipe_produk == 2 || $tipe_produk == 5) {
		        try {
		        	if ($tipe_produk == 1 || $tipe_produk == 2) {
		        		tabungan::where('id_user', $id_user)->update(['tabungan' => $request->jumlah_bayar]);
		        	}elseif($tipe_produk == 5){
		        		$paket = DB::table('tbl_payment')
				                    ->addSelect('tbl_payment.*', 'tbl_payment.id as id_payment')
				                    ->addSelect('tbl_produk.*', 'tbl_produk.id as id_produk')
				                    ->leftJoin('tbl_produk', 'tbl_payment.id_prod', '=', 'tbl_produk.id')
				                    ->where('tbl_payment.id_user', $request->user)
				                    ->whereIn('type', ['1', '2'])
				                    ->where('status', '1')
				                    ->orderBy('tbl_payment.created_at', 'desc')
				                    ->get()->last();

		        		$tabungan = DB::table('tbl_tabungan')->where('id_user', $request->user)->first();

	        			$tambah_tabungan = $payment->jumlah_pembayaran + $tabungan->tabungan;
		        		tabungan::find($tabungan->id)->update(['tabungan' => $tambah_tabungan]);


		        		if ($tambah_tabungan >= $paket->harga) {
	                        payment::find($paket->id_payment)->update(['status' => '4']);
	                    }

		        	}
		        } catch (ValidationException $e) {
		            DB::rollback();
		            return redirect()->back()
		                ->withErrors($e->getErrors());
		        } catch(\Execption $e){
		            DB::rollback();
		            throw $e;
		        }
		    }

			try {
				$kwitansi = new Kwitansi;
				$kwitansi->id_transaksi = $id_transaksi;
				$kwitansi->nomor_kwitansi = $format_kwitansi;
				$kwitansi->pelanggan = $request->nama_pelanggan;
				$kwitansi->metode_bayar = '0';
				$kwitansi->jumlah = $request->jumlah_bayar;
				$kwitansi->admin_penginput = $user->username;
				$kwitansi->status = $request->status;
				$kwitansi->save();
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
                $log->isi_log = 'Membuat transaksi offline dengan nomor transaksi '.$payment->id;
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

		return redirect('index/admin/kwitansi')->withSuccess('Berhasil Membuat Transaksi Offline');
	}
}
