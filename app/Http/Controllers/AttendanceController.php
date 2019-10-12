<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\AttendanceEmployee;
use App\Employee;
use App\Http\Requests\AttendanceRequest;
use Session;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * [Applying Auth Middleware On All the Methods in this class]
     */
    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = Attendance::latest()->get();
        return view('attendance', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::latest()->get();
        return view('create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttendanceRequest $request)
    {
        $attendance = new Attendance;
        $attendance->attendance_date = $request->attendance_date;
        $attendance->save();
        $employees = Employee::latest()->get();
        foreach($employees as $employee)
        {
            $pivot_attendance = new AttendanceEmployee;
            $pivot_attendance->attendance_id = $attendance->id;
            $pivot_attendance->employee_id = $employee->id;
            $pivot_attendance->is_present = (in_array($employee->id, $request->is_present)? 1 : 0);
            $pivot_attendance->save();
        }
        Session::flash('created', 'Attendance Created Successfully for date: '.$attendance->attendance_date);
        return redirect()->route('attendance.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($date)
    {
        $attendance = Attendance::where('attendance_date', $date)->first();
        return view('show', compact('attendance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($date)
    {
        $attendance = Attendance::where('attendance_date', $date)->first();
        $employees = Employee::latest()->get();
        return view('edit', compact('attendance', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttendanceRequest $request, $date)
    {
        $attendance = Attendance::where('attendance_date', $date)->first();
        $attendance->attendance_date = $request->attendance_date;
        $attendance->update();
        $employees = Employee::latest()->get();
        foreach($employees as $employee)
        {
            $pivot_attendance = AttendanceEmployee::where([
                ['attendance_id', $attendance->id],
                ['employee_id', $employee->id]
            ])->first();
            $pivot_attendance->is_present = (in_array($employee->id, $request->is_present)? 1 : 0);
            $pivot_attendance->update();
        }
        Session::flash('updated', 'Attendance Updated Successfully');
        return redirect()->route('attendance.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
