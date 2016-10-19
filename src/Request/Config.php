<?php
/**
 *
 */

namespace Request;

use Mvc5\Request\Config\Request as _Request;
use Symfony\Component\HttpFoundation\ApacheRequest as HttpRequest;

class Config
    implements \Request
{
    /**
     *
     */
    use _Request;

    /**
     * @var HttpRequest
     */
    protected $http;

    /**
     * @param array $config
     * @param HttpRequest $http
     */
    function __construct($config = [], HttpRequest $http)
    {
        $this->config = $config;
        $this->http   = $http;
    }
}
