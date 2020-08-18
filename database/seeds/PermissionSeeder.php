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
                'parent_id' => 0
            ],
            [
                'id' => 2,
                'name' => 'Danh sách danh mục',
                'display_name' => 'Danh sách danh mục',
                'parent_id' => 1
            ],
            [
                'id' => 3,
                'name' => 'Thêm mới danh mục',
                'display_name' => 'Thêm mới danh mục',
                'parent_id' => 1
            ],
            [
                'id' => 4,
                'name' => 'Sửa danh mục',
                'display_name' => 'Sửa danh mục',
                'parent_id' => 1
            ],
            [
                'id' => 5,
                'name' => 'Xoá danh mục',
                'display_name' => 'Xoá danh mục',
                'parent_id' => 1
            ],
            [
                'id' => 6,
                'name' => 'Menus',
                'display_name' => 'Menus',
                'parent_id' => 0
            ],
            [
                'id' => 7,
                'name' => 'Danh sách menu',
                'display_name' => 'Danh sách menu',
                'parent_id' => 6
            ],
            [
                'id' => 8,
                'name' => 'Thêm mới menu',
                'display_name' => 'Thêm mới menu',
                'parent_id' => 6
            ],
            [
                'id' => 9,
                'name' => 'Xoá menu',
                'display_name' => 'Xoá menu',
                'parent_id' => 6
            ],
            [
                'id' => 10,
                'name' => 'Sản phẩm',
                'display_name' => 'Menus',
                'parent_id' => 0
            ],
            [
                'id' => 11,
                'name' => 'Danh sách sản phẩm',
                'display_name' => 'Danh sách sản phẩm',
                'parent_id' => 10
            ],
            [
                'id' => 12,
                'name' => 'Thêm mới sản phẩm',
                'display_name' => 'Thêm mới sản phẩm',
                'parent_id' => 10
            ],
            [
                'id' => 13,
                'name' => 'Sửa sản phẩm',
                'display_name' => 'Sửa sản phẩm',
                'parent_id' => 10
            ],
            [
                'id' => 14,
                'name' => 'Xoá sản phẩm',
                'display_name' => 'Xoá sản phẩm',
                'parent_id' => 10
            ],
            [
                'id' => 15,
                'name' => 'Sliders',
                'display_name' => 'Sliders',
                'parent_id' => 0
            ],
            [
                'id' => 16,
                'name' => 'Danh sách slider',
                'display_name' => 'Sliders',
                'parent_id' => 15
            ],
            [
                'id' => 17,
                'name' => 'Thêm mới slider',
                'display_name' => 'Thêm mới slider',
                'parent_id' => 15
            ],
            [
                'id' => 18,
                'name' => 'Sửa slider',
                'display_name' => 'Thêm mới slider',
                'parent_id' => 15
            ],
            [
                'id' => 19,
                'name' => 'Xoá slider',
                'display_name' => 'Xoá slider',
                'parent_id' => 15
            ],

            [
                'id' => 20,
                'name' => 'Settings',
                'display_name' => 'Settings',
                'parent_id' => 0
            ],
            [
                'id' => 21,
                'name' => 'Danh settings',
                'display_name' => 'Danh settings',
                'parent_id' => 20
            ],
            [
                'id' => 22,
                'name' => 'Thêm mới setting',
                'display_name' => 'Thêm mới setting',
                'parent_id' => 20
            ],
            [
                'id' => 23,
                'name' => 'Sửa setting',
                'display_name' => 'Sửa setting',
                'parent_id' => 20
            ],
            [
                'id' => 24,
                'name' => 'Xoá setting',
                'display_name' => 'Xoá setting',
                'parent_id' => 20
            ],

            [
                'id' => 25,
                'name' => 'Users',
                'display_name' => 'Users',
                'parent_id' => 0
            ],
            [
                'id' => 26,
                'name' => 'Danh sách users',
                'display_name' => 'Danh sách users',
                'parent_id' => 25
            ],
            [
                'id' => 27,
                'name' => 'Thêm mới user',
                'display_name' => 'Thêm mới user',
                'parent_id' => 25
            ],
            [
                'id' => 28,
                'name' => 'Sửa user',
                'display_name' => 'Sửa user',
                'parent_id' => 25
            ],
            [
                'id' => 29,
                'name' => 'Xoá user',
                'display_name' => 'Xoá user',
                'parent_id' => 25
            ],

             [
                'id' => 30,
                'name' => 'Permissions',
                'display_name' => 'Permissions',
                'parent_id' => 0
            ],
            [
                'id' => 31,
                'name' => 'Danh sách vai trò',
                'display_name' => 'Danh sách vai trò',
                'parent_id' => 30
            ],
            [
                'id' => 32,
                'name' => 'Thêm mới vai trò',
                'display_name' => 'Thêm mới vai trò',
                'parent_id' => 30
            ],
            [
                'id' => 33,
                'name' => 'Sửa vai trò',
                'display_name' => 'Sửa vai trò',
                'parent_id' => 30
            ],
            [
                'id' => 34,
                'name' => 'Xoá vai trò',
                'display_name' => 'Xoá vai trò',
                'parent_id' => 30
            ],
            [
                'id' => 35,
                'name' => 'Sửa menu',
                'display_name' => 'Sửa menu',
                'parent_id' => 6
            ],
        ]);
    }
}
