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
    private $blogTitle = 'Blog';

    /**
     * @return string
     */
    private function blogTitle()
    {
        return $this->blogTitle;
    }
}
