<?php
/**
 *
 */

namespace Dashboard\Add;

use Psr\Http\Message\ResponseInterface as Response;

final class Respond
{
    /**
     * @param Response $response
     * @param ViewModel $model
     * @return ViewModel
     */
    function __invoke(Response $response, ViewModel $model = null) : ViewModel
    {
        return $model->with(['args' =>  [__CLASS__, ...$model['args']]]);
    }
}
