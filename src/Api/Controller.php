<?php
/**
 *
 */
namespace Api;

use Mvc5\Http\Response;
use Mvc5\Request\Request;
use Mvc5\Response\JsonResponse;

class Controller
{
    /**
     * @param Request $request
     * @return Response
     * @throws \Throwable
     */
    function __invoke(Request $request) : Response
    {
        $data = $request->data();

        if (!$request->isPost()) {
            throw new \Exception('foo bar');
        }

        return new JsonResponse(['foo' => $data['foo'], 'baz' => $data['baz']]);
    }
}
