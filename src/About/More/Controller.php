<?php
/**
 *
 */

namespace About\More;

use Arc5\Response;
use Arc5\Service;
use Message;
use Mvc5\Http;
use View;

final class Controller
{
    /**
     * @return Http\Response
     */
    function __invoke() : Http\Response
    {
        Message::info(Service::plugin('message'));

        return Response::response(View::render('/about/more'));
    }
}
