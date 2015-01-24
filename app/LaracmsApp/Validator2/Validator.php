<?php 
namespace LaracmsApp\Validator2;
use Illuminate\Validation\Factory;

abstract class Validator {

	protected $errors = array();
	protected $validator;
	protected $rules = array();
	protected $data  = array(); 

	public function __construct(Factory $validator){
		$this->validator = $validator;
	}

	public abstract function passes();

	public function errors(){
		return $this->errors;
	}

	public function with(array $data){
		$this->data = $data;
		return $this;
	}

}

