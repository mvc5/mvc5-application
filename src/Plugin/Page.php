<?php
/**
 *
 */

namespace Plugin;

use Mvc5\Arg;
use Mvc5\Http\Request;
use Mvc5\Plugin\Call;
use Mvc5\Plugin\Link;
use Mvc5\Service\Service;

class Page
    extends Call
{
    /**
     * @param string $template
     * @param array $vars
     */
    function __construct(string $template, array $vars = [])
    {
        parent::__construct([$this, '__invoke'], [new Link, $template, $vars]);
    }

    /**
     * @param Service $service
     * @param string $template
     * @param array $vars
     * @return \Closure
     */
    function __invoke(Service $service, string $template, array $vars) : \Closure
    {
        return function(Request $request) use($service, $template, $vars) {
            return $service->plugin(Arg::VIEW_MODEL, [$template, $vars + [Arg::REQUEST => $request]]);
        };
    }
}
