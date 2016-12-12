<?php
/**
 *
 */

namespace Request;

use Mvc5\App;
use Mvc5\Arg;
use Mvc5\Plugin\Args;
use Mvc5\Plugin\Link;
use Mvc5\Plugin\Plugin as _Plugin;
use Mvc5\Plugin\Scope;
use Symfony\Component\HttpFoundation\ApacheRequest;

class Plugin
    extends Scope
{
    /**
     * @param array $plugins
     */
    function __construct($plugins)
    {
        parent::__construct(
            Config::class,
            new _Plugin(App::class, [new Args([Arg::SERVICES => $plugins]), null, true, true]),
            new ApacheRequest($_GET, $_POST, [], $_COOKIE, $_FILES, $_SERVER),
            new Link
        );
    }
}
