<?php

namespace App\Controllers\CDR;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function __construct(){
		$this->dashModel = model(DashboardModel::class);
	}

	public function index()
	{	
		$callsStatus = $this->dashModel->searchCallsStatus();
		foreach($callsStatus as $array) {
            $charts['label'][] = $array['disposition'];
            $charts['data'][] = $array['total'];
      	}
		$totalCalls = $this->dashModel->totalCalls();
		$totalTimeCalls = $this->dashModel->totalTimeCalls();
		$data = [
			'menuActive' => [
				'active' => 'dash',
			],			
			'scripts' => [
				'Charts.js' => 'assets/plugins/charts/chart.js',			
			],
			'charts' => $charts,
			'totalCalls' => $totalCalls,
			'totalTimeCalls' => $totalTimeCalls,
		];
		return view('dashboard/index',array_merge($data, $this->data));
	}
}