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
    function authenticated()
    {
        return $this['authenticated'];
    }

    /**
     * @return string
     */
    function username()
    {
        return $this['username'];
    }
}

