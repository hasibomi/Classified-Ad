@extends("Dashboard.Boilerplate")

@section("title")
	<title>Home - OK Mobile LTD</title>
@stop

@section("page-name")
	<h1 align="center">Dashboard</h1>
@stop

@section("content")

@if(UserType::classadmin())
	@include("Dashboard.Ad.Lists")
@elseif(UserType::corporateAdmin())
    <h1>Welcome to Corporate Admin Dahsboard</h1>
@else
	<h1>Welcome to Super Admin Dashboard</h1>
@endif

@stop