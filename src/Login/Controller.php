<?php
/**
 *
 */

namespace Login;

use Mvc5\Arg;
use Mvc5\Plugins;
use Mvc5\Request\Request;
use Mvc5\Response\HttpResponse;
use Mvc5\Session\CSRFToken;
use Mvc5\Session\Session;
use Mvc5\User\User;
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
    use View\Model;

    /**
     *
     */
    const TEMPLATE = 'login/index';

    /**
     * @param Request $request
     * @param Session $session
     * @param User $user
     * @return mixed|\Mvc5\Http\Response|HttpResponse|\Mvc5\Response\RedirectResponse|View\ViewModel
     */
    protected function login(Request $request, Session $session, User $user)
    {
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

//        $request['session']->regenerate() &&
//            (new CSRFToken\Generate)($request['session'], true);

        $redirect_url = $session['redirect_url'];
        unset($session['redirect_url']);

        $session['user'] = $user->with([
            'authenticated' => true,
            'username' => $request->data('username')
        ]);

        $this->success('Login successful!');
        //throws the exception when debug is enabled
        //$this->log(new \Exception('Login successful!'));

        return $this->redirect($redirect_url ?? $this->url('dashboard'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    function __invoke(Request $request)
    {
        return $this->login($request, $request[Arg::SESSION], $request[Arg::USER]);
    }
}
