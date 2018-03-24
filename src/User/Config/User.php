<?php
/**
 *
 */

namespace User\Config;

use Mvc5\Config\Config;

trait User
{
    /**
     *
     */
    use Config;

    /**
     * @return bool
     */
    function authenticated() : bool
    {
        return (bool) $this['authenticated'];
    }

    /**
     * @return string|null
     */
    function username()
    {
        return $this['username'] ?? null;
    }
}

