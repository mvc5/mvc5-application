<?php
/**
 *
 */

use Mvc5\Plugin\Args;
use Mvc5\Plugin\Plugin;

return [
    'route\match' => new Args([
        new Plugin('route\match\merge'),
        new Plugin('route\match\scheme'),
        new Plugin('route\match\host'),
        new Plugin('route\match\path'),
        new Plugin('route\match\method'),
        new Plugin('route\match\action'),
        new Plugin('route\match\controller'),
        new Plugin('route\match\middleware'),
        new Plugin('route\match\wildcard')
    ]),
    'web' => [
        'web\context',
        'web\route',
        'web\error',
        'web\service',
        'web\controller',
        'web\layout',
        'web\render',
        'web\status',
        'web\version',
        'web\send',
    ],
];
