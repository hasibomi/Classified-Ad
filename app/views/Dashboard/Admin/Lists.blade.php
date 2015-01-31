@extends("Dashboard.Boilerplate")
@section("title")
<title>Admin - Admin List</title>
@stop
@section("page-name")
<h1 align="center">Manage Admin List</h1>
@stop
@section("content")
@include("Partials.Event")

<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Admin Name</th>
				<th>Admin Email</th>
				<th>Admin Type</th>
				<th>Action</th>
			</tr>
		</thead>
		
		<tbody>
			@if($admins->count() == 0)
				<tr>
					<td colspan="5">No adminds created yet.</td>
				</tr>
			@else
				@foreach($admins->get() as $key => $admin)
				<tr>
					<th scope="row">{{ $key + 1 }}</th>
					<td>{{ $admin->user_name }}</td>
					<td>{{ $admin->email }}</td>
					<td>
						@if($admin->is_admin == 1)
							Super Admin @if(Auth::user()->is_admin == 1) <a href='{{ url("admin/dashboard/settings") }}'>(Myself)</a> @endif
						@elseif($admin->is_admin == 2)
							Classified Admin @if(Auth::user()->is_admin == 2) <a href='{{ url("admin/dashboard/settings") }}'>(Myself)</a> @endif
						@elseif($admin->is_admin == 3)
							Corporate Admin @if(Auth::user()->is_admin == 3) <a href='{{ url("admin/dashboard/settings") }}'>(Myself)</a> @endif
						@elseif($admin->is_admin == 4)
							Content Admin @if(Auth::user()->is_admin == 4) <a href='{{ url("admin/dashboard/settings") }}'>(Myself)</a> @endif
						@elseif($admin->is_admin == 5)
							Creative Admin @if(Auth::user()->is_admin == 5) <a href='{{ url("admin/dashboard/settings") }}'>(Myself)</a> @endif
						@endif
					</td>
					<td>
						<span class="glyphicon glyphicon-pencil" aria-hidden="true">&nbsp</span>
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</td>
				</tr>
				@endforeach
			@endif
		</tbody>
	</table>
</div>

@stop