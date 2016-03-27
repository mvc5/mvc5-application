<?php
/**
 *
 */

use Mvc5\Plugin\Call;

return [
    'blog:add' => (object) [
        Blog\Add\Validate::class,
        Blog\Add\Save::class,
        Blog\Add\Respond::class
    ],
    'blog:remove' => [
        function() {
            return $model = '<h1>Validate</h1>';
        },
        function($model) {
            return $model . '<h1>Remove</h1>';
        },
        function($layout, $model = null) {
            $model .= '<h1>Respond</h1>';

            $model .= '<form method="POST"><input type="submit" name="submit" value="submit"></form><br>';

            $layout->model($model);

            return $layout;
        }
    ],

    /*'blog:remove' => new Call(function($event, $response, $args) {
        yield function($layout, $model = null) {
            $model .= '<h1>Blog\Remove</h1>';

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

    'middleware' => [
        'middleware\router',
        'middleware\controller',
        'middleware\layout',
        'middleware\renderer'
    ],

    //uncomment for PSR-7
    /*'route\error' => [
        'error\handler',
        'error\status',
        'error\route',
        // halt mvc event or new response object
        //'error\controller',
        new \Mvc5\Plugin\Plugin(\Mvc5\Route\Error\Controller::class, [], ['setModel' => new \Mvc5\Plugin\Plugin('error\model')]),
        function($layout, $model, $response) {
            $layout->model($model);
            return $layout;
        },
        'error\view',
        'error\response',
    ],*/

    //uncomment for mvc and PSR-7
    /*'controller\exception' => [
        'exception\status',
        'exception\controller',
        'exception\view',
        'exception\response'
    ],*/

    //uncomment for mvc and PSR-7
    /*'route\exception' => [
        'exception\status',
        'exception\route',
        //'exception\controller',
        new \Mvc5\Plugin\Plugin(\Mvc5\Controller\Exception::class, [new \Mvc5\Plugin\Plugin('exception\model')]),
        'exception\view',
        'exception\response'
    ],*/

    /**
     * Comment out 'mvc' and uncomment 'middleware' for the Middleware demo
     */
    'web' => [
        'mvc',
        //'middleware',
        'response\send'
    ],

] + include __DIR__ . '/../vendor/mvc5/mvc5/config/event.php';
