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
        return $model->with(['args' =>  array_merge([__CLASS__], $model['args'])]);
    }
}
