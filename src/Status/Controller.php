<?php
/**
 *
 */
namespace Status;

use Mvc5\Plugins;

class Controller
{
    /**
     *
     */
    use Plugins\Response;
    use Plugins\Service;

    /**
     * @return mixed
     */
    function __invoke()
    {
        return $this->json(['PHP' => phpversion(), 'System' => php_uname()]);
    }
}
