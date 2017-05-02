<?php
/**
 *
 */

namespace Dashboard;

use Mvc5\View\Model as ViewModel;

class Controller
{
    /**
     *
     */
    use ViewModel;

    /**
     * @var string
     */
    protected $template;

    /**
     * @param Model $model
     * @param $template
     */
    function __construct(Model $model, $template)
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
