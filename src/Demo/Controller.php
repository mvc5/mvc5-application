<?php
/**
 *
 */
namespace Demo;

use Mvc5\Response\Emitter\ReadFile;

class Controller
{
    /**
     * @return ReadFile
     */
    function __invoke()
    {
        return new ReadFile(__DIR__ . '/DEMO');
    }
}
