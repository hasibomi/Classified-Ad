@extends("Dashboard.Boilerplate")
@section("title")
<title>Admin - OK Mobile LTD</title>
@stop
@section("page-name")
<h1 align="center">  Manage Thana List</h1>
@stop
@section("content")

@include("Partials.Event")

<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>District Name</th>
				<th>Thana Name</th>
				<th>Action</th>
			</tr>
		</thead>
		
		<tbody>
			@if($thanas->count() == 0)
				<tr>
					<td colspan="4">No thanas added yet.</td>
				</tr>
			@else
				@foreach($thanas as $k => $s)
					<tr>
						<th scope="row">{{ $k + 1 }}</th>
						<td>{{ $s->district->district_name }}</td>
						<td>{{ $s->thana_name }}</td>
						<td>
							<a href="{{ url('admin/dashboard/thanas/edit/' . $s->id) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true">&nbsp</span></a>
							<a href="{{ url('admin/dashboard/thanas/delete/' . $s->id) }}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
						</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
</div>
@stop