@extends("Dashboard.User.Boilerplate")

@section("title")
<title>User - User Panel</title>
@stop

@section("content")

@include("Partials.Event")

<div class="row">
	<div class="col-xs-6 col-md-8 col-md-offset-2">
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Images</th>
						<th>Ad Titel</th>
						<th>Description</th>
						<th>Price</th>
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
								<td>
									<a href="{{ url('user/dashboard/adpost/edit/' . $a->id) }}">Edit</a> | <a href="{{ url('user/dashboard/adpost/delete/' . $a->id) }}" id="con">Delete</a>
								</td>
							</tr>
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- User Ad List End-->

@stop

@section("script")

<script>
	$("#con").click(function(e) {
		var yes = confirm("Are you sure?");

		if(! yes) {
			e.preventDefault();
		}
	})
</script>

@stop