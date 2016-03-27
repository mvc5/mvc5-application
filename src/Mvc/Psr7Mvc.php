<?php
/**
 *
 */

namespace Mvc;

use Mvc5\Mvc;

class Psr7Mvc
    extends Mvc
{
    /**
     * Assigns response object back to the container
     *
     * @param $model
     * @return array|callable|null|object|string
     */
    protected function model($model = null)
    {
        if (null !== $model) {
            $this->response($this->response()->setContent($model));

            return $model;
        }

        return $this->response()->content();
    }
}
