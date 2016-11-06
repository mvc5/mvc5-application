<?php
/**
 *
 */

namespace Middleware;

use Mvc5\Plugins\Messages;
use Mvc5\Plugins\Response as _Response;
use Mvc5\Plugins\Service;
use Mvc5\Plugins\Url;
use Mvc5\Response\Redirect;
use Request;
use Response;

class Authorize
{
    /**
     *
     */
    use Messages;
    use _Response;
    use Service;
    use Url;

    /**
     * @return Redirect
     */
    protected function error()
    {
        $this->danger('Access denied!');
        return $this->redirect($this->url('dashboard'));
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param callable $next
     * @return Response|Redirect
     */
    function __invoke(Request $request, Response $response, callable $next)
    {
        return 'phpdev' === $request->user()->username() ? $next($request, $response) : $this->error();
    }
}
