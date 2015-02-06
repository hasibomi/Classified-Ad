<?php

class AdpublishController extends BaseController
{
	// Publish ad
	public function publish($id)
	{
		$ad = Ad::find($id);

		if($ad->count() > 0)
		{
			$ad->ad_publish = 1;
			$ad->save();

			$email = $ad->user->email;
			$name = $ad->user->name;
			$ad_title = $ad->ad_title;

			Mail::send("Emails.AdPublish", ["id"=>$ad->ad_id, "title"=>$ad_title], function($message) use($email, $name, $ad_title)
			{
				$message->from("donotreply@okmobileltd.com", "Ok Mobile Ltd");
				$message->to($email, $name)->subject("Your ad " . $ad_title . " has been published");
			});

			return Redirect::back()
				->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> Ad published.</div>");
		}
	}

	// Show published ad
	public function published()
	{
		return View::make("Dashboard.Ad.Published")
			->with("ads", Ad::where("ad_publish", 1));
	}

	// Unpublish ad
	public function unpublish($id)
	{
		$ad = Ad::find($id);

		if($ad->count() > 0)
		{
			$ad->ad_publish = 0;
			$ad->save();

			$email = $ad->user->email;
			$name = $ad->user->name;
			$ad_title = $ad->ad_title;

			Mail::send("Emails.AdUnPublish", ["id"=>$ad->ad_id, "title"=>$ad_title], function($message) use($email, $name, $ad_title)
			{
				$message->from("donotreply@okmobileltd.com", "Ok Mobile Ltd");
				$message->to($email, $name)->subject("Sorry your ad " . $ad_title . " has been unpublished");
			});

			return Redirect::back()
				->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> Ad unpublished.</div>");
		}
	}

	// Edit ad
	public function edit($id)
	{
		$ad = Ad::find($id);

		if($ad->count() > 0)
		{
			return View::make("Dashboard.Ad.Edit")
				->with("ad", $ad)
				->with("catagories", Catagory::all());
		}
	}

	// Update ad
	public function update($id)
	{
		$validator = Validator::make(Input::all(),
			[
				"catagory" => "required|integer",
				"segment" =>	"required|integer",
				"subsegment" =>	"required|integer",
				"district" =>	"required|integer",
				"thana" =>	"required|integer",
				"ad_title" =>	"required|min:3",
				"ad_description" =>	"required|min:10",
				"product_price" =>	"required|numeric",
				"image" =>	"image|mimes:jpg,jpeg,png|max:200",
				"privacy" => "required"
			]
		);

		if($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		}

		$ad_id = $id;
		$title = Input::get("ad_title");
		$email = Auth::user()->email;
		$name = Auth::user()->user_name;

		if(Input::hasFile("image"))
		{
			$file = Input::file("image");
			$image = date('Y-m-d-H-i-s-') . $file->getClientOriginalName();

			$file->move("assets/images/ads", $image);

			$ad = Ad::where("ad_id", $id);

			if($ad->count() > 0)
			{
				$ad->update(
					[
						"catagory_id" => Input::get("catagory"),
						"subsegment_id" => Input::get("subsegment"),
						"district_id" => Input::get("district"),
						"thana_id" => Input::get("thana"),
						"ad_title" => $title,
						"ad_description" => Input::get("ad_description"),
						"product_price" => Input::get("product_price"),
						"ad_image" => 'assets/images/ads/' . $image
					]
				);

				return Redirect::to("admin/dashboard")
					->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> Ad updated.</div>");
			}
		}
		else
		{
			$ad = Ad::where("ad_id", $id);

			if($ad->count() > 0)
			{
				$ad->update(
					[
						"catagory_id" => Input::get("catagory"),
						"subsegment_id" => Input::get("subsegment"),
						"district_id" => Input::get("district"),
						"thana_id" => Input::get("thana"),
						"ad_title" => $title,
						"ad_description" => Input::get("ad_description"),
						"product_price" => Input::get("product_price"),
					]
				);

				return Redirect::to("admin/dashboard")
					->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> Ad updated.</div>");
			}
		}

		return Redirect::back()
			->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Error occured. Please try after sometime.</div>");
	}

	// Ad delete
	public function delete($id)
	{
		$a = Ad::find($id);

		if($a->count() == 0)
		{
			$email = $ad->user->email;
			$name = $ad->user->name;
			$ad_title = $ad->ad_title;

			Mail::send("Emails.AdDeleteAdmin", ["id"=>$ad->ad_id, "title"=>$ad_title], function($message) use($email, $name, $ad_title)
			{
				$message->from("donotreply@okmobileltd.com", "Ok Mobile Ltd");
				$message->to($email, $name)->subject("Sorry your ad " . $ad_title . " has been deleted");
			});

			$a->delete();

			return Redirect::back()
				->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> Ad deleted.</div>");
		}
	}

	// Ad control
	public function control()
	{
		if(Input::get("delete"))
		{
			$validator = Validator::make(Input::all(), ['ads'=>'required']);

			if($validator->fails())
			{
				return Redirect::back()
					->withErrors($validator)
					->withInput();
			}
			else
			{
				$ads = Input::get("ads");

				foreach($ads as $ad)
				{
					$delete = Ad::find($ad);

					$delete->delete();
				}

				return Redirect::back()
					->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> Ad(s) deleted.</div>");
			}
		}
		elseif(Input::get("publish"))
		{
			$validator = Validator::make(Input::all(), ['ads'=>'required']);

			if($validator->fails())
			{
				return Redirect::back()
					->withErrors($validator)
					->withInput();
			}
			else
			{
				$ads = Input::get("ads");

				foreach($ads as $ad)
				{
					$publish = Ad::find($ad);

					$publish->ad_publish = 1;

					$publish->save();
				}

				return Redirect::back()
					->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> Ad(s) published.</div>");
			}
		}
		elseif(Input::get("unpublish"))
		{
			$validator = Validator::make(Input::all(), ['ads'=>'required']);

			if($validator->fails())
			{
				return Redirect::back()
					->withErrors($validator)
					->withInput();
			}
			else
			{
				$ads = Input::get("ads");

				foreach($ads as $ad)
				{
					$unpublish = Ad::find($ad);

					$unpublish->ad_publish = 0;

					$unpublish->save();
				}

				return Redirect::back()
					->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> Ad(s) unpublished.</div>");
			}
		}
	}
}