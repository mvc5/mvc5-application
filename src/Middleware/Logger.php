<?php
/**
 *
 */

namespace Middleware;

use Mvc5\Plugins\Log;
use Mvc5\Plugins\Service;
use Request;
use Response;

class Logger
{
    /**
     *
     */
    use Log;
    use Service;

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