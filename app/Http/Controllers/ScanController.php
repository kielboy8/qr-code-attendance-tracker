<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Attendance;

class ScanController extends Controller
{
    public function create () {
    	return view('scan.create');
    }

    public function store() {
    	$this->validate(request(), [
			'attendance_id' => 'required'
		]);

		$attendance = Employee::where('attendance_id', request('attendance_id'))->firstorFail();

		if($attendance) {
			Attendance::create([
				'name' => $attendance->name,
				'position' => $attendance->position,
	            'attendance_id' => $attendance->attendance_id,
				'contact_no' => $attendance->contact_no
			]);
		}

		return redirect('/');
    }
}
