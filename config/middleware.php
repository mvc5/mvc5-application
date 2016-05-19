<?php
/**
 *
 */

use Mvc5\Plugin\Middleware;


return [
    new Middleware('mvc'),
    new Middleware('response\prepare'),
    new Middleware('response\send'),
];
