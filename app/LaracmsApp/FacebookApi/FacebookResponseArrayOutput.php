<?php 
namespace LaracmsApp\FacebookApi;

class FacebookResponseArrayOutput implements FacebookResponseInterface{

	protected $facebookResponse;

	public function __construct(FacebookResponse $facebookResponse){
		$this->facebookResponse = $facebookResponse;
	}

	public function output(){
		return $this->facebookResponse->getArray();
	}

}