<?php
/**
 *
 */

namespace Home;

use Mvc5\Plugin;
use Mvc5\Service;

class Factory
    implements Service
{
    /**
     *
     */
    use Plugin;

    /**
     * @param array $config
     * @return Controller
     */
    public function __invoke(array $config)
    {
        /** @var Model $model */

        $model = $this->create(Model::class, ['home']);

        return new Controller($model);
    }
}
