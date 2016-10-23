<?php
/**
 *
 */

use Mvc5\Plugin\Invoke;
use Mvc5\Response\Redirect;
use Mvc5\Service\Service;
use Mvc5\Url\Plugin as Url;

return [
    'name'       => 'home',
    'route'      => '/',
    'controller' => 'Home\Controller',
    'children' => [
        'blog' => [
            'route'      => 'blog',
            'controller' => new Invoke('blog->controller.test'),
            'children' => [
                'remove' => [
                    'route' => '/remove',
                    'method' => ['GET', 'POST'],
                    'action' => [
                        'GET' => new Invoke('blog:remove'),
                        'POST' => function(Service $sm, Request $request, Url $url, callable $next = null) {
                            $sm->plugin('session\messages')->add('Action completed successfully!', 'success');
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
                    'controller' => new Invoke('blog:add'), //event
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
