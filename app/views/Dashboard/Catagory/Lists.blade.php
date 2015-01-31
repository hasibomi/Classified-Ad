@extends("Dashboard.Boilerplate")

@section("title")
	<title>Admin - Catagory List</title>
@stop

@section("page-name")
	<h1 align="center">Manage Category List</h1>
@stop

@section("content")

@include("Partials.Event")

<!--  table-responsive Start -->
<div class="bs-example" data-example-id="simple-responsive-table">
	<div class="table-responsive">
	    <table class="table">
	       <thead>
	          <tr>
	            <th>#</th>
	            <th>Category Name</th>
	            <th>Action</th>
	          </tr>
	        </thead>
	        
	      	<tbody>
	      		@if($catagories->count() == 0)
					<tr>
						<td colspan="3">No catagories added yet.</td>
					</tr>
	      		@else
	      			@foreach($catagories as $k => $c)
						<tr>
							<td scope="row">{{ $k + 1 }}</td>
							<td>{{ $c->catagory_name }}</td>
							<td>
								<a href="{{ url('admin/dashboard/catagories/edit/' . $c->id) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true">&nbsp</span></a>
								<a href="{{ url('admin/dashboard/catagories/delete/' . $c->id) }}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
							</td>
						</tr>
	      			@endforeach
      			@endif
	     	</tbody>
	    </table>
	</div>         
</div>
<!--  table-responsive End -->

@stop