<?php

namespace App\Filters;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use Exception;

class JwtAuthenticationFilter implements FilterInterface
{
    use ResponseTrait;

    public function before(RequestInterface $request, $arguments = null)
    {
        $authenticationHeader = $request->getServer('HTTP_AUTHORIZATION');

        try {
            helper('Jwt');
            $encodedToken = getJWTFromRequest($authenticationHeader);
            validateJWTFromRequest($encodedToken);
            return $request;
        } catch (Exception $e) {
            return Services::response()
                ->setJSON(
                    [
                        'status' => 401,
                        'error' => true,
                        'messages' => [
                            'error' => $e->getMessage(),
                        ],                        
                    ]
                )
                ->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {

    }
}
