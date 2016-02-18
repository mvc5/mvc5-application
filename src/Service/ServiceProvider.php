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
     * @param array $params
     * @return mixed
     */
    public function __invoke(Resolvable $plugin, array $params = [])
    {
        return $this->plugin($plugin, $params);
    }
}
