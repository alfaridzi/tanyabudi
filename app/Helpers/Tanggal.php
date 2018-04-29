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

	public static function sisaDetik($tgl1, $tgl2)
	{
		$hasil = strtotime($tgl2) - strtotime($tgl1);

		return $hasil;
	}
}