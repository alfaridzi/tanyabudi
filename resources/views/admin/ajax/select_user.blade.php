<option>--Pilih Salah Satu--</option>
@if(!empty($user))
  @foreach($user as $key => $value)
    <option value="{{ $value->id_user }}">{{ $value->name }} - {{ $value->nohp }}
    	@if(isset($value->tabungan))
    		@if(!is_null($value->tabungan))
    	 - Jumlah Tabungan Rp {{ number_format($value->tabungan, 2, ',','.') }}
    	 	@endif
    	@endif
    </option>
  @endforeach
@endif