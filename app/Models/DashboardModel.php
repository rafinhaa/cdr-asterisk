<?php
namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $table = 'ast_cdr';

    public function searchCallsStatus($date){
        return $this->select('disposition, count(disposition) as total')->where(['MONTH(calldate) = ' => $date->getMonth()])->groupBy('disposition')->get()->getResultArray();
    }
    public function totalCalls($date){
        return $this->where(['MONTH(calldate) = ' => $date->getMonth()])->get()->getResultArray();
    }
    public function totalTimeCalls($date){
        $result = $this->selectSum('duration')->where(['MONTH(calldate) = ' => $date->getMonth()])->get()->getResultArray();        
        $minutes = array_shift($result)['duration'];
        return gmdate("H:i:s", $minutes);
    }
}