<?php
/**
 *
 */

namespace Middleware;

use Mvc5\Plugins\Log;
use Mvc5\Plugins\Service;
use Mvc5\Request\Request;
use Psr\Http\Message\ResponseInterface as PsrResponse;

class Logger
{
    /**
     *
     */
    use Log;
    use Service;

    /**
     * @param Request $request
     * @param PsrResponse $response
     * @param callable $next
     * @return mixed
     */
    function __invoke(Request $request, PsrResponse $response, callable $next)
    {
        $this->log($request->name());

        return $next($request, $response);
    }
}
