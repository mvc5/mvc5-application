<?php
/**
 *
 */

namespace Middleware;

use Mvc5\Plugin;
use Request\Psr7\HttpRequest as Request;
use Response\Psr7\HttpResponse as Response;

class App
{
    /**
     * @var Plugin
     */
    protected $plugin;

    /**
     * @var array
     */
    protected $stack;

    /**
     * @param Plugin $plugin
     * @param array $stack
     */
    public function __construct($plugin, $stack)
    {
        $this->config = [current($stack)];
        $this->plugin = $plugin;
        $this->stack  = $stack;
    }

    /**
     * @return \Closure
     */
    protected function middleware()
    {
        return function(Request $request, Response $response) {
            return ($next = next($this->stack)) ?
                $this->plugin->call($next, [$request, $response, $this->middleware()]) : $response;
        };
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return callable|mixed|null|object
     */
    public function __invoke(Request $request, Response $response)
    {
        return $this->plugin->call(current($this->config), [$request, $response, $this->middleware()]);
    }
}
