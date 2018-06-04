<?php
/**
 *
 */
namespace Api;

use Mvc5\Http;
use Mvc5\Plugins\Response;
use Mvc5\Plugins\Service;
use Mvc5\Request\Request;

class Controller
{
    /**
     *
     */
    use Response;
    use Service;

    /**
     * @param Request $request
     * @return Http\Response
     * @throws \Throwable
     */
    function __invoke(Request $request) : Http\Response
    {
        $data = $request->data();

        if (!$request->isPost()) {
            throw new \Exception('foo bar');
        }

        return $this->json(['foo' => $data['foo'], 'baz' => $data['baz']]);
    }
}
