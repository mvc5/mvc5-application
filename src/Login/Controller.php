<?php
/**
 *
 */

namespace Login;

use Mvc5\Plugin;
use Mvc5\View\Model;
use Mvc5\Service;
use Mvc5\Plugins\Flash;
use Mvc5\Plugins\Log;
use Mvc5\Plugins\Redirect;
use Mvc5\Plugins\User;
use Request;

class Controller
    implements Service
{
    /**
     *
     */
    use Flash;
    use Log;
    use Model;
    use Plugin;
    use Redirect;
    use User;

    /**
     * @param Request $request
     * @return \Mvc5\Model\ViewModel|Redirect
     */
    function __invoke(Request $request)
    {
        $user = $this->user();

        if ($user->authenticated()) {
            $this->flash('Already logged in!', 'warning');
            return $this->redirect('/');
        }

        if (!$request->data()) {
            $this->flash('Demo login', 'warning', 'login');
            return $this->view('login/index');
        }

        if ('phpdev' !== $request->data('username') || 'home' !== $request->data('password')) {
            $this->flash('Invalid Login', 'danger');
            return $this->view('login/index');
        }

        $user['authenticated'] = true;
        $user['username'] = 'phpdev';

        $this->flash('Login successful!', 'success');
        $this->log(new \Exception('Login successful!'));

        return $this->redirect('/');
    }
}
