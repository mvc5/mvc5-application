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
use Mvc5\Test\Test\TestCase;
use Valar\Plugin\ServerRequest;

class ControllerTest
    extends TestCase
{
    /**
     * @runInSeparateProcess
     */
    function test()
    {
        $headers = new HttpHeaders(['accept' => 'application/json']);
        $uri = new HttpUri(['path' => '/api']);

        $config = include __DIR__ . '/../../config/config.php';
        $config['services']['request'] = new ServerRequest(
            ['headers' => $headers, 'uri' => $uri, 'method' => new Value('POST'),
                'data' => new Value(['username' => 'phpdev', 'password' => 'home'])]
            + include __DIR__ . '/../../vendor/mvc5/http-message/config/request.php'
        );

        $app = new App($config);

        $this->expectOutputString('{"username":"phpdev","password":"home"}');

        $response = $app->call('web');

        $result = json_decode($response->body());

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals('phpdev', $result->username);
    }

    /**
     * @runInSeparateProcess
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

        $app = new App($config);

        $this->expectOutputString('{"message":"Not Found","description":"The server can not find the requested resource."}');

        $response = $app->call('web');

        $result = json_decode($response->body());

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals('Not Found', $result->message);
    }

    /**
     * @runInSeparateProcess
     */
    function test_exception()
    {
        $headers = new HttpHeaders(['accept' => 'application/json']);
        $uri = new HttpUri(['path' => '/api']);

        $config = include __DIR__ . '/../../config/config.php';
        $config['services']['log\error'] = [\Mvc5\Log\ErrorLog::class, 3, '/dev/null'];
        $config['services']['request'] = new ServerRequest(
            ['headers' => $headers, 'uri' => $uri, 'method' => new Value('GET')]
            + include __DIR__ . '/../../vendor/mvc5/http-message/config/request.php'
        );

        $app = new App($config);

        $this->expectOutputString('{"message":""}');

        $response = $app->call('exception\response', ['exception' => new \Exception]);

        $result = json_decode($response->body());

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(500, $response->status());
        $this->assertEquals('', $result->message);
    }
}
