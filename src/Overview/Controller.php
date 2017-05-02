<?php
/**
 *
 */

namespace Overview;

use Mvc5\ViewModel as _ViewModel;
use Mvc5\View\ViewLayout;
use Mvc5\Plugins\Messages;
use Mvc5\Plugins\Render;
use Mvc5\Plugins\Service;
use Mvc5\Plugins\ViewModel;
use Psr\Http\Message\RequestInterface as PsrRequest;

class Controller
{
    /**
     *
     */
    use Messages;
    use Render;
    use Service;
    use ViewModel;

    /**
     *
     */
    const VIEW_MODEL = _ViewModel::class;

    /**
     *
     */
    const TEMPLATE_NAME = 'overview/index';

    /**
     * @param PsrRequest $request
     * @param ViewLayout $layout
     * @return string
     */
    function __invoke(PsrRequest $request, ViewLayout $layout)
    {
        $this->warning('Documentation is maintained at <a href="https://mvc5.github.io">https://mvc5.github.io</a>', 'overview');

        return $this->render($layout->withModel($this->model()));
    }
}
