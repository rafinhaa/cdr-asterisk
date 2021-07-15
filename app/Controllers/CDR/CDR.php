<?php

namespace App\Controllers\CDR;
use App\Controllers\BaseController;

class CDR extends BaseController
{
	public function __construct(){
		$cdrModel = new \App\Models\CdrModel();
	}
	public function list()	
	{	
		$cdrModel = new \App\Models\CdrModel();
		$data = [
			'cdr' => $cdrModel->findAll(),
			'menuActive' => [
				'active' => 'cdr',
			],			
			'scripts' => [
				'DataTables' => 'assets/plugins/jquery-mask-input/jquery.mask.min.js',			
			],
		];
		return view('cdr/list',array_merge($data, $this->data));
	}
	public function search()
	{	
		if($this->request->getMethod() == 'post'){
			$values = $this->request->getPost();
			$dtStart = $this->request->getPost('dt-start');
			$dtEnd = $this->request->getPost('dt-end');
			$fieldCdr = $this->request->getPost('field-cdr');
			$inputValue = $this->request->getPost('input-value');
			$status = $this->request->getPost('status');
			
			$cdrModel = new \App\Models\CdrModel();
			$data = [
				'cdr' => $cdrModel->search($values),
				'menuActive' => [
					'active' => 'cdr',
				],			
				'scripts' => [
					'DataTables' => 'assets/plugins/jquery-mask-input/jquery.mask.min.js',			
				],
			];
			return view('cdr/list',array_merge($data, $this->data));
		}
		return redirect()->back()->with('error',"A ação que você soliticou não é válida");
	}
}