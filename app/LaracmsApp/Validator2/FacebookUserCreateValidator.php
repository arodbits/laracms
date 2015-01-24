<?php 
namespace LaracmsApp\Validator2;

class FacebookUserCreateValidator extends LaravelValidator implements ValidableInterface{
	/**
	 * Override $rules in Validator
	 * @var array
	 */
	protected $rules = array(
		'email' =>'required',
		'facebook_access_token'=>'required',
		'facebook_id' =>'required'
	);

}