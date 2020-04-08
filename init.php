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
include __DIR__ . '/vendor/psr/http-message/src/UploadedFileInterface.php';
include __DIR__ . '/vendor/psr/http-message/src/UriInterface.php';

/**
 *
 */
//include __DIR__ . '/vendor/laminas/laminas-diactoros/src/functions/create_uploaded_file.php';
//include __DIR__ . '/vendor/laminas/laminas-diactoros/src/functions/marshal_headers_from_sapi.php';
//include __DIR__ . '/vendor/laminas/laminas-diactoros/src/functions/marshal_uri_from_sapi.php';
//include __DIR__ . '/vendor/laminas/laminas-diactoros/src/functions/normalize_server.php';
//include __DIR__ . '/vendor/laminas/laminas-diactoros/src/functions/normalize_uploaded_files.php';
//include __DIR__ . '/vendor/laminas/laminas-diactoros/src/functions/parse_cookie_header.php';
include __DIR__ . '/vendor/laminas/laminas-diactoros/src/Uri.php';
include __DIR__ . '/vendor/laminas/laminas-diactoros/src/Stream.php';
include __DIR__ . '/vendor/laminas/laminas-diactoros/src/PhpInputStream.php';
include __DIR__ . '/vendor/laminas/laminas-diactoros/src/UploadedFile.php';

/**
 *
 */
//include __DIR__ . '/vendor/mvc5/mvc5/namespace.php';
include __DIR__ . '/vendor/mvc5/mvc5/init.php';
include __DIR__ . '/vendor/mvc5/view/init.php';
include __DIR__ . '/vendor/mvc5/facade/init.php';
include __DIR__ . '/vendor/mvc5/http-message/init.php';

/**
 *
 */
/*include __DIR__ . '/src/About/More/Messages/ViewModel.php';
include __DIR__ . '/src/Dashboard/ViewModel.php';
include __DIR__ . '/src/Dashboard/Controller.php';
include __DIR__ . '/src/Dashboard/Add/Validate.php';
include __DIR__ . '/src/Dashboard/Add/Save.php';
include __DIR__ . '/src/Dashboard/Add/Respond.php';
include __DIR__ . '/src/Home/Factory.php';
include __DIR__ . '/src/Home/Controller.php';
include __DIR__ . '/src/Home/Route.php';
include __DIR__ . '/src/Home/ViewModel.php';
include __DIR__ . '/src/Console/Example.php';
include __DIR__ . '/src/Plugin/Gem/Controller.php';
include __DIR__ . '/src/Plugin/Controller.php';
include __DIR__ . '/src/Plugin/Page.php';
include __DIR__ . '/src/Plugin/Redirect.php';
include __DIR__ . '/src/Service/Provider.php';
include __DIR__ . '/src/User/Config/User.php';
include __DIR__ . '/src/User/User.php';
include __DIR__ . '/src/User/Config.php';*/

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
