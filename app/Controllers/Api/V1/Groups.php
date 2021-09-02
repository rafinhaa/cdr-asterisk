<?php

namespace App\Controllers\Api\V1;

use CodeIgniter\RESTful\ResourceController;

class Groups extends ResourceController
{   	 
    protected $format    = 'json';
	protected $authorize;
	
	public function __construct(){
		$this->authorize = service('authorization');
	}

    /**
     * Show all users.
    */
    public function index(){
        $response = [
			'status' => 200,
			"error" => false,
			'messages' => ['success' => 'All groups listed'],
			'data' => $this->authorize->groups(),
		];
        return $this->respond($response);
    }

    /**
	 * Return the properties of a resource object
	 *
	 * @return mixed
	 */
	public function show($id = null){
        $data = $this->authorize->group($id);
        if(!$data){
            return $this->failNotFound('Group not found');
        }
		$response = [
			'status' => 200,
			"error" => false,
			'messages' => ['success' => 'Listed single group'],
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
			'name' => [
				'rules' => 'required|min_length[3]|max_length[30]|is_unique[auth_groups.name]',				
				'errors' => [
					'required' => 'Nome do grupo é necessário',
					'min_length' => 'O grupo deve conter pelo menos 3 caracteres',
					'max_length' => 'O grupo não pode ultrapassar 30 caracteres',
					'is_unique' => 'Já existe grupo com esse nome',
				],
			],
			'description' => [
				'rules' => 'required|min_length[3]|max_length[30]',				
				'errors' => [
					'required' => 'Descrição do grupo é necessário',
					'min_length' => 'O grupo deve conter pelo menos 3 caracteres',
					'max_length' => 'O grupo não pode ultrapassar 30 caracteres',
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
		$data = array_filter(service('request')->getPost());
		if (empty($data)) {
			$data = json_decode(service('request')->getBody(), true);
		}
		if(!$id = $this->authorize->createGroup($data['name'], $data['description'])){
			return $this->respond([
				'status' => 500,
				'error' => true,
				'messages' => [
					'error' => $this->authorize->createGroup()->errors(),
				],
				'data' => []
			],500);
		}
		
		return $this->respondCreated([
			'status' => 201,
			'error' => false,
			'messages' => [
				'error' => 'Group added successfully',
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
		if(!$this->authorize->group($id)){
			return $this->failNotFound('Group not found');
		}

		$rules = [
			'name' => [
				'rules' => 'permit_empty|min_length[3]|max_length[30]|update_name['. $id .']',				
				'errors' => [
					'min_length' => 'O grupo deve conter pelo menos 3 caracteres',
					'max_length' => 'O grupo não pode ultrapassar 30 caracteres',
					'update_name' => 'Já existe grupo com esse nome',
				],
			],
			'description' => [
				'rules' => 'permit_empty|min_length[3]|max_length[30]',				
				'errors' => [
					'min_length' => 'O grupo deve conter pelo menos 3 caracteres',
					'max_length' => 'O grupo não pode ultrapassar 30 caracteres',
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
		$data = array_filter(service('request')->getPost());
		if (empty($data)) {
			//convert request body to associative array
			$data = json_decode(service('request')->getBody(), true);
		};


		if (! $this->authorize->updateGroup($id, $data['name'], $data['description']))
			{
				return $this->respond([
					'status' => 500,
					'error' => true,
					'messages' => [
						'error' => $this->authorize->errors(),
					],
					'data' => []
				],500);
			}
			return $this->respond([
				'status' => 200,
				'error' => false,
				'messages' => [
					'success' => 'Group updated successfully',
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
		if(!$this->authorize->group($id)){
			return $this->failNotFound('Group not found');
		}
		if ($this->authorize->deleteGroup($id)){
			return $this->respondDeleted([
				'status' => 200,
				'error' => false,
				'messages' => [
					'success' => 'Group deleted successful',
				],
				'data' => []
			]);
		}
		return $this->respond([
			'status' => 500,
			'error' => true,
			'messages' => [
				'error' => $this->authorize->group()->errors(),
			],
			'data' => []
		],500);
	}
}