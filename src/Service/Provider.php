<?php
/**
 *
 */

namespace Service;

use Plugin\Gem\Controller;
use Mvc5\Config;
use Mvc5\Resolver\Resolver;
use Mvc5\Service\Manager;

class Provider
    extends Config
    implements Manager
{
    /**
     *
     */
    use Resolver;

    /**
     * @param string|mixed $plugin
     * @param array $args
     * @return mixed
     * @throws \Throwable
     */
    protected function resolve($plugin, array $args = [])
    {
        return $this->resolvable($plugin, $args, function($plugin, array $args = []) {
            if ($plugin instanceof Controller) {
                return $this->make($plugin->config());
            }

            return null;
        });
    }
}
