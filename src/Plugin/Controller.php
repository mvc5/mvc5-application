<?php
/**
 *
 */

namespace Plugin;

class Controller
    implements Gem\Controller
{
    /**
     * @var string
     */
    protected $config;

    /**
     * @param string $config
     */
    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * @return string
     */
    public function config()
    {
        return $this->config;
    }
}
