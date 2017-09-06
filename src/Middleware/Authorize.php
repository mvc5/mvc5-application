<?php
/**
 *
 */

namespace Middleware;

use Mvc5\Plugins;
use Mvc5\Request\Request;
use Psr\Http\Message\ResponseInterface as Response;

class Authorize
{
    /**
     *
     */
    use Plugins\Messages;
    use Plugins\Response;
    use Plugins\Service;
    use Plugins\Url;

    /**
     * @return Response
     */
    protected function error() : Response
    {
        $this->danger('Access denied!');
        return $this->redirect($this->url('dashboard'));
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param callable $next
     * @return Response
     */
    function __invoke(Request $request, Response $response, callable $next) : Response
    {
        return 'phpdev' === $request->user()->username() ? $next($request, $response) : $this->error();
    }
}
