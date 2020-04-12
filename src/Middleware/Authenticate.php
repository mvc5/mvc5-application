<?php
/**
 *
 */

namespace Middleware;

use Mvc5\Plugins;
use Mvc5\Http\Request;
use Psr\Http\Message\ResponseInterface as Response;

use const Mvc5\USER;

final class Authenticate
{
    /**
     *
     */
    use Plugins\Response;
    use Plugins\Service;
    use Plugins\Url;

    /**
     * @param Request $request
     * @param Response $response
     * @param callable $next
     * @return mixed
     */
    function __invoke(Request $request, Response $response, callable $next) : Response
    {
        return $request[USER]->authenticated()
            ? $next($request, $response) : $this->redirect($this->url(['app', 'controller' => 'login']));
    }
}
