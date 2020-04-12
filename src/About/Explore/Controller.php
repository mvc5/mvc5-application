<?php
/**
 *
 */

namespace About\Explore;

use Mvc5\Http\Request;
use Mvc5\Http\Response;
use Mvc5\Plugins;

use const Mvc5\{ BODY, CHILD_MODEL };

final class Controller
{
    /**
     *
     */
    use Plugins\Render;
    use Plugins\Service;
    use Plugins\View;

    /**
     * @param Request $request
     * @param Response $response
     * @param callable $next
     * @return Response
     */
    function __invoke(Request $request, Response $response, callable $next) : Response
    {
        $layout = $this->layout([CHILD_MODEL => $this->view('about/explore')]);

        return $next($request, $response->with(BODY, $this->render($layout)));
    }
}
