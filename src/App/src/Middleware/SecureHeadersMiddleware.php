<?php

declare(strict_types=1);

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class SecureHeadersMiddleware implements MiddlewareInterface
{
    /**
     * Add all the base security headers for a secure application
     *
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler) : ResponseInterface
    {
        /*$response = $handler->handle($request);

        if ($response->hasHeader('Content-Length')) {
            return $response;
        }
        $response = $response->withHeader('X-Content-Type-Options', 'nosniff');*/
        $response = $handler->handle($request->withHeader('X-Content-Type-Options', 'nosniff'));

        return $response;
    }
}
