<?php 
namespace LaracmsApp\Validator;

class UserCreateValidator extends LaravelValidator implements ValidableInterface{

	protected $rules = array(
		'email' => 'required|email'
	);

	

}