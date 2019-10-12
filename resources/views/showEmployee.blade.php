@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<form action="{{ route('employee.store') }}" method="POST">
			@csrf
			<input type="hidden" name="employee_id" value="{{ $employee->id }}">
			<div class="row">
				<div class="form-group col-md-8">
					<select class="form-control" name="search_month" required>
						<option disabled selected>- Select Month -</option>
						<option value=1>Jan</option>
						<option value=2>Feb</option>
						<option value=3>Mar</option>
						<option value=4>Apr</option>
						<option value=5>May</option>
						<option value=6>Jun</option>
						<option value=7>Jul</option>
						<option value=8>Aug</option>
						<option value=9>Sep</option>
						<option value=10>Oct</option>
						<option value=11>Nov</option>
						<option value=12>Dec</option>
					</select>
				</div>
				<div class="col-md-4 form-group">
					<input type="submit" class="btn btn-success" value="Search">
				</div>
			</div>
		</form>
		<div class="col-md-12">
		<h5>Showing Attendance Of: {{ $employee->name }}</h5>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Date</th>
						<th>Present</th>
					</tr>
				</thead>
				<tbody>
					@if(isset($attendances))
						@foreach($attendances as $attendance)
						<tr>
							<td>{{ $attendance->attendance_date }}</td>
							<td>
								@if($attendance->pivot->is_present)
									<span class="badge badge-success">Yes</span>
								@else
									<span class="badge badge-danger">No</span>
								@endif
							</td>
						</tr>
						@endforeach
					@else
						@foreach($employee->attendances as $attendance)
						<tr>
							<td>{{ $attendance->attendance_date }}</td>
							<td>
								@if($attendance->pivot->is_present)
									<span class="badge badge-success">Yes</span>
								@else
									<span class="badge badge-danger">No</span>
								@endif
							</td>
						</tr>
						@endforeach
					@endif
				</tbody>
			</table>
			@if(isset($calculated_salary))
			<hr>
			<h5 class="text-success">Calculated Salary Of {{ $employee->name }} is {{ $calculated_salary }}</h5>
			@endif
		</div>
	</div>
</div>
@endsection