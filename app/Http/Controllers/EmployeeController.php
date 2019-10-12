<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Employee;
use Illuminate\Http\Request;
use Session;

class EmployeeController extends Controller
{

    /**
     * Apply Auth Middleware on all methods of this class
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
        $employees = Employee::latest()->get();
        return view('employees', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = Employee::find($request->employee_id);
        // dd($employee->attendances);
        $attendances = [];
        foreach($employee->attendances as $a)
        {
            if ($request->search_month == date('m', strtotime($a->attendance_date)))
            {
                $month = date('M', strtotime($a->attendance_date));
                array_push($attendances, $a);
            }
        }
        // Session::flash('search_month', 'Attendance Of Month: '.$month);
        return view('showEmployee', compact('attendances', 'employee'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('showEmployee', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
