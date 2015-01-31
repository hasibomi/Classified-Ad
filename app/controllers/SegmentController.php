<?php

class SegmentController extends BaseController
{

	// Lists
	public function all()
	{
		return View::make("Dashboard.Segment.Lists")
			->with("segments", Segment::all());
	}

	// Create page
	public function create()
	{
		return View::make("Dashboard.Segment.Create")
			->with("catagories", Catagory::all());
	}

	// Store segment
	public function store()
	{
		$validator = Validator::make(Input::all(), ["segment" => "required", "catagory" => "required"]);

		if($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		}

		$segment = new Segment;
		$segment->segment_name = Input::get("segment");
		$segment->catagory_id = Input::get("catagory");

		if($segment->save())
		{
			return Redirect::back()
				->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> Segment added. Create another one.</div>");
		}

		return Redirect::back()
			->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Error occured. Please try after sometime.</div>");
	}

	// Edit segment page
	public function edit($id)
	{
		$segment = Segment::find($id);

		if($segment)
		{
			return View::make("Dashboard.Segment.Edit")
				->with("segment", $segment)
				->with("catagories", Catagory::all());
		}

		return Redirect::back()
			->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Segment not found.</div>");
	}

	// Update segment
	public function update($id)
	{
		$validator = Validator::make(Input::all(), ["catagory"=>"required", "catagory"=>"required"]);

		if($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator);
		}

		$segment = Segment::find($id);

		if($segment)
		{
			$segment->segment_name = Input::get("segment");
			$segment->catagory_id = Input::get("catagory");

			if($segment->save())
			{
				return Redirect::route("SegmentListPage")
					->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> Segment updated.</div>");
			}

			return Redirect::route("SegmentListPage")
				->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Error occured. Please try after sometime.</div>");
		}

		return Redirect::back()
			->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Segment not found.</div>");
	}

	// Delete segment
	public function delete($id)
	{
		$segment = Segment::find($id);

		if($segment)
		{
			$segment->delete();

			$subsegment = Subsegment::where("segment_id", $id);

			$subsegment->delete();

			return Redirect::route("SegmentListPage")
					->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> Segment deleted.</div>");
		}

		return Redirect::back()
			->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Segment not found.</div>");
	}
}