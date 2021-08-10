<?php

namespace App\Controllers\CDR;
use App\Controllers\BaseController;


class CDR extends BaseController
{
	public function __construct(){
		$this->cdrModel = new \App\Models\CdrModel();
		helper(['filesystem']);
		$this->map = directory_map(ROOTPATH.'public/assets/audios');
	}
	public function list()	
	{		
		$cdr = $this->cdrModel->findToday();				
		$data = [
			'cdr' => $this->audiofileInCdr($cdr),
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
			$cdr = $this->cdrModel->search($values);
			$data = [
				'cdr' => $this->audiofileInCdr($cdr),
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

	/** 
    * Função para procurar um valor em um array multidimensional
    * @access private 
    * @param String $needle
    * @param String $haystack
    * @return false or path to file 
    */ 
	private function search_multi_array($needle, $haystack, $currentKey = '') {
		foreach($haystack as $key=>$value) {
			if (is_array($value)) {
				$nextKey = $this->search_multi_array($needle,$value, $currentKey . $key );
				if ($nextKey) {
					return $nextKey;
				}
			}
			//else if(preg_match("/{$needle}/", $value)) {
			else if( empty($needle) || strpos($value, $needle) !== false ) { //str_contains				
				if( strpos($currentKey, '\\') !== false ) { //str_contains
					$currentKey = str_replace('\\', '/', $currentKey);
				}
				return $currentKey . $value;
			}
		}
		return false;
	}

	/**
	* Função para acrescentar a chave audiofile ao array de cdr
	* @access private
	* @param Array $cdr
	* @return array modificado
	*/	
	private function audiofileInCdr($cdr){
		foreach($cdr as $key => $value){
			$cdr[$key]['audiofile'] = $this->search_multi_array($cdr[$key]['uniqueid'],$this->map);
		}
		return $cdr;
	}
}