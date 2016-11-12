<?php
/**
 *
 */

namespace About\More;

use Mvc5\Model\ViewModel;
use Mvc5\Plugins\Render;
use Mvc5\Plugins\Service;

class Controller
{
    /**
     *
     */
    use Render;
    use Service;

    /**
     * @return ViewModel
     */
    function __invoke()
    {
        return $this->render('about/more');
    }
}
