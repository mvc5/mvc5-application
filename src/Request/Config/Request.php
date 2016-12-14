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
     * @param Service $service
     */
    function __construct($config, Service $service)
    {
        $this->config  = $config;
        $this->http    = new HttpRequest($_GET, $_POST, [], $_COOKIE, $_FILES, $_SERVER);
        $this->service = $service;
    }
}
