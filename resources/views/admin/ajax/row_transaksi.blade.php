<tr>
	<td>{{ $transaksi->id_payment }}</td>
	<td>
		@if($transaksi->id_prod == '3910')
		Tabungan
		@elseif($transaksi->id_prod == '3911')
		Top Up Saldo
		@else
		{{ $transaksi->nama }}
		@endif
	</td>
	<td>{{ Tanggal::tanggalIndonesia($transaksi->tgl_pembayaran) }}</td>
	@can('konfirmasi transaksi')
	<td>
	@if($transaksi->status_pembayaran == 0)
		<a href="javascript:;" data-id="{{ $transaksi->id_payment }}" data-status="1" class="btn btn-success btn-flat btn-konfirmasi-transaksi"><i class="fa fa-check" aria-hidden="true"></i></a>
		<a href="javascript:;" data-id="{{ $transaksi->id_payment }}" data-status="2" class="btn btn-danger btn-flat btn-konfirmasi-transaksi"><i class="fa fa-times" aria-hidden="true"></i></a>
	@endif
	<a href="javascript:;" id="btn-detail-transaksi" 
		data-no-transaksi="{{ $transaksi->id_payment }}" 
		data-id-prod="{{ $transaksi->id_prod }}" 
		data-desc-prod="{{ $transaksi->desc_prod }}"
		data-harga="Rp {{ number_format($transaksi->harga, 2, ',', '.') }}" 
		data-jumlah-bayar="Rp {{ number_format($transaksi->jumlah_pembayaran, 2, ',', '.') }}"
		data-nama-user="{{ $transaksi->name }}"
		data-email="{{ $transaksi->email }}"
		data-nohp="{{ $transaksi->nohp }}"
		data-produk="{{ $transaksi->nama }}"
		data-bukti="{{ $transaksi->foto }}"
		data-tanggal="{{ Tanggal::tanggalIndonesia($transaksi->tgl_pembayaran) }}" class="btn btn-info btn-flat"><i class="fa fa-info" aria-hidden="true"></i></a>
	</td>
	@endcan
</tr>