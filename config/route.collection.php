<?php
/**
 *
 */

use Mvc5\Plugin\Callback;
use Mvc5\Route\Config as Route;
use Mvc5\Session\SessionMessages;
use Valar\RedirectResponse;

return [
    'home' => new Route([
        'path' => '/{$}',
        'controller' => 'Home\Controller',
        //var_export to create a cache (Definition/Build.php)
        'regex' => '/$',
        'tokens' => [['literal','/'], ['param','','$']]
    ]),
    'dashboard' => [
        'path'      => '/dashboard',
        'controller' => 'dashboard->controller.test', //specific method
        //'scheme' => 'https',
        //'hostname' => 'localhost', // "//localhost/dashboard" (when no scheme specified, inc parent)
        //'port' => '8080', // "http://localhost:8080/dashboard"
        'children' => [
            'remove' => [
                'path' => '/remove',
                'method' => 'GET', //['GET', 'POST']
                'optional' => ['method'],
                'controller' => 'dashboard:remove'
            ],
            'remove:update' => [
                'path' => '/remove',
                'method' => 'POST',
                'middleware' => [
                    'web\authorize',
                    new Callback(function($req, $res, $next) {
                        /** @var SessionMessages $messages */
                        $messages = $this->plugin('messages');
                        $url = $this->plugin('url');

                        $messages->success('Action completed!');

                        return $next($req, new RedirectResponse($url('dashboard')));
                    })
                ]
            ],
            'add' => [
                'path'      => '[/{author::s}][/{category::s}[/{wildcard::*$}]]',
                'defaults'   => [
                    //'author'   => 'owner',
                    //'category' => 'web',
                    'limit' => 10
                ],
                'wildcard'   => true,
                'controller' => 'dashboard->action->add', //call event
                'constraints' => [
                    //'author'   => '[a-zA-Z_-]+',
                    //'category' => '[a-zA-Z_-]+',
                    //'wildcard' => '[a-zA-Z0-9/]+[a-zA-Z0-9]$'
                ]
            ]
        ],
    ],
    'explore' => [
        'path' => '/explore',
        'options' => ['prefix' => 'About\\'],
        'middleware' => ['web\authenticate'],
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
        'options'     => ['separators' => ['_' => '_', '-' => '\\']],
        //'regex' => '/(?P<controller>[a-zA-Z][a-zA-Z0-9]+)(?:/(?P<action>[a-zA-Z0-9_-]+)(?:/(?P<wildcard>[a-zA-Z0-9/]+[a-zA-Z0-9]$))?)?',

        'path'       => '/{controller::n}[/{action::s}[/{wildcard::*$}]]',

        //'path'       => '/{controller}[/{action}[/{wildcard:*}]]',
        //'constraints' => ['controller' => '[a-zA-Z][a-zA-Z0-9]+', 'action' => '[a-zA-Z0-9_-]+', 'wildcard' => '[a-zA-Z0-9/]+[a-zA-Z0-9]$'],

        'wildcard'    => true
    ],
];
