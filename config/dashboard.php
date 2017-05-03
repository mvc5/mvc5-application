<?php
/**
 *
 */

use Mvc5\Plugin\Param;
use Mvc5\Plugin\Plugin;

return [
    'services' => [
        'action' => new Mvc5\Container(['add' => ['event\model', 'event' => 'dashboard:add']]),
        'home'   => Home\Controller::class,
        'view\model'  => Dashboard\ViewModel::class,
        'controller' => [Dashboard\Controller::class, new Plugin('view\model'), new Param('templates.dashboard')],
    ],
    'templates' => [
        'dashboard' => __DIR__ . '/../view/dashboard/index.phtml',
    ]
];
