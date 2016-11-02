<?php
/**
 *
 */

namespace Dashboard\Add;

use Request;

class Validate
{
    /**
     * @param Request $request
     * @param Model $model
     * @return Model
     */
    function __invoke(Request $request, Model $model)
    {
        $model->vars(['params' => $request->params(), 'args' => [__CLASS__]]);

        return $model;
    }
}