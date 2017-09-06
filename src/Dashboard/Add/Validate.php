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
     * @param ViewModel $model
     * @return ViewModel
     */
    function __invoke(Request $request, ViewModel $model) : ViewModel
    {
        return $model->with(['params' => $request->params(), 'args' => [__CLASS__]]);
    }
}
