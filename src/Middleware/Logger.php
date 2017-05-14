<?php
/**
 *
 */

namespace Middleware;

use Mvc5\Plugins;
use Mvc5\Request\Request;
use Psr\Http\Message\ResponseInterface as Response;

class Logger
{
    /**
     *
     */
    use Plugins\Log;
    use Plugins\Service;

    /**
     * @param Request $request
     * @param Response $response
     * @param callable $next
     * @return mixed
     */
    function __invoke(Request $request, Response $response, callable $next)
    {
        $this->log($request->name());

        return $next($request, $response);
    }
}
