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
				<tbody>
					@if($ads->count() == 0)
						<tr>
							<td colspan="5">No ads found.</td>
						</tr>
					@else
						@foreach($ads->get() as $k => $a)
							<tr>
								<td style="vertical-align: middle;">
									<p>{{ $a->ad_id }}</p>
									<p>{{ $a->created_at }}</p>
								</td>
								<td><img src='{{ asset("$a->ad_image") }}' alt="" class="img-responsive" width="100"></td>
								<td>
									<h3>{{ $a->ad_title }}</h3>
									@if(strlen($a->ad_description) == 20)
										<p>{{ $a->ad_description }}</p>
									@else
										<p>{{ substr($a->ad_description, 0, 20) }}...</p>
									@endif
								</td>
								<td style="vertical-align: middle;">৳ {{ $a->product_price }}</td>
								<td style="vertical-align: middle;">
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