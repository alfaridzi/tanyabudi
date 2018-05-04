<option>--Pilih Salah Satu--</option>
@if(!empty($jabatan))
  @foreach($jabatan as $key => $value)
    <option value="{{ $value }}">{{ $key }}</option>
  @endforeach
@endif