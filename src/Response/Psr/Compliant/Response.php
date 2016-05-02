<?php
/**
 *
 */

namespace Response\Psr\Compliant;

use Psr\Http\Message\StreamInterface;
use Response\Psr\Response as PsrResponse;
use Response\Psr\Send;
use Slim\Http\RequestBody;
use Slim\Http\Response as HttpResponse;

class Response
    extends HttpResponse
    implements PsrResponse
{
    /**
     * @return mixed
     */
    function content()
    {
        return $this->getBody();
    }

    /**
     *
     */
    function send()
    {
        (new Send)->__invoke($this);
    }

    /**
     * @param mixed $content
     * @return self
     */
    function setContent($content)
    {
        if (!$content instanceof StreamInterface) {
            $stream = new RequestBody;
            $stream->write((string) $content);
            $content = $stream;
        }

        return $this->withBody($content);
    }

    /**
     * @param int $code
     * @param string $reasonPhrase
     * @return self
     */
    function setStatus($code, $reasonPhrase = '')
    {
        return $this->withStatus((int) $code, $reasonPhrase = '');
    }

    /**
     * @return int
     */
    function status()
    {
        return $this->getStatusCode();
    }
}