<?php

namespace App\Controllers\CDR;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function index()
	{	
		$data = [
			'menuActive' => [
				'active' => 'dash',
			],
		];		
        return view('layouts/template',array_merge($data, $this->data));
	}
}