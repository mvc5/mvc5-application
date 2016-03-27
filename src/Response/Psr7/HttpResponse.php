<?php
/**
 *
 */

namespace Response\Psr7;

use Psr\Http\Message\StreamInterface;
use Response\Response;
use Slim\Http\Headers;
use Slim\Http\HeadersInterface;
use Slim\Http\RequestBody;
use Slim\Http\Response as Psr7Response;

/**
 * Allows the "body" attribute to be of any "type" and is initially null.
 */
class HttpResponse
    extends Psr7Response
    implements Response
{
    /**
     * @param int $status
     * @param HeadersInterface|null $headers
     * @param StreamInterface|null $body
     */
    /*public function __construct($status = 200, HeadersInterface $headers = null, StreamInterface $body = null)
    {
        $this->status  = $this->filterStatus($status);
        $this->headers = $headers ? $headers : new Headers();
        $this->body    = $body;
    }*/

    /**
     * @return mixed
     */
    public function content()
    {
        return $this->getBody();
    }

    /**
     *
     */
    public function send()
    {
        (new Send)->__invoke($this);
    }

    /**
     * @param mixed $content
     * @return self
     */
    public function setContent($content)
    {
        //uncomment for compliance
        /*if (!$content instanceof StreamInterface) {
            $stream = new RequestBody;
            $stream->write((string) $content);
            $content = $stream;
        }

        return $this->withBody($content);*/

        $clone = clone $this;
        $clone->body = $content;

        return $clone;
    }

    /**
     * @param int $code
     * @param string $reasonPhrase
     * @return self
     */
    public function setStatus($code, $reasonPhrase = '')
    {
        return $this->withStatus((int) $code, $reasonPhrase = '');
    }

    /**
     * @return int
     */
    public function status()
    {
        return $this->getStatusCode();
    }

    /**
     *
     */
    /*public function __clone()
    {
        $this->headers = clone $this->headers;

        is_object($this->body) &&
            $this->body = clone $this->body;
    }*/
}
