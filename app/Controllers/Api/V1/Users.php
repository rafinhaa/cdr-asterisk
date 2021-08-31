<?php

namespace App\Controllers\Api\V1;

use CodeIgniter\RESTful\ResourceController;

class Users extends ResourceController
{
    protected $modelName = 'App\Models\UserModel';
    protected $format    = 'json';

	protected $config;
	protected $auth;

	public function __construct(){
		$this->config = config('Auth');
		$this->auth = service('authentication');
	}

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
				'message' => [
					'error' => $this->validator->getErrors(),
				],
				'data' => []
			],500);
		}
        
		$allowedPostFields = array_merge(['password'], config('Auth')->validFields, config('Auth')->personalFields);
		$data = (array) service('request')->getJSON();
		$data = array_intersect_key($data, array_fill_keys($allowedPostFields, null));
		$user = new \Myth\Auth\Entities\User($data);
		$this->config->requireActivation === null ? $user->activate() : $user->generateActivateHash();

		$users = model(UserModel::class);
		// Ensure default group gets assigned if set
        if (! empty($this->config->defaultUserGroup)) {
            $users = $users->withGroup($this->config->defaultUserGroup);
        }

		if (! $users->save($user))
		{
			return $this->respond([
				'status' => 500,
				'error' => true,
				'message' => [
					'error' => $users->errors(),
				],
				'data' => []
			],500);
		}

		if ($this->config->requireActivation !== null)
		{
			$activator = service('activator');
			$sent = $activator->send($user);

			if (! $sent)
			{
				return $this->respond([
					'status' => 500,
					'error' => true,
					'message' => [
						'error' => $activator->error() ?? lang('Auth.unknownError'),
					],
					'data' => []
				],500);
			}

			return $this->respond([
				'status' => 201,
				'error' => false,
				'message' => [
					'success' => lang('Auth.activationSuccess'),
				],
				'data' => []
			],201);
		}
		// Success!
		return $this->respondCreated([
			'status' => 201,
			'error' => false,
			'message' => [
				'success' => 'Users added successfully',
			],
			'data' => []
		]);
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