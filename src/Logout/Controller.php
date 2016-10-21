<?php
/**
 *
 */

namespace Logout;

use Mvc5\Response\Redirect;
use Request;

class Controller
{
    /**
     * @param Request $request
     * @return \Mvc5\Model\ViewModel|Redirect
     */
    function __invoke(Request $request)
    {
        $request->session()->remove('user');
        $request->session()->set('login', 'Logout successful!');
        return new Redirect('/');
    }
}
