<?php
/**
 *
 */

namespace Request\Psr7;

use Request\Request;
use Slim\Http\Request as Base;

class HttpRequest
    extends Base
    implements Request
{
}
