<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'id' => 1,
                'name' => 'Danh mục sản phẩm',
                'display_name' => 'Danh mục sản phẩm',
                'parent_id' => 0,
                'key_code' => '',
            ],
            [
                'id' => 2,
                'name' => 'Danh sách danh mục',
                'display_name' => 'Danh sách danh mục',
                'parent_id' => 1,
                'key_code' => 'list_category'
            ],
            [
                'id' => 3,
                'name' => 'Thêm mới danh mục',
                'display_name' => 'Thêm mới danh mục',
                'parent_id' => 1,
                'key_code' => 'add_category'
            ],
            [
                'id' => 4,
                'name' => 'Sửa danh mục',
                'display_name' => 'Sửa danh mục',
                'parent_id' => 1,
                'key_code' => 'edit_category'
            ],
            [
                'id' => 5,
                'name' => 'Xoá danh mục',
                'display_name' => 'Xoá danh mục',
                'parent_id' => 1,
                'key_code' => 'delete_category'
            ],
            [
                'id' => 6,
                'name' => 'Menus',
                'display_name' => 'Menus',
                'parent_id' => 0,
                'key_code' => ''
            ],
            [
                'id' => 7,
                'name' => 'Danh sách menu',
                'display_name' => 'Danh sách menu',
                'parent_id' => 6,
                'key_code' => 'menu_list'
            ],
            [
                'id' => 8,
                'name' => 'Thêm mới menu',
                'display_name' => 'Thêm mới menu',
                'parent_id' => 6,
                'key_code' => 'add_menu'
            ],
            [
                'id' => 9,
                'name' => 'Xoá menu',
                'display_name' => 'Xoá menu',
                'parent_id' => 6,
                'key_code' => 'delete_menu'
            ],
            [
                'id' => 10,
                'name' => 'Sản phẩm',
                'display_name' => 'Menus',
                'parent_id' => 0,
                'key_code' => ''
            ],
            [
                'id' => 11,
                'name' => 'Danh sách sản phẩm',
                'display_name' => 'Danh sách sản phẩm',
                'parent_id' => 10,
                'key_code' => 'list_product'
            ],
            [
                'id' => 12,
                'name' => 'Thêm mới sản phẩm',
                'display_name' => 'Thêm mới sản phẩm',
                'parent_id' => 10,
                'key_code' => 'add_prodcut'
            ],
            [
                'id' => 13,
                'name' => 'Sửa sản phẩm',
                'display_name' => 'Sửa sản phẩm',
                'parent_id' => 10,
                'key_code' => 'edit_product'
            ],
            [
                'id' => 14,
                'name' => 'Xoá sản phẩm',
                'display_name' => 'Xoá sản phẩm',
                'parent_id' => 10,
                'key_code' => 'delete_product'
            ],
            [
                'id' => 15,
                'name' => 'Sliders',
                'display_name' => 'Sliders',
                'parent_id' => 0,
                'key_code' => ''
            ],
            [
                'id' => 16,
                'name' => 'Danh sách slider',
                'display_name' => 'Sliders',
                'parent_id' => 15,
                'key_code' => 'list_slider'
            ],
            [
                'id' => 17,
                'name' => 'Thêm mới slider',
                'display_name' => 'Thêm mới slider',
                'parent_id' => 15,
                'key_code' => 'add_slider'
            ],
            [
                'id' => 18,
                'name' => 'Sửa slider',
                'display_name' => 'Thêm mới slider',
                'parent_id' => 15,
                'key_code' => 'edit_slider'
            ],
            [
                'id' => 19,
                'name' => 'Xoá slider',
                'display_name' => 'Xoá slider',
                'parent_id' => 15,
                'key_code' => 'delete_slider'
            ],

            [
                'id' => 20,
                'name' => 'Settings',
                'display_name' => 'Settings',
                'parent_id' => 0,
                'key_code' => ''
            ],
            [
                'id' => 21,
                'name' => 'Danh settings',
                'display_name' => 'Danh settings',
                'parent_id' => 20,
                'key_code' => 'list_setting'
            ],
            [
                'id' => 22,
                'name' => 'Thêm mới setting',
                'display_name' => 'Thêm mới setting',
                'parent_id' => 20,
                'key_code' => 'add_setting'
            ],
            [
                'id' => 23,
                'name' => 'Sửa setting',
                'display_name' => 'Sửa setting',
                'parent_id' => 20,
                'key_code' => 'edit_setting'
            ],
            [
                'id' => 24,
                'name' => 'Xoá setting',
                'display_name' => 'Xoá setting',
                'parent_id' => 20,
                'key_code' => 'delete_setting'
            ],

            [
                'id' => 25,
                'name' => 'Users',
                'display_name' => 'Users',
                'parent_id' => 0,
                'key_code' => ''
            ],
            [
                'id' => 26,
                'name' => 'Danh sách users',
                'display_name' => 'Danh sách users',
                'parent_id' => 25,
                'key_code' => 'list_user'
            ],
            [
                'id' => 27,
                'name' => 'Thêm mới user',
                'display_name' => 'Thêm mới user',
                'parent_id' => 25,
                'key_code' => 'add_user'
            ],
            [
                'id' => 28,
                'name' => 'Sửa user',
                'display_name' => 'Sửa user',
                'parent_id' => 25,
                'key_code' => 'edit_user'
            ],
            [
                'id' => 29,
                'name' => 'Xoá user',
                'display_name' => 'Xoá user',
                'parent_id' => 25,
                'key_code' => 'delete_user'
            ],

             [
                'id' => 30,
                'name' => 'Permissions',
                'display_name' => 'Permissions',
                'parent_id' => 0,
                 'key_code' => ''
            ],
            [
                'id' => 31,
                'name' => 'Danh sách vai trò',
                'display_name' => 'Danh sách vai trò',
                'parent_id' => 30,
                'key_code' => 'list_permission'
            ],
            [
                'id' => 32,
                'name' => 'Thêm mới vai trò',
                'display_name' => 'Thêm mới vai trò',
                'parent_id' => 30,
                'key_code' => 'add_permission'
            ],
            [
                'id' => 33,
                'name' => 'Sửa vai trò',
                'display_name' => 'Sửa vai trò',
                'parent_id' => 30,
                'key_code' => 'edit_permission'
            ],
            [
                'id' => 34,
                'name' => 'Xoá vai trò',
                'display_name' => 'Xoá vai trò',
                'parent_id' => 30,
                'key_code' => 'delete_permission'
            ],
            [
                'id' => 35,
                'name' => 'Sửa menu',
                'display_name' => 'Sửa menu',
                'parent_id' => 6,
                'key_code' => 'edit_menu'
            ],
        ]);
    }
}
