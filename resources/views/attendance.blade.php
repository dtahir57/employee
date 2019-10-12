@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		@if(session('created'))
			<li class="alert alert-success">{{ session('created') }}</li>
		@endif
		@if(session('updated'))
			<li class="alert alert-success">{{ session('updated') }}</li>
		@endif
		<div class="col-md-3 ml-auto float-right">
			<a href="{{ route('attendance.create') }}" type="button" class="btn btn-success">Create New Attendance</a>
		</div>
	</div>
	<div class="row">
		<h4>Attendance</h4>
		<div class="col-md-12">
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Attendance Date</th>
			      <th scope="col">Check Attendance</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($attendances as $attendance)
			  	<tr>
			  		<th scope="row">{{ $attendance->id }}</th>
			  		<td>{{ $attendance->attendance_date }}</td>
			  		<td>
			  			<a href="{{ route('attendance.show', $attendance->attendance_date) }}" type="button" class="btn btn-success">Check</a> | <a href="{{ route('attendance.edit', $attendance->attendance_date) }}" type="button" class="btn btn-primary">Edit</a>
			  		</td>
			  	</tr>
			  	@endforeach
			  </tbody>
			</table>
		</div>
	</div>
</div>
@endsection