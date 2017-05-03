<?php
/**
 *
 */

namespace Dashboard;

use Mvc5\View\Model;

class Controller
{
    /**
     *
     */
    use Model;

    /**
     * @var string
     */
    protected $template;

    /**
     * @param ViewModel $model
     * @param $template
     */
    function __construct(ViewModel $model, $template)
    {
        $this->model    = $model;
        $this->template = $template;
    }

    /**
     * @return mixed
     */
    function test()
    {
        return $this->view($this->template);
    }
}
