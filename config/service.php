<?php
/**
 *
 */

use Mvc5\Arg;
use Mvc5\App;
use Mvc5\Config;
use Mvc5\Container;
use Mvc5\Model;
use Mvc5\Model\ViewModel;
use Mvc5\Plugin\Args;
use Mvc5\Plugin\Config as ConfigLink;
use Mvc5\Plugin\Dependency;
use Mvc5\Plugin\Factory;
use Mvc5\Plugin\Hydrator;
use Mvc5\Plugin\Manager;
use Mvc5\Plugin\Plugin;
use Mvc5\Plugin\Service;
use Mvc5\Plugin\Param;
use Plugin\Controller;
use Plugin\Route;
use Service\ServiceProvider;
use Service\ServiceManager;

return [
    //'blog:create' => new Plugin('Blog\Create\Create'),
    'blog:create' => new Plugin('blog2->create'),

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
                'services' => new Config([
                    'home' => Home\Controller::class,
                    'controller2' => [Blog\Controller::class, 'template' => new Param('templates.blog')],
                    'controller' => 'controller2', //locally resolved
                    'container' => [], //new Config, //local container
                ]),
                'templates' => [
                    'blog' => __DIR__ . '/../view/blog/index.phtml',
                ]
            ]
        ],
        [
            //share existing container
            'container' => new Dependency('container'),
            ['configure', 'container', new Dependency('container')]
        ]
    ),

    /*'home\controller' => new Plugin(
        Home\Controller::class
        //,[new service(Home\Model::class, ['home'])],
        //['setModel' => new Plugin('home\model', ['home3'])]
    ),*/

    //'home\model' => new Plugin(Home\Model::class, ['home']),

    //'Home\Controller' => new Factory(Home\Factory::class),

    //'Home\Controller' => new Controller(Home\Controller::class),
    //'home\controller' => new Plugin(Home\Controller::class),

    'Home\Controller' => Home\Controller::class,
    //'Home\Controller' => new Plugin('blog->home'),

    'request' => new Request\HttpRequest($_GET, $_POST, [], $_COOKIE, $_FILES, $_SERVER),

    'response' => Response\HttpResponse::class,

    'Response\Response' => 'response',

    'route' => new Route(Mvc5\Route\Config::class),

    ViewModel::class => Model::class,

    'service\provider' => new Service(ServiceProvider::class, [], [Arg::SERVICE => new Plugin('service\manager')]),
    'service\manager'  => new Manager(ServiceManager::class),

] + include __DIR__ . '/../vendor/mvc5/mvc5/config/service.php';
