<?php
/**
 *
 */

namespace Blog\Remove;

use Mvc5\Arg;
use Request\Psr7\HttpRequest as Request;
use Response\Psr7\HttpResponse as Response;

class Middleware
{
    /**
     * @param $layout
     */
    public function __construct($layout)
    {
        $this->layout = $layout;
    }

    /**
     * @param $request
     * @param $response
     * @param $next
     * @return \Mvc5\Model\ViewModel
     */
    public function __invoke(Request $request, Response $response, callable $next)
    {
        $this->layout->model('<h1>Demo Middleware Action</h1>');

        $request = $request->withAttributes([Arg::MODEL => $this->layout]);

        return $next($request, $response);
    }
}
