@extends("Dashboard.Boilerplate")

@section("title")
	<title>Admin - OK Mobile LTD</title>
@stop

@section("page-name")
	<h1 align="center"> Manage District List</h1>
@stop

@section("content")

@include("Partials.Event")

<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>District Name</th>
				<th>Action</th>
			</tr>
		</thead>
		
		<tbody>
			@if($districts->count() == 0)
				<tr>
					<td colspan="3">No districts added yet.</td>
				</tr>
      		@else
      			@foreach($districts as $k => $c)
					<tr>
						<td scope="row">{{ $k + 1 }}</td>
						<td>{{ $c->district_name }}</td>
						<td>
							<a href="{{ url('admin/dashboard/districts/edit/' . $c->id) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true">&nbsp</span></a>
							<a href="{{ url('admin/dashboard/districts/delete/' . $c->id) }}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
						</td>
					</tr>
      			@endforeach
  			@endif
		</tbody>
	</table>
</div>

@stop