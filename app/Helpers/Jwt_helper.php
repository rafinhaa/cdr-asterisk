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

function getRefreshTokenForUser(string $email){    
    $encodedEmail = base64_encode($email);
    $refreshToken = md5(uniqid(rand(), true));
    $refreshTokenTimeToLive = getenv('refreshToken.time.to.live');
    cache()->save($encodedEmail, $refreshToken, $refreshTokenTimeToLive);
    return $refreshToken;
}

function validateRefreshTokenForUser(string $email, string $refreshToken){
    $encodedEmail = base64_encode($email);
    if (! cache()->get($encodedEmail) || cache()->get($encodedEmail) !== $refreshToken) {        
        throw new Exception('Missing or invalid refreshToken');
    }
    cache()->delete($encodedEmail);
    return [
        'refreshToken' => getRefreshTokenForUser($email), 
        'token' => getSignedJWTForUser($email)
    ];
}