<?php 
namespace laracms\FacebookApi 

use Facebook\FacebookRedirectLoginHelper 

class MyFacebookRedirectLoginHelper extends FacebookRedirectLoginHelper{

	/*
	*	Override FacebookRedirectLoginHelper
	*
	*  	We do it because we don't want to use the $_SESSION associative array variable
	*   to store the facebook session variables. 
	*   Instead we're going to use the 
	* 	Session implementation provided by laravel. 
	*/

	/*
	 *	@override storeState 
	 *	@param String $state 
	*/

	public function storeState($state){
		Session::set('state',$state);
	}

	/*
		@return  $this->state
	*/

	public function loadState(){
		return $this->state = Session::get('state');
	}

}