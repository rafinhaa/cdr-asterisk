<?php
namespace App\Models;

use CodeIgniter\Model;

class CdrModel extends Model
{
    protected $table = 'ast_cdr';

    public function search($values){
        print_r( $values);
        die;
    }
}