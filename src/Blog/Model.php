<?php
/**
 *
 */

namespace Blog;

use Mvc5\Model\Plugin;
use Mvc5\Model\ViewModel;

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
    const TEMPLATE_NAME = 'blog';
}
