<?php

namespace App\Helpers;

class Pemilihan
{
	public static function selected($value = '', $key, $hasil, $hasil_lain = '')
	{
		if ($value == $key) {
			return $hasil;
		}else{
			return $hasil_lain;
		}
	}

	public static function ifElse($arrayKondisi = array(), $arrayBanding = array(), $arrayHasil = array())
	{

	}
}