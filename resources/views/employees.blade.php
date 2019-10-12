@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h4>Employees</h4>
		<div class="col-md-12">
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Employee Name</th>
			      <th scope="col">Basic Salary</th>
			      <th scope="col">Employee Type</th>
			      <th scope="col">View Attendance</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($employees as $employee)
			  	<tr>
			  		<th scope="row">{{ $employee->id }}</th>
			  		<td>{{ $employee->name }}</td>
			  		<td>{{ $employee->basic_salary }}</td>
			  		<td>{{ $employee->employee_type }}</td>
			  		<td>
			  			<a href="{{ route('employee.show', $employee->id) }}" type="button" class="btn btn-success">View</a>
			  		</td>
			  	</tr>
			  	@endforeach
			  </tbody>
			</table>
		</div>
	</div>
</div>
@endsection