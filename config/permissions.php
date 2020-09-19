<?php

return [
    'access' => [
        'list-category' => 'category_list',
        'add-category' => 'category_add',
        'edit-category' =>'category_edit',
        'delete-category' => 'category_delete',
        'list-menu' => 'menu_list',
        'add-menu' => 'menu_add',
        'edit-menu' => 'menu_edit',
        'delete-menu' => 'menu_delete'

    ],
    'table_module' => [
        'category',
        'slider',
        'menu',
        'product',
        'setting',
        'user',
        'role',
    ],
    'module_children' => [
        'list',
        'add',
        'edit',
        'delete'
    ]
];
