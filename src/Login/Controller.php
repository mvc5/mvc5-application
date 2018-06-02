<?php
/**
 *
 */

namespace Login;

use Mvc5\Plugins;
use Mvc5\Request\Request;
use Mvc5\Response\HttpResponse;
use Mvc5\View;

class Controller
{
    /**
     *
     */
    use Plugins\Log;
    use Plugins\Messages;
    use Plugins\Response;
    use Plugins\Service;
    use Plugins\Url;
    use Plugins\User;
    use View\Model;

    /**
     *
     */
    const TEMPLATE = 'login/index';

    /**
     * @param Request $request
     * @return mixed
     */
    function __invoke(Request $request)
    {
        $user = $this->user();

        if ($user->authenticated()) {
            $this->warning('Already logged in!');
            return $this->redirect($this->url(['dashboard', 'user' => $user->username()]));
        }

        if (!$request->isPost()) {
            $this->warning('Demo Login', 'login');
            return $this->model(['params' => $request->params()]);
        }

        if ('home' !== $request->data('password')) {
            $this->danger('Invalid Login');
            return new HttpResponse($this->view(), 422);
        }

        $user['authenticated'] = true;
        $user['username'] = $request->data('username');

        $this->success('Login successful!');
        //throws the exception when debug is enabled
        //$this->log(new \Exception('Login successful!'));

        return $this->redirect($this->url(['dashboard', 'user' => $user->username()]));
    }
}
