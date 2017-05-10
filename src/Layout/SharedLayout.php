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
     * @return $this
     */
    function with($name, $value = null)
    {
        $this->set($name, $value);
        return $this;
    }

    /**
     * @param array|string $name
     * @return self|mixed
     */
    function without($name)
    {
        $this->remove($name);
        return $this;
    }

    /**
     * @param Service $service
     * @return $this
     */
    function withService(Service $service)
    {
        $this->service = $service;
        return $this;
    }
}
