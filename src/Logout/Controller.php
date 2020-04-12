<?php
/**
 *
 */

namespace Logout;

use Mvc5\Http;
use Mvc5\Plugins;

final class Controller
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
     * @return Http\Response
     */
    function __invoke() : Http\Response
    {
        $this->session()->destroy();
        $this->success('Logout successful!');
        return $this->redirect($this->url('home'));
    }
}
