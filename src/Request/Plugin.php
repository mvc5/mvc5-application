<?php
/**
 *
 */

namespace Request;

use Mvc5\App;
use Mvc5\Arg;
use Mvc5\Plugin\Link;
use Mvc5\Plugin\Plugin as _Plugin;
use Mvc5\Plugin\Scope;

class Plugin
    extends Scope
{
    /**
     * @param array $plugins
     */
    function __construct($plugins)
    {
        parent::__construct(
            Config::class, [new _Plugin(App::class, [[Arg::SERVICES => $plugins], null, true, true]), new Link]
        );
    }
}
