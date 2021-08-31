<?php
namespace App\Models;

use CodeIgniter\Model;

class CdrModel extends Model
{
    protected $table = 'ast_cdr';

    public function search($values){
        $whereArray = [];
        (!empty($values["dt-starter"])) ? $whereArray['calldate >='] = $values["dt-starter"] : null;
        (!empty($values["dt-ender"]))   ? $whereArray['calldate <='] = $values["dt-ender"] : null;        
        (!empty($values["status"]) && !is_numeric($values["status"]) ) ? $whereArray['disposition ='] = $values["status"] : null;        
        (!empty($values["input-value"]))   ? $whereArray[ $values["field-cdr"] ] = $values["input-value"] : null;
        return $this->where($whereArray)->get()->getResultArray();
    }
    public function findToday(){ 
        $date = \CodeIgniter\I18n\Time::today();
        return $this->where(['calldate >=' => $date])->get()->getResultArray();
    }
}