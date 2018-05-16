<tr>
	<td>{{ $user->id_payment }}</td>
	<td>{{ $user->nohp }}</td>
	<td>{{ Tanggal::tanggalIndonesia($user->tgl_pembayaran) }}</td>
	@can('konfirmasi transaksi')
	<td>
	@if($user->status_pembayaran == 0)
		<a href="javascript:;" data-id="{{ $user->id_payment }}" data-status="1" class="btn btn-success btn-flat btn-konfirmasi-user"><i class="fa fa-check"></i></a>
		<a href="javascript:;" data-id="{{ $user->id_payment }}" data-status="2" class="btn btn-danger btn-flat btn-konfirmasi-user"><i class="fa fa-times"></i></a>
		<a href="javascript:;" id="btn-detail-transaksi" 
		data-no-transaksi="{{ $user->id_payment }}" 
		data-tipe="1"
		data-id-prod="{{ $user->id_prod }}" 
		data-desc-prod="{{ $user->desc_prod }}"
		data-harga="Rp {{ number_format($user->harga, 2, ',', '.') }}"

		data-jumlah-bayar="Rp {{ number_format($user->jumlah_pembayaran, 2, ',', '.') }}"
		data-nama-user="{{ $user->name }}"
		data-email="{{ $user->email }}"
		data-nohp="{{ $user->nohp }}"
		data-produk="{{ $user->nama }}"
		data-bukti="{{ $user->foto }}"
		data-tanggal="{{ Tanggal::tanggalIndonesia($user->tgl_pembayaran) }}" class="btn btn-info btn-flat"><i class="fa fa-info" aria-hidden="true"></i>
		</a>
	@endif
	</td>
	@endcan
</tr>