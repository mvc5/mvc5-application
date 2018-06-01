<?php
/**
 *
 */

namespace Test\Api;

use Mvc5\App;
use Mvc5\Http\HttpHeaders;
use Mvc5\Http\HttpUri;
use Mvc5\Http\Response;
use Mvc5\Plugin\Value;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\ServerRequest;

class ControllerTest
    extends TestCase
{
    /**
     * @runInSeparateProcess
     * @throws \Throwable
     */
    function test_post_form()
    {
        $headers = new HttpHeaders(['content-type' => 'application/json']);
        $uri = new HttpUri(['path' => '/api']);

        $config = include __DIR__ . '/../../config/config.php';
        $config['services']['request'] = new ServerRequest(
            ['headers' => $headers, 'uri' => $uri, 'method' => new Value('POST'),
                'data' => new Value(['foo' => 'bar', 'baz' => 'bat'])
            ] + include __DIR__ . '/../../vendor/mvc5/http-message/config/request.php'
        );

        $this->expectOutputString('{"foo":"bar","baz":"bat"}');

        $response = (new App($config))->call('web');

        $result = json_decode($response->body());

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->status());
        $this->assertEquals('OK', $response->reason());
        $this->assertEquals('bar', $result->foo);
        $this->assertEquals('bat', $result->baz);
    }

    /**
     * @runInSeparateProcess
     * @throws \Throwable
     */
    function test_post_json()
    {
        $headers = new HttpHeaders(['content-type' => 'application/json']);
        $uri = new HttpUri(['path' => '/api']);

        $config = include __DIR__ . '/../../config/config.php';
        $config['services']['request'] = new ServerRequest(
            ['headers' => $headers, 'uri' => $uri, 'method' => new Value('POST'),
                'body' => new Value('{"foo":"bar","baz":"bat"}')
            ] + include __DIR__ . '/../../vendor/mvc5/http-message/config/request.php'
        );

        $this->expectOutputString('{"foo":"bar","baz":"bat"}');

        $response = (new App($config))->call('web');

        $result = json_decode($response->body());

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->status());
        $this->assertEquals('OK', $response->reason());
        $this->assertEquals('bar', $result->foo);
        $this->assertEquals('bat', $result->baz);
    }

    /**
     * @runInSeparateProcess
     * @throws \Throwable
     */
    function test_error()
    {
        $headers = new HttpHeaders(['accept' => 'application/json']);
        $uri = new HttpUri(['path' => '/foo']);

        $config = include __DIR__ . '/../../config/config.php';
        $config['services']['request'] = new ServerRequest(
            ['headers' => $headers, 'uri' => $uri]
            + include __DIR__ . '/../../vendor/mvc5/http-message/config/request.php'
        );

        $this->expectOutputString('{"message":"Not Found","description":"The server can not find the requested resource."}');

        $response = (new App($config))->call('web');

        $result = json_decode($response->body());

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(404, $response->status());
        $this->assertEquals('Not Found', $response->reason());
        $this->assertEquals('Not Found', $result->message);
        $this->assertEquals('The server can not find the requested resource.', $result->description);
    }

    /**
     * @runInSeparateProcess
     * @throws \Throwable
     */
    function test_exception()
    {
        $headers = new HttpHeaders(['accept' => 'application/json']);
        $uri = new HttpUri(['path' => '/api']);

        $config = include __DIR__ . '/../../config/config.php';
        $config['services']['log\error'] = ['Mvc5\Log\ErrorLog', 3, '/dev/null'];
        $config['services']['request'] = new ServerRequest(
            ['headers' => $headers, 'uri' => $uri, 'method' => new Value('GET')]
            + include __DIR__ . '/../../vendor/mvc5/http-message/config/request.php'
        );

        $this->expectOutputString('{"message":""}');

        $response = (new App($config))->call('exception\response', ['exception' => new \Exception('foobar')]);

        $result = json_decode($response->body());

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(500, $response->status());
        $this->assertEquals('Internal Server Error', $response->reason());
        $this->assertEquals('', $result->message);
    }

    /**
     * @runInSeparateProcess
     * @throws \Throwable
     */
    function test_exception_trace()
    {
        $headers = new HttpHeaders(['accept' => 'application/json']);
        $uri = new HttpUri(['path' => '/api']);

        $config = include __DIR__ . '/../../config/config.php';
        $config['debug'] = true;
        $config['services']['log\error'] = ['Mvc5\Log\ErrorLog', 3, '/dev/null'];
        $config['services']['request'] = new ServerRequest(
            ['headers' => $headers, 'uri' => $uri, 'method' => new Value('GET')]
            + include __DIR__ . '/../../vendor/mvc5/http-message/config/request.php'
        );

        $response = (new App($config))->call('exception\response', ['exception' => new \Exception('foobar', 900)]);

        $result = json_decode($response->body());

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(500, $response->status());
        $this->assertEquals('Internal Server Error', $response->reason());
        $this->assertEquals(900, $result->code);
        $this->assertEquals('foobar', $result->message);
        $this->assertEquals(150, $result->line);
        $this->assertEquals(__FILE__, $result->file);
        $this->assertInternalType('array', $result->trace);
        $this->assertNotEmpty($result->trace);
    }
}
