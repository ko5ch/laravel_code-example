<?php
use Modules\Users\Entities\Role;

return [
    'role_structure' => [

        Role::TYPE_ADMIN => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ]
    ],
    'permission_structure' => [
        'cru_user' => [
            'profile' => 'c,r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
