<?php
/**
 *
 */

namespace Test\Api;

use GuzzleHttp;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\TestCase;

class ClientTest
    extends TestCase
{
    /**
     * @return GuzzleHttp\Client
     */
    protected function client() : GuzzleHttp\Client
    {
        return new GuzzleHttp\Client(['base_uri' => 'http://localhost:8000']);
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

        $result = json_decode($response->getBody());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('bar', $result->foo);
        $this->assertEquals('bat', $result->baz);
    }

    /**
     * @throws GuzzleException
     */
    function test_error()
    {
        try {

            $this->client()->request('GET', '/foo', ['headers' => ['accept' => 'application/json']]);

        } catch(ClientException $exception) {

            $result = json_decode($exception->getResponse()->getBody());

            $this->assertEquals(404, $exception->getResponse()->getStatusCode());
            $this->assertEquals('Not Found', $result->message);
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

            $result = json_decode($exception->getResponse()->getBody());

            $this->assertEquals(500, $exception->getResponse()->getStatusCode());
            $this->assertEquals('', $result->message);
        }
    }
}
