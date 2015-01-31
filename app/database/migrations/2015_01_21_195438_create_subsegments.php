<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubsegments extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("subsegments", function($s)
		{
			$s->increments("id");
			$s->string("subsegment_name");
			$s->integer("catagory_id");
			$s->integer("segment_id");
			$s->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("subsegments");
	}

}
