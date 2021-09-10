<?php

namespace App\Controllers\Api\Auth;

use CodeIgniter\RESTful\ResourceController;
use Exception;

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
        try {
            helper('Jwt_helper');
            return $this->respond(
                    [
                        'status' => '200',
                        'error' => false,
                        'messages' => [
                            'success' => 'New refresh token generated',
                        ],
                        'data' => [
                            'user' => $data['email'],
                            'access_token' => getSignedJWTForUser($data['email']),
                            'refresh_token' => getRefreshTokenForUser($data['email']),
                        ],
                    ],
                );
        } catch (Exception $exception) {
            return $this->failUnauthorized($exception->getMessage());
        }
    }

    public function refreshToken(){
        $data = array_filter(service('request')->getPost());
        if (empty($data)) {
            $data = json_decode(service('request')->getBody(), true);
        }
        try {
            helper('Jwt_helper');
            $result = validateRefreshTokenForUser($data['email'], $data['refreshToken']);
            return $this->respond(
                [
                    'status' => '200',
                    'error' => false,
                    'messages' => [
                        'success' => 'User authenticated successfully',
                    ],
                    'data' => [
                        'user' => $data['email'],
                        'access_token' => $result['token'],
                        'refresh_token' => $result['refreshToken'],
                    ],
                ],
            );  
        } catch (Exception $exception) {
            return $this->failUnauthorized($exception->getMessage());
        }              
    }
}