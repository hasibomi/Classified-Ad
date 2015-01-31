<?php

class CatagoryController extends BaseController
{

	// Lists
	public function all()
	{
		return View::make("Dashboard.Catagory.Lists")
			->with("catagories", Catagory::all());
	}

	// Create page
	public function create()
	{
		return View::make("Dashboard.Catagory.Create");
	}

	// Store catagory
	public function store()
	{
		$validator = Validator::make(Input::all(), ["catagory" => "required"]);

		if($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		}

		$catagory = new Catagory;
		$catagory->catagory_name = Input::get("catagory");

		if($catagory->save())
		{
			return Redirect::back()
				->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> Catagory added. Create another one.</div>");
		}

		return Redirect::back()
			->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Error occured. Please try after sometime.</div>");
	}

	// Edit catagory page
	public function edit($id)
	{
		$catagory = Catagory::find($id);

		if($catagory)
		{
			return View::make("Dashboard.Catagory.Edit")
				->with("catagory", $catagory);
		}

		return Redirect::back()
			->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Catagory not found.</div>");
	}

	// Update catagory
	public function update($id)
	{
		$validator = Validator::make(Input::all(), ["catagory"=>"required"]);

		if($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator);
		}

		$catagory = Catagory::find($id);

		if($catagory)
		{
			$catagory->catagory_name = Input::get("catagory");

			if($catagory->save())
			{
				return Redirect::route("CatagoryListPage")
					->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> Catagory updated.</div>");
			}

			return Redirect::route("CatagoryListPage")
				->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Error occured. Please try after sometime.</div>");
		}

		return Redirect::back()
			->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Catagory not found.</div>");
	}

	// Delete catagory
	public function delete($id)
	{
		$catagory = Catagory::find($id);

		if($catagory)
		{
			$catagory->delete();

			$segment = Segment::where("catagory_id", $id);

			$segment->delete();

			$subsegment = Subsegment::where("catagory_id", $id);

			$subsegment->delete();

			return Redirect::route("CatagoryListPage")
					->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> Catagory deleted.</div>");
		}

		return Redirect::back()
			->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Catagory not found.</div>");
	}
}