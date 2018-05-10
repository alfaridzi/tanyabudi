<option>--Pilih Salah Satu--</option>
@if(!empty($produk))
  @foreach($produk as $key => $value)
    <option value="{{ $value->id }}">{{ $value->nama }} - Rp {{ number_format($value->harga, 2, ',', '.') }}</option>
  @endforeach
@endif