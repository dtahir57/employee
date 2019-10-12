<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public function employees()
    {
    	return $this->belongsToMany(Employee::class, 'attendance_employees')->using(AttendanceEmployee::class)->withPivot('is_present');
    }
}
