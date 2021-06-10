<?php

namespace App\Controllers\CDR;
use App\Controllers\BaseController;

class Users extends BaseController
{
	public function add()
	{	
		$data = [
			'menuActive' => [
				'col' => 'users',
				'active' => 'add',
			],
		];
        return view('users/add',$data);
	}
	public function store()
	{	
		die;
	}
}