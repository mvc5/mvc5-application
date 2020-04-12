<?php
/**
 *
 */

namespace Middleware;

use Mvc5\Plugins;
use Mvc5\Request\Request;
use Psr\Http\Message\ResponseInterface as Response;

final class Logger
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
     * @return Response
     */
    function __invoke(Request $request, Response $response, callable $next) : Response
    {
        $this->log($request->name());

        return $next($request, $response);
    }
}
