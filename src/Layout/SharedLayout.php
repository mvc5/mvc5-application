<?php
/**
 *
 */

namespace Layout;

use Mvc5\Overload;
use Mvc5\Service\Service;
use Mvc5\View\ViewLayout;

class SharedLayout
    extends Overload
    implements ViewLayout
{
    /**
     *
     */
    use \Mvc5\View\Config\ViewLayout;

    /**
     * @param array|string $name
     * @param null $value
     * @return ViewLayout
     */
    function with($name, $value = null) : ViewLayout
    {
        $this->set($name, $value);
        return $this;
    }

    /**
     * @param array|string $name
     * @return ViewLayout
     */
    function without($name) : ViewLayout
    {
        $this->remove($name);
        return $this;
    }

    /**
     * @param Service $service
     * @return ViewLayout
     */
    function withService(Service $service) : ViewLayout
    {
        $this->service = $service;
        return $this;
    }
}
