<?php
/**
 *
 */

use Mvc5\Plugin\Middleware;

return [
    'web' => [
        new Middleware('mvc'), //uses shared request and returns a response, so has to be first, demo only.
        new Middleware('response\prepare'),
        new Middleware('response\send'),
    ]
];
