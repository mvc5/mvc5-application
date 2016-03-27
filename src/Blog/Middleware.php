<?php
/**
 *
 */

namespace Blog;

use Mvc5\Arg;
use Request\Psr7\HttpRequest as Request;
use Response\Psr7\HttpResponse as Response;

class Middleware
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @var string
     */
    protected $template;

    /**
     * @param Model $model
     * @param $template
     */
    public function __construct(Model $model, $template)
    {
        $this->model    = $model;
        $this->template = $template;
    }

    /**
     * @param $request
     * @param $response
     * @param $next
     * @return \Mvc5\Model\ViewModel
     */
    public function __invoke(Request $request, Response $response, callable $next)
    {
        $this->model->template($this->template);

        $request = $request->withAttributes([Arg::MODEL => $this->model]);

        return $next($request, $response);
    }
}
