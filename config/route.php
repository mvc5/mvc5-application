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
    'path'      => '/',
    'controller' => 'Home\Controller',
    'children' => [
        'dashboard' => [
            'path'      => 'dashboard',
            'controller' => 'dashboard->controller.test',
            'children' => [
                'remove' => [
                    'path' => '/remove',
                    'method' => 'GET',
                    'optional' => ['method'],
                    'controller' => 'dashboard:remove'
                ],
                'remove:update' => [
                    'path' => '/remove',
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
                    'path'      => '/{author::s}[/{category::s}[/{wildcard::*$}]]',
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
            'path' => 'explore',
            'options' => ['prefix' => 'About\\'],
            'middleware' => ['web\authenticate', 'controller', function($request, $response, $next) { return $next($request, $response); }],
            'defaults' => [
                'controller' => 'explore'
            ],
            'children' => [
                'more' => [
                    'path' => '/more',
                    'middleware' => ['web\log'],
                    'defaults' => [
                        'controller' => 'more'
                    ]
                ]
            ]
        ],
        'app' => [
            'options'  => ['separators' => ['_' => '_', '-' => '\\']],
            'path'    => '{controller::n}[/{action::s}[/{wildcard::*$}]]',
            'wildcard' => true
        ]
    ]
];
