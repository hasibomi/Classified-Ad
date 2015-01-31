@if($errors->all())
	<div class="alert alert-danger">Following error(s) occured -
		<ul style="list-style-type: none;">
			@foreach($errors->all() as $error)
				<li><span class="glyphicon glyphicon-exclamation-sign"></span> {{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

<div class="row">
	@if(Session::has("event"))
		{{ Session::get("event") }}
	@endif
</div>