<?php
/**
 *
 */

namespace Home;

use Mvc5\Plugins;
use Psr\Http\Message\RequestInterface as Request;

class Controller
{
    /**
     *
     */
    use Plugins\Service;
    use Plugins\View;

    /**
     *
     */
    const VIEW_MODEL = ViewModel::class;

    /**
     * @param Request $request
     * @return string
     */
    function __invoke(Request $request)
    {
        return $this->model(['request' => $request]);
    }
}
