<?php
/**
 *
 */

namespace Dashboard\Add;

class Save
{
    /**
     * @param ViewModel $model
     * @return ViewModel
     */
    function __invoke(ViewModel $model) : ViewModel
    {
        return $model->with(['args' =>  array_merge([__CLASS__], $model['args'])]);
    }
}
