<?php 
namespace LaracmsApp\Validator;

abstract class Validator {

	protected $validator;

	protected $errors = array();

	protected $data = array();

	protected $rules = array();

	public function with(array $data){
		$this->data = $data;
		return $this;
	}

	public function errors(){
		return $this->errors;
	}

	public abstract function passes();

	//validator->with($data)->passes()
}