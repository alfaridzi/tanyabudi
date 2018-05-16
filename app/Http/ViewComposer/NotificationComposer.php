<?php
namespace App\Http\ViewComposer;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use App\User;
use App\payment;

class NotificationComposer {

	protected $haji;
	protected $umroh;
	protected $wisata;
	protected $sedekah;
	protected $user;
	protected $top_up;
	protected $tabungan;
	protected $transaksi;

	public function __construct(){
		$haji = DB::table('tbl_payment')->leftJoin('tbl_produk', 'tbl_payment.id_prod', '=', 'tbl_produk.id')->where('status', '0')->where('type', '1')->count();
		$umroh = DB::table('tbl_payment')->leftJoin('tbl_produk', 'tbl_payment.id_prod', '=', 'tbl_produk.id')->where('status', '0')->where('type', '2')->count();
		$wisata = DB::table('tbl_payment')->leftJoin('tbl_produk', 'tbl_payment.id_prod', '=', 'tbl_produk.id')->where('status', '0')->where('type', '3')->count();
		$sedekah = DB::table('tbl_payment')->leftJoin('tbl_produk', 'tbl_payment.id_prod', '=', 'tbl_produk.id')->where('status', '0')->where('type', '4')->count();
		$user = DB::table('tbl_payment')->leftJoin('tbl_produk', 'tbl_payment.id_prod', '=', 'tbl_produk.id')->where('status', '0')->where('type', '5')->count();
		$top_up = DB::table('tbl_payment')->where('status', '0')->where('id_prod', '3911')->count();

		$tabungan = DB::table('tbl_payment')->where('status', '0')->where('id_prod', '3910')->count();
		
		$transaksi = DB::table('tbl_payment')->where('status', '0')->count();

		$this->count_haji = $haji;
		$this->count_umroh = $umroh;
		$this->count_wisata = $wisata;
		$this->count_sedekah = $sedekah;
		$this->count_user = $user;
		$this->count_top_up = $top_up;
		$this->count_tabungan = $tabungan;
		$this->count_transaksi = $transaksi;
	}

    public function compose(View $view) {
        $view->with('count_haji', $this->count_haji)
        	 ->with('count_umroh', $this->count_umroh)
        	 ->with('count_wisata', $this->count_wisata)
        	 ->with('count_sedekah', $this->count_sedekah)
        	 ->with('count_user', $this->count_user)
        	 ->with('count_top_up', $this->count_top_up)
        	 ->with('count_tabungan', $this->count_tabungan)
        	 ->with('count_transaksi', $this->count_transaksi);
    }
}
?>