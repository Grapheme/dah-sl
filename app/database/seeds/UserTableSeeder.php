<?php

class UserTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
			'username'=>'admin',
			'email'=>'admin@dah-sl.ru',
			'active'=>1,
			'password'=>Hash::make('123456'),
		));
	}

}