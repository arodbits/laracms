<?php 
namespace LaracmsApp\Validator;
use Illuminate\Validation\Factory;

class LaravelValidator extends Validator {


	public function __construct(Factory $validator){
		$this->validator = $validator
	}

	public function passes(){
		$validator = $this->validator->make($this->data, $this->rules);
		
		if( $validator->fails() )
		{
			$this->errors = $validator->messages();
			return false;
		}
		
		return true;
	}
	

}