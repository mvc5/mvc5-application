<?php

namespace Login\Route;

use Mvc5\Http\Error\Unauthorized;
use Mvc5\Http\Request;
use Mvc5\Route\Route;
use Valar\Http\RedirectResponse;

class Authenticate
{
    /**
     * @param Route $route
     * @return bool
     */
    protected function authenticate(Route $route) : bool
    {
        if (isset($route['authenticate'])) {
            return $route['authenticate'];
        }

        if (isset($route['parent'])) {
            return $this->authenticate($route['parent']);
        }

        return false;
    }

    /**
     * @param Request $request
     * @return Unauthorized|RedirectResponse
     */
    protected function unauthorized(Request $request)
    {
        if ('GET' === $request['method'] && !$request['accepts_json']) {
            $request['user']['redirect_url'] = $request['uri'];
            return new RedirectResponse('/login');
        }

        return new Unauthorized;
    }

    /**
     * @param Route $route
     * @param Request $request
     * @param callable $next
     * @return Unauthorized|mixed
     */
    function __invoke(Route $route, Request $request, callable $next)
    {
        return !$this->authenticate($route) || $request['user']['authenticated'] ?
            $next($route, $request) : $this->unauthorized($request);
    }
}
