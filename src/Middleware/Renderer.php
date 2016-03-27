<?php
/**
 *
 */

namespace Middleware;

use Mvc5\Arg;
use Mvc5\Plugin;
use Slim\Http\RequestBody;
use Request\Psr7\HttpRequest as Request;
use Response\Psr7\HttpResponse as Response;

class Renderer
{
    /**
     *
     */
    use Plugin;

    /**
     * @param Request $request
     * @param Response $response
     * @param callable $next
     * @return callable|mixed|null|object
     */
    public function __invoke(Request $request, Response $response, callable $next)
    {
        $model = $request->getAttribute(Arg::MODEL);

        $body = $this->call(Arg::VIEW_RENDER, [Arg::MODEL => $model]);

        $stream = new RequestBody;
        $stream->write((string) $body);

        $response = $response->withBody($stream);

        return $next($request, $response);
    }
}
