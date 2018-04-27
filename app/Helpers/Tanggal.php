<?php

namespace App\Helpers;

use Carbon\Carbon;

class Tanggal
{
	public static function tanggalIndonesia($tgl)
	{
		$dt = new Carbon($tgl);
		
		return $dt->formatLocalized('%d %B %Y');
	}

	public static function tanggalIndonesiaLengkap($tgl)
	{
		$dt = new Carbon($tgl);
		
		return $dt->formatLocalized('%d %B %Y %H:%M:%S');
	}
}