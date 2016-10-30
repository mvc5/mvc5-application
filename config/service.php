<?php
/**
 *
 */

use Mvc5\Arg;
use Mvc5\Config;
use Mvc5\Container;
use Mvc5\Model;
use Mvc5\Model\ViewModel;
use Mvc5\Plugin\App;
use Mvc5\Plugin\Args;
use Mvc5\Plugin\Call;
use Mvc5\Plugin\Calls;
use Mvc5\Plugin\Config as ConfigLink;
use Mvc5\Plugin\Copy;
use Mvc5\Plugin\Dependency;
use Mvc5\Plugin\End;
use Mvc5\Plugin\Factory;
use Mvc5\Plugin\FileInclude;
use Mvc5\Plugin\Hydrator;
use Mvc5\Plugin\Invoke;
use Mvc5\Plugin\Invokable;
use Mvc5\Plugin\Link;
use Mvc5\Plugin\Manager;
use Mvc5\Plugin\Plugin;
use Mvc5\Plugin\Service;
use Mvc5\Plugin\Param;
use Mvc5\Plugin\Plug;
use Mvc5\Plugin\Plugins;
use Mvc5\Plugin\Session;
use Mvc5\Plugin\Value;
use Plugin\Controller;
use Service\Provider;

return [
    'About\Controller' => new Plugin(About\Controller::class, ['A PHP Web Application']),

    'dashboard2' => new Container([
        'add' => ['event\model', 'event' => 'dashboard:add'],
        'home'   => 'dashboard3->home2',
    ]),
    'dashboard3' => new Config([
        'home2' => new Plugin('Home\Controller')
    ]),

    'dashboard' => new App(new FileInclude(__DIR__ . '/dashboard.php')),

    'message' => new Value('Demo Application'), //string value
    'Home\Controller' => function($message, Request $request, $response, $cookie) {
        return new Home\Controller($this);
    },
    'Home\Model' => new Plugin(Home\Model::class, [null, new Args(['message' => new Plug('message')])]),

    'request' => new \Plugin\Request(
        new FileInclude(__DIR__ . '/request.php'),
        [
            'cookies' => new Plugin(Invoke::class, [new Link, ['cookie']]),
            'session' => new Plugin(Invoke::class, [new Link, ['session']]),
            'user'    => new Plugin(Invoke::class, [new Link, ['user']]),
        ]
    ),

    'user' => new Dependency('user', new Session('user', User\Config::class)),

    'response' => [Response\Config::class, 'config' => new Args(['cookies' => new Plugin('cookie\container')])],

    //middleware dashboard
    //'web' => 'web\middleware',

    ViewModel::class => Model::class,

    'service\provider' => new Manager(Provider::class),

    'sm' => new Link,

    //'dashboard:create' => new Plugin('Dashboard\Create\Create'),
    //'dashboard:create' => new Plugin('dashboard2->create'),

    //'dashboard' => dashboard\controller::class,
    //'dashboard' => new Service(dashboard\controller::class, ['template' => new Param('templates.dashboard')]),

    /*'home\controller' => new Plugin(
        Home\Controller::class
        //,[new service(Home\Model::class, ['home'])],
        //['setModel' => new Plugin('home\model', ['home3'])]
    ),*/

    //'home\model' => new Plugin(Home\Model::class, ['home']),

    //'Home\Controller' => new Factory(Home\Factory::class),

    //'Home\Controller' => new Controller(Home\Controller::class), //custom plugin
    //'Home\Controller' => new Copy(new Controller(Home\Controller::class)),
    //'home\controller' => new Plugin(Home\Controller::class),

    //'Home\Controller' => Home\Controller::class,
    //'Home\Controller' => new Plugin('dashboard->home'),

    //config for route.collection.php
    //'route\dispatch'  => new Service(Mvc5\Route\Dispatch\Collection::class, [new Param('routes')]),
    //'url\generator'   => [Mvc5\Url\Collection::class, new Param('routes')],
    //'web\route' => new Service(Mvc5\Web\Route\Collection::class, [new Param('routes')]),

] + include __DIR__ . '/../vendor/mvc5/mvc5/config/service.php';
