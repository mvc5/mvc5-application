<?php
/**
 *
 */

namespace Dashboard\Add;

class Save
{
    /**
     * @param Model $model
     * @return Model
     */
    function __invoke(Model $model)
    {
        $model->vars(['args' =>  array_merge([__CLASS__], $model['args'])]);

        return $model;
    }
}
