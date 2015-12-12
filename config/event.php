<?php
/**
 *
 */

return [
    'blog:create' => (object) [
        Blog\Add\Validate::class,
        Blog\Add\Save::class,
        Blog\Add\Respond::class
    ],
    'blog:remove' => [
        function() {
            ob_start();

            echo '<h1>Validate</h1>';
        },
        function() {
            echo '<h1>Remove</h1>';
        },
        function($layout) {
            echo '<h1>Respond</h1>';
            $layout->model(ob_get_clean());
            return $layout;
        }
    ],

    'service\resolver' => [
        'service\provider',
        'service\manager',
        'resolver\exception'
    ],

] + include __DIR__ . '/../vendor/mvc5/mvc5/config/event.php';
