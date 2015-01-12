<?php 
namespace LaracmsApp\FacebookApi\Facades;

use Illuminate\Support\Facades\Facade;

class Facebook extends Facade {

	public static function getFacadeAccessor(){
		return 'facebook';
	}
}