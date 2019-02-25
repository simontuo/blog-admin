<?php
/**
 * Created by SimonTuo.
 * User: SimonTuo
 * Date: 2019/2/17
 * Time: 12:17 AM
 */

return [
    'home'        => [
        'index' => [
            [
                'name'        => '首页',
                'url'         => '/',
                'cannotClose' => true
            ]
        ]
    ],
    'articles'    => [
        'show'   => [
            [
                'name' => '文章管理',
                'url'   => '/articles'
            ],
            [
                'name' => '查看文章',
                'url'   => ''
            ]
        ],
        'create' => [
            [
                'name' => '文章管理',
                'url'   => '/articles'
            ],
            [
                'name' => '新建文章',
                'url'   => ''
            ]
        ],
        'edit'   => [
            [
                'name' => '文章管理',
                'url'   => '/articles'
            ],
            [
                'name' => '编辑文章',
                'url'   => ''
            ]
        ]
    ],
    'tags'        => [
        'create' => [
            [
                'name' => '标签管理',
                'url'   => '/tags'
            ],
            [
                'name' => '新建标签',
                'url'   => ''
            ],
        ],
        'edit'   => [
            [
                'name' => '标签管理',
                'url'   => '/tags'
            ],
            [
                'name' => '编辑标签',
                'url'   => ''
            ],
        ]
    ],
    'permissions' => [
        'create' => [
            [
                'name' => '权限管理',
                'url'   => '/permissions'
            ],
            [
                'name' => '新建权限',
                'url'   => ''
            ],
        ],
        'edit'   => [
            [
                'name' => '权限管理',
                'url'   => '/permissions'
            ],
            [
                'name' => '编辑权限',
                'url'   => ''
            ],
        ]
    ],
    'roles'       => [
        'create' => [
            [
                'name' => '角色管理',
                'url'   => '/roles'
            ],
            [
                'name' => '新建角色',
                'url'   => ''
            ],
        ],
        'edit'   => [
            [
                'name' => '角色管理',
                'url'   => '/roles'
            ],
            [
                'name' => '编辑角色',
                'url'   => ''
            ],
        ]
    ],
    'resources'   => [
        'create' => [
            [
                'name' => '资源管理',
                'url'   => '/roles'
            ],
            [
                'name' => '新建资源',
                'url'   => ''
            ],
        ],
        'edit'   => [
            [
                'name' => '资源管理',
                'url'   => '/roles'
            ],
            [
                'name' => '编辑资源',
                'url'   => ''
            ],
        ]
    ]
];