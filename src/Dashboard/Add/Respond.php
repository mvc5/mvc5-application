<?php
/**
 *
 */

namespace Dashboard\Add;

use Psr\Http\Message\ResponseInterface as Response;

class Respond
{
    /**
     * @param Response $response
     * @param Model $model
     * @return Model
     */
    function __invoke(Response $response, Model $model = null)
    {
        return $model->with(['args' =>  array_merge([__CLASS__], $model['args'])]);
    }
}
