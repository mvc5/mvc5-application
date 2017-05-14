<?php
/**
 *
 */

namespace Overview;

use Mvc5\ViewModel;
use Mvc5\View\ViewLayout;
use Mvc5\Plugins;
use Psr\Http\Message\RequestInterface as Request;

class Controller
{
    /**
     *
     */
    use Plugins\Messages;
    use Plugins\Render;
    use Plugins\Service;
    use Plugins\View;

    /**
     *
     */
    const VIEW_MODEL = ViewModel::class;

    /**
     *
     */
    const TEMPLATE = 'overview/index';

    /**
     * @param Request $request
     * @param ViewLayout $layout
     * @return string
     */
    function __invoke(Request $request, ViewLayout $layout)
    {
        $this->warning('Documentation is maintained at <a href="https://mvc5.github.io">https://mvc5.github.io</a>', 'overview');

        return $this->render($layout->withModel($this->model()));
    }
}
