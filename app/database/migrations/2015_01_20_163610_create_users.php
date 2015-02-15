<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("users", function($u)
		{
			$u->increments("id");
			$u->string("name");
			$u->string('username');
			$u->string("email");
			$u->text("mobile");
			$u->string("profession");
			$u->text("date_of_birth");
			$u->integer("user_thana");
			$u->integer("user_district");
			$u->text("address");
			$u->string("password");
			$u->string("remember_token");
			$u->integer("is_admin")->default(0);
			$u->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("users");
	}

}
