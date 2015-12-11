<?php
/**
 *
 */

use Mvc5\App;
use Mvc5\Config;
use Mvc5\Container;
use Mvc5\Model;
use Mvc5\Model\ViewModel;
use Mvc5\Plugin\Args;
use Mvc5\Plugin\Dependency;
use Mvc5\Plugin\Factory;
use Mvc5\Plugin\Hydrator;
use Mvc5\Plugin\Plugin;
use Mvc5\Plugin\Service;
use Mvc5\Plugin\Param;
use Plugin\Controller;
use Plugin\Route;
use Service\ServiceProvider;
use Service\ServiceManager;

return [
    //'blog' => blog\controller::class,
    //'blog' => new Service(blog\controller::class, ['template' => new Param('templates.blog')]),
    'blog2' => new Container([
        'create' => new Plugin(Blog\Create\Create::class),
        'home'   => 'blog3->home2',
    ]),
    'blog3' => new Config([
        'home2'  => new Plugin('Home\Controller')
    ]),
    'blog' => new Plugin(
        App::class,
        [
            'config' => [
                'alias'  => [],
                'events' => [],
                'services' => new Config([
                    'controller2' => [Blog\Controller::class, 'template' => new Param('templates.blog')],
                    'controller' => 'controller2', //locally resolved
                    'service\container' => [], //new Config, //local container
                ]),
                'templates' => [
                    'blog' => __DIR__ . '/../view/blog/index.phtml',
                ]
            ]
        ],
        [
            //share existing container
            'container' => new Dependency('service\container'),
            ['configure', 'service\container', new Dependency('service\container')]
        ]
    ),

    /*'Home\Controller' => new Plugin(
        Home\Controller::class,
        [new service(Home\Model::class, ['home'])],
        ['setModel' => new Plugin('home\model', ['home'])]
    ),*/

    //'home\model' => new Plugin(Home\Model::class, ['home']),

    //'Home\Controller' => new Factory(Home\Factory::class),

    //'Home\Controller' => new Controller(Home\Controller::class),

    'request' => new Request\HttpRequest($_GET, $_POST, [], $_COOKIE, $_FILES, $_SERVER),

    'response' => new Dependency('http\response'),
    'Response\Response' => 'response',
    'http\response' => Response\HttpResponse::class,

    'route' => new Route(Mvc5\Route\Config::class),

    ViewModel::class => Model::class,

    'service\provider' => new Service(ServiceProvider::class),
    'service\manager'  => new Hydrator(ServiceManager::class, [
        'aliases'  => new Param('alias'),
        'services' => new Param('services'),
        'events'   => new Param('events')
    ]),


] + include __DIR__ . '/../vendor/mvc5/mvc5/config/service.php';
