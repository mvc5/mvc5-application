<?php
/**
 *
 */

namespace Plugin;

use Mvc5\Arg;
use Mvc5\Http\Request;
use Mvc5\Plugin\Call;
use Mvc5\Plugin\Invoke;
use Mvc5\Plugin\Plugin;

class Redirect
    extends Call
{
    /**
     * @param string $url
     * @param int $status
     * @param array $headers
     */
    function __construct(string $url, int $status = 302, array $headers = [])
    {
        parent::__construct([$this, '__invoke'], [$url, $status, $headers]);
    }

    /**
     * @param string $url
     * @param int $status
     * @param array $headers
     * @return Invoke
     */
    function __invoke(string $url, int $status, array $headers) : Invoke
    {
        return new Invoke(fn(Request $request) =>
            new Plugin(Arg::RESPONSE_REDIRECT, [$url, $status, $headers]));
    }
}
