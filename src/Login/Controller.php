<?php
/**
 *
 */

namespace Login;

use Mvc5\Response\Redirect;
use Mvc5\View\Model;
use Request;

class Controller
{
    /**
     *
     */
    use Model;

    /**
     * @param Request $request
     * @return \Mvc5\Model\ViewModel|Redirect
     */
    function __invoke(Request $request)
    {
        $user = $request->user();

        if ($user->authenticated()) {
            $request->session()->set('login', 'Already logged in!');
            return new Redirect('/');
        }

        if (!$request->data()) {
            return $this->view('login/index');
        }

        if ('phpdev' !== $request->data('username') || 'home' !== $request->data('password')) {
            return $this->view('login/index', ['message' => 'Invalid Login']);
        }

        $user['authenticated'] = true;
        $user['username'] = 'phpdev';

        $request->session()->set('login', 'Login successful!');

        return new Redirect('/');
    }
}
