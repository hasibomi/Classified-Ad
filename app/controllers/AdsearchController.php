<?php

class AdsearchController extends BaseController
{
	// Find segments of corresponding catagories
	public function findSegment($id)
	{
		$segments = Segment::where("catagory_id", $id);

		if($segments->count() > 0)
		{
            echo '<option value="0">All</option>';
			foreach($segments->get() as $s)
			{
				echo '<option value="'.$s->id.'">'.$s->segment_name.'</option>';
			}
		}
		else
		{
			echo '<option value="0">No segments found</option>';
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
			echo '<option value="0">No sub segments found</option>';
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
			echo '<option value="0">No thanas found</option>';
		}
	}

	// Search Ads
	public function all()
	{
		$v = Validator::make(Input::all(),
			[
				"catagory"=>"required|integer|min:0",
				"segment"=>"required|integer|min:0",
				"subsegment"=>"required|integer|min:0",
				"district"=>"required|integer|min:0",
				"thana"=>"required|integer|min:0"
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

        // Search ad by all catagory & district
        if($catagory == 0 && $segment == 0 && $subsegment == 0 && $district == 0 && $thana == 0)
        {
            $find_ad = Ad::where("ad_publish", "=", 1)
                ->orderBy("id", "DESC");

            if($find_ad->count() > 0)
            {
                return View::make("Main.AdView.Lists")
                    ->with("ads", $find_ad->paginate(10))
                    ->with("catagories", Catagory::all())
                    ->with("districts", District::all());
            }
            else
            {
                return Redirect::back()
                    ->with("event", "No ads found");
            }
        }
        // Search ad by specific catagory, all segment & all district
        else if($catagory != 0 && $segment == 0 && $subsegment == 0 && $district == 0 && $thana == 0)
        {
            $find_ad = Ad::where("catagory_id", $catagory)->where("ad_publish", "=", 1)->orderBy("id", "DESC");

            if($find_ad->count() > 0)
            {
                return View::make("Main.AdView.Lists")
                    ->with("ads", $find_ad->paginate(10))
                    ->with("catagories", Catagory::all())
                    ->with("districts", District::all());
            }
            else
            {
                return Redirect::back()
                    ->with("event", "No ads found");
            }
        }
        // Search ad by all catagory & specific district
        else if($catagory == 0 && $segment == 0 && $subsegment == 0 && $district != 0 && $thana != 0)
        {
            $find_ad = Ad::where("district_id", $district)->where("thana_id", $thana)->where("ad_publish", "=", 1)
                ->orderBy("id", "DESC");

            if($find_ad->count() > 0)
            {
                return View::make("Main.AdView.Lists")
                    ->with("ads", $find_ad->paginate(10))
                    ->with("catagories", Catagory::all())
                    ->with("districts", District::all());
            }
            else
            {
                return Redirect::back()
                    ->with("event", "No ads found");
            }
        }
        // Search ad by specific catagory, all segment, specific district & specific thana
        else if($catagory != 0 && $segment == 0 && $subsegment == 0 && $district != 0 && $thana != 0)
        {
            $find_ad = Ad::where("catagory_id", $catagory)->where("district_id", $district)->where("thana_id", $thana)->where("ad_publish", "=", 1)
                ->orderBy("id", "DESC");

            if($find_ad->count() > 0)
            {
                return View::make("Main.AdView.Lists")
                    ->with("ads", $find_ad->paginate(10))
                    ->with("catagories", Catagory::all())
                    ->with("districts", District::all());
            }
            else
            {
                return Redirect::back()
                    ->with("event", "No ads found");
            }
        }
        // Search ad by specific catagory, specific segment, specific subsegment, & all district
        else if($catagory != 0 && $segment != 0 && $subsegment !=0 && $district == 0 && $thana == 0)
        {
            $find_ad = Ad::where("catagory_id", $catagory)->where("segment_id", $segment)->where("subsegment_id", $subsegment)->where("ad_publish", "=", 1)
                ->orderBy("id", "DESC");

            if($find_ad->count() > 0)
            {
                return View::make("Main.AdView.Lists")
                    ->with("ads", $find_ad->paginate(10))
                    ->with("catagories", Catagory::all())
                    ->with("districts", District::all());
            }
            else
            {
                return Redirect::back()
                    ->with("event", "No ads found");
            }
        }
        else if($catagory != 0 && $segment != 0 && $subsegment !=0 && $district != 0 && $thana != 0)
        {
            $search = Ad::where("catagory_id", "=", $catagory)
                                        ->where("segment_id", "=", $segment)
                                        ->where("subsegment_id", "=", $subsegment)
                                        ->where("district_id", "=", $district)
                                        ->where("thana_id", "=", $thana)
                                        ->where("ad_publish", "=", 1)
                                        ->orderBy("id", "DESC")
                                        ->paginate(10);

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
	}

	// Ad view
	public function view($id)
	{
		$ad = Ad::where("ad_id", $id);

		if($ad->count() > 0)
		{
			return View::make("Main.AdView.View")
				->with("ads", $ad->get())
				->with("catagories", Catagory::all())
				->with("districts", District::all());
		}
	}
}