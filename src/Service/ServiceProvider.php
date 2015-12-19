<?php
/**
 *
 */

namespace Service;

use Mvc5\Plugin;
use Mvc5\Resolvable;

class ServiceProvider
{
    /**
     *
     */
    use Plugin;

    /**
     * @param Resolvable $plugin
     * @return mixed
     */
    public function __invoke(Resolvable $plugin)
    {
        return $this->plugin($plugin);
    }
}
