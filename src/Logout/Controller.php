<?php
/**
 *
 */

namespace Logout;

use Mvc5\Plugins\Messages;
use Mvc5\Plugins\Response;
use Mvc5\Plugins\Session;
use Mvc5\Plugins\Service;

class Controller
{
    /**
     *
     */
    use Messages;
    use Response;
    use Session;
    use Service;

    /**
     * @return \Mvc5\Response\Redirect
     */
    function __invoke()
    {
        $this->session()->remove('user');
        $this->success('Logout successful!');
        return $this->redirect('/');
    }
}
