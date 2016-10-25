<?php
/**
 *
 */
namespace Status;

use Mvc5\Plugins\Response;
use Mvc5\Plugins\Service;
use Mvc5\Response\Json;

class Controller
{
    /**
     *
     */
    use Response;
    use Service;

    /**
     * @return Json
     */
    function __invoke()
    {
        return $this->json(['PHP' => phpversion(), 'System' => php_uname()]);
    }
}
