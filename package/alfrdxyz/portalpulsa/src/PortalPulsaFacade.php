<?php 
namespace alfrdxyz\portalpulsa;

use Illuminate\Support\Facades\Facade;

class PortalPulsaFacade extends Facade

{

	public static function getFacadeAccessor(){
		return 'run-portalpulsa';
	}

}