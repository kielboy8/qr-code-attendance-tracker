<?php

namespace App;

class Attendance extends Model
{
    public $timestamps = false;

    public $guarded = [];

    public function employees() {
    	return $this->belongsTo('Employee');
    }
}
