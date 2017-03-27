<?php
/**
 *
 */
include __DIR__ . '/vendor/psr/container/src/ContainerInterface.php';
include __DIR__ . '/vendor/psr/http-message/src/MessageInterface.php';
include __DIR__ . '/vendor/psr/http-message/src/RequestInterface.php';
include __DIR__ . '/vendor/psr/http-message/src/ResponseInterface.php';
include __DIR__ . '/vendor/psr/http-message/src/ServerRequestInterface.php';
include __DIR__ . '/vendor/psr/http-message/src/StreamInterface.php';
include __DIR__ . '/vendor/psr/http-message/src/UriInterface.php';

/**
 *
 */
include __DIR__ . '/vendor/zendframework/zend-diactoros/src/ServerRequestFactory.php';
include __DIR__ . '/vendor/zendframework/zend-diactoros/src/Stream.php';
include __DIR__ . '/vendor/zendframework/zend-diactoros/src/PhpInputStream.php';

/**
 *
 */
include __DIR__ . '/vendor/mvc5/mvc5/init.php';
include __DIR__ . '/vendor/mvc5/view/init.php';
include __DIR__ . '/vendor/mvc5/facade/init.php';
include __DIR__ . '/vendor/mvc5/http-message/init.php';

/**
 *
 */
/*include __DIR__ . '/src/Blog/Model.php';
include __DIR__ . '/src/Blog/Controller.php';
include __DIR__ . '/src/Blog/Add/Validate.php';
include __DIR__ . '/src/Blog/Add/Save.php';
include __DIR__ . '/src/Blog/Add/Respond.php';
include __DIR__ . '/src/Home/Factory.php';
include __DIR__ . '/src/Home/Controller.php';
include __DIR__ . '/src/Home/Model.php';
include __DIR__ . '/src/Console/Example.php';
include __DIR__ . '/src/Plugin/Gem/Controller.php';
include __DIR__ . '/src/Plugin/Controller.php';
include __DIR__ . '/src/Plugin/Request.php';
include __DIR__ . '/src/Service/Provider.php';*/

/**
 *
 */
include __DIR__ . '/vendor/autoload.php';

/**
 *
 */
set_error_handler([Mvc5\Exception\ErrorException::class, 'handler']);

/**
 *
 */
spl_autoload_register(new Mvc5\Service\Alias(include __DIR__ . '/config/alias.php'));
