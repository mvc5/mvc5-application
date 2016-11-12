<?php
/**
 *
 */

use Mvc5\Plugin\App;
use Mvc5\Plugin\Args;
use Mvc5\Plugin\Factory;
use Mvc5\Plugin\FileInclude;
use Mvc5\Plugin\Invoke;
use Mvc5\Plugin\Invokable;
use Mvc5\Plugin\Link;
use Mvc5\Plugin\Manager;
use Mvc5\Plugin\Param;
use Mvc5\Plugin\Plug;
use Mvc5\Plugin\Plugin;
use Mvc5\Plugin\Service;
use Mvc5\Plugin\Session;
use Mvc5\Plugin\Shared;
use Mvc5\Plugin\Value;
use Service\Provider;

return [
    'About\Controller' => new Plugin(About\Controller::class, ['A PHP Web Application']),
    'dashboard'  => new App(new FileInclude(__DIR__ . '/dashboard.php')), //, null, true),
    'Home\Controller' => function($message, Request $request, $response, $cookie) {
        return new Home\Controller($this);
    },
    //'Home\Controller' => new Factory(Home\Factory::class),
    //'Home\Controller' => new Plugin\Controller(Home\Controller::class), //custom plugin
    //'Home\Controller' => Home\Controller::class,
    //'Home\Controller' => 'dashboard->home',

    'Home\Model' => new Plugin(Home\Model::class, [null, new Args(['message' => new Plug('message')])]),

    'message' => new Value('Demo Application'), //string value

    'request' => new \Plugin\Request(
        new FileInclude(__DIR__ . '/request.php'),
        [
            'cookies' => new Plugin(Invoke::class, [new Link, ['cookie']]),
            'session' => new Plugin(Invoke::class, [new Link, ['session']]),
            'user'    => new Plugin(Invoke::class, [new Link, ['user']]),
        ]
    ),

    'response' => [Response\Config::class, 'config' => new Args(['cookies' => new Plugin('cookie\container')])],

    'service\provider' => new Manager(Provider::class),

    'user' => new Shared('user', new Session('user', User\Config::class)),

    'shared' => new Invokable(new Plugin(Shared::class)),
    'messages' => 'session\messages',

    'web\authenticate' => Middleware\Authenticate::class,
    'web\authorize' => Middleware\Authorize::class,
    'web\log' => Middleware\Logger::class,

    //middleware
    //'web' => 'web\middleware',

    //config for route.collection.php
    //'route\dispatch'  => new Service(Mvc5\Route\Dispatch\Collection::class, [new Param('routes')]),
    //'url\generator'   => [Mvc5\Url\Collection::class, new Param('routes')],
    //'web\route' => new Service(Mvc5\Web\Route\Collection::class, [new Param('routes')]),

] + (include __DIR__ . '/../vendor/mvc5/view/config/service.php')
  + include __DIR__ . '/../vendor/mvc5/mvc5/config/service.php';
