<?php 
namespace LaracmsApp\Validator2;

class LaravelValidator extends Validator{

	public function passes(){
		$validator = $this->validator->make($this->data, $this->rules);
		if($validator->fails()){
		 	$this->errors = $validator->messages();
		 	return false;
		}
		return true;
	}

}