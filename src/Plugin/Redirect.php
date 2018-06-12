<?php
/**
 *
 */

namespace Plugin;

use Mvc5\Arg;
use Mvc5\Http\Request;
use Mvc5\Http\Response;
use Mvc5\Plugin\Call;
use Mvc5\Plugin\Plugin;

class Redirect
    extends Call
{
    /**
     * @param string $url
     * @param int|null $status
     * @param array $headers
     */
    function __construct(string $url, int $status = 302, array $headers = [])
    {
        parent::__construct([$this, '__invoke'], [new Plugin(Arg::RESPONSE_REDIRECT, [$url, $status, $headers])]);
    }

    /**
     * @param Response $response
     * @return \Closure
     */
    function __invoke(Response $response) : \Closure
    {
        return function(Request $request) use($response) {
            return $response;
        };
    }
}
