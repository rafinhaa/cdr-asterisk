<?php

namespace App\Controllers\Api\V1;

use CodeIgniter\RESTful\ResourceController;

class Users extends ResourceController
{
    protected $modelName = 'App\Models\UserModel';
    protected $format    = 'json';

    /**
     * Show all users.
    */
    public function index(){
        $response = [
			'status' => 200,
			"error" => false,
			'messages' => ['success' => 'All users listed'],
			'data' => $this->model->findAll(),
		];
        return $this->respond($response);
    }

    /**
	 * Return the properties of a resource object
	 *
	 * @return mixed
	 */
	public function show($id = null){
        $data = $this->model->find($id);
        if(!$data){
            return $this->failNotFound('User not found');
        }
		$response = [
			'status' => 200,
			"error" => false,
			'messages' => ['success' => 'Listed single user'],
			'data' => $this->model->find($id),
		];
        return $this->respond($response);
	}

	/**
	 * Return a new resource object, with default properties
	 *
	 * @return mixed
	 */
	public function new()
	{
		//
	}

	/**
	 * Create a new resource object, from "posted" parameters
	 *
	 * @return mixed
	 */
	public function create(){
		$rules = [
			'name' => [
				'rules' => 'required|min_length[2]',
				'errors' => [
					'required' => 'Seu nome é necessário',
					'min_length' => 'Seu nome deve ter pelo menos 2 caracteres',
				],
			],
			'lastname' => [
				'rules' => 'required|min_length[2]',
				'errors' => [
					'required' => 'Seu sobrenome é necessário',
					'min_length' => 'Seu sobrenome deve ter pelo menos 2 caracteres',
				],
			],
			'password' => [
				'rules' => 'required|strong_password',
				'errors' => [
					'required' => 'A senha é necessário',
					'strong_password' => 'Essa senha está facil demais',
				],                
			],			
			'cpassword' => [
				'rules' => 'required|matches[password]',
				'errors' => [
					'required' => 'Você não digitou a confirmação da senha',
					'matches' => 'As senhas não são iguais',
				],                
			],
		];

		if (! $this->validate($rules)){
			return $this->respond([
				'status' => 500,
				'error' => true,
				'message' => $this->validator->getErrors(),
				'data' => []
			],500);
		}
        die('registration ok');
	}

	/**
	 * Return the editable properties of a resource object
	 *
	 * @return mixed
	 */
	public function edit($id = null)
	{
		//
	}

	/**
	 * Add or update a model resource, from "posted" properties
	 *
	 * @return mixed
	 */
	public function update($id = null)
	{
		//
	}

	/**
	 * Delete the designated resource object from the model
	 *
	 * @return mixed
	 */
	public function delete($id = null)
	{
		//
	}
}