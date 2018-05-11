@extends('user.layout.app')
@section('page-title', 'Dashboard User')
@section('content')
<?php
$id_user = Auth::user()->id;
$paket_aktif = App\payment::where('id_user',$id_user)->where('status',1)->first();
$tabungan = App\tabungan::where('id_user',$id_user)->first();

if(!is_null($tabungan)) {

if(!is_null($paket_aktif)) {
$sisa = $paket_aktif->jumlah_pembayaran - $tabungan->tabungan;
} else {
	$sisa = 0;
}
}


if(!is_null($paket_aktif)) {
$countdown = $paket_aktif->tgl_pembayaran;
}else {
	$countdown = null;
}


?>
<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="steps">
				<ol class="circle-steps">
					<li class="done">
						<i class="icon icon-pendaftaran"></i>
						<span>Pendaftaran</span>
					</li>
					<li @if(!is_null($paket_aktif))
					class="done"
					@endif
					>
						<i class="icon icon-pelunasan"></i>
						<span>Pelunasan</span>
					</li>
					<li>
						<i class="icon icon-pesawat"></i>
						<span>Keberangkatan</span>
					</li>
				</ol>
			</div>
		</div>
	</div>
	<div class="user-content">
		<div class="row valign-wrapper row-1">
			<div class="col s12">
				<div class="img-user">
					<img src="{{ asset('assets/images/user-1.png') }}" class="circle responsive-img" width="110" height="110">
					<div class="center-align nama-user">
						<span>{{ Auth::user()->name }}</span>
					</div>
				</div>
				<div class="tabungan-haji">
					<span class="title-produk">Jumlah Tabungan Umroh / Haji</span>


					@if(is_null($tabungan))

					<p class="jumlah">Rp. 0</p>
					<span class="sisa-pembayaran">Sisa Pembayaran : Rp 0</span>
					@else


					<p class="jumlah">Rp. {{ number_format($tabungan->tabungan, 0,'.','.') }}</p>
					<span class="sisa-pembayaran">Sisa Pembayaran : Rp {{ number_format($sisa, 0,'.','.') }}</span>


					@endif
				</div>
			</div>
		</div>
		<div class="row row-2" style="position: relative;">
			<div class="col s6" style="display: table;">
				<div class="item">
					<span class="title-produk">Paket Pilihan</span><br>
					@if(is_null($paket_aktif))
					<span class="produk" style="color:red">Kamu tidak memiliki paket apapun</span>
					@else
					<span class="produk">{{ strtoupper($paket_aktif->produk->nama) }}</span>
					<p class="jumlah">Rp. {{ number_format($paket_aktif->jumlah_pembayaran) }}</p>
					@endif
				</div>
			</div>
			<div class="col s6" style="display: table;">
				<div class="item item-red valign-wrapper">
					<span class="title-produk">Saldo Bayar Bayar</span>
					<p class="jumlah">Rp. 0</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col s12">
			<div class="secondary-menu">
				<ol class="circle-menu">
					<a href="{{ url('instruksi') }}">
						<li>
							<i class="icon icon-rupiah"></i>
							<span>Bayar Paket</span>
						</li>
					</a>
					<a href="{{ url('/scan')}}">
						<li>
							<i class="icon icon-scan-barcode"></i>
							<span>Scan Voucher</span>
						</li>
					</a>
					<a href="{{ url('topup') }}">
						<li>
							<i class="icon icon-top-up"></i>
							<span>Top Up Bayar-Bayar</span>
						</li>
					</a>
					<a href="{{ url('history') }}">
						<li>
							<i class="icon icon-history"></i>
							<span>History</span>
						</li>
					</a>
				</ol>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="countdown">
				<ol>
					@if(!is_null($paket_aktif))
					<li>
						<span class="detail">Hari</span>
						<span class="days">0</span>
					</li>
					<li>
						<span class="detail">Jam</span>
						<span class="hours">0</span>
						
					</li>
					<li>
						<span class="detail">Menit</span>
						<span class="minutes">0</span>
					</li>
					<li>
						<span class="detail">Detik</span>
						<span class="seconds">0</span>
					</li>

					@else
					<li>
						<span class="detail">Hari</span>
						<span class="=">0</span>
					</li>
					<li>
						<span class="detail">Jam</span>
						<span class="">0</span>
						
					</li>
					<li>
						<span class="detail">Menit</span>
						<span class="">0</span>
					</li>
					<li>
						<span class="detail">Detik</span>
						<span class="">0</span>
					</li>
					@endif
				</ol>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="tenggat-waktu center-align">

			@if(!is_null($paket_aktif))
			<span>Tenggat Waktu Pelunasan</span>
			<h5>{{ date("Y-m-d", strtotime(date("$paket_aktif->tgl_pembayaran", time()) . " + 10 year")) }}</h5>
			@endif

			</div>
	</div>


</div>



@endsection

@push('js')

<script type="text/javascript">
	

	var timer;

var compareDate = new Date('<?php echo $countdown; ?>');
compareDate.setFullYear(compareDate.getFullYear() + 7); //just for this demo today + 7 days

timer = setInterval(function() {
  timeBetweenDates(compareDate);
}, 1000);

function timeBetweenDates(toDate) {
  var dateEntered = toDate;
  var now = new Date();
  var difference = dateEntered.getTime() - now.getTime();

  if (difference <= 0) {

    // Timer done
    clearInterval(timer);
  
  } else {
    
    var seconds = Math.floor(difference / 1000);
    var minutes = Math.floor(seconds / 60);
    var hours = Math.floor(minutes / 60);
    var days = Math.floor(hours / 24);

    hours %= 24;
    minutes %= 60;
    seconds %= 60;

    $(".days").text(days);
    $(".hours").text(hours);
    $(".minutes").text(minutes);
    $(".seconds").text(seconds);
  }
}


</script>
@endpush

