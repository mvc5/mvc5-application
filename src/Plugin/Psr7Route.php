<?php
/**
 *
 */

namespace Plugin;

use Mvc5\Arg;
use Mvc5\Plugin\Args;
use Mvc5\Plugin\Call;
use Mvc5\Plugin\Config\Plugin;
use Mvc5\Plugin\Gem\Plugin as PluginGem;

class Psr7Route
    implements PluginGem
{
    /**
     *
     */
    use Plugin;

    /**
     * @param string $name
     * @param array $args
     * @param array $calls
     */
    public function __construct($name, array $args = [], array $calls = [])
    {
        $this->config = [
            Arg::ARGS  => $args ?: [new Args([
                'hostname' => new Call('request.getUri.getHost'),
                'method'   => new Call('request.getMethod'),
                'path'     => new Call('request.getUri.getPath'),
                'scheme'   => new Call('request.getUri.getScheme')
            ])],
            Arg::CALLS => $calls,
            Arg::NAME  => $name
        ];
    }
}
