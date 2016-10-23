<?php
/**
 *
 */
namespace Status;

use Mvc5\Plugin;
use Mvc5\Plugins\Response;
use Mvc5\Response\Json;
use Mvc5\Service;

class Controller
    implements Service
{
    /**
     *
     */
    use Plugin;
    use Response;

    /**
     * @return Json
     */
    function __invoke()
    {
        return $this->json(['PHP' => phpversion(), 'System' => php_uname()]);
    }
}
