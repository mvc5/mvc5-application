<?php
/**
 *
 */

namespace Logout;

use Mvc5\Plugins\Messages;
use Mvc5\Plugins\Response;
use Mvc5\Plugins\Session;
use Mvc5\Plugins\Service;
use Mvc5\Plugins\Url;
use Mvc5\Response\Redirect;

class Controller
{
    /**
     *
     */
    use Messages;
    use Response;
    use Service;
    use Session;
    use Url;

    /**
     * @return Redirect
     */
    function __invoke()
    {
        $this->session()->remove('user');
        $this->success('Logout successful!');
        return $this->redirect($this->url('home'));
    }
}
