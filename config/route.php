<?php
/**
 *
 */

return [
    'name'       => 'home', //for the url plugin in view templates
    'route'      => '/',
    'controller' => 'Home\Controller', //callable
    //'controller' => '@Home\Controller.test', //callable
    //'controller' => 'home\controller', //callable
    //'controller' => 'blog2->home',
    'children' => [
        'blog' => [
            'route'      => 'blog',
            'controller' => 'blog->controller.test', //specific method
            'children' => [
                'remove' => [
                    'route' => '/remove',
                    'method' => ['GET', 'POST'],
                    //'scheme' => ['https'],
                    //'hostname' => ['localhost'],
                    //'controller' => 'blog:remove', //call event
                    'action' => [
                        'GET' => 'blog:remove',
                        'POST' => function($layout) {
                            $layout->model('<h1>Success</h1>');

                            return $layout;
                        }
                    ]
                ],
                'create' => [
                    'route'      => '/:author[/:category]',
                    'defaults'   => [
                        'author'   => 'owner',
                        'category' => 'web'
                    ],
                    'wildcard'   => false,
                    'controller' => 'blog:add', //call event
                    //'controller' => 'blog2->add',
                    //'controller'  => function($request) { //named args
                        //var_dump($request->getPathInfo());
                    //},
                    'constraints' => [
                        'author'   => '[a-zA-Z0-9_-]*',
                        'category' => '[a-zA-Z0-9_-]*'
                    ]
                ]
            ],
        ]
    ]
];
