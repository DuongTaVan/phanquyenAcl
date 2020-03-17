<?php

use Illuminate\Database\Seeder;

class Permission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();
        DB::table('permissions')->insert([
        	['id'=>1,'name'=>'user-list', 'display_name'=>'Danh sách user'],
        	['id'=>2,'name'=>'user-add', 'display_name'=>'Thêm user'],
        	['id'=>3,'name'=>'user-edit', 'display_name'=>'Sửa user'],
        	['id'=>4,'name'=>'user-delete', 'display_name'=>'Xóa user'],
        	['id'=>5,'name'=>'role-list', 'display_name'=>'Danh sách role'],
        	['id'=>6,'name'=>'role-add', 'display_name'=>'Thêm role'],
        	['id'=>7,'name'=>'role-edit', 'display_name'=>'Sửa role'],
        	['id'=>8,'name'=>'role-delete', 'display_name'=>'Xóa role'],

        ]);
    }
}
