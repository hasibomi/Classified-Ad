@extends("Dashboard.Boilerplate")
@section("title")
<title>Admin - User Permission</title>
@stop
@section("page-name")
<h1 align="center">Manage User Permission</h1>
@stop
@section("content")
<form class="form-horizontal" action="#" method="post">
	<div class="form-group">
		<label for="usertype" class="col-sm-2 control-label">User Type</label>
		<div class="col-sm-10">
			<select class="form-control" name="usertype">
				<option>---- Select User Type ----</option>
				<option>General</option>
				<option>Corporate</option>
				<option>SME</option>
				<option>SOHO</option>
			</select>
		</div>
	</div>
	
	<div class="form-group">
		<label for="userlife" class="col-sm-2 control-label">User Life</label>
		<div class="col-sm-10">
			<select class="form-control" name="userlife">
				<option>---- Select User Life ----</option>
				<option>3 Months</option>
				<option>6 Months</option>
				<option>12 Months</option>
			</select>
		</div>
	</div>
	
	<div class="form-group">
		<label for="Postlife" class="col-sm-2 control-label">Post Life</label>
		<div class="col-sm-10">
			<select class="form-control" name="Postlife">
				<option>---- Select Post Life ----</option>
				<option>7 Days</option>
				<option>15 Days</option>
				<option>30 Days</option>
			</select>
		</div>
	</div>
	
	
	<div class="form-group">
		<label for="Postapproval" class="anchor col-sm-2 control-label">Post Approval</label>
		<div class="col-sm-10">
			<select class="form-control dropdown-check-list" name="Postapproval">
				<option>---- Select Post Approval ----</option>
				<option>Yes</option>
				<option>No</option>
			</select>
		</div>
	</div>
	
	
	<div class="form-group">
		<label for="Postcategory" class="col-sm-2 control-label">Post Category</label>
		<div id="list1" class="col-sm-10 dropdown-check-list">
			<span class="anchor form-control">---- Select Category ----</span>
			<ul class="items">
				<li><input type="checkbox" /> A </li>
				<li><input type="checkbox" /> B</li>
				<li><input type="checkbox" /> C </li>
				<li><input type="checkbox" /> D </li>
				<li><input type="checkbox" /> E </li>
				<li><input type="checkbox" /> F </li>
				<li><input type="checkbox" /> G </li>
			</ul>
		</div>
	</div>
	
	
	<div class="form-group" align="right">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Submit</button>
		</div>
	</div>
	
</form>
@stop