<?php

namespace App\Controllers\CDR;
use App\Controllers\BaseController;

class Groups extends BaseController
{

	public function __construct()
	{
		$this->authorize = service('authorization');
	}

	public function list()
	{		/*
			'permitions' => $authorize->hasPermission('users-add', 1),
			'userPermitions' =>$authorize->doesUserHavePermission(1,'users-add'),*/

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
			'permitions' => $this->authorize->group($id),			
			'menuActive' => [
				'col' => 'config',
				'active' => null,
			],
		];
        return view('config/groups/edit',array_merge($data, $this->data));
	}
}