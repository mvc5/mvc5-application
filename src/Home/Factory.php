<?php
/**
 *
 */

namespace Home;

use Mvc5\Plugin;

class Factory
{
    /**
     *
     */
    use Plugin;

    /**
     * @param array $config
     * @return Controller
     */
    function __invoke(array $config)
    {
        return new Controller($this->service);
    }
}
