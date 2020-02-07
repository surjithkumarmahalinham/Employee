@extends('layout')
@section('content')
<!DOCTYPE html>
	<title>Add</title>
   <body>
   @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
    <h2>Employee Information</h2>
	<div class="row">
	<div class="col-md-4">
	<form action="/search" method="get" autocomplete="off">
	<div class="form-group">
	<input type="search" name="search">
	<span class="input-group-prepend">
	<button type="submit" class="btn btn-primary">Search</button>
	</span>
	</div>
	</form>
	</div>
	<div class="col-md-8 text-right">
	<a href="{{action('EmpInfoController@create')}}" class="btn btn-success">Add</a>
	</div></div>
 
<table class="table table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Employee Name</th>
					<th>Project</th>
					<th>Department</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
					@foreach($employees as $emp)
					<tr>
						<td>{{ $emp->id }}</td>
						<td>{{ $emp->emp_name }}</td>
						<td>{{ $emp->project }}</td>
						<td>{{ $emp->emp_department }}</td>
						<td><form action="{{ action('EmpInfoController@destroy',$emp->id) }}" method="post">
						{{csrf_field()  }}
							{{method_field('DELETE')}}
						<button type="submit" class="btn btn-danger btn-xs">
						<span class="glyphicon glyphicon-trash"></i></button>
						</form></td></tr>
						@endforeach
					</tbody>
				</table> 
 
@endsection
</body>
</html>