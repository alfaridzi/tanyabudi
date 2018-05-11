<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;

use App\tabungan;
use App\payment;
use App\Model\Admin\Log;
use App\Model\Admin\Kwitansi;
use App\Model\Saldo;
use App\User;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:menu transaksi']);
    }

    public function haji()
    {
    	$haji = DB::table('tbl_produk')->addSelect('tbl_payment.*', 'tbl_payment.id as id_payment')
                    ->addSelect('tbl_produk.*', 'tbl_produk.id as id_produk')
                    ->addSelect('users.*', 'users.id as id_users')
                    ->addSelect('tbl_payment.status', 'tbl_payment.status as status_pembayaran')
                    ->rightJoin('tbl_payment', 'tbl_produk.id', '=', 'tbl_payment.id_prod')
                    ->leftJoin('users', 'tbl_payment.id_user', '=', 'users.id')
                    ->where('tbl_produk.type', '1')->orderBy('tbl_payment.id', 'desc')->paginate(15);

    	return view('admin.transaksi.haji', compact('haji'));
    }

    public function umroh()
    {
        $umroh = DB::table('tbl_produk')->rightJoin('tbl_payment', 'tbl_produk.id', '=', 'tbl_payment.id_prod')
                    ->leftJoin('users', 'tbl_payment.id_user', '=', 'users.id')
                    ->addSelect('tbl_payment.*', 'tbl_payment.id as id_payment')
                    ->addSelect('tbl_produk.*', 'tbl_produk.id as id_produk')
                    ->addSelect('users.*', 'users.id as id_users')
                    ->addSelect('tbl_payment.status', 'tbl_payment.status as status_pembayaran')
                    ->where('tbl_produk.type', '2')->orderBy('tbl_payment.id', 'desc')->paginate(15);

        return view('admin.transaksi.umroh', compact('umroh'));
    }

    public function wisata()
    {
        $wisata = DB::table('tbl_produk')->rightJoin('tbl_payment', 'tbl_produk.id', '=', 'tbl_payment.id_prod')
                    ->leftJoin('users', 'tbl_payment.id_user', '=', 'users.id')
                    ->addSelect('tbl_payment.*', 'tbl_payment.id as id_payment')
                    ->addSelect('tbl_produk.*', 'tbl_produk.id as id_produk')
                    ->addSelect('users.*', 'users.id as id_users')
                    ->addSelect('tbl_payment.status', 'tbl_payment.status as status_pembayaran')
                    ->where('tbl_produk.type', '3')->orderBy('tbl_payment.id', 'desc')->paginate(15);

        return view('admin.transaksi.wisata', compact('wisata'));
    }

    public function sedekah()
    {
        $sedekah = DB::table('tbl_produk')->rightJoin('tbl_payment', 'tbl_produk.id', '=', 'tbl_payment.id_prod')
                        ->leftJoin('users', 'tbl_payment.id_user', '=', 'users.id')
                        ->addSelect('tbl_payment.*', 'tbl_payment.id as id_payment')
                        ->addSelect('tbl_produk.*', 'tbl_produk.id as id_produk')
                        ->addSelect('users.*', 'users.id as id_users')
                        ->addSelect('tbl_payment.status', 'tbl_payment.status as status_pembayaran')
                        ->where('tbl_produk.type', '4')->orderBy('tbl_payment.id', 'desc')->paginate(15);

        return view('admin.transaksi.sedekah', compact('sedekah'));
    }

    public function bayar_paket()
    {
        $paket = DB::table('tbl_produk')->rightJoin('tbl_payment', 'tbl_produk.id', '=', 'tbl_payment.id_prod')
                        ->LeftJoin('users', 'tbl_payment.id_user', '=', 'users.id')
                        ->addSelect('tbl_payment.*', 'tbl_payment.id as id_payment')
                        ->addSelect('tbl_produk.*', 'tbl_produk.id as id_produk')
                        ->addSelect('users.*', 'users.id as id_users')
                        ->addSelect('tbl_payment.status', 'tbl_payment.status as status_pembayaran')
                        ->where('tbl_payment.id_prod', '3910')->orderBy('tbl_payment.id', 'desc')->paginate(15);

        return view('admin.transaksi.bayar_paket', compact('paket'));
    }

    public function user()
    {
        $user = DB::table('tbl_produk')->rightJoin('tbl_payment', 'tbl_produk.id', '=', 'tbl_payment.id_prod')
                        ->leftJoin('users', 'tbl_payment.id_user', '=', 'users.id')
                        ->addSelect('tbl_payment.*', 'tbl_payment.id as id_payment')
                        ->addSelect('tbl_produk.*', 'tbl_produk.id as id_produk')
                        ->addSelect('users.*', 'users.id as id_users')
                        ->addSelect('tbl_payment.status', 'tbl_payment.status as status_pembayaran')
                        ->where('tbl_produk.type', '5')->orderBy('tbl_payment.id', 'desc')->paginate(15);

        return view('admin.transaksi.user', compact('user'));
    }

    public function top_up()
    {
        $top_up = DB::table('tbl_produk')->rightJoin('tbl_payment', 'tbl_produk.id', '=', 'tbl_payment.id_prod')
                        ->LeftJoin('users', 'tbl_payment.id_user', '=', 'users.id')
                        ->addSelect('tbl_payment.*', 'tbl_payment.id as id_payment')
                        ->addSelect('users.*', 'users.id as id_users')
                        ->addSelect('tbl_payment.status', 'tbl_payment.status as status_pembayaran')
                        ->where('tbl_payment.id_prod', '3911')->orderBy('tbl_payment.id', 'desc')->paginate(15);
        return view('admin.transaksi.top_up', compact('top_up'));
    }

    public function ppob()
    {
        $ppob = DB::table('tbl_pulsa')->leftJoin('users', 'tbl_pulsa.id_user', '=', 'users.id')->paginate(15);

        return view('admin.transaksi.ppob', compact('ppob'));
    }

    public function konfirm($id)
    {
        $payment = payment::findOrFail($id);
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
                $payment->update(['status' => '1']);
            } catch (ValidationException $e) {
                DB::rollback();
                return redirect()->back()
                    ->withErrors($e->getErrors());
            } catch(\Execption $e){
                DB::rollback();
                throw $e;
            }

            try{
                $kwitansi = new Kwitansi;
                $kwitansi->id_transaksi = $payment->id;
                $kwitansi->nomor_kwitansi = $format_kwitansi;
                $kwitansi->pelanggan = $payment->users->name;
                $kwitansi->metode_bayar = '1';
                $kwitansi->jumlah = $payment->jumlah_pembayaran;
                $kwitansi->admin_penginput = $user->username;
                $kwitansi->status = '1';
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
                $log->isi_log = 'Mengkonfirmasi transaksi dengan nomor transaksi '.$payment->id;
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

        return redirect()->back()->withSuccess('Berhasil Mengkonfirmasi Pembayaran');
    }

    public function konfirm_paket($id)
    {
        $payment = payment::findOrFail($id);
        if (is_null($payment)) {
            abort(404);
        }
        $user = Auth::guard('admin')->user();
        $kwitansi = Kwitansi::orderBy('id_kwitansi', 'desc')->limit(1)->first();

        if (is_null($kwitansi)) {
            $tanggal = false;
        }else{
            $tanggal = Carbon::parse($kwitansi->created_at)->format('Y-m-d') == date('Y-m-d') ? true : false;
        }

        $tanggal_gabung = date('y').date('m');
        if (is_null($kwitansi) || !$tanggal) {
            $nomor = '0001';
            $format_kwitansi = 'KW'.$user->id_admin.'.'.$tanggal_gabung.$user->get_karyawan->get_jabatan->kode_cabang.$nomor;
        }elseif($tanggal){
            $nomor_kwitansi = ++$kwitansi->nomor_kwitansi;
            $format_kwitansi = $nomor_kwitansi;
        }

        $tabungan = DB::table('tbl_tabungan')->where('id_user', $payment->id_user)->first();
        $tambah_tabungan = $payment->jumlah_pembayaran + $tabungan->tabungan;

        DB::beginTransaction();
            try {
                $payment->update(['status' => '1']);
            } catch (ValidationException $e) {
                DB::rollback();
                return redirect()->back()
                    ->withErrors($e->getErrors());
            } catch(\Execption $e){
                DB::rollback();
                throw $e;
            }

            try {
                tabungan::find($tabungan->id)->update(['tabungan' => $tambah_tabungan]);
            } catch (ValidationException $e) {
                DB::rollback();
                return redirect()->back()
                    ->withErrors($e->getErrors());
            } catch(\Execption $e){
                DB::rollback();
                throw $e;
            }

            try{
                $kwitansi = new Kwitansi;
                $kwitansi->id_transaksi = $payment->id;
                $kwitansi->nomor_kwitansi = $format_kwitansi;
                $kwitansi->pelanggan = $payment->users->name;
                $kwitansi->metode_bayar = '1';
                $kwitansi->jumlah = $payment->jumlah_pembayaran;
                $kwitansi->admin_penginput = $user->username;
                $kwitansi->status = '1';
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
                $log->isi_log = 'Mengkonfirmasi transaksi dengan nomor transaksi '.$payment->id;
                $log->save();
            } catch (ValidationException $e) {
                DB::rollback();
                return redirect()->back()
                    ->withErrors($e->getErrors());
            } catch(\Execption $e){
                DB::rollback();
                throw $e;
            }

        return redirect()->back()->withSuccess('Berhasil Mengkonfirmasi Pembayaran');
    }

    public function konfirm_user($id)
    {
        $payment = payment::findOrFail($id);
        if (is_null($payment)) {
            abort(404);
        }
        $user = Auth::guard('admin')->user();
        $kwitansi = Kwitansi::orderBy('id_kwitansi', 'desc')->limit(1)->first();

        if (is_null($kwitansi)) {
            $tanggal = false;
        }else{
            $tanggal = Carbon::parse($kwitansi->created_at)->format('Y-m-d') == date('Y-m-d') ? true : false;
        }

        $tanggal_gabung = date('y').date('m');
        if (is_null($kwitansi) || !$tanggal) {
            $nomor = '0001';
            $format_kwitansi = 'KW'.$user->id_admin.'.'.$tanggal_gabung.$user->get_karyawan->get_jabatan->kode_cabang.$nomor;
        }elseif($tanggal){
            $nomor_kwitansi = ++$kwitansi->nomor_kwitansi;
            $format_kwitansi = $nomor_kwitansi;
        }

        $agen_user = User::findOrFail($payment->id_user);

        DB::beginTransaction();
            try {
                $payment->update(['status' => '1']);
            } catch (ValidationException $e) {
                DB::rollback();
                return redirect()->back()
                    ->withErrors($e->getErrors());
            } catch(\Execption $e){
                DB::rollback();
                throw $e;
            }

            try {
                $agen_user->update(['status' => '1']);
            } catch (ValidationException $e) {
                DB::rollback();
                return redirect()->back()
                    ->withErrors($e->getErrors());
            } catch(\Execption $e){
                DB::rollback();
                throw $e;
            }

            try{
                $kwitansi = new Kwitansi;
                $kwitansi->id_transaksi = $payment->id;
                $kwitansi->nomor_kwitansi = $format_kwitansi;
                $kwitansi->pelanggan = $payment->users->name;
                $kwitansi->metode_bayar = '1';
                $kwitansi->jumlah = $payment->jumlah_pembayaran;
                $kwitansi->admin_penginput = $user->username;
                $kwitansi->status = '1';
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
                $log->isi_log = 'Mengkonfirmasi transaksi dengan nomor transaksi '.$payment->id;
                $log->save();
            } catch (ValidationException $e) {
                DB::rollback();
                return redirect()->back()
                    ->withErrors($e->getErrors());
            } catch(\Execption $e){
                DB::rollback();
                throw $e;
            }

        return redirect()->back()->withSuccess('Berhasil Mengkonfirmasi Pembayaran');
    }

    public function konfirm_topup($id)
    {
        $payment = payment::findOrFail($id);
        if (is_null($payment)) {
            abort(404);
        }
        $user = Auth::guard('admin')->user();
        $kwitansi = Kwitansi::orderBy('id_kwitansi', 'desc')->limit(1)->first();

        if (is_null($kwitansi)) {
            $tanggal = false;
        }else{
            $tanggal = Carbon::parse($kwitansi->created_at)->format('Y-m-d') == date('Y-m-d') ? true : false;
        }

        $tanggal_gabung = date('y').date('m');
        if (is_null($kwitansi) || !$tanggal) {
            $nomor = '0001';
            $format_kwitansi = 'KW'.$user->id_admin.'.'.$tanggal_gabung.$user->get_karyawan->get_jabatan->kode_cabang.$nomor;
        }elseif($tanggal){
            $nomor_kwitansi = ++$kwitansi->nomor_kwitansi;
            $format_kwitansi = $nomor_kwitansi;
        }

        $saldo = DB::table('tbl_saldo')->where('id_user', $payment->id_user)->first();
        $tambah_saldo = $payment->jumlah_pembayaran + $saldo->saldo;

        DB::beginTransaction();
            try {
                $payment->update(['status' => '1']);
            } catch (ValidationException $e) {
                DB::rollback();
                return redirect()->back()
                    ->withErrors($e->getErrors());
            } catch(\Execption $e){
                DB::rollback();
                throw $e;
            }

            try {
                Saldo::find($saldo->id_saldo)->update(['saldo' => $tambah_saldo]);
            } catch (ValidationException $e) {
                DB::rollback();
                return redirect()->back()
                    ->withErrors($e->getErrors());
            } catch(\Execption $e){
                DB::rollback();
                throw $e;
            }

            try{
                $kwitansi = new Kwitansi;
                $kwitansi->id_transaksi = $payment->id;
                $kwitansi->nomor_kwitansi = $format_kwitansi;
                $kwitansi->pelanggan = $payment->users->name;
                $kwitansi->metode_bayar = '1';
                $kwitansi->jumlah = $payment->jumlah_pembayaran;
                $kwitansi->admin_penginput = $user->username;
                $kwitansi->status = '1';
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
                $log->isi_log = 'Mengkonfirmasi transaksi dengan nomor transaksi '.$payment->id;
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

        return redirect()->back()->withSuccess('Berhasil Mengkonfirmasi Pembayaran');
    }
}
