<?php
/**
 *
 */

namespace Home;

use Mvc5\Plugins\Service;

class Factory
{
    /**
     *
     */
    use Service;

    /**
     * @param array $config
     * @return Controller
     */
    function __invoke(array $config)
    {
        return new Controller($this->service);
    }
}
