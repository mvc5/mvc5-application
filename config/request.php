<?php
/**
 *
 */

use Mvc5\Plugin\NullValue;
use Request\Plugin\Accept;
use Request\Plugin\Args;
use Request\Plugin\Body;
use Request\Plugin\ClientAddress;
use Request\Plugin\ContentType;
use Request\Plugin\Cookies;
use Request\Plugin\Data;
use Request\Plugin\Files;
use Request\Plugin\Headers;
use Request\Plugin\Method;
use Request\Plugin\Server;
use Request\Plugin\Session;
use Request\Plugin\Stream;
use Request\Plugin\Uri;
use Request\Plugin\User;
use Request\Plugin\UserAgent;
use Request\Plugin\Version;

return [
    'accept'         => new Accept,
    'args'           => new Args,
    'body'           => new Body,
    'client_address' => new ClientAddress,
    'content_type'   => new ContentType,
    'controller'     => new NullValue,
    'cookies'        => new Cookies,
    'data'           => new Data,
    'error'          => new NullValue,
    'exception'      => new NullValue,
    'files'          => new Files,
    'headers'        => new Headers,
    'matched'        => new NullValue,
    'method'         => new Method,
    'name'           => new NullValue,
    'params'         => new NullValue,
    'server'         => new Server,
    'session'        => new Session,
    'stream'         => new Stream,
    'uri'            => new Uri,
    'user'           => new User,
    'user_agent'     => new UserAgent,
    'version'        => new Version,
];
