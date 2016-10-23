<?php
/**
 *
 */

namespace Logout;

use Mvc5\Plugin;
use Mvc5\Service;
use Mvc5\Plugins\Flash;
use Mvc5\Plugins\Redirect;
use Mvc5\Plugins\Session;

class Controller
    implements Service
{
    /**
     *
     */
    use Flash;
    use Plugin;
    use Redirect;
    use Session;

    /**
     * @return \Mvc5\Model\ViewModel|Redirect
     */
    function __invoke()
    {
        $this->session()->remove('user');
        $this->flash('Logout successful!', 'success');
        return $this->redirect('/');
    }
}
