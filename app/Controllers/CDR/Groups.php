<?php

namespace App\Controllers\CDR;
use App\Controllers\BaseController;

class Groups extends BaseController
{

	public function __construct()
	{
		$this->authorize = service('authorization');
		helper('array');
	}

	public function list()
	{
		$data = [
			'scripts' => [
				'DataTables' => 'assets/plugins/data-tables/jquery.datatables.min.js',
				'Bootstrap4-DT' => 'assets/plugins/data-tables/datatables.bootstrap4.min.js',
				'DataTables Default' => 'assets/plugins/data-tables/default.datatable.js',		
			],
			'css' => [
				'DataTables' => 'assets/plugins/data-tables/datatables.bootstrap4.min.css',				
			],
			'menuActive' => [
				'active' => 'config',
				'col' => 'groups',				
			],
			'groups' => $this->authorize->groups(),
		];
		return view('config/groups/list',array_merge($data, $this->data));
	}
	public function edit($id = null){
		if(is_null($id)){
			return redirect()->to('config/groups')->with('message', 'Esse grupo não existe');
		}		
		if(!$group = $this->authorize->group($id)){
			return redirect()->to('config/groups')->with('message', 'Esse grupo não existe');
		}
		
		$data = [
			'group' => $this->authorize->group($id),			
			'permitions' => array_column($this->authorize->groupPermissions($id), 'name'),			
			'usersInGroup' => $this->authorize->usersInGroup($id),			
			'menuActive' => [
				'col' => 'config',
				'active' => null,
			],
		];
        return view('config/groups/edit',array_merge($data, $this->data));
	}
	public function store(){
		$rules = [
			'name' => [
				'rules' => 'required|min_length[3]|max_length[30]',				
				'errors' => [
					'required' => 'Nome do grupo é necessário',
					'min_length' => 'O grupo deve conter pelo menos 3 caracteres',
					'max_length' => 'O grupo não pode ultrapassar 30 caracteres',
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

		if (! $this->validate($rules))
		{
			return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
		}
		if(!$groupId = $this->authorize->group($this->request->getPost('id'))){
			return redirect()->to('config/groups')->with('message', 'Esse grupo não existe');
		}
		$name = $this->request->getPost('name');
		$description = $this->request->getPost('description');

		if(!$this->authorize->updateGroup($groupId->id, $name, $description)){
			return redirect()->to('config/groups')->with('message', 'Ocorreu um erro ao alterar o nome e descrição');
		}

		$permitions = array_column($this->authorize->groupPermissions($groupId->id), 'name');
		$usersAdd = $this->request->getPost('users-add');
		$usersEdit = $this->request->getPost('users-edit');
		$usersList = $this->request->getPost('users-list');
		$usersRemove = $this->request->getPost('users-remove');
		$usersStatus = $this->request->getPost('users-status');	

		if($usersAdd && !in_array('users-add',$permitions)){
			$this->authorize->addPermissionToGroup('users-add',$groupId->id);
		}else if (in_array('users-add',$permitions) && !$usersAdd ){
			$this->authorize->removePermissionFromGroup('users-add',$groupId->id);
		}
		if($usersEdit && !in_array('users-edit',$permitions)){
			$this->authorize->addPermissionToGroup('users-edit',$groupId->id);
		}else if (in_array('users-edit',$permitions) && !$usersEdit ){
			$this->authorize->removePermissionFromGroup('users-edit',$groupId->id);
		}
		if($usersList && !in_array('users-list',$permitions)){
			$this->authorize->addPermissionToGroup('users-list',$groupId->id);
		}else if (in_array('users-list',$permitions) && !$usersList ){
			$this->authorize->removePermissionFromGroup('users-list',$groupId->id);
		}
		if($usersRemove && !in_array('users-remove',$permitions)){
			$this->authorize->addPermissionToGroup('users-remove',$groupId->id);
		}else if (in_array('users-remove',$permitions) && !$usersRemove ){
			$this->authorize->removePermissionFromGroup('users-remove',$groupId->id);
		}
		if($usersStatus && !in_array('users-status',$permitions)){
			$this->authorize->addPermissionToGroup('users-status',$groupId->id);
		}else if (in_array('users-status',$permitions) && !$usersStatus ){
			$this->authorize->removePermissionFromGroup('users-status',$groupId->id);
		}
		return redirect()->back();
	}
}