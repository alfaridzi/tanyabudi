<!DOCTYPE html>
<html>
<head>
	<title>Print Voucher</title>
	<link rel="stylesheet" href="{{ asset('admin/bootstrap/dist/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('admin/css/print-voucher.css') }}" media="print" />
	<style type="text/css">
	@media print, screen{
		body {
			-webkit-print-color-adjust: exact;
			font-size: 13px;
		}
		.pagebreak { page-break-before: always; }
		.print-voucher{
			height: 340px;
			margin: 0;
			width: 100%;
			border-bottom: 1px black dashed;
		}

		.print-voucher .bagian-kiri {
			width: 70%;
			border-right: 1px black dashed;
			display: inline-block;
		}

		.bagian-kiri .content .pojok-kanan {
			padding-left: 68%;
		}

		.bagian-kiri .content .qr-code-1{
			position: absolute;
			top: 150px;
			right: 0;
			bottom: 0;
			left: 75%;
		}

		.print-voucher .bagian-kiri .content {
			position: relative;
			padding: 10px 30px;
		}

		.bagian-kiri .detail {
			margin-top: 10px;
		}

		.bagian-kiri .footer {
			margin-top: 80px;
			margin-bottom: 10px;
		}

		.bagian-kiri .footer .nomor-dan-gambar {
			width: 76%;
			display: inline-block;
		}

		.bagian-kiri .footer .gambar-sponsor {
			width: 24%;
			padding-top: 5px;
			float: right;
			display: inline-block;
		}
		.print-voucher .bagian-kanan {
			width: 30%;
			display: inline-block;
			float: right;
		}

		.print-voucher .bagian-kanan .content {
			position: relative;
			padding-left: 15px;
		}

		.bagian-kanan .content .qr-code-2 {
			position: relative;
			top: -20px;
			right: ;
			left: 70%;
			bottom: 0;
		}

		.bagian-kanan .content .sub-judul {
			text-align: right;
			padding-right: 15px;
			font-size: 15px;
			font-weight: bold;
		}
		.bagian-kanan .content .sub-judul p {
			font-size: 12px;
		}

		.bagian-kanan .content .footer {
			position: relative;
			margin-top: 67px;
		}

		.print-voucher .judul-voucher{
			display: block;
			padding-left: 15px;
			height: 45px;
			line-height: 45px;
			background-color: {{ $voucher->kategori == 1 ? '#87C50A' : '#27A3BB' }} !important;
			color: white !important;
			font-weight: bolder;
			font-size: 20px;
		}

		.voucher-belakang {
			width: 100%;
			height: 340px;
			margin: 0;
			background-color: {{ $voucher->kategori == 1 ? '#87C50A' : '#27A3BB' }} !important;
			border-bottom: 1px black dashed;
		}

		.voucher-belakang {
			padding: 10px 40px;
			font-size: 13px;
			font-weight: bold;
			color: white !important;
		}

		.voucher-belakang .header-utama{
			font-size: 44px;
			color: white !important;
			font-weight: bold;
		}

		.voucher-belakang .header-utama p {
			margin-top: -10px;
			color: white !important;
			font-size: 20px;
		}

		.voucher-belakang .content {
			margin-left: -25px;
			font-size: 15px;
		}

		.voucher-belakang .content  ul li{
			margin: 10px 0;
			color: white !important;
		}
	}
	</style>
</head>
<body>
<div class="print-voucher">
	<div class="container-fluid">
		<div class="row">
			<div class="bagian-kiri">
				<div class="judul-voucher">
					Voucher {{ $voucher->kategori == 1 ? 'Haji' : 'Umroh' }} Rp {{ number_format($voucher->nominal, 0, ',', '.') }}
				</div>
				<div class="content">
					<div class="pojok-kanan">
						<div class="nomor-voucher">
							Nomor Seri: {{ $voucher->nomor_voucher }}
						</div>
						<div class="tanggal">
							Tanggal: {{ Tanggal::tanggalIndonesia(date('Y-m-d')) }}
						</div>
					</div>
					<div class="detail">
						<table>
							<tr>
								<td>Nama Jamaah</td>
								<td>&nbsp;:</td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>&nbsp;:</td>
							</tr>
							<tr>
								<td>No HP</td>
								<td>&nbsp;:</td>
							</tr>
							<tr>
								<td>Provinsi dan Kab/Kota</td>
								<td>&nbsp;:</td>
							</tr>
							<tr>
								<td></td>
							</tr>
						</table>
						<p>Nama yang memberangkatkan <b>{{ $voucher->pemilik }}</b> / izin {{ $voucher->kategori == 1 ? 'haji' : 'umroh' }} Kemenag RI No.490/2017</p>
					</div>
					<div class="qr-code-1">
						{!! QrCode::size(70)->errorCorrection('H')->margin(0)->generate($voucher->nomor_voucher) !!}
					</div>
					<div class="footer">
						<div class="nomor-dan-gambar">
							<img src="{{ asset('assets/images/logo/logo-up.png') }}" width="80">
							<div class="nomor-agen">Nomor ID Agen :</div>
						</div>
						<div class="gambar-sponsor">
							<img src="{{ asset('assets/images/logo/logo.png') }}" width="35">
							&nbsp;&nbsp;
							<img src="{{ asset('assets/images/logo/logo.png') }}" width="35">
						</div>
					</div>
				</div>
			</div>
			<div class="bagian-kanan">
				<div class="judul-voucher">
					<img src="{{ asset('assets/images/logo/logo-up.png') }}" width="100">	
				</div>
				<div class="content">
					<div class="qr-code-2">
						{!! QrCode::size(70)->errorCorrection('H')->margin(0)->generate($voucher->nomor_voucher) !!}
					</div>
					<div class="sub-judul">
						Voucher Haji
						<p>Rp {{ number_format($voucher->nominal, 0, ',', '.') }}</p>
					</div>
					<table>
						<tr>
							<td>No. Seri Voucher</td>
							<td>&nbsp; :</td>
						</tr>
						<tr>
							<td>ID Agen</td>
							<td>&nbsp; :</td>
						</tr>
					</table>
					<div class="footer">
						<div class="gambar-sponsor">
							<img src="{{ asset('assets/images/logo/logo.png') }}" width="35">
							&nbsp;&nbsp;
							<img src="{{ asset('assets/images/logo/logo.png') }}" width="35">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="pagebreak">
	<div class="voucher-belakang">
		<div class="header">
			<div class="header-utama">
				SYARAT
				<p>DAN KETENTUAN</p>
			</div>
			<div class="content">
				<ul>
					<li>Voucher ini hanya berlaku untuk Satu Jamaah dan satu kali keberangkatan {{ $voucher->kategori == 1 ? 'haji' : 'umroh' }}</li>
					<li>Voucher ini tidak dapat digunakan sebagai jaminan dalam bentuk apapun</li>
					<li>Apabila Voucher ini hilang, maka segeralah melapor ke management TanyaBudi disertai surat laporan kehilangan dari kepolisian dan tanda bukti bayar saat pembelian voucher</li>
					<li>Voucher ini dapat di wariskan dengan syarat tertentu</li>
					<li>Voucher ini tidak dapat digunakan sebagai alat bayar atau transaksi keuangan lainnya</li>
					<li>Voucher ini tidak dapat dititipkan kepada managemen TanyaBudi atau pihak manapun untuk melakukan registrasi keberangkatan atau pelunasan</li>
				</ul>
			</div>
		</div>
	</div>
</div>


<script src="{{ asset('admin/jquery/dist/jquery.min.js') }}" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script type="text/javascript">
	// $(document).ready(function(){
	// 	window.print();
	// });
</script>
</body>
</html>