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
        'model'  => Dashboard\Model::class,
        'controller' => new Plugin(Dashboard\Controller::class, [new Plugin('model'), new Param('templates.dashboard')]),
    ],
    'templates' => [
        'dashboard' => __DIR__ . '/../view/dashboard/index.phtml',
    ]
];
