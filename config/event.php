<?php
/**
 *
 */

use Mvc5\Template\TemplateLayout;
use Mvc5\Plugin\Call;
use Mvc5\Plugin\Param;

return [
    'dashboard:add' => new Mvc5\Iterator([
        Dashboard\Add\Validate::class,
        Dashboard\Add\Save::class,
        Dashboard\Add\Respond::class
    ]),
    'dashboard:remove' => [
        function() {
            return $model = '<h1>Validate</h1>';
        },
        function($model) {
            return $model . '<h1>Remove</h1>';
        },
        function(TemplateLayout $layout, $model = null) {
            $model .= '<h1>Respond</h1>';
            $model .= '<form method="POST"><input class="btn btn-lg btn-primary" type="submit" name="submit" value="Submit"></form><br>';

            return $layout->withModel($model);
        }
    ],

    /*'dashboard:remove' => new Call(function($event, $response, $args) {
        yield function($layout, $model = null) {
            $model .= '<h1>Dashboard\Remove</h1>';

            $layout->model($model);

            return $layout;
        };
    }),*/

    'service\resolver' => [
        function() {
            return null;
        },
        'service\provider',
        'resolver\exception'
    ],

    'web' => include __DIR__ . '/web.php',

] + include __DIR__ . '/../vendor/mvc5/mvc5/config/event.php';
