<?php
/**
 *
 */

use Mvc5\Plugin\Param;

return [
    'services' => [
        'home' => Home\Controller::class,
        'controller2' => function(Request $request) {
            return $this->plugin(Dashboard\Controller::class, ['template' => new Param('templates.dashboard')]);
        },
        'Home\Controller2' => function(Request $request, Dashboard\Model $model) {
            return new Dashboard\Controller($model, __DIR__ . '/../view/dashboard/index.phtml');
        },

        //'controller' => 'controller2', //locally resolved
        'controller' => 'Home\Controller2', //locally resolved
    ],
    'templates' => [
        'dashboard' => __DIR__ . '/../view/dashboard/index.phtml',
    ]
];
