<?php
/**
 *
 */

use Mvc5\Plugin\Shared;

return [
    'accept' => new Shared('accept', function() {
        return $this->http->getAcceptableContentTypes();
    }),
    'args' => new Shared('args', function() {
        return $this->http->query->all();
    }),
    'body' => new Shared('body', function() {
        return $this->http->getContent();
    }),
    'client_address' => new Shared('client_address', function() {
        return $this->http->getClientIp();
    }),
    'content_type' => new Shared('content_type', function() {
        return $this->http->getContentType();
    }),
    'controller' => function(){},
    'cookies'    => null,
    'data' => new Shared('data', function() {
        return $this->http->request->all();
    }),
    'error'     => function() {},
    'exception' => function() {},
    'files' => new Shared('files', function() {
        return $this->http->files->all();
    }),
    'headers' => new Shared('headers', function() {
        return getallheaders(); //$this->http->headers->all();
    }),
    'length' => function(){},
    'method' => new Shared('method', function() {
        return $this->http->getMethod();
    }),
    'name'   => function(){},
    'params' => function(){},
    'path'   => function(){},
    'port'   => function(){},
    'server' => function() {
        return $this->http->server->all();
    },
    'session' => null,
    'stream'  => function() {
        return $this->http->getContent(true);
    },
    'uri' => new Shared('uri', function() {
        return [
            'scheme' => $this->http->getScheme(),
            'host'   => $this->http->getHost(),
            'port'   => $this->http->getPort(),
            'user'   => $this->http->getUser(),
            'pass'   => $this->http->getPassword(),
            'path'   => urldecode($this->http->getPathInfo()),
            'query'  => $this->http->getQueryString(),
        ];
    }),
    'user' => null,
    'user_agent' => new Shared('user_agent', function() {
        return $this->http->server->get('HTTP_USER_AGENT');
    }),
    'version' => new Shared('version', function() {
        return substr($this->http->server->get('SERVER_PROTOCOL'), strlen('HTTP/'));
    }),
];
