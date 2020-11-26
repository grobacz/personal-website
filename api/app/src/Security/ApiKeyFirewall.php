<?php

namespace App\Security;

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface;
use Spiral\Auth\Middleware\Firewall\AbstractFirewall;
use Spiral\Boot\EnvironmentInterface;

class ApiKeyFirewall extends AbstractFirewall
{
    private EnvironmentInterface $environment;

    public function __construct(EnvironmentInterface $environment)
    {
        $this->environment = $environment;
    }

    public function process(Request $request, RequestHandlerInterface $handler): Response
    {
        if (
            ($apiKey = $request->getHeader('X-API-KEY')[0] ?? null)
            && $apiKey === $this->environment->get('API_KEY')
        ) {
            return $this->grantAccess($request, $handler);
        }
        
        return $this->denyAccess($request, $handler);
    }

    protected function denyAccess(Request $request, RequestHandlerInterface $handler): Response
    {
        return new JsonResponse("Access denied", 401);
    }
}