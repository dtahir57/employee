<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function attendances()
    {
    	return $this->belongsToMany(Attendance::class, 'attendance_employees')->using(AttendanceEmployee::class)->withPivot('is_present');
    }
}
