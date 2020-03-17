<?php

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
        	['id'=>1,'email'=>'Duongtv2712@gmail.com', 'password'=>bcrypt('12345'), 'name'=>'DuongTV',],
        	
        	

        ]);
    }
}
