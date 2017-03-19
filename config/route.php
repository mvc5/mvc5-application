<?php
/**
 *
 */

use Mvc5\Plugin\Callback;
use Mvc5\Session\SessionMessages;
use Psr\Http\Message\ResponseInterface;
use Valar\Http\RedirectResponse;

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
                    'middleware' => [
                        'web\authorize',
                        new Callback(function($req, ResponseInterface $res, $next) {
                            /** @var SessionMessages $messages */
                            $messages = $this->plugin('messages');
                            $url = $this->plugin('url');

                            $messages->success('Action completed!');

                            return $next($req, new RedirectResponse($url('dashboard')));
                        })
                    ]
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
            'middleware' => ['web\authenticate', 'controller', function($request, $response, $next) { return $next($request, $response); }],
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
