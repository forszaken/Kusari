<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/foo' => [[['_route' => 'foo_route', '_controller' => 'app\\Controllers\\IndexController::Index'], null, ['GET' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/foo/([0-9]+)(*:20)'
            .')/?$}sD',
    ],
    [ // $dynamicRoutes
        20 => [
            [['_route' => 'foo_placeholder_route', 'controller' => 'FooController::loadAction'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
