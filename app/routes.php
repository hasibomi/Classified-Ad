<?php

App::missing(function($exception)
{
	return Response::view("Main.404", [], 404);
});

// Home page
Route::get("/", ["as" => "HomePage", "uses" => "HomeController@home"]);

// Ad view page
Route::get("ads/view/{id}", ["uses" => "AdsearchController@view"]);

// Login page - User
Route::get("user/login", ["as" => "UserLoginPage", "uses" => "HomeController@login"]);

// Signup page - User
Route::get("user/signup", ["as" => "UserSignupPage", "uses" => "HomeController@signup"]);

// Account recovery page - User
Route::get("user/accRecover", ["as" => "UserLAccountRecoveryPage", "uses" => "HomeController@accRecover"]);

// Login page - Admin
Route::get("admin/login", ["as" => "AdminLoginPage", "uses" => "HomeController@login"]);

Route::group(["before" => "csrf"], function()
{
	Route::post("user/store", ["uses" => "HomeController@store"]);
	Route::post("user/signin", ["uses" => "HomeController@userSignin"]);
	Route::post("admin/signin", ["uses" => "HomeController@adminSignin"]);

	// Ad Search
	Route::post("ads/search", ["uses" => "AdsearchController@all"]);
});

// AJAX POST - Find thana to sign up
Route::post("/user/signup/findthana/{id}", ["uses" => "HomeController@findThana"]);
Route::post("/ads/findsegment/{id}", ["uses" => "AdsearchController@findSegment"]);
Route::post("/ads/findsubsegment/{id}", ["uses" => "AdsearchController@findSubsegment"]);
Route::post("/ads/findthana/{id}", ["uses" => "AdsearchController@findThana"]);

/*
|----------------------------------------------------------------------------
| User Dashboard
|----------------------------------------------------------------------------
*/

Route::group(["before" => "user"], function()
{
	// User Home
	Route::get("user/dashboard", function() { return View::make("Dashboard.User.Home")->with("ads", Ad::where("user_id", Auth::user()->id)); });

	// Logout
	Route::get("user/logout", function(){ Auth::logout(); return Redirect::route("HomePage"); });

	// Add post
	Route::get("user/dashboard/adpost", ["as"=>"AdPostPage", "uses"=>"AdController@ad"]);
	Route::get("user/dashboard/adpost/edit/{id}", ["uses" => "AdController@edit"]);
	Route::get("user/dashboard/adpost/delete/{id}", ["uses" => "AdController@delete"]);

	/* POST */
	Route::group(["before"=>"csrf"], function()
	{
		// Ad post
		Route::post("user/dashboard/adpost/store", ["uses"=>"AdController@store"]);
		Route::post("user/dashboard/adpost/update/{id}", ["uses"=>"AdController@update"]);
	});
});

// AJAX POST - Find segment for corresponding catagory
Route::post("/user/adpost/findsegment/{id}", ["uses" => "AdController@findSegment"]);
Route::post("/user/adpost/findsubsegment/{id}", ["uses" => "AdController@findSubsegment"]);

/*
|----------------------------------------------------------------------------
| Admin Dahsboard
|----------------------------------------------------------------------------
*/
Route::group(["before" => "admin"], function()
{
	// Admin Home
	Route::get("admin/dashboard", function() { return View::make("Dashboard.Home")->with("ads", Ad::where("ad_publish", 0)); });

	// Add controlling
	Route::get("admin/dashboard/ad/publish/{id}", ["uses"=>'AdpublishController@publish']);
	Route::get("admin/dashboard/ad/unpublish/{id}", ["uses"=>'AdpublishController@unpublish']);
	Route::get("admin/dashboard/ad/edit/{id}", ["uses" => "AdpublishController@edit"]);
	Route::get("admin/dashboard/ad/delete/{id}", ["uses" => "AdpublishController@delete"]);
	Route::get("admin/dashboard/ads/published", ["uses" => "AdpublishController@published"]);

	// Logout
	Route::get("admin/logout", function(){ Auth::logout(); return Redirect::route("HomePage"); });

	// Catagories
	Route::get("admin/dashboard/catagories", ["as" => "CatagoryListPage", "uses" => "CatagoryController@all"]);
	Route::get("admin/dashboard/catagories/create", ["as" => "CreateCatagoryPage", "uses" => "CatagoryController@create"]);
	Route::get("admin/dashboard/catagories/edit/{id}", ["uses" => "CatagoryController@edit"]);
	Route::get("admin/dashboard/catagories/delete/{id}", ["uses" => "CatagoryController@delete"]);

	//Segments
	Route::get("admin/dashboard/segments", ["as" => "SegmentListPage", "uses" => "SegmentController@all"]);
	Route::get("admin/dashboard/segments/create", ["as" => "CreateSegmentPage", "uses" => "SegmentController@create"]);
	Route::get("admin/dashboard/segments/edit/{id}", ["uses" => "SegmentController@edit"]);
	Route::get("admin/dashboard/segments/delete/{id}", ["uses" => "SegmentController@delete"]);

	//Sub Segments
	Route::get("admin/dashboard/subsegments", ["as" => "SubSegmentListPage", "uses" => "SubSegmentController@all"]);
	Route::get("admin/dashboard/subsegments/create", ["as" => "CreateSubSegmentPage", "uses" => "SubSegmentController@create"]);
	Route::get("admin/dashboard/subsegments/edit/{id}", ["uses" => "SubSegmentController@edit"]);
	Route::get("admin/dashboard/subsegments/delete/{id}", ["uses" => "SubSegmentController@delete"]);

	//Districts
	Route::get("admin/dashboard/districts", ["as" => "DistrictListPage", "uses" => "DistrictController@all"]);
	Route::get("admin/dashboard/districts/create", ["as" => "CreateDistrictPage", "uses" => "DistrictController@create"]);
	Route::get("admin/dashboard/districts/edit/{id}", ["uses" => "DistrictController@edit"]);
	Route::get("admin/dashboard/districts/delete/{id}", ["uses" => "DistrictController@delete"]);

	//Thanas
	Route::get("admin/dashboard/thanas", ["as" => "ThanaListPage", "uses" => "ThanaController@all"]);
	Route::get("admin/dashboard/thanas/create", ["as" => "CreateThanaPage", "uses" => "ThanaController@create"]);
	Route::get("admin/dashboard/thanas/edit/{id}", ["uses" => "ThanaController@edit"]);
	Route::get("admin/dashboard/thanas/delete/{id}", ["uses" => "ThanaController@delete"]);

	//Admins
	Route::get("admin/dashboard/admins", ["as" => "AdminListPage", "uses" => "AdminController@all"]);
	Route::get("admin/dashboard/admins/create", ["as" => "CreateAdminPage", "uses" => "AdminController@create"]);

	//Permission
	Route::get("admin/dashboard/permission/user", ["as" => "UserPermissionPage", "uses" => "PermissionController@user"]);
	Route::get("admin/dashboard/permission/admin", ["as" => "AdminPermissionPage", "uses" => "PermissionController@admin"]);

	//Settings
	Route::get("admin/dashboard/settings", ["as" => "AdminSettingsPage", "uses" => "ProfileController@page"]);

	// POST
	Route::group(["before" => "csrf"], function()
	{
		// Catagories
		Route::post("admin/dashboard/catagories/store", ["uses" => "CatagoryController@store"]);
		Route::post("admin/dashboard/catagories/update/{id}", ["uses" => "CatagoryController@update"]);

		// Segments
		Route::post("admin/dashboard/segments/store", ["uses" => "SegmentController@store"]);
		Route::post("admin/dashboard/segments/update/{id}", ["uses" => "SegmentController@update"]);

		// Sub Segments
		Route::post("admin/dashboard/subsegments/store", ["uses" => "SubSegmentController@store"]);
		Route::post("admin/dashboard/subsegments/update/{id}", ["uses" => "SubSegmentController@update"]);

		// Districts
		Route::post("admin/dashboard/districts/store", ["uses" => "DistrictController@store"]);
		Route::post("admin/dashboard/districts/update/{id}", ["uses" => "DistrictController@update"]);

		// Thanas
		Route::post("admin/dashboard/thanas/store", ["uses" => "ThanaController@store"]);
		Route::post("admin/dashboard/thanas/update/{id}", ["uses" => "ThanaController@update"]);

		// Ad
		Route::post("admin/dashboard/ad/update/{id}", ["uses"=>"AdpublishController@update"]);

		// Create admin
		Route::post("admin/dashboard/admins/create/store", ["uses"=>"AdminController@store"]);
	});
	
	// AJAX - Find segments of corresponding catagories
	Route::post("admin/dashboard/subsegments/create/catagories/find/{id}", ["uses" => "SubSegmentController@findSegment"]);
});