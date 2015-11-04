<?php
/**
 *
 */

use Mvc5\Service\Config\Service\Service;

return [
    //'blog:create' => new Service('Blog\Create\Create'),
    'blog:create' => new Service('Blog2->Create'),
] + include __DIR__ . '/../vendor/mvc5/mvc5/config/alias.php';
