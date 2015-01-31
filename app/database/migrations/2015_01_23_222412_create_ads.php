<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAds extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("ads", function($a)
		{
			$a->increments("id");
			$a->integer("ad_id");
			$a->integer("user_id");
			$a->integer("catagory_id");
			$a->integer("segment_id");
			$a->integer("subsegment_id");
			$a->string("ad_title");
			$a->text("ad_description");
			$a->text("product_price");
			$a->string("ad_image");
			$a->boolean("ad_publish")->default(0);
			$a->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("ads");
	}

}
