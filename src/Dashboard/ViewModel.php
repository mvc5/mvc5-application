<?php
/**
 *
 */

namespace Dashboard;

use Mvc5\Overload;

class ViewModel
    extends Overload
    implements \Mvc5\View\ViewModel
{
    /**
     *
     */
    use \Mvc5\View\Config\ViewModel;

    /**
     *
     */
    const TEMPLATE = 'dashboard';
}
