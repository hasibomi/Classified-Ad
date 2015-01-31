<?php

class DistrictController extends BaseController
{

	// Lists
	public function all()
	{
		return View::make("Dashboard.District.Lists")
			->with("districts", District::all());
	}

	// Create page
	public function create()
	{
		return View::make("Dashboard.District.Create");
	}

	// Store district
	public function store()
	{
		$validator = Validator::make(Input::all(), ["district" => "required"]);

		if($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		}

		$district = new District;
		$district->district_name = Input::get("district");

		if($district->save())
		{
			return Redirect::back()
				->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> District added. Create another one.</div>");
		}

		return Redirect::back()
			->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Error occured. Please try after sometime.</div>");
	}

	// Edit district page
	public function edit($id)
	{
		$district = District::find($id);

		if($district)
		{
			return View::make("Dashboard.District.Edit")
				->with("district", $district);
		}

		return Redirect::back()
			->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> District not found.</div>");
	}

	// Update district
	public function update($id)
	{
		$validator = Validator::make(Input::all(), ["district"=>"required"]);

		if($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator);
		}

		$district = District::find($id);

		if($district)
		{
			$district->district_name = Input::get("district");

			if($district->save())
			{
				return Redirect::route("DistrictListPage")
					->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> District updated.</div>");
			}

			return Redirect::route("DistrictListPage")
				->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Error occured. Please try after sometime.</div>");
		}

		return Redirect::back()
			->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> District not found.</div>");
	}

	// Delete district
	public function delete($id)
	{
		$district = District::find($id);

		if($district)
		{
			$district->delete();

			$user_district = District::where("user_district", $id);

			$user_district->update(["user_district" => ""]);

			$thana = Thana::where("district_id", $id);

			$thana->delete();

			return Redirect::route("DistrictListPage")
					->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> District deleted.</div>");
		}

		return Redirect::back()
			->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> District not found.</div>");
	}
}