<?php
/**
 *
 */

use Mvc5\Response\Redirect;
use Mvc5\Session\Session;
use Mvc5\Url\Plugin as Url;

return [
    'name'       => 'home',
    'route'      => '/',
    'controller' => 'Home\Controller',
    'children' => [
        'blog' => [
            'route'      => 'blog',
            'controller' => 'blog->controller.test',
            'children' => [
                'remove' => [
                    'route' => '/remove',
                    'method' => ['GET', 'POST'],
                    'action' => [
                        'GET' => 'blog:remove',
                        'POST' => function(Request $request, Session $session, Url $url, callable $next = null) {
                            $session['success_message'] = 'Success';
                            return !$next ? new Redirect($url()) : $next($request, new Redirect($url()));
                        }
                    ]
                ],
                'create' => [
                    'route'      => '/{author::s}[/{category::s}[/{wildcard::*$}]]',
                    'defaults'   => [
                        'author'   => 'owner',
                        'category' => 'web'
                    ],
                    'wildcard'   => true,
                    'controller' => 'blog:add', //event
                ]
            ],
        ],
        'app' => [
            'options'  => ['separators' => ['_' => '_', '-' => '\\']],
            'route'    => '{controller::n}[/{action::s}[/{wildcard::*$}]]',
            'wildcard' => true
        ]
    ]
];
