<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('attendance_id')->unsigned();
            $table->foreign('attendance_id')
                    ->references('id')
                    ->on('attendances')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->unsignedBigInteger('employee_id')->unsigned();
            $table->foreign('employee_id')
                    ->references('id')
                    ->on('employees')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->boolean('is_present')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance_employees');
    }
}
