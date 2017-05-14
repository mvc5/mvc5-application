<?php
/**
 *
 */

namespace Logout;

use Mvc5\Plugins;

class Controller
{
    /**
     *
     */
    use Plugins\Messages;
    use Plugins\Response;
    use Plugins\Service;
    use Plugins\Session;
    use Plugins\Url;

    /**
     * @return mixed
     */
    function __invoke()
    {
        $this->session()->remove('user');
        $this->success('Logout successful!');
        return $this->redirect($this->url('home'));
    }
}
