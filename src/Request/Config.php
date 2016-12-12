<?php
/**
 *
 */

namespace Request;

use Mvc5\Request\Config\Request as _Request;
use Mvc5\Service\Service;
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
     * @var Service
     */
    protected $service;

    /**
     * @param array|\ArrayAccess $config
     * @param HttpRequest $http
     * @param Service $service
     */
    function __construct($config, HttpRequest $http, Service $service)
    {
        $this->config  = $config;
        $this->http    = $http;
        $this->service = $service;
    }
}
