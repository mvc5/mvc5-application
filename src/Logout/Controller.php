<?php
/**
 *
 */

namespace Logout;

use Mvc5\Plugin;
use Mvc5\Service;
use Mvc5\Plugins\Messages;
use Mvc5\Plugins\Redirect;
use Mvc5\Plugins\Session;

class Controller
    implements Service
{
    /**
     *
     */
    use Messages;
    use Plugin;
    use Redirect;
    use Session;

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
