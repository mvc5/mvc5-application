<?php
/**
 *
 */

namespace About\More;

use Arc5\Response;
use Arc5\Service;
use Message;
use View;

class Controller
{
    /**
     * @return \Response
     */
    function __invoke()
    {
        Message::info(Service::plugin('message'));

        return Response::response(View::render('about/more'));
    }
}
