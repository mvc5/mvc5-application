<?php
/**
 *
 */

namespace Login;

use Mvc5\Plugin;
use Mvc5\View\Model;
use Mvc5\Service;
use Mvc5\Plugins\Log;
use Mvc5\Plugins\Messages;
use Mvc5\Plugins\Redirect;
use Mvc5\Plugins\User;
use Request;

class Controller
    implements Service
{
    /**
     *
     */
    use Log;
    use Messages;
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
            $this->warning('Already logged in!');
            return $this->redirect('/');
        }

        if (!$request->data()) {
            $this->warning('Demo login', 'login');
            return $this->view('login/index');
        }

        if ('phpdev' !== $request->data('username') || 'home' !== $request->data('password')) {
            $this->danger('Invalid Login');
            return $this->view('login/index');
        }

        $user['authenticated'] = true;
        $user['username'] = 'phpdev';

        $this->success('Login successful!');
        $this->log(new \Exception('Login successful!'));

        return $this->redirect('/');
    }
}
