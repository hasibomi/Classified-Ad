@extends("Dashboard.Boilerplate")
@section("title")
<title>Admin - Super Admin Profile</title>
@stop
@section("page-name")
<h1 align="center">Manage Super Admin Profile</h1>
@stop
@section("content")

@include("Partials.Event")

<div class="row">
	<div class="pull-right">{{ Form::checkbox('toggle', '', false, ['id'=>'toggle']) }} Select All</div>
</div>

{{ Form::open(['url' => 'admin/dashboard/ads/control']) }}
<div class="row">
	<div class="table-responsive">
		<table class="table">
			<tbody>
				@if($ads->count() == 0)
					<tr>
						<td colspan="6">No ads found.</td>
					</tr>
				@else
					@foreach($ads->get() as $k => $a)
						<tr>
							<td style="vertical-align:middle;">
								<p>{{ $a->ad_id }}</p>
								<p>{{ $a->created_at }}</p>
							</td>
							<td><img src='{{ asset("$a->ad_image") }}' alt="" class="img-responsive" height="70" width="70"></td>
							<td>
								<h3>{{ $a->ad_title }}</h3>
								<p>{{ strlen($a->ad_description) == 20 ? $a->ad_description : substr($a->ad_description, 0, 20) . '...' }}</p>
							</td>
							<td style="vertical-align:middle;">{{ $a->product_price }}</td>
							<td style="vertical-align:middle;">
								<a href="{{ url('admin/dashboard/ad/edit/' . $a->id) }}">Edit</a> | {{ Form::checkbox('ads[]', $a->id, false, ['class' => 'ads']) }}
							</td>
						</tr>
					@endforeach
				@endif
			</tbody>
		</table>
	</div>
</div>

@if($ads->count() != 0)
	<div class="row">
		<div class="pull-right">
			<button type="submit" class="btn btn-danger" name="delete" value="delete"><span class="glyphicon glyphicon-trash"></span> Delete</button>
			<button type="submit" class="btn btn-warning" name="unpublish" value="unpublish"><span class="glyphicon glyphicon-exclamation-sign"></span> Unpublish</button>
		</div>
	</div>
@endif
{{ Form::close() }}

@stop

@section('script')
	<script src="{{ asset('assets/js/ad_control.js') }}"></script>
@stop