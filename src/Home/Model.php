<?php
/**
 *
 */

namespace Home;

use Mvc5\Model\ViewModel;
use Mvc5\Model\Plugin;

class Model
    implements ViewModel
{
    /**
     *
     */
    use Plugin;

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
