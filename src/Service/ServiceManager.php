<?php
/**
 *
 */

namespace Service;

use Plugin\Controller;
use Mvc5\Event\Generator;
use Mvc5\Resolver\Resolver;
use Mvc5\Service\Manager;

class ServiceManager
    implements Manager
{
    /**
     *
     */
    use Generator;
    use Resolver;

    /**
     * @param string $plugin
     * @param callable $callback
     * @param array $args
     * @return mixed
     */
    public function __invoke($plugin, array $args = [], callable $callback = null)
    {
        if (!$plugin instanceof Controller) {
            return $plugin;
        }

        return $this->make($plugin->config());
    }
}
