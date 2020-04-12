<?php
/**
 *
 */

namespace Home;

use Mvc5\Plugins\Service;

final class Factory
{
    /**
     *
     */
    use Service;

    /**
     * @param array $config
     * @return Controller
     */
    function __invoke(array $config) : Controller
    {
        return new Controller($this->service);
    }
}
