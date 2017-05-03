<?php
/**
 *
 */

namespace Home;

class ViewModel
    extends \Mvc5\ViewModel
{
    /**
     *
     */
    const TEMPLATE = 'home/index';

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
