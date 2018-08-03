<?php

namespace App;

class Employee extends Model
{
    public function attendances() {
    	return $this->hasMany('Attendance');
    }
}
