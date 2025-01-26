<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'admin' => [
            'users' => 'c,r,u,d',
            'produtos' => 'c,r,u,d',
            'categorias' => 'c,r,u,d',
            'pedidos' => 'c,r,u,d',
            'estoques' => 'c,r,u,d',
            'envios' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'user' => [
            'produtos' => 'r',
            'categorias' => 'r',
            'pedidos' => 'c,r',
            'carrinho' => 'c,r,u,d',
            'profile' => 'r,u'
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
