<?php

namespace App\Controllers\Api\Auth;

use CodeIgniter\RESTful\ResourceController;

class Jwt extends ResourceController
{    
    protected $format    = 'json';

	public function __construct(){
	}

    /**
     * Login.
    */
    public function login(){
        
        $auth = service('authentication');
        
        $data = array_filter(service('request')->getPost());
        if (empty($data)) {
            $data = json_decode(service('request')->getBody(), true);
        }
        if (! $auth->attempt($data, false) ){
            return $this->failUnauthorized('Email or password is invalid');
        }
    }
}