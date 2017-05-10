<?php
/**
 *
 */

namespace Console;

use Home\ViewModel;

class Example
{
    /**
     * @var ViewModel
     */
    protected $model;

    /**
     * @param ViewModel $model
     */
    function __construct(ViewModel $model)
    {
        $this->model = $model;
    }

    /**
     * @param $day
     * @param $month
     */
    function __invoke($day, $month)
    {
        var_dump($this->model);
        echo $day . ' ' . $month . "\n";
    }
}
