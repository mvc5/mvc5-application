<?php
/**
 *
 */

namespace Middleware;

use Mvc5\Arg;
use Mvc5\Signal;
use Mvc5\Route\Route;
use Request\Psr7\HttpRequest as Request;
use Response\Psr7\HttpResponse as Response;
use RuntimeException;

class Router
{
    /**
     *
     */
    use Signal;

    /**
     * @var callable
     */
    protected $router;

    /**
     * @param callable
     */
    public function __construct(callable $router)
    {
        $this->router = $router;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param callable $next
     * @return mixed
     */
    public function __invoke(Request $request, Response $response, callable $next)
    {
        $result = $this->signal($this->router, [Arg::REQUEST => $request, Arg::RESPONSE => $response]);

        if ($result instanceof Route) {
            $request = $request->withAttributes([Arg::ROUTE => $result]);

            return $next($request, $response);
        }

        if ($result instanceof Response) {
            return $result;
        }

        throw new RuntimeException('Invalid route response');
    }
}
