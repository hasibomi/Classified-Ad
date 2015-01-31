<?php

class UserTableSeeder extends Seeder
{
	public function run()
	{
		$u = new User;

		$u->user_name = "Admin";
		$u->email = "admin@okmobileltd.com";
		$u->password = Hash::make("123456");
		$u->is_admin = 1;

		$u->save();
	}
}