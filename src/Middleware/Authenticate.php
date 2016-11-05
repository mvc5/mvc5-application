<?php
/**
 *
 */

namespace Middleware;

use Mvc5\Plugins\Response as _Response;
use Mvc5\Plugins\Service;
use Mvc5\Plugins\Url;
use Request;
use Response;

class Authenticate
{
    /**
     *
     */
    use _Response;
    use Service;
    use Url;

    /**
     * @param Request $request
     * @param Response $response
     * @param callable $next
     * @return mixed
     */
    function __invoke(Request $request, Response $response, callable $next)
    {
        return $request->user()->authenticated()
            ? $next($request, $response) : $this->redirect($this->url('app', ['controller' => 'login']));
    }
}
