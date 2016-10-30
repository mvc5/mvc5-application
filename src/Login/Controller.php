<?php
/**
 *
 */

namespace Login;

use Mvc5\View\Model;
use Mvc5\Plugins\Log;
use Mvc5\Plugins\Messages;
use Mvc5\Plugins\Response;
use Mvc5\Plugins\Service;
use Mvc5\Plugins\Url;
use Mvc5\Plugins\User;
use Mvc5\Response\Redirect;
use Request;

class Controller
{
    /**
     *
     */
    use Log;
    use Messages;
    use Model;
    use Response;
    use Service;
    use Url;
    use User;

    /**
     *
     */
    const TEMPLATE_NAME = 'login/index';

    /**
     * @param Request $request
     * @return \Mvc5\Model\ViewModel|Redirect
     */
    function __invoke(Request $request)
    {
        $user = $this->user();

        if ($user->authenticated()) {
            $this->warning('Already logged in!');
            return $this->redirect($this->url('dashboard'));
        }

        if (!$request->data()) {
            $this->warning('Demo Login', 'login');
            return $this->view();
        }

        if ('phpdev' !== $request->data('username') || 'home' !== $request->data('password')) {
            $this->danger('Invalid Login');
            return $this->view();
        }

        $user['authenticated'] = true;
        $user['username'] = 'phpdev';

        $this->success('Login successful!');
        $this->log(new \Exception('Login successful!'));

        return $this->redirect($this->url('dashboard'));
    }
}
