<?php
/**
 *
 */

namespace Service;

use Home\Model as HomeModel;
use Mvc5\Plugin;
use Mvc5\Resolvable;
use Plugin\Gem\Controller;

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
        if (!$plugin instanceof Controller) {
            return $plugin;
        }

        $home = $plugin->config();

        return new $home($this->plugin(HomeModel::class));
    }
}
