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
     * @return ViewModel
     */
    function test() : ViewModel
    {
        $model = $this->view($this->template);

        $model->dashboard['message'] = 'Demo Application';

        return $model;
    }
}
