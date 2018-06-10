<?php
/**
 *
 */

use Mvc5\Plugin\Callback;
use Mvc5\Session\SessionMessages;
use Mvc5\Service\Context;
use Plugin\Redirect;
use Psr\Http\Message\ResponseInterface as Response;
use Valar\RedirectResponse;

//key names for url plugin
return [
    'home' => new Home\Route([ //cached route
        //'host' => 'nexus.app.dev',
        //'port' => 8000,
        //'optional' => 'host',
        'path' => '/{$}',
        'controller' => 'Home\\Controller',
        //var_export to create a cache (Definition/Build.php)
        'regex' => '/$',
        'tokens' => [['literal', '/'], ['param', '', '$']]
    ]),
    'dashboard' => [
        /*'host' => [
            'name' => '{subdomain}.app.dev',
            'defaults' => [
                'subdomain' => 'mvc5'
            ]
        ],
        'port' => 8001,
        'optional' => 'host',*/
        'path'      => '/dashboard/{user}',
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
                    new Callback(function($req, Response $res, $next) {
                        /** @var SessionMessages $messages */
                        $messages = $this->plugin('messages');
                        $url = Context::plugin('url');

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
        /*'host' => 'nexus.app.dev',
        'port' => 8000,
        'optional' => 'host',*/
        'path' => '/explore',
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
    'redirect' => [
        'path' => '/redirect',
        'controller' => new Redirect('/home'),
    ],
    'app' => [
        /*'host' => 'nexus.app.dev',
        'port' => 8000,*/
        'options'  => ['separators' => ['_' => '_', '-' => '\\']],
        'path'    => '/{controller::n}[/{action::s}[/{wildcard::*$}]]',
        'wildcard' => true
    ]
];
