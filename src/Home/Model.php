<?php
/**
 *
 */

namespace Home;

use Mvc5\ViewModel;

class Model
    extends ViewModel
{
    /**
     *
     */
    const TEMPLATE_NAME = 'home/index';

    /**
     * @var string
     */
    private $title = 'Mvc5';

    /**
     * @return string
     */
    private function title()
    {
        return $this->title;
    }
}
