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
			'cdr' => $cdrModel->findToday(),
			'dateStart' => \CodeIgniter\I18n\Time::today()->format('d/m/Y'),
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

			$rules = [
				'dt-start' => [
					'rules' => 'permit_empty|valid_date[d/m/Y]',				
					'errors' => [
						'valid_date' => 'A data está no formato inválido',
					],
				],
				'dt-end' => [
					'rules' => 'permit_empty|valid_date[d/m/Y]',				
					'errors' => [
						'valid_date' => 'A data está no formato inválido',
					],
				],
				'input-value' => [
					'rules' => 'permit_empty',
				],
			];

			if (! $this->validate($rules))
			{
				return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
			}	

			$values = $this->request->getPost();
			if(!empty($values['dt-start'])){
				$dtStart = explode('/',$values['dt-start']);
				$values['dt-starter'] = $dtStart[2] . '-' . $dtStart[1] . '-' . $dtStart[0];								
			}
			if(!empty($values['dt-end'])){
				$dtender = explode('/',$values['dt-end']);			
				$values['dt-ender'] = $dtender[2] . '-' . $dtender[1] . '-' . $dtender[0];
			}
			switch($values['status']){
				case 2:
					$values['status'] = 'ANSWERED'; break;
				case 3:
					$values['status'] = 'BUSY'; break;
				case 4:
					$values['status'] = 'FALIED'; break;
				case 5:
					$values['status'] = 'NO ANWSER'; break;
			}
			switch($values['field-cdr']){
				case 1:
					$values['field-cdr'] = 'dst'; break;
				case 2:
					$values['field-cdr'] = 'src'; break;
				case 3:
					$values['field-cdr'] = 'channel'; break;
				case 4:
					$values['field-cdr'] = 'dstchannel'; break;
			}
			$cdrModel = new \App\Models\CdrModel();
			
			$data = [
				'cdr' => $cdrModel->search($values),
				'dateStart' => $values['dt-start'],
				'dateEnd' => $values['dt-end'],
				'input_value' => $values['input-value'],
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