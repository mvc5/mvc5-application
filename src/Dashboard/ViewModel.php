<?php
/**
 *
 */

namespace Dashboard;

use Mvc5\ArrayOverload;

final class ViewModel
    extends ArrayOverload
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
