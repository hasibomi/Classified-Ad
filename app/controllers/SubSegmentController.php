<?php

class SubSegmentController extends BaseController
{

	// Lists
	public function all()
	{
		return View::make("Dashboard.SubSegment.Lists")
			->with("subsegments", Subsegment::all());
	}

	// Create page
	public function create()
	{
		return View::make("Dashboard.SubSegment.Create")
			->with("catagories", Catagory::all());
	}

	// Find corresponding segments of catagories
	public function findSegment($id)
	{
		$segments = Segment::where("catagory_id", $id);

		if($segments->count() > 0)
		{
			foreach($segments->get() as $segment)
			{
				echo "<option value='" . $segment->id . "'>" . $segment->segment_name . "</option>";
			}
			
		}
	}

	// Store sub segment
	public function store()
	{
		$validator = Validator::make(Input::all(), ["segment" => "required", "catagory" => "required", "subsegment" => "required"]);

		if($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		}

		$subsegment = new Subsegment;
		$subsegment->subsegment_name = Input::get("subsegment");
		$subsegment->catagory_id = Input::get("catagory");
		$subsegment->segment_id = Input::get("segment");

		if($subsegment->save())
		{
			return Redirect::back()
				->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> Sub Segment added. Create another one.</div>");
		}

		return Redirect::back()
			->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Error occured. Please try after sometime.</div>");
	}

	// Edit segment page
	public function edit($id)
	{
		$subsegment = Subsegment::find($id);

		if($subsegment)
		{
			return View::make("Dashboard.SubSegment.Edit")
				->with("subsegment", $subsegment)
				->with("catagories", Catagory::all());
		}

		return Redirect::back()
			->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Sub Segment not found.</div>");
	}

	// Update segment
	public function update($id)
	{
		$validator = Validator::make(Input::all(), ["catagory"=>"required", "segment"=>"required", "subsegment"=>"required"]);

		if($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator);
		}

		$subsegment = Subsegment::find($id);

		if($subsegment)
		{
			$subsegment->subsegment_name = Input::get("subsegment");
			$subsegment->catagory_id = Input::get("catagory");
			$subsegment->segment_id = Input::get("segment");

			if($subsegment->save())
			{
				return Redirect::route("SubSegmentListPage")
					->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> Sub Segment updated.</div>");
			}

			return Redirect::route("SubSegmentListPage")
				->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Error occured. Please try after sometime.</div>");
		}

		return Redirect::back()
			->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Sub Segment not found.</div>");
	}

	// Delete subsegment
	public function delete($id)
	{
		$subsegment = Subsegment::find($id);

		if($subsegment)
		{
			$subsegment->delete();

			return Redirect::route("SubSegmentListPage")
					->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> Sub Segment deleted.</div>");
		}

		return Redirect::back()
			->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Sub Segment not found.</div>");
	}
}