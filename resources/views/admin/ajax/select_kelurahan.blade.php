<option>--Pilih Salah Satu--</option>
@if(!empty($kelurahan))
  @foreach($kelurahan as $key => $value)
    <option value="{{ $value }}">{{ $key }}</option>
  @endforeach
@endif