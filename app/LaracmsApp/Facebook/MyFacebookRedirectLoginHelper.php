<?php 
namespace LaracmsApp\Facebook;
use Facebook\FacebookRedirectLoginHelper;

class MyFacebookRedirectLoginHelper extends FacebookRedirectLoginHelper{

	public function loadState(){
		$this->state = \Session::get('state');
		return $this->state;
	}
	public function storeState($state){
		\Session::put('state', $state);
	}

}