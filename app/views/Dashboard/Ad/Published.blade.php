@extends("Dashboard.Boilerplate")
@section("title")
<title>Admin - Super Admin Profile</title>
@stop
@section("page-name")
<h1 align="center">Manage Super Admin Profile</h1>
@stop
@section("content")

@include("Partials.Event")

<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Images</th>
				<th>Ad Titel</th>
				<th>Description</th>
				<th>Price</th>
				<th>Published</th>
				<th>Action</th>
			</tr>
		</thead>
		
		<tbody>
			@if($ads->count() == 0)
				<tr>
					<td colspan="6">No ads found.</td>
				</tr>
			@else
				@foreach($ads->get() as $k => $a)
					<tr>
						<th>{{ $a->ad_id }}</th>
						<td><img src='{{ asset("$a->ad_image") }}' alt="" class="img-responsive"></td>
						<td>{{ $a->ad_title }}</td>
						<td>{{ $a->ad_description }}</td>
						<td>{{ $a->product_price }}</td>
						<td>@if($a->ad_publish == 1) <span class="glyphicon glyphicon-ok"></span> @else <span class="glyphicon glyphicon-remove"></span> @endif</td>
						<td>
							@if($a->ad_publish == 1)<a href="{{ url('admin/dashboard/ad/unpublish/' . $a->id) }}">Unpublish</a> @else <a href="{{ url('admin/dashboard/ad/publish/' . $a->id) }}">Publish</a> @endif |
							<a href="{{ url('admin/dashboard/ad/edit/' . $a->id) }}">Edit</a> | <a href="{{ url('admin/dashboard/ad/delete/' . $a->id) }}" id="con">Delete</a>
						</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
</div>

@stop