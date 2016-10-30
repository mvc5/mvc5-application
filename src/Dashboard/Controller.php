<?php
/**
 *
 */

namespace Dashboard;

use Mvc5\View\Model as _ViewModel;

class Controller
{
    /**
     *
     */
    use _ViewModel;

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
     * @return Model
     */
    function test()
    {
        return $this->view($this->template);
    }
}
