<?php
/**
 *
 */

namespace Home;

use Mvc5\Arg;
use Mvc5\View\Model as ViewModel;
use Request\Psr7\HttpRequest as Request;
use Response\Psr7\HttpResponse as Response;

class Middleware
{
    /**
     *
     */
    use ViewModel;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param $request
     * @param $response
     * @param $next
     * @return \Mvc5\Model\ViewModel
     */
    public function __invoke(Request $request, Response $response, callable $next)
    {
        $request = $request->withAttributes([Arg::MODEL => $this->model(['args' => [__FUNCTION__]])]);

        return $next($request, $response);
    }
}
