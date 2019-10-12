<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class AttendanceEmployee extends Pivot
{
    protected $table = 'attendance_employees';
}
