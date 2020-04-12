<?php
/**
 *
 */

namespace About\More\Messages;

final class ViewModel
    extends \Mvc5\ViewModel
{
    /**
     *
     */
    const TEMPLATE = '/about/more/messages';

    /**
     * @return string
     */
    private function more() : string
    {
        return $this->more;
    }
}
