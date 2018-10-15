<?php
return [
    '/post/*' => [
        'type' => 2,
    ],
    '/post-type/*' => [
        'type' => 2,
    ],
    'post' => [
        'type' => 2,
        'description' => 'Manage Post',
        'children' => [
            '/post/*',
        ],
    ],
    'post_type' => [
        'type' => 2,
        'description' => 'Manage Post type',
        'children' => [
            '/post-type/*',
        ],
    ],
    'admin' => [
        'type' => 1,
        'description' => 'Administrator Role',
        'children' => [
            'post',
            'post_type',
            'pms_admininstrator',
        ],
    ],
    '/administrator/*' => [
        'type' => 2,
    ],
    'pms_admininstrator' => [
        'type' => 2,
        'description' => 'Administrator Permission',
        'children' => [
            '/administrator/*',
        ],
    ],
];
