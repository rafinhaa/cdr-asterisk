<?php

namespace App\Controllers\CDR;
use App\Controllers\BaseController;

class CDR extends BaseController
{
	public function __construct(){
		$cdrModel  = new \App\Models\CdrModel();
	}
	public function list()
	{	
		$cdrModel  = new \App\Models\CdrModel();
		$data = [
			'cdr' => $cdrModel->findAll(),
			'menuActive' => [
				'active' => 'cdr',
			],
		];
		return view('cdr/list',array_merge($data, $this->data));
	}
}