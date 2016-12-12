<?php
/**
 *
 */

namespace Request\Plugin;

use Mvc5\Plugin\Call;
use Mvc5\Plugin\Shared;

class Headers
    extends Shared
{
    /**
     * @param $name
     */
    function __construct($name = 'headers')
    {
        parent::__construct($name, new Call('@getallheaders'));
    }
}
