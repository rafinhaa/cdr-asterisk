<?php
namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $table = 'ast_cdr';

    public function searchCallsStatus(){
        return $this->select('disposition, count(disposition) as total')->groupBy('disposition')->get()->getResultArray();
    }
    public function totalCalls(){
        return $this->countAll();
    }
    public function totalTimeCalls(){
        $result = $this->selectSum('duration')->get()->getResultArray();        
        $minutes = array_shift($result)['duration'];
        return gmdate("H:i:s", $minutes);
    }
}