<?php
/**
 *
 */

namespace Dashboard;

use Mvc5\View\Model;

final class Controller
{
    /**
     *
     */
    use Model;

    /**
     * @var string
     */
    protected string $template;

    /**
     * @param ViewModel $model
     * @param string $template
     */
    function __construct(ViewModel $model, string $template)
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
