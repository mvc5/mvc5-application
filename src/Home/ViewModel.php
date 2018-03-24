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
    private $title = 'Demo Application';

    /**
     * @return string
     */
    private function title() : string
    {
        return $this->title;
    }
}
