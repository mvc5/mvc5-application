<?php
/**
 *
 */

namespace Home;

use Mvc5\Plugins\Service;
use Mvc5\Plugins\ViewModel;
use Request;

class Controller
{
    /**
     *
     */
    use Service;
    use ViewModel;

    /**
     *
     */
    const VIEW_MODEL = Model::class;

    /**
     * @param Request $request
     * @return string
     */
    function __invoke(Request $request)
    {
        return $this->model(['request' => $request]);
    }
}
