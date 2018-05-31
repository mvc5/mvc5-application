<?php
/**
 *
 */

namespace Test\Api;

use GuzzleHttp;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Exception\GuzzleException;
use Mvc5\Test\Test\TestCase;

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
     * @throws GuzzleException
     */
    function test_post()
    {
        try {

            $response = $this->client()->request('POST', '/api', [
                'form_params' => ['username' => 'phpdev', 'password' => 'home'],
                'headers' => [
                    'accept' => 'application/json',
                    'content-type' => 'application/x-www-form-urlencoded'
                ]
            ]);

            $result = json_decode($response->getBody());

            $this->assertEquals('home', $result->password);

        } catch(ClientException $exception) {
            throw $exception;
        }
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
