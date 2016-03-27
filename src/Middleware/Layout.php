<?php
/**
 *
 */

namespace Middleware;

use Mvc5\Arg;
use Mvc5\Model\Layout as LayoutModel;
use Mvc5\Model\ViewModel;
use Mvc5\Plugin;
use Request\Psr7\HttpRequest as Request;
use Response\Psr7\HttpResponse as Response;

class Layout
{
    /**
     *
     */
    use Plugin;

    /**
     * @var LayoutModel
     */
    protected $layout;

    /**
     * @param LayoutModel $layout
     */
    public function __construct(LayoutModel $layout)
    {
        $this->layout = $layout;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param callable $next
     * @return mixed
     */
    public function __invoke(Request $request, Response $response, callable $next)
    {
        $model = $request->getAttribute(Arg::MODEL);

        if (!$model || !$model instanceof ViewModel || $model instanceof LayoutModel) {
            return $next($request, $response);
        }

        $this->layout->model($model);

        $request = $request->withAttributes([Arg::MODEL => $this->layout]);

        return $next($request, $response);
    }
}
