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
    function __invoke() : ReadFile
    {
        return new ReadFile(__DIR__ . '/DEMO');
    }
}
