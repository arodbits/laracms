<?php 
namespace LaracmsApp\Validator;

interface ValidableInterface {

	/**
	 * With
	 * @param  Array  $data  Data to be match agains the rules
	 * @param  Array  $Rules Define the contrains for validation
	 * @return void        
	 */
	public function with(array $data);

	 /**
   * Passes
   *
   * @return boolean
   */
	 public function passes();
	 
  /**
   * Errors
   *
   * @return array
   */
  public function errors();

}