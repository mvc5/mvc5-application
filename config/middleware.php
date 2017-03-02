<?php
/**
 *
 */

return [
    'route\match' => new Mvc5\Plugin\Args([
        new Mvc5\Plugin\Plugin('route\match\merge'),
        new Mvc5\Plugin\Plugin('route\match\scheme'),
        new Mvc5\Plugin\Plugin('route\match\host'),
        new Mvc5\Plugin\Plugin('route\match\path'),
        new Mvc5\Plugin\Plugin('route\match\method'),
        new Mvc5\Plugin\Plugin('route\match\action'),
        new Mvc5\Plugin\Plugin('route\match\controller'),
        new Mvc5\Plugin\Plugin('route\match\middleware'),
        new Mvc5\Plugin\Plugin('route\match\wildcard')
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
