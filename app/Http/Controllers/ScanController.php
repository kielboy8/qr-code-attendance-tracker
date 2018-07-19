<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Attendance;
use Carbon\Carbon;

class ScanController extends Controller
{
    public function create () {
    	return view('scan.create');
    }

    public function store() {
		$employee = Employee::where('attendance_id', request('id'))->first();

		if ($employee != null) {
			if($employee) {
				Attendance::create([
					'name' => $employee->name,
					'position' => $employee->position,
		            'attendance_id' => $employee->attendance_id,
					'contact_no' => $employee->contact_no,
				]);
			}
			return response()->json([
                'response' => 'valid',
                'id' => $employee->id
            ]);
		}
        else
            return response()->json([
                'response' => 'invalid',
            ]);

		return redirect('/');
    }
}
