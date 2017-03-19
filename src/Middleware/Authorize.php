<?php
/**
 *
 */

namespace Middleware;

use Mvc5\Plugins\Messages;
use Mvc5\Plugins\Response as _Response;
use Mvc5\Plugins\Service;
use Mvc5\Plugins\Url;
use Mvc5\Request\Request;
use Psr\Http\Message\ResponseInterface as PsrResponse;

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
     * @return mixed|PsrResponse
     */
    protected function error()
    {
        $this->danger('Access denied!');
        return $this->redirect($this->url('dashboard'));
    }

    /**
     * @param Request $request
     * @param PsrResponse $response
     * @param callable $next
     * @return PsrResponse
     */
    function __invoke(Request $request, PsrResponse $response, callable $next)
    {
        return 'phpdev' === $request->user()->username() ? $next($request, $response) : $this->error();
    }
}
