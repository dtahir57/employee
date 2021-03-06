@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			@foreach($errors->all() as $error)
				<li class="alert alert-danger">{{ $error }}</li>
			@endforeach
			<div class="card">
				<div class="card-header">	
					<h4>Create Attendance</h4>
				</div>
				<div class="card-body">
					<form action="{{ route('attendance.store') }}" method="POST">
						@csrf
						<div class="col-md-12 form-group">
							<label>Select Date</label>
							<input type="date" name="attendance_date" class="form-control" value="{{ old('attendance_date') }}" required />
						</div>
						<div class="form-group col-md-12">
							<table class="table">
								<thead>
									<tr>
										<th scope="col">Employee Name</th>
										<th scope="col">Present</th>
									</tr>
								</thead>
								<tbody>
									@foreach($employees as $employee)
									<tr>
										<td>{{ $employee->name }}</td>
										<td>
											<input type="checkbox" name="is_present[]" class="form-control" value="{{ $employee->id }}" />
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<div class="col-md-12 form-group">
							<input type="submit" value="Submit" class="btn btn-block btn-success" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection