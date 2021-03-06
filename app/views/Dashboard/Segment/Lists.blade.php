@extends("Dashboard.Boilerplate")
@section("title")
<title>Admin - Segment List</title>
@stop
@section("page-name")
<h1 align="center">Manage Segment List</h1>
@stop
@section("content")
@include("Partials.Event")
<div class="bs-example" data-example-id="simple-responsive-table">
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Category Name</th>
          <th>Segment Name</th>
          <th>Action</th>
        </tr>
      </thead>
      
      <tbody>
        @if($segments->count() == 0)
          <tr>
            <td colspan="4">No segments added yet.</td>
          </tr>
        @else
          @foreach($segments as $k => $s)
            <tr>
              <th scope="row">{{ $k + 1 }}</th>
              <td>{{ $s->catagory->catagory_name }}</td>
              <td>{{ $s->segment_name }}</td>
              <td>
                <a href="{{ url('admin/dashboard/segments/edit/' . $s->id) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true">&nbsp</span></a>
                <a href="{{ url('admin/dashboard/segments/delete/' . $s->id) }}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
              </td>
            </tr>
          @endforeach
        @endif
      </tbody>
    </table>
  </div>  
</div>
@stop