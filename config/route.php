<?php
/**
 *
 */

use Mvc5\Response\Redirect;
use Mvc5\Service\Service;
use Mvc5\Url\Plugin as Url;

return [
    'name'       => 'home',
    'route'      => '/',
    'controller' => 'Home\Controller',
    'children' => [
        'dashboard' => [
            'route'      => 'dashboard',
            'controller' => 'dashboard->controller.test',
            'children' => [
                'remove' => [
                    'route' => '/remove',
                    'method' => 'GET',
                    'optional' => ['method'],
                    'controller' => 'dashboard:remove'
                ],
                'remove:update' => [
                    'route' => '/remove',
                    'method' => 'POST',
                    'controller' => function(Service $sm, Request $request, Url $url, callable $next = null) {
                        $sm->plugin('session\messages')->success('Action completed!');
                        return !$next ? new Redirect($url('dashboard')) : $next($request, new Redirect($url('dashboard')));
                    }
                ],
                'add' => [
                    'route'      => '/{author::s}[/{category::s}[/{wildcard::*$}]]',
                    'defaults'   => [
                        'author'   => 'owner',
                        'category' => 'web'
                    ],
                    'wildcard'   => true,
                    'controller' => 'dashboard:add', //event
                ]
            ],
        ],
        'explore' => [
            'route' => 'explore',
            'options' => ['prefix' => 'About\\'],
            'middleware' => ['web\authenticate'],
            'defaults' => [
                'controller' => 'explore'
            ],
            'children' => [
                'more' => [
                    'route' => '/more',
                    'middleware' => ['web\log'],
                    'defaults' => [
                        'controller' => 'more'
                    ]
                ]
            ]
        ],
        'app' => [
            'options'  => ['separators' => ['_' => '_', '-' => '\\']],
            'route'    => '{controller::n}[/{action::s}[/{wildcard::*$}]]',
            'wildcard' => true
        ]
    ]
];
