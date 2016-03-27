<?php
/**
 *
 */

namespace Middleware;

use Mvc5\Arg;
use Mvc5\View\Model as ViewModel;
use Request\Psr7\HttpRequest as Request;
use Response\Psr7\HttpResponse as Response;

class Error
{
    /**
     *
     */
    use ViewModel;

    /**
     * @param $request
     * @param $response
     * @param $next
     * @return \Mvc5\Model\ViewModel
     */
    public function __invoke(Request $request, Response $response, callable $next)
    {
        $model = $this->model([Arg::ERROR => $request->getAttribute(Arg::ROUTE)->error()]);

        $request = $request->withAttributes([Arg::MODEL => $model]);

        return $next($request, $response);
    }
}
