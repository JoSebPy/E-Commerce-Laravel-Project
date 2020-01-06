<?php

use Illuminate\Database\Seeder;

class userstable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
        	[
        		'name'=>"admin",
                'email'=>'admin@admin.com',
                'phone'=>'08123456789',
                'gender'=>'female',
                'password'=>\Illuminate\Support\Facades\Hash::make('12345678'),
                'address'=>'ADMIN SERVER ',
                'role'=>'admin',
                'picture'=>'METAL SLUG.jpg',
        	],
            [
                'name'=>"member",
                'email'=>'member@member.com',
                'phone'=>'081234566543',
                'gender'=>'male',
                'password'=>\Illuminate\Support\Facades\Hash::make('12345678'),
                'address'=>'MEMBER SCHOOL',
                'role'=>'member',
                'picture'=>'GUNDAM.jpg',
            ],
            [
                'name'=>"example",
                'email'=>'example@example.com',
                'phone'=>'08123432876',
                'gender'=>'female',
                'password'=>\Illuminate\Support\Facades\Hash::make('12345678'),
                'address'=>'EXAMPLE HOST',
                'role'=>'member',
                'picture'=>'BATTLE CHICK.jpg',
            ],
        ]);
    }
}
