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
include __DIR__ . '/vendor/psr/container/src/ContainerInterface.php';

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
include __DIR__ . '/src/Request/Config/Request.php';
include __DIR__ . '/src/Request/Config.php';
include __DIR__ . '/src/Request/Plugin.php';
include __DIR__ . '/src/Request/Plugin/Args.php';
include __DIR__ . '/src/Request/Plugin/Body.php';
include __DIR__ . '/src/Request/Plugin/ClientAddress.php';
include __DIR__ . '/src/Request/Plugin/ContentType.php';
include __DIR__ . '/src/Request/Plugin/Cookies.php';
include __DIR__ . '/src/Request/Plugin/Data.php';
include __DIR__ . '/src/Request/Plugin/Files.php';
include __DIR__ . '/src/Request/Plugin/Headers.php';
include __DIR__ . '/src/Request/Plugin/Method.php';
include __DIR__ . '/src/Request/Plugin/Server.php';
include __DIR__ . '/src/Request/Plugin/Session.php';
include __DIR__ . '/src/Request/Plugin/Stream.php';
include __DIR__ . '/src/Request/Plugin/Uri.php';
include __DIR__ . '/src/Request/Plugin/User.php';
include __DIR__ . '/src/Request/Plugin/UserAgent.php';
include __DIR__ . '/src/Request/Plugin/Version.php';
include __DIR__ . '/src/Response.php';
include __DIR__ . '/src/Response/Config.php';
include __DIR__ . '/src/Request/Plugin/Accept.php';

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
