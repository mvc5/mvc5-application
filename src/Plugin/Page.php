<?php
/**
 *
 */

namespace Plugin;

use Mvc5\Http\Request;
use Mvc5\Plugin\Call;
use Mvc5\Plugin\Invoke;
use Mvc5\Plugin\Plugin;

use const Mvc5\{ REQUEST, VIEW_MODEL };

final class Page
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
        return new Invoke(fn(Request $request) =>
            new Plugin(VIEW_MODEL, [$template, $vars + [REQUEST => $request]]));
    }
}
