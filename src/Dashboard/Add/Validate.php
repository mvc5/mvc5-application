<?php
/**
 *
 */

namespace Dashboard\Add;

use Mvc5\Request\Request;

class Validate
{
    /**
     * @param Request $request
     * @param Model $model
     * @return Model
     */
    function __invoke(Request $request, Model $model)
    {
        return $model->with(['params' => $request->params(), 'args' => [__CLASS__]]);
    }
}
