<?php
/**
 *
 */
namespace Status;

use Mvc5\Plugins\Response;
use Mvc5\Plugins\Service;

class Controller
{
    /**
     *
     */
    use Response;
    use Service;

    /**
     * @return mixed
     */
    function __invoke()
    {
        return $this->json(['PHP' => phpversion(), 'System' => php_uname()]);
    }
}
