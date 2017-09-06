<?php
/**
 *
 */

namespace User;

use Mvc5\Config\Configuration;

interface User
    extends Configuration
{
    /**
     * @return bool
     */
    function authenticated() : bool;

    /**
     * @return string
     */
    function username() : string;
}
