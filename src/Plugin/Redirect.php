<?php
/**
 *
 */

namespace Plugin;

use Mvc5\Arg;
use Mvc5\Plugin\Call;
use Mvc5\Plugin\Callback;

class Redirect
    extends Call
{
    /**
     *
     */
    const STATUS = 302;

    /**
     * @param string $url
     * @param int|null $status
     * @param array $headers
     */
    function __construct(string $url, int $status = null, array $headers = [])
    {
        parent::__construct([$this, '__invoke'], [$url, $status ?? static::STATUS, $headers]);
    }

    /**
     * @param string $url
     * @param int $status
     * @param array $headers
     * @return mixed
     */
    function __invoke(string $url, ?int $status, array $headers)
    {
        return new Callback(function(/*$argv*/) use($url, $status, $headers) {
            return $this->plugin(Arg::RESPONSE_REDIRECT, [$url, $status, $headers]);
        });
    }
}
