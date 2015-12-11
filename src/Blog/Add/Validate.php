<?php
/**
 *
 */

namespace Blog\Add;

use Mvc5\View\Model;
use Mvc5\Model\ViewModel;
use Request\Request;

class Validate
{
    /**
     *
     */
    use Model;

    /**
     * @param Request $request
     * @return ViewModel
     */
    public function __invoke(Request $request)
    {
        return $this->view('blog:create', ['args' => [__CLASS__]]);
    }
}
