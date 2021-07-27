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
			'scripts' => [
				'Charts.js' => 'assets/plugins/charts/chart.js',			
			],
		];
		return view('dashboard/index',array_merge($data, $this->data));
	}
}