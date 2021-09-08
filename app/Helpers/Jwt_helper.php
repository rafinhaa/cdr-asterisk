<?php

use App\Models\UserModel;
use Config\Services;
use Firebase\JWT\JWT;

function getJWTFromRequest($authenticationHeader): string {
    if (is_null($authenticationHeader)) { //JWT is absent
        throw new Exception('Missing or invalid JWT in request');
    }
    //JWT is sent from client in the format Bearer XXXXXXXXX
    return explode(' ', $authenticationHeader)[1];
}

function validateJWTFromRequest(string $encodedToken){
    $key = getenv('jwt.secret.key');
    $decodedToken = JWT::decode($encodedToken, $key, ['HS256']);
    $userModel = new UserModel();
    $userModel->findUserByEmailAddress($decodedToken->email);
}

function getSignedJWTForUser(string $email){
    $issuedAtTime = time();
    $tokenTimeToLive = getenv('jwt.time.to.live');
    $tokenExpiration = $issuedAtTime + $tokenTimeToLive;
    $payload = [
        'email' => $email,
        'iat' => $issuedAtTime,
        'exp' => $tokenExpiration,
    ];

    $jwt = JWT::encode($payload, getenv('jwt.secret.key'));
    return $jwt;
}