<?php
/**
 *
 */
include __DIR__ . '/vendor/symfony/http-foundation/ParameterBag.php';
include __DIR__ . '/vendor/symfony/http-foundation/FileBag.php';
include __DIR__ . '/vendor/symfony/http-foundation/ServerBag.php';
include __DIR__ . '/vendor/symfony/http-foundation/HeaderBag.php';
include __DIR__ . '/vendor/symfony/http-foundation/Request.php';
include __DIR__ . '/vendor/symfony/http-foundation/ApacheRequest.php';
include __DIR__ . '/vendor/symfony/http-foundation/ResponseHeaderBag.php';
include __DIR__ . '/vendor/symfony/http-foundation/Response.php';
include __DIR__ . '/vendor/symfony/http-foundation/RedirectResponse.php';

/**
 *
 */
include __DIR__ . '/vendor/mvc5/mvc5/init.php';
include __DIR__ . '/vendor/mvc5/view/init.php';
include __DIR__ . '/vendor/mvc5/facade/init.php';

/**
 *
 */
include __DIR__ . '/src/Request.php';
include __DIR__ . '/src/Response.php';
include __DIR__ . '/src/Request/Config.php';
include __DIR__ . '/src/Response/Config.php';

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
