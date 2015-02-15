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
				<th>Admin Username</th>
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
					<td>{{ $admin->name }}</td>
					<td>{{ $admin->username }}</td>
					<td>{{ $admin->email }}</td>
					<td>
						@if($admin->is_admin == 1)
							Super Admin
						@elseif($admin->is_admin == 2)
							Classified Admin
						@elseif($admin->is_admin == 3)
							Corporate Admin
						@elseif($admin->is_admin == 4)
							Content Admin
						@elseif($admin->is_admin == 5)
							Creative Admin
						@endif
					</td>
					<td>
						<a href="{{ url('admin/dashboard/admins/' . $admin->id . '/edit') }}">
							<span class="glyphicon glyphicon-pencil">&nbsp</span>
						</a>
						<a href="{{ url('admin/dashboard/admins/' . $admin->id . '/delete') }}">
							<span class="glyphicon glyphicon-remove"></span>
						</a>
					</td>
				</tr>
				@endforeach
			@endif
		</tbody>
	</table>
</div>

@stop