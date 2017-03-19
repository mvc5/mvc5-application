<?php
/**
 *
 */

namespace Home;

use Mvc5\Plugins\Service;
use Mvc5\Plugins\ViewModel;
use Psr\Http\Message\RequestInterface as PsrRequest;

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
     * @param PsrRequest $request
     * @return string
     */
    function __invoke(PsrRequest $request)
    {
        return $this->model(['request' => $request]);
    }
}
