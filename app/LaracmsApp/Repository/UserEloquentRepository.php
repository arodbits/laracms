<?php 
namespace LaracmsApp\Repository;
use LaracmsApp\User;
class UserEloquentRepository {

	protected $model;

	public function __construct(User $user){
		$this->model  = $user;
	}

	public function getFirstBy($what, $value, array $with=array()){
		$query = $this->make($with);
		return $query->where($what, '=', $value)->first();
	}

	public function getManyBy($what, $value){
		return $this->model->where('$what', '=', $value)->get();
	}

	public function make(array $with=array()){
		return $this->model->with($with);
	}
	/**
	 * Create a new user
	 * @param  array  $data
	 * @return Model       
	 */
	public function create(array $data = array()){
		return $this->model->create($data);
	}


	

}