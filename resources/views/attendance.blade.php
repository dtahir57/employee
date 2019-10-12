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
		@if(session('deduction_fee_missing'))
			<li class="alert alert-danger">{{ session('deduction_fee_missing') }}</li>
		@endif
		<div class="col-md-3 ml-auto float-right">
			<a href="{{ route('attendance.create') }}" type="button" class="btn btn-success">Create New Attendance</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-9">
			<h4>Attendance</h4>
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col" width="10%">#</th>
			      <th scope="col" width="60%">Attendance Date</th>
			      <th scope="col" width="30%">Check Attendance</th>
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
		<div class="col-md-3">
			<deduction></deduction>
		</div>
	</div>
</div>
@endsection