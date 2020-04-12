<?php
/**
 *
 */

namespace Home;

final class ViewModel
    extends \Mvc5\ViewModel
{
    /**
     *
     */
    const TEMPLATE = 'home/index';

    /**
     * @var string
     */
    private string $title = 'Demo Application';

    /**
     * @return string
     */
    private function title() : string
    {
        return $this->title;
    }
}
