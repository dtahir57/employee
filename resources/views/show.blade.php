@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h5>Showing Attendance of: {{ $attendance->attendance_date }}</h5>
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Employee Name</th>
						<th scope="col">Present</th>
					</tr>
				</thead>
				<tbody>
					@foreach($attendance->employees as $employee)
					<tr>
						<td>{{ $employee->name }}</td>
						<td>
							@if($employee->pivot->is_present)
								<span class="badge badge-success">Yes</span>
							@else
								<span class="badge badge-danger">No</span>
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection