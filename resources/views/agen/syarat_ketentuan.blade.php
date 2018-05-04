@extends('user.layout.app-3')
@section('page-title', 'Syarat dan Ketentuan Agen')
@push('css')
<style type="text/css">
	.syarat-ketentuan .syarat {
		margin-top: 40px;
	}

	p.header{
		font-size: 15px;
		font-weight: bold;
		margin: 0;
	}

	ol.list-syarat {
		margin-top: 5px;
		font-size: 13px;
		padding-left: 11px;
	}

	ol.list-syarat.list-segitiga {
		list-style: none;
	}

	ol.list-syarat.list-segitiga li {
		padding-left: 0;
		text-indent: -.8em;
	}

	ol.list-syarat.list-segitiga li::before {
	  	content: "▶ ";
	  	color: red; /* or whatever color you prefer */
	  	font-size: 12px;
	}
</style>
@endpush
@section('content')
<div class="syarat-ketentuan">
	<div class="container">
		<div class="row">
			<p class="center-align" style="color: #2F0F62; font-weight: bold;">Syarat dan Ketentuan Agen</p>

			<div class="syarat">
				<p class="header">UMRAH & HAJI</p>
				<p class="header">1. Syarat Admininstrasi</p>
				<p style="margin-bottom: 0; font-size: 13px;">Syarat Menjadi AGEN (Personal Marketing) adalah sebagai berikut :</p>
				<ol class="list-syarat">
					<li>Semua Warga Negara Indonesia yang Sudah Dewasa dan Beragama Islam</li>
					<li>Surat Pernyataan Keagenan</li>
					<li>Menyerahkan Foto Copy KTP sebanyak 2 Lembar</li>
					<li>Menandatangani MOU</li>
					<li>Sehat Jiwa dan Raga</li>
				</ol>
			</div>
			<div class="syarat">
				<p class="header">2. Syarat-syarat Kelayakan Agen</p>
				<ol class="list-syarat list-segitiga">
					<li>Menyerahkan rencana kerja untuk menjalankan usaha sebagai Agen perekrutan calon Jama'ah Umroh dan Haji Khusus</li>
					<li>Memiliki telepon rumah, handphone, dan kendaraan pribadi sebagai penunjang dalam menjalankan usaha keagenan</li>
					<li>Bersedia mengikuti pelatihan dalam mengenal produk-produk</li>
					<li>Sanggup menjalankan Standar Operasional dan Prosedur yang berlaku</li>
					<li>Agen bertanggung jawab atas atas kelengkapan Dokumen Calon Jama'ah Umroh dan Haji Khusus yang diperlukan untuk proses pendaftaran Calon Jama'ah dan diserahkan langsung ke kantor</li>
				</ol>
			</div>
			<div class="syarat">
				<p class="header">3. Sistem Pembayaran dan Komisi Penjualan</p>
				<ol class="list-syarat list-segitiga">
					<li>Semua pembayaran dilakukan melalui mekanisme yang telah ditetapkan perusahaan yaitu pembayaran langsung ke Rekening Bank</li>
					<li>Agen mendapatkan Fee (komisi) untuk setiap hasil perekrutan Calon Jama'ah Umroh ataupun Haji sesuai ketentuan yang berlaku</li>
					<li>Pembayaran Hak Agen atas komisi hasil rekrutan Calon Jama'ah ataupun Calon Jama'ah Haji dilakukan secara cash (tunai) ataupun transfer, setelah Calon Jama'ah melunasi semua pembayaran biaya Umroh ataupun Haji</li>
				</ol>
			</div>
			<div class="syarat">
				<p class="header">4. Fasilitas Yang Didapatkan Agen</p>
				<ol class="list-syarat list-segitiga">
					<li>Agen perseorangan</li>
					<li>Brosur sebanyak 1 rim (500 lembar)</li>
					<li>Kartu Nama</li>
					<li>Agen Perwakilan</li>
					<li>Spanduk Ukuran 3x1 meter</li>
					<li>Starter kit</li>
				</ol>
			</div>
		</div>
	</div>
</div>
@endsection