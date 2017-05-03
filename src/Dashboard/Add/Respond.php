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
     * @param ViewModel $model
     * @return ViewModel
     */
    function __invoke(Response $response, ViewModel $model = null)
    {
        return $model->with(['args' =>  array_merge([__CLASS__], $model['args'])]);
    }
}
