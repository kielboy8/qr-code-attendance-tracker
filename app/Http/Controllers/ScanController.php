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

		if ($employee) {
            $date_time = Carbon::now();
            $date_now = $date_time->format('Y-m-d');
            $time_now = $date_time->format('H:i:s');
            $attendance = Attendance::where('attendance_id', request('id'))
                                    ->where('date', $date_now)->first();

            if ($attendance && $attendance->time_in) {
                $attendance->time_out = $time_now;
                $attendance->save();
            }
            else {
                $attendance = Attendance::create([
                    'name' => $employee->name,
    				'position' => $employee->position,
                    'attendance_id' => $employee->attendance_id,
    				'contact_no' => $employee->contact_no,
                    'date' => $date_now,
                    'time_in' => $time_now,
                    'time_out' => null
                ]);
            }

			return response()->json([
                'response' => 'valid',
                'employee' => $employee,
                'attendance' => $attendance
            ]);
		}
        else {
            return response()->json([
                'response' => 'Invalid QR code! Employee not found.'
            ]);
        }
    }
}
