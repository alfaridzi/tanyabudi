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
                    ->where('tbl_produk.type', '1')->orderBy('tbl_payment.created_at', 'desc')->paginate(15);

    	return view('admin.transaksi.haji', compact('haji'));
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;
        $status = $request->status;
        $tipe = $request->tipe;

        if ($tipe == 3911 || $tipe == 3910) {
            $search = DB::table('tbl_produk')->addSelect('tbl_payment.*', 'tbl_payment.id as id_payment')
                    ->addSelect('tbl_produk.*', 'tbl_produk.id as id_produk')
                    ->addSelect('users.*', 'users.id as id_users')
                    ->addSelect('tbl_payment.status', 'tbl_payment.status as status_pembayaran')
                    ->rightJoin('tbl_payment', 'tbl_produk.id', '=', 'tbl_payment.id_prod')
                    ->leftJoin('users', 'tbl_payment.id_user', '=', 'users.id')
                    ->where('tbl_payment.id_prod', $tipe)
                    ->where(function($q) use($keyword){
                        if (!is_null($keyword)) {
                            $q->where('tbl_payment.id', 'like', '%'.$keyword.'%')
                              ->orWhere('tbl_produk.nama', 'like', '%'.$keyword.'%')
                              ->orWhere('tbl_produk.desc_prod', 'like', '%'.$keyword.'%')
                              ->orWhere('users.name', 'like', '%'.$keyword.'%');
                        }
                    })->where(function($q) use($tanggal_awal, $tanggal_akhir){
                        if (!is_null($tanggal_awal) && !is_null($tanggal_akhir)) {
                            $q->whereBetween('tbl_payment.tgl_pembayaran', [$tanggal_awal, $tanggal_akhir]);
                        }
                    })->where(function($q) use($status){
                        if (!is_null($status)) {
                            $q->where('tbl_payment.status', $status);
                        }
                    })->orderBy('tbl_payment.created_at', 'desc')->paginate(15);
        }else{
            $search = DB::table('tbl_produk')->addSelect('tbl_payment.*', 'tbl_payment.id as id_payment')
                    ->addSelect('tbl_produk.*', 'tbl_produk.id as id_produk')
                    ->addSelect('users.*', 'users.id as id_users')
                    ->addSelect('tbl_payment.status', 'tbl_payment.status as status_pembayaran')
                    ->rightJoin('tbl_payment', 'tbl_produk.id', '=', 'tbl_payment.id_prod')
                    ->leftJoin('users', 'tbl_payment.id_user', '=', 'users.id')
                    ->where('tbl_produk.type', $tipe)
                    ->where(function($q) use($keyword){
                        if (!is_null($keyword)) {
                            $q->where('tbl_payment.id', 'like', '%'.$keyword.'%')
                              ->orWhere('tbl_produk.nama', 'like', '%'.$keyword.'%')
                              ->orWhere('tbl_produk.desc_prod', 'like', '%'.$keyword.'%')
                              ->orWhere('users.name', 'like', '%'.$keyword.'%');
                        }
                    })->where(function($q) use($tanggal_awal, $tanggal_akhir){
                        if (!is_null($tanggal_awal) && !is_null($tanggal_akhir)) {
                            $q->whereBetween('tbl_payment.tgl_pembayaran', [$tanggal_awal, $tanggal_akhir]);
                        }
                    })->where(function($q) use($status){
                        if (!is_null($status)) {
                            $q->where('tbl_payment.status', $status);
                        }
                    })->where('tbl_produk.type', $tipe)->orderBy('tbl_payment.created_at', 'desc')->paginate(15);
        }

        if ($tipe == 1) {
            $haji = $search;
            return view('admin.transaksi.haji', compact('haji'));
        }elseif($tipe == 2){
            $umroh = $search;
            return view('admin.transaksi.umroh', compact('umroh'));
        }elseif($tipe == 3){
            $wisata = $search;
            return view('admin.transaksi.wisata', compact('wisata'));
        }elseif($tipe == 4){
            $sedekah = $search;
            return view('admin.transaksi.sedekah', compact('sedekah'));
        }elseif($tipe == 5){
            $user = $search;
            return view('admin.transaksi.user', compact('user'));
        }elseif($tipe == 3910){
            $paket = $search;
            return view('admin.transaksi.paket', compact('paket'));
        }elseif($tipe == 3911){
            $top_up = $search;
            return view('admin.transaksi.top_up', compact('top_up'));
        }
    }

    public function umroh()
    {
        $umroh = DB::table('tbl_produk')->addSelect('tbl_payment.*', 'tbl_payment.id as id_payment')
                    ->addSelect('tbl_produk.*', 'tbl_produk.id as id_produk')
                    ->addSelect('users.*', 'users.id as id_users')
                    ->addSelect('tbl_payment.status', 'tbl_payment.status as status_pembayaran')
                    ->rightJoin('tbl_payment', 'tbl_produk.id', '=', 'tbl_payment.id_prod')
                    ->leftJoin('users', 'tbl_payment.id_user', '=', 'users.id')
                    ->where('tbl_produk.type', '2')->orderBy('tbl_payment.created_at', 'desc')->paginate(15);

        return view('admin.transaksi.umroh', compact('umroh'));
    }

    public function wisata()
    {
        $wisata = DB::table('tbl_produk')->addSelect('tbl_payment.*', 'tbl_payment.id as id_payment')
                    ->addSelect('tbl_produk.*', 'tbl_produk.id as id_produk')
                    ->addSelect('users.*', 'users.id as id_users')
                    ->addSelect('tbl_payment.status', 'tbl_payment.status as status_pembayaran')
                    ->rightJoin('tbl_payment', 'tbl_produk.id', '=', 'tbl_payment.id_prod')
                    ->leftJoin('users', 'tbl_payment.id_user', '=', 'users.id')
                    ->where('tbl_produk.type', '3')->orderBy('tbl_payment.created_at', 'desc')->paginate(15);

        return view('admin.transaksi.wisata', compact('wisata'));
    }

    public function sedekah()
    {
        $sedekah = DB::table('tbl_produk')->addSelect('tbl_payment.*', 'tbl_payment.id as id_payment')
                        ->addSelect('tbl_produk.*', 'tbl_produk.id as id_produk')
                        ->addSelect('users.*', 'users.id as id_users')
                        ->addSelect('tbl_payment.status', 'tbl_payment.status as status_pembayaran')
                        ->rightJoin('tbl_payment', 'tbl_produk.id', '=', 'tbl_payment.id_prod')
                        ->leftJoin('users', 'tbl_payment.id_user', '=', 'users.id')
                        ->where('tbl_produk.type', '4')->orderBy('tbl_payment.created_at', 'desc')->paginate(15);

        return view('admin.transaksi.sedekah', compact('sedekah'));
    }

    public function user()
    {
        $user = DB::table('tbl_produk')->addSelect('tbl_payment.*', 'tbl_payment.id as id_payment')
                        ->addSelect('tbl_produk.*', 'tbl_produk.id as id_produk')
                        ->addSelect('users.*', 'users.id as id_users')
                        ->addSelect('tbl_payment.status', 'tbl_payment.status as status_pembayaran')
                        ->rightJoin('tbl_payment', 'tbl_produk.id', '=', 'tbl_payment.id_prod')
                        ->leftJoin('users', 'tbl_payment.id_user', '=', 'users.id')
                        ->where('tbl_produk.type', '5')->orderBy('tbl_payment.created_at', 'desc')->paginate(15);

        return view('admin.transaksi.user', compact('user'));
    }

    public function bayar_paket()
    {
        $paket = DB::table('tbl_produk')->addSelect('tbl_payment.*', 'tbl_payment.id as id_payment')
                        ->addSelect('tbl_produk.*', 'tbl_produk.id as id_produk')
                        ->addSelect('users.*', 'users.id as id_users')
                        ->addSelect('tbl_payment.status', 'tbl_payment.status as status_pembayaran')
                        ->rightJoin('tbl_payment', 'tbl_produk.id', '=', 'tbl_payment.id_prod')
                        ->leftJoin('users', 'tbl_payment.id_user', '=', 'users.id')
                        ->where('tbl_payment.id_prod', '3910')->orderBy('tbl_payment.created_at', 'desc')->paginate(15);

        return view('admin.transaksi.bayar_paket', compact('paket'));
    }

    public function top_up()
    {
        $top_up = DB::table('tbl_produk')
                        ->addSelect('tbl_payment.*', 'tbl_payment.id as id_payment')
                        ->addSelect('users.*', 'users.id as id_users')
                        ->addSelect('tbl_payment.status', 'tbl_payment.status as status_pembayaran')
                        ->rightJoin('tbl_payment', 'tbl_produk.id', '=', 'tbl_payment.id_prod')
                        ->leftJoin('users', 'tbl_payment.id_user', '=', 'users.id')
                        ->where('tbl_payment.id_prod', '3911')->orderBy('tbl_payment.created_at', 'desc')
                        ->paginate(15);
        return view('admin.transaksi.top_up', compact('top_up'));
    }

    public function ppob()
    {
        $ppob = DB::table('tbl_pulsa')->leftJoin('users', 'tbl_pulsa.id_user', '=', 'users.id')->paginate(15);

        return view('admin.transaksi.ppob', compact('ppob'));
    }

    public function search_ppob(Request $request)
    {
        $keyword = $request->search;
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;
        $status = $request->status;

        $ppob = DB::table('tbl_pulsa')
                    ->leftJoin('users', 'tbl_pulsa.id_user', '=', 'users.id')
                    ->where(function($q) use($keyword){
                        if (!is_null($keyword)) {
                            $q->where('id_pulsa', 'like', '%'.$keyword.'%')->orWhere('name', 'like', '%'.$keyword.'%');
                        }
                    })->where(function($q) use ($tanggal_awal, $tanggal_akhir){
                        if (!is_null($tanggal_awal) && !is_null($tanggal_akhir)) {
                            $q->whereBetween('tgl_pembayaran', [$tanggal_awal, $tanggal_akhir]);
                        }
                    })->paginate(15);

        return view('admin.transaksi.ppob', compact('ppob', 'status'));
    }

    public function konfirm(Request $request, $id)
    {
        $payment = payment::findOrFail($id);
        $user = Auth::guard('admin')->user();
        $kwitansi = Kwitansi::orderBy('id_kwitansi', 'desc')->limit(1)->first();
        $status = $request->status;
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

        $paket = DB::table('tbl_payment')
                    ->leftJoin('tbl_produk', 'tbl_payment.id_prod', '=', 'tbl_produk.id')
                    ->where('tbl_payment.id', $id)->first();

        DB::beginTransaction();
            try {
                if ($paket->type == '1' || $paket->type == '2') {
                    if ($payment->jumlah_pembayaran > $paket->harga) {
                        $payment->update(['status' => '4']);
                    }else{
                        $payment->update(['status' => $status]);
                    }
                    tabunga::where('id_user', $payment->user)->update(['tabungan' => $payment->jumlah_pembayaran]);
                }else{
                    $payment->update(['status' => $status]);
                }
            } catch (ValidationException $e) {
                DB::rollback();
                return redirect()->back()
                    ->withErrors($e->getErrors());
            } catch(\Execption $e){
                DB::rollback();
                throw $e;
            }

            try{
                if ($status == '1') {
                    $kwitansi = new Kwitansi;
                    $kwitansi->id_transaksi = $payment->id;
                    $kwitansi->nomor_kwitansi = $format_kwitansi;
                    $kwitansi->pelanggan = $payment->users->name;
                    $kwitansi->metode_bayar = '1';
                    $kwitansi->jumlah = $payment->jumlah_pembayaran;
                    $kwitansi->admin_penginput = $user->username;
                    $kwitansi->status = '1';
                    $kwitansi->save();
                }
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
                if ($status == '1') {
                    $log->isi_log = 'Mengkonfirmasi transaksi dengan nomor transaksi '.$payment->id;
                }elseif($status == '2'){
                    $log->isi_log = 'Menolak transaksi dengan nomor transaksi '.$payment->id;
                }
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

    public function konfirm_paket(Request $request, $id)
    {
        $payment = payment::findOrFail($id);
        if (is_null($payment)) {
            abort(404);
        }
        $user = Auth::guard('admin')->user();
        $kwitansi = Kwitansi::orderBy('id_kwitansi', 'desc')->limit(1)->first();
        $status = $request->status;

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

        $paket = DB::table('tbl_payment')
                    ->addSelect('tbl_payment.*', 'tbl_payment.id as id_payment')
                    ->addSelect('tbl_produk.*', 'tbl_produk.id as id_produk')
                    ->leftJoin('tbl_produk', 'tbl_payment.id_prod', '=', 'tbl_produk.id')
                    ->where('tbl_payment.id_user', $payment->id_user)
                    ->whereIn('type', ['1', '2'])
                    ->where('status', '1')
                    ->orderBy('tbl_payment.created_at', 'desc')
                    ->get()->last();

        $tabungan = DB::table('tbl_tabungan')->where('id_user', $payment->id_user)->first();
        $tambah_tabungan = $payment->jumlah_pembayaran + $tabungan->tabungan;

        DB::beginTransaction();
            try {
                $payment->update(['status' => $status]);
            } catch (ValidationException $e) {
                DB::rollback();
                return redirect()->back()
                    ->withErrors($e->getErrors());
            } catch(\Execption $e){
                DB::rollback();
                throw $e;
            }

            try {
                if ($status == '1') {
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

            try{
                if ($status == '1') {
                    $kwitansi = new Kwitansi;
                    $kwitansi->id_transaksi = $payment->id;
                    $kwitansi->nomor_kwitansi = $format_kwitansi;
                    $kwitansi->pelanggan = $payment->users->name;
                    $kwitansi->metode_bayar = '1';
                    $kwitansi->jumlah = $payment->jumlah_pembayaran;
                    $kwitansi->admin_penginput = $user->username;
                    $kwitansi->status = '1';
                    $kwitansi->save();
                }
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
                if ($status == '1') {
                    $log->isi_log = 'Mengkonfirmasi transaksi dengan nomor transaksi '.$payment->id;
                }elseif($status == '2'){
                    $log->isi_log = 'Menolak transaksi dengan nomor transaksi '.$payment->id;
                }
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

    public function konfirm_user(Request $request, $id)
    {
        $payment = payment::findOrFail($id);
        if (is_null($payment)) {
            abort(404);
        }
        $user = Auth::guard('admin')->user();
        $kwitansi = Kwitansi::orderBy('id_kwitansi', 'desc')->limit(1)->first();
        $status = $request->status;

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
                $payment->update(['status' => $status]);
            } catch (ValidationException $e) {
                DB::rollback();
                return redirect()->back()
                    ->withErrors($e->getErrors());
            } catch(\Execption $e){
                DB::rollback();
                throw $e;
            }

            try {
                if ($status == '1') {
                    $agen_user->update(['status' => '1']);
                }
            } catch (ValidationException $e) {
                DB::rollback();
                return redirect()->back()
                    ->withErrors($e->getErrors());
            } catch(\Execption $e){
                DB::rollback();
                throw $e;
            }

            try{
                if ($status == '1') {
                    $kwitansi = new Kwitansi;
                    $kwitansi->id_transaksi = $payment->id;
                    $kwitansi->nomor_kwitansi = $format_kwitansi;
                    $kwitansi->pelanggan = $payment->users->name;
                    $kwitansi->metode_bayar = '1';
                    $kwitansi->jumlah = $payment->jumlah_pembayaran;
                    $kwitansi->admin_penginput = $user->username;
                    $kwitansi->status = '1';
                    $kwitansi->save();
                }
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
                if ($status == '1') {
                    $log->isi_log = 'Mengkonfirmasi transaksi dengan nomor transaksi '.$payment->id;
                }elseif($status == '2'){
                    $log->isi_log = 'Menolak transaksi dengan nomor transaksi '.$payment->id;
                }
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

    public function konfirm_topup(Request $request, $id)
    {
        $payment = payment::findOrFail($id);
        if (is_null($payment)) {
            abort(404);
        }
        $user = Auth::guard('admin')->user();
        $kwitansi = Kwitansi::orderBy('id_kwitansi', 'desc')->limit(1)->first();
        $status = $request->status;

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
                $payment->update(['status' => $status]);
            } catch (ValidationException $e) {
                DB::rollback();
                return redirect()->back()
                    ->withErrors($e->getErrors());
            } catch(\Execption $e){
                DB::rollback();
                throw $e;
            }

            try {
                if ($status == '1') {
                    Saldo::find($saldo->id_saldo)->update(['saldo' => $tambah_saldo]);
                }
            } catch (ValidationException $e) {
                DB::rollback();
                return redirect()->back()
                    ->withErrors($e->getErrors());
            } catch(\Execption $e){
                DB::rollback();
                throw $e;
            }

            try{
                if ($status == '1') {
                    $kwitansi = new Kwitansi;
                    $kwitansi->id_transaksi = $payment->id;
                    $kwitansi->nomor_kwitansi = $format_kwitansi;
                    $kwitansi->pelanggan = $payment->users->name;
                    $kwitansi->metode_bayar = '1';
                    $kwitansi->jumlah = $payment->jumlah_pembayaran;
                    $kwitansi->admin_penginput = $user->username;
                    $kwitansi->status = '1';
                    $kwitansi->save();
                }
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
                if ($status == '1') {
                    $log->isi_log = 'Mengkonfirmasi transaksi dengan nomor transaksi '.$payment->id;
                }elseif($status == '2'){
                    $log->isi_log = 'Menolak transaksi dengan nomor transaksi '.$payment->id;
                }
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
