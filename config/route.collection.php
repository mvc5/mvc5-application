<?php
/**
 *
 */

use Mvc5\Plugin\Invoke;
use Mvc5\Response\Redirect;
use Mvc5\Route\Config as Route;
use Mvc5\Service\Service;
use Mvc5\Url\Plugin as Url;

return [
    'home' => new Route([
        'route' => '/{$}',
        'controller' => 'Home\\Controller',
        //var_export to create a cache (Definition/Build.php)
        'regex' => '/$',
        'tokens' => [['literal','/'], ['param','','$']]
    ]),
    'blog' => [
        'route'      => '/blog',
        'controller' => new Invoke('blog->controller.test'), //specific method
        //'hostname' => 'localhost', // "//localhost/blog" (when no scheme specified, inc parent)
        //'port' => '8080', // "http://localhost:8080/blog"
        'children' => [
            'remove' => [
                'route' => '/remove',
                'method' => ['GET', 'POST'],
                //'scheme' => 'https',
                //'hostname' => 'localhost',
                //'controller' => new Invoke('blog:remove'), //call event
                'action' => [
                    'GET' => new Invoke('blog:remove'),
                    'POST' => function(Service $sm, Request $request, Url $url, callable $next = null) {
                        $sm->plugin('flash\messages')->flash('Action completed successfully!', 'success');
                        return !$next ? new Redirect($url()) : $next($request, new Redirect($url()));
                    }
                ]
            ],
            'create' => [
                'route'      => '[/{author::s}][/{category::s}[/{wildcard::*$}]]',

                //'route'      => '/:author[/:category[/:wildcard]]',


                'defaults'   => [
                    //'author'   => 'owner',
                    //'category' => 'web',
                    'limit' => 10
                ],
                'wildcard'   => true,
                'controller' => new Invoke('blog:add'), //call event
                //'controller' => new Invoke('blog2->add'),
                //'controller'  => function($request) { //named args
                //var_dump($request->getPathInfo());
                //},
                'constraints' => [
                    //'author'   => '[a-zA-Z_-]+',
                    //'category' => '[a-zA-Z_-]+',
                    //'wildcard' => '[a-zA-Z0-9/]+[a-zA-Z0-9]$'
                ],
                'map' => [
                    'author' => '__author'
                ],
            ]
        ],
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
