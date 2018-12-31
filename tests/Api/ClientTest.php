<?php declare(strict_types = 1);
/**
 *
 */

namespace Test\Api;

use GuzzleHttp;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ServerException;
use PHPUnit\Framework\TestCase;

class ClientTest
    extends TestCase
{
    /**
     * @return GuzzleHttp\Client
     */
    protected function client() : GuzzleHttp\Client
    {
        return new GuzzleHttp\Client(['base_uri' => 'http://localhost']);
    }

    /**
     * @throws GuzzleException
     */
    function test_error()
    {
        try {

            $this->client()->request('GET', '/foo', ['headers' => ['accept' => 'application/json']]);

        } catch(ClientException $exception) {

            $response = $exception->getResponse();

            $result = json_decode((string) $response->getBody());

            $this->assertEquals(404, $response->getStatusCode());
            $this->assertEquals('application/json', $response->getHeaderLine('content-type'));
            $this->assertEquals('Not Found', $response->getReasonPhrase());
            $this->assertEquals('Not Found', $result->message);
            $this->assertEquals('The server can not find the requested resource.', $result->description);
        }
    }

    /**
     * @throws GuzzleException
     */
    function test_exception()
    {
        try {

            $this->client()->request('GET', '/api', ['headers' => ['accept' => 'application/json']]);

        } catch(ServerException $exception) {

            $response = $exception->getResponse();

            $result = json_decode((string) $response->getBody());

            $this->assertEquals(500, $response->getStatusCode());
            $this->assertEquals('application/json', $response->getHeaderLine('content-type'));
            $this->assertEquals('Internal Server Error', $response->getReasonPhrase());
            $this->assertEquals('', $result->message);
        }
    }

    /**
     *
     * @throws GuzzleException
     */
    function test_post_form()
    {
        $response = $this->client()->request('POST', '/api', [
            'form_params' => ['foo' => 'bar', 'baz' => 'bat'],
            'headers' => ['content-type' => 'application/x-www-form-urlencoded', 'accept' => 'application/json']
        ]);

        $result = json_decode((string) $response->getBody());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('application/json', $response->getHeaderLine('content-type'));
        $this->assertEquals('OK', $response->getReasonPhrase());
        $this->assertEquals('bar', $result->foo);
        $this->assertEquals('bat', $result->baz);
    }

    /**
     * @throws GuzzleException
     */
    function test_post_json()
    {
        $response = $this->client()->request('POST', '/api', [
            'json' => ['foo' => 'bar', 'baz' => 'bat'],
            'headers' => ['content-type' => 'application/json', 'accept' => 'application/json']
        ]);

        $result = json_decode((string) $response->getBody());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('application/json', $response->getHeaderLine('content-type'));
        $this->assertEquals('OK', $response->getReasonPhrase());
        $this->assertEquals('bar', $result->foo);
        $this->assertEquals('bat', $result->baz);
    }

    /**
     *
     * @throws GuzzleException
     */
    function test_forbidden_csrf_token()
    {
        try {

            $this->client()->request('POST', '/login', [
                'form_params' => ['username' => 'phpdev', 'password' => '....'],
                'headers' => ['content-type' => 'application/x-www-form-urlencoded', 'accept' => 'application/json']
            ]);

        } catch(ClientException $exception) {
            $response = $exception->getResponse();

            $result = json_decode((string) $response->getBody());

            $this->assertEquals(403, $response->getStatusCode());
            $this->assertEquals('application/json', $response->getHeaderLine('content-type'));
            $this->assertEquals('Forbidden', $response->getReasonPhrase());
            $this->assertEquals('Forbidden', $result->message);
            $this->assertEquals('The server understood the request, but is refusing to fulfill it.', $result->description);
        }
    }

    /**
     *
     * @throws GuzzleException
     */
    function test_unauthorized_json()
    {
        try {

            $this->client()->request('GET', '/dashboard', [
                'headers' => ['accept' => 'application/json']
            ]);

        } catch(ClientException $exception) {
            $response = $exception->getResponse();

            $result = json_decode((string) $response->getBody());

            $this->assertEquals(401, $response->getStatusCode());
            $this->assertEquals('Unauthorized', $response->getReasonPhrase());
            $this->assertEquals('Unauthorized', $result->message);
            $this->assertEquals('', $result->description);
        }
    }
}
