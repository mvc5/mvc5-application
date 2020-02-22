<?php
/**
 *
 */
namespace About;

class Controller
{
    /**
     * @var string
     */
    protected string $message;

    /**
     * @param string $message
     */
    function __construct(string $message)
    {
        $this->message = $message;
    }

    /**
     * @param string $suffix
     * @return string
     */
    function message(string $suffix = '') : string
    {
        return $this->message . $suffix;
    }

    /**
     * @return \Closure
     */
    function __invoke() : \Closure
    {
        return function() {
            echo $this->message();
        };
    }
}
