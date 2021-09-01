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
			'data' => $data,
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
			'email' => [
				'rules' => 'required|valid_email|is_unique[users.email]',				
				'errors' => [
					'required' => 'O e-mail é necessário',
					'valid_email' => 'Você deve inserir um email válido',
					'is_unique' => 'Esse e-mail já está cadastrado',
				],
			],
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
				'messages' => [
					'error' => $this->validator->getErrors(),
				],
				'data' => []
			],500);
		}
        
		$allowedPostFields = array_merge(['password'], config('Auth')->validFields, config('Auth')->personalFields);
		if (strpos(service('request')->getHeaderLine('Content-Type'), 'application/json') !== false){
			$data = (array) service('request')->getJSON();
			$data = array_intersect_key($data, array_fill_keys($allowedPostFields, null));
			$user = new \Myth\Auth\Entities\User($data);
		} else {
			$user = new \Myth\Auth\Entities\User($this->request->getPost($allowedPostFields));
		}
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
				'messages' => [
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
					'messages' => [
						'error' => $activator->error() ?? lang('Auth.unknownError'),
					],
					'data' => []
				],500);
			}

			return $this->respond([
				'status' => 201,
				'error' => false,
				'messages' => [
					'success' => lang('Auth.activationSuccess'),
				],
				'data' => []
			],201);
		}
		// Success!
		return $this->respondCreated([
			'status' => 201,
			'error' => false,
			'messages' => [
				'success' => 'User added successfully',
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
		if(!$this->model->find($id)){
			return $this->failNotFound('User not found');
		}

		$rules = [
			'email' => [
				'rules' => 'permit_empty|valid_email|update_email['. $id .']',				
				'errors' => [
					'valid_email' => 'Você deve inserir um email válido',
					'update_email' => 'Esse e-mail já está cadastrado',
				],
			],
			'name' => [
				'rules' => 'permit_empty|min_length[2]',
				'errors' => [
					'min_length' => 'Seu nome deve ter pelo menos 2 caracteres',
				],
			],
			'lastname' => [
				'rules' => 'permit_empty|min_length[2]',
				'errors' => [
					'min_length' => 'Seu sobrenome deve ter pelo menos 2 caracteres',
				],
			],
			'password' => [
				'rules' => 'permit_empty|strong_password',
				'errors' => [
					'strong_password' => 'Essa senha está facil demais',
				],                
			],			
			'cpassword' => [
				'rules' => 'permit_empty|matches[password]',
				'errors' => [
					'matches' => 'As senhas não são iguais',
				],                
			],
		];

		if (! $this->validate($rules)){
			return $this->respond([
				'status' => 500,
				'error' => true,
				'messages' => [
					'error' => $this->validator->getErrors(),
				],
				'data' => []
			],500);
		}
		$allowedPostFields = array_merge(['password'], config('Auth')->validFields, config('Auth')->personalFields);
		$data = array_filter(service('request')->getPost($allowedPostFields));
		if (empty($data)) {
			//convert request body to associative array
			$data = array_intersect_key(
				json_decode(service('request')->getBody(), true), 
				array_fill_keys($allowedPostFields, null)
			);
		};
		$user = new \Myth\Auth\Entities\User($data);
		$user->id = $id;
		if (! $this->model->save($user))
		{
			return $this->respond([
				'status' => 500,
				'error' => true,
				'messages' => [
					'error' => $this->model->errors(),
				],
				'data' => []
			],500);
		}
		return $this->respond([
			'status' => 200,
			'error' => false,
			'messages' => [
				'success' => 'User updated successfully',
			],
			'data' => []
		],200);
	}

	/**
	 * Delete the designated resource object from the model
	 *
	 * @return mixed
	 */
	public function delete($id = null)
	{			
		if(!$this->model->find($id)){
			return $this->failNotFound('User not found');
		}
		if ($this->model->delete($id)){
			return $this->respondDeleted([
				'status' => 200,
				'error' => false,
				'messages' => [
					'success' => 'User deleted successful',
				],
				'data' => []
			]);
		}
		return $this->respond([
			'status' => 500,
			'error' => true,
			'messages' => [
				'error' => 'User not deleted',
			],
			'data' => []
		],500);
	}
}