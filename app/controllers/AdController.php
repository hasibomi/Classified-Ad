<?php

class AdController extends BaseController
{
	// Ad page
	public function ad()
	{
		return View::make("Dashboard.User.Ad.Create")
			->with("catagories", Catagory::all());
	}

	// Find segments of corresponding catagories
	public function findSegment($id)
	{
		$segments = Segment::where("catagory_id", $id);

		if($segments->count() > 0)
		{
			foreach($segments->get() as $s)
			{
				echo '<option value="'.$s->id.'">'.$s->segment_name.'</option>';
			}
		}
		else
		{
			echo '<option>No segments found</option>';
		}
	}

	// Find sub segments of corresponding segments
	public function findSubsegment($id)
	{
		$subsegments = Subsegment::where("segment_id", $id);

		if($subsegments->count() > 0)
		{
			foreach($subsegments->get() as $s)
			{
				echo '<option value="'.$s->id.'">'.$s->subsegment_name.'</option>';
			}
		}
		else
		{
			echo '<option>No sub segments found</option>';
		}
	}

	// Post ad
	public function store()
	{
		$validator = Validator::make(Input::all(),
			[
				"catagory" => "required|integer|min:1",
				"segment" =>	"required|integer|min:1",
				"subsegment" =>	"required|integer|min:1",
				"district" =>	"required|integer|min:1",
				"thana" =>	"required|integer|min:1",
				"ad_title" =>	"required|min:3",
				"ad_description" =>	"required|min:10|max:500",
				"product_price" =>	"required|numeric",
				"image" =>	"required|image|mimes:jpg,jpeg,png|max:200",
				"privacy" => "required"
			]
		);

		if($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		}

		$file = Input::file("image");
		$image = date('Y-m-d-H-i-s-') . $file->getClientOriginalName();

		$file->move("assets/images/ads/", $image);

		$ad = new Ad;

		$ad_id = rand();
		$title = Input::get("ad_title");
		$email = Auth::user()->email;
		$name = Auth::user()->user_name;

		$ad->ad_id = $ad_id;
		$ad->user_id = Auth::user()->id;
		$ad->catagory_id = Input::get("catagory");
		$ad->segment_id = Input::get("segment");
		$ad->subsegment_id = Input::get("subsegment");
		$ad->district_id = Input::get("district");
		$ad->thana_id = Input::get("thana");
		$ad->ad_title = Input::get("ad_title");
		$ad->ad_description = Input::get("ad_description");
		$ad->product_price = Input::get("product_price");
		$ad->ad_image = 'assets/images/ads/' . $image;

		if($ad->save())
		{
			Mail::send("Emails.PostSuccess", ["id"=>$ad_id, "title"=>$title], function($message) use ($email, $name, $title)
			{
				$message->from("donotreply@okmobileltd.com", "Ok Mobile Ltd.");
				$message->to($email, $name)->subject("your ad ".$title." has been successfully published and will be active for 30 days!");
			});
			return View::make("Dashboard.User.Ad.PostSuccess");
		}

		return Redirect::back()
			->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Error occured. Please try after sometime.</div>");
	}

	// Edit ad
	public function edit($id)
	{
		$ad = Ad::find($id);

		if($ad->count() > 0)
		{
			return View::make("Dashboard.User.Ad.Edit")
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
				"ad_description" =>	"required|min:10|max:500",
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

				Mail::send("Emails.PostSuccess", ["id"=>$ad_id, "title"=>$title], function($message) use ($email, $name, $title)
				{
					$message->from("donotreply@okmobileltd.com", "Ok Mobile Ltd.");
					$message->to($email, $name)->subject("your ad ".$title." has been successfully updated!");
				});
				return View::make("Dashboard.User.Ad.PostSuccess");
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

				Mail::send("Emails.PostSuccess", ["id"=>$ad_id, "title"=>$title], function($message) use ($email, $name, $title)
				{
					$message->from("donotreply@okmobileltd.com", "Ok Mobile Ltd.");
					$message->to($email, $name)->subject("your ad ".$title." has been successfully updated!");
				});
				return View::make("Dashboard.User.Ad.PostSuccess");
			}
		}

		return Redirect::back()
			->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Error occured. Please try after sometime.</div>");
	}

	// Add delete
	public function delete($id)
	{
		$ad = Ad::find($id);

		if($ad->count() > 0)
		{
			$ad_id = $ad->ad_id;
			$title = $ad->ad_title;
			$email = Auth::user()->email;
			$name = Auth::user()->user_name;

			Mail::send("Emails.AdDelete", ["id"=>$ad_id, "title"=>$title], function($message) use ($email, $name, $title)
			{
				$message->from("donotreply@okmobileltd.com", "Ok Mobile Ltd.");
				$message->to($email, $name)->subject("your ad ".$title." has been successfully deleted!");
			});

			File::delete($ad->ad_image);

			$ad->delete();

			return Redirect::to("user/dashboard")
				->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> Ad deleted.</div>");
		}
	}
}

