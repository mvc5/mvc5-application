<?php declare(strict_types = 1);
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
    function test_error()
    {
        $config = include __DIR__ . '/../../config/config.php';
        $config['services']['request'] = ServerRequest::with([
            'headers' => new HttpHeaders(['accept' => 'application/json']),
            'uri' => new HttpUri(['path' => '/foo'])
        ]);

        $this->expectOutputString('{"message":"Not Found","description":"The server can not find the requested resource."}');

        $response = (new App($config))->call('web');

        $result = json_decode((string) $response->body);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(404, $response->status);
        $this->assertEquals('application/json', $response->headers['content-type']);
        $this->assertEquals('Not Found', $response->reason);
        $this->assertEquals('Not Found', $result->message);
        $this->assertEquals('The server can not find the requested resource.', $result->description);
    }

    /**
     * @runInSeparateProcess
     * @throws \Throwable
     */
    function test_exception()
    {
        $config = include __DIR__ . '/../../config/config.php';
        $config['debug'] = false;
        $config['services']['log\error'] = ['Mvc5\Log\ErrorLog', 3, '/dev/null'];
        $config['services']['request'] = ServerRequest::with([
            'headers' => new HttpHeaders(['accept' => 'application/json'])
        ]);

        $this->expectOutputString('{"message":""}');

        $response = (new App($config))->call('exception\response', ['exception' => new \Exception('foobar')]);

        $result = json_decode((string) $response->body);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(500, $response->status);
        $this->assertEquals('application/json', $response->headers['content-type']);
        $this->assertEquals('Internal Server Error', $response->reason);
        $this->assertEquals('', $result->message);
    }

    /**
     * @runInSeparateProcess
     * @throws \Throwable
     */
    function test_exception_trace()
    {
        $config = include __DIR__ . '/../../config/config.php';
        $config['debug'] = true;
        $config['services']['log\error'] = ['Mvc5\Log\ErrorLog', 3, '/dev/null'];
        $config['services']['request'] = ServerRequest::with([
            'headers' => new HttpHeaders(['accept' => 'application/json'])
        ]);

        $response = (new App($config))->call('exception\response', ['exception' => new \Exception('foobar', 900)]);

        $result = json_decode((string) $response->body);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(500, $response->status);
        $this->assertEquals('application/json', $response->headers['content-type']);
        $this->assertEquals('Internal Server Error', $response->reason);
        $this->assertEquals(900, $result->code);
        $this->assertEquals('foobar', $result->message);
        $this->assertEquals(84, $result->line);
        $this->assertEquals(__FILE__, $result->file);
        $this->assertInternalType('array', $result->trace);
        $this->assertNotEmpty($result->trace);
    }

    /**
     * @runInSeparateProcess
     * @throws \Throwable
     */
    function test_post_form()
    {
        $GLOBALS['_POST'] = ['foo' => 'bar', 'baz' => 'bat'];

        $config = include __DIR__ . '/../../config/config.php';
        $config['services']['request'] = ServerRequest::with([
            'header' => new HttpHeaders(['content-type' => 'application/x-www-form-urlencoded']),
            'method' => new Value('POST'),
            'uri' => new HttpUri(['path' => '/api'])
        ]);

        $this->expectOutputString('{"foo":"bar","baz":"bat"}');

        $response = (new App($config))->call('web');

        $result = json_decode((string) $response->body);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->status);
        $this->assertEquals('application/json', $response->headers['content-type']);
        $this->assertEquals('OK', $response->reason);
        $this->assertEquals('bar', $result->foo);
        $this->assertEquals('bat', $result->baz);
    }

    /**
     * @runInSeparateProcess
     * @throws \Throwable
     */
    function test_post_json()
    {
        $config = include __DIR__ . '/../../config/config.php';
        $config['services']['request'] = ServerRequest::with([
            'body' => new Value('{"foo":"bar","baz":"bat"}'),
            'headers' => new HttpHeaders(['content-type' => 'application/json']),
            'method' => new Value('POST'),
            'uri' => new HttpUri(['path' => '/api'])
        ]);

        $this->expectOutputString('{"foo":"bar","baz":"bat"}');

        $response = (new App($config))->call('web');

        $result = json_decode((string) $response->body);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->status);
        $this->assertEquals('application/json', $response->headers['content-type']);
        $this->assertEquals('OK', $response->reason);
        $this->assertEquals('bar', $result->foo);
        $this->assertEquals('bat', $result->baz);
    }
}
