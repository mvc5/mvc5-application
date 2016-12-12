<?php
/**
 *
 */

namespace Request\Config;

use Mvc5\Request\Config\Request as Config;
use Mvc5\Service\Service;
use Symfony\Component\HttpFoundation\ApacheRequest as HttpRequest;

trait Request
{
    /**
     *
     */
    use Config;

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
