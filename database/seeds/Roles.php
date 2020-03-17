<?php

use Illuminate\Database\Seeder;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        DB::table('roles')->insert([
        	['id'=>1,'name'=>'admin', 'display_name'=>'Admin'],
        	['id'=>2,'name'=>'content', 'display_name'=>'Content'],
        	['id'=>3,'name'=>'writer', 'display_name'=>'Nguời viết bài']
        ]);
    }
}
