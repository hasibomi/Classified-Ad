<?php

class AdsearchController extends BaseController
{
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

	// Find thanas of corresponding districts
	public function findThana($id)
	{
		$thanas = Thana::where("district_id", $id);

		if($thanas->count() > 0)
		{
			foreach($thanas->get() as $t)
			{
				echo '<option value="'.$t->id.'">'.$t->thana_name.'</option>';
			}
		}
		else
		{
			echo '<option>No thanas found</option>';
		}
	}

	// Search Ads
	public function all()
	{
		$v = Validator::make(Input::all(),
			[
				"catagory"=>"required|integer|min:1",
				"segment"=>"required|integer|min:1",
				"subsegment"=>"required|integer|min:1",
				"district"=>"required|integer|min:1",
				"thana"=>"required|integer|min:1"
			]
		);

		if($v->fails())
		{
			return Redirect::back()
				->withErrors($v)
				->withInput();
		}

		$catagory = Input::get("catagory");
		$segment = Input::get("segment");
		$subsegment = Input::get("subsegment");
		$district = Input::get("district");
		$thana = Input::get("thana");

		$search = Ad::where("catagory_id", "=", $catagory)
									->where("segment_id", "=", $segment)
									->where("subsegment_id", "=", $subsegment)
									->where("district_id", "=", $district)
									->where("thana_id", "=", $thana)
									->where("ad_publish", "=", 1);

		if($search->count() > 0)
		{
			return View::make("Main.AdView.Lists")
				->with("ads", $search)
				->with("catagories", Catagory::all())
				->with("districts", District::all());
		}
		else
		{
			return Redirect::back()
			->with("event", "No ads found");
		}
	}

	// Ad view
	public function view($id)
	{
		$ad = Ad::find($id);

		if($ad->count() > 0)
		{
			return View::make("Main.AdView.View")
				->with("ad", $ad)
				->with("catagories", Catagory::all())
				->with("districts", District::all());
		}
	}
}