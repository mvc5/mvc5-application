<?php
/**
 *
 */

namespace Home;

use Mvc5\Plugins;
use Psr\Http\Message\RequestInterface as Request;

final class Controller
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
     * @return ViewModel
     */
    function __invoke(Request $request) : ViewModel
    {
        return $this->model(['request' => $request]);
    }
}
