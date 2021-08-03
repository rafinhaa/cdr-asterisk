<?php

namespace App\Controllers\CDR;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function __construct(){
		$this->dashModel = model(DashboardModel::class);
		$this->date = \CodeIgniter\I18n\Time::today();
	}

	public function index()
	{	
		$callsStatus = $this->dashModel->searchCallsStatus($this->date);
		$charts = null;
		foreach($callsStatus as $array) {
            $charts['label'][] = $array['disposition'];
            $charts['data'][] = $array['total'];
      	}
		$totalCalls = $this->dashModel->totalCalls($this->date);
		$totalTimeCalls = $this->dashModel->totalTimeCalls($this->date);
		$lastCalls = $this->dashModel->lastCalls($this->date, 10);
		$data = [
			'menuActive' => [
				'active' => 'dash',
			],			
			'scripts' => [
				'Charts.js' => 'assets/plugins/charts/chart.js',			
				'Charts' => 'assets/js/app/dash/charts.js',			
			],
			'charts' => $charts,
			'totalCalls' => $totalCalls,
			'totalTimeCalls' => $totalTimeCalls,
			'lastCalls' => $lastCalls,
		];
		return view('dashboard/index',array_merge($data, $this->data));
	}
}