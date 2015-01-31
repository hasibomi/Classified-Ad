<?php

class ThanaController extends BaseController
{

	// Lists
	public function all()
	{
		return View::make("Dashboard.Thana.Lists")
			->with("thanas", Thana::all());
	}

	// Create page
	public function create()
	{
		return View::make("Dashboard.Thana.Create")
			->with("districts", District::all());
	}

	// Store thana
	public function store()
	{
		$validator = Validator::make(Input::all(), ["thana" => "required", "district" => "required"]);

		if($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		}

		$thana = new Thana;
		$thana->thana_name = Input::get("thana");
		$thana->district_id = Input::get("district");

		if($thana->save())
		{
			return Redirect::back()
				->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> Thana added. Create another one.</div>");
		}

		return Redirect::back()
			->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Error occured. Please try after sometime.</div>");
	}

	// Edit thana page
	public function edit($id)
	{
		$thana = Thana::find($id);

		if($thana)
		{
			return View::make("Dashboard.Thana.Edit")
				->with("thana", $thana)
				->with("districts", District::all());
		}

		return Redirect::back()
			->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Thana not found.</div>");
	}

	// Update thana
	public function update($id)
	{
		$validator = Validator::make(Input::all(), ["thana"=>"required", "district"=>"required"]);

		if($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator);
		}

		$thana = Thana::find($id);

		if($thana)
		{
			$thana->thana_name = Input::get("thana");
			$thana->district_id = Input::get("district");

			if($thana->save())
			{
				return Redirect::route("ThanaListPage")
					->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> Thana updated.</div>");
			}

			return Redirect::route("ThanaListPage")
				->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Error occured. Please try after sometime.</div>");
		}

		return Redirect::back()
			->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Thana not found.</div>");
	}

	// Delete thana
	public function delete($id)
	{
		$thana = Thana::find($id);

		if($thana)
		{
			$thana->delete();

			$user_thana = Thana::where("user_thana", $id);

			$user_thana->update(["user_thana" => ""]);

			return Redirect::route("ThanaListPage")
					->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> Thana deleted.</div>");
		}

		return Redirect::back()
			->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Thana not found.</div>");
	}
}