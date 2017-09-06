<?php
/**
 *
 */
namespace Status;

use Mvc5\Http;
use Mvc5\Plugins;

class Controller
{
    /**
     *
     */
    use Plugins\Response;
    use Plugins\Service;

    /**
     * @return Http\Response
     */
    function __invoke() : Http\Response
    {
        return $this->json(['PHP' => phpversion(), 'System' => php_uname()]);
    }
}
