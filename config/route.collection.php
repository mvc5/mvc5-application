<?php
/**
 *
 */

use Mvc5\Response\Redirect;
use Mvc5\Route\Config as Route;
use Mvc5\Session\SessionMessages;
use Mvc5\Url\Plugin as Url;

function dashboard_remove(SessionMessages $messages, Request $request, Url $url, callable $next)
{
    $messages->success('Action completed!');
    return $next($request, new Redirect($url('dashboard')));
}

return [
    'home' => new Route([
        'route' => '/{$}',
        'controller' => 'Home\Controller',
        //var_export to create a cache (Definition/Build.php)
        'regex' => '/$',
        'tokens' => [['literal','/'], ['param','','$']]
    ]),
    'dashboard' => [
        'route'      => '/dashboard',
        'controller' => 'dashboard->controller.test', //specific method
        //'scheme' => 'https',
        //'hostname' => 'localhost', // "//localhost/dashboard" (when no scheme specified, inc parent)
        //'port' => '8080', // "http://localhost:8080/dashboard"
        'children' => [
            /*'remove' => [
                'route' => '/remove',
                'method' => ['GET', 'POST'],
                'action' => [
                    'GET' => 'dashboard:remove',
                    'POST' => '@dashboard_remove'
                ]
            ],*/
            'remove' => [
                'route' => '/remove',
                'method' => 'GET',
                'optional' => ['method'],
                'controller' => 'dashboard:remove'
            ],
            'remove:update' => [
                'route' => '/remove',
                'method' => 'POST',
                'middleware' => ['web\authorize'],
                'controller' => '@dashboard_remove'
            ],
            'add' => [
                'route'      => '[/{author::s}][/{category::s}[/{wildcard::*$}]]',
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
        'route' => '/explore',
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
        'options'     => ['separators' => ['_' => '_', '-' => '\\']],
        //'regex' => '/(?P<controller>[a-zA-Z][a-zA-Z0-9]+)(?:/(?P<action>[a-zA-Z0-9_-]+)(?:/(?P<wildcard>[a-zA-Z0-9/]+[a-zA-Z0-9]$))?)?',

        'route'       => '/{controller::n}[/{action::s}[/{wildcard::*$}]]',

        //'route'       => '/{controller}[/{action}[/{wildcard:*}]]',
        //'constraints' => ['controller' => '[a-zA-Z][a-zA-Z0-9]+', 'action' => '[a-zA-Z0-9_-]+', 'wildcard' => '[a-zA-Z0-9/]+[a-zA-Z0-9]$'],

        'wildcard'    => true
    ],
];
