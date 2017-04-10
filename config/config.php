<?php
/**
 *
 */

return [
    'cache'      => __DIR__ . '/../tmp',
    'cookie'     => include __DIR__ . '/cookie.php',
    'events'     => include __DIR__ . '/event.php',
    'middleware' => include __DIR__ . '/middleware.php',
    'routes'     => include __DIR__ . '/route.php',
    'services'   => include __DIR__ . '/service.php',
    'session'    => include __DIR__ . '/session.php',
    'templates'  => include __DIR__ . '/template.php',
    'view'       => __DIR__ . '/../view',
    'web'        => include __DIR__ . '/web.php',
];
