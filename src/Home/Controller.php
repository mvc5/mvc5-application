<?php
/**
 *
 */

namespace Home;

use Mvc5\Plugins\Service;
use Mvc5\Plugins\View;
use Psr\Http\Message\RequestInterface as PsrRequest;

class Controller
{
    /**
     *
     */
    use Service;
    use View;

    /**
     *
     */
    const VIEW_MODEL = ViewModel::class;

    /**
     * @param PsrRequest $request
     * @return string
     */
    function __invoke(PsrRequest $request)
    {
        return $this->model(['request' => $request]);
    }
}
