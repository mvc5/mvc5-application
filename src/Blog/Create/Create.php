<?php
/**
 *
 */

namespace Blog\Create;

use Mvc5\Arg;
use Mvc5\Event\Event;
use Mvc5\Event\Signal;
use Mvc5\View\Model;

class Create
    implements Event
{
    /**
     *
     */
    use Signal;
    use Model;

    /**
     *
     */
    const EVENT = 'blog:create';

    /**
     * @return array
     */
    protected function args()
    {
        return [
            Arg::EVENT => $this,
            Arg::MODEL => $this->model()
        ];
    }

    /**
     * @param callable $callable
     * @param array $args
     * @param callable $callback
     * @return mixed
     */
    public function __invoke(callable $callable, array $args = [], callable $callback = null)
    {
        $response = $this->signal($callable, $this->args() + $args, $callback);

        $response && $this->setModel($response);

        return $response;
    }
}
