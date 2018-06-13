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

class Page
    extends Call
{
    /**
     * @param string $template
     * @param array $vars
     */
    function __construct(string $template, array $vars = [])
    {
        parent::__construct([$this, '__invoke'], [$template, $vars]);
    }

    /**
     * @param string $template
     * @param array $vars
     * @return Invoke
     */
    function __invoke(string $template, array $vars) : Invoke
    {
        return new Invoke(function(Request $request) use($template, $vars) {
            return new Plugin(Arg::VIEW_MODEL, [$template, $vars + [Arg::REQUEST => $request]]);
        });
    }
}
