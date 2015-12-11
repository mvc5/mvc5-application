<?php
/**
 *
 */

use Mvc5\Plugin\Plugin;

return [
    //'blog:create' => new Plugin('Blog\Create\Create'),
    'blog:create' => new Plugin('blog2->create'),
] + include __DIR__ . '/../vendor/mvc5/mvc5/config/alias.php';
