<option>--Pilih Salah Satu--</option>
@if(!empty($kecamatan))
  @foreach($kecamatan as $key => $value)
    <option value="{{ $value }}">{{ $key }}</option>
  @endforeach
@endif