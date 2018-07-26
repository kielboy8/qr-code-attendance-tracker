<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;

use App\Notifications\Overtime;
use App\User;
use App\Employee;
use App\Attendance;
use Carbon\Carbon;

class ScanController extends Controller
{
    use Notifiable;

    public function create () {
    	return view('scan.create');
    }

    public function store(Request $request) {
		$employee = Employee::where('attendance_id', request('attendance_id'))->first();
        $user = User::where('id', 1)->get();

		if ($employee) {
            $date_time = Carbon::now();
            $date_now = $date_time->format('Y-m-d');
            $time_now = $date_time->format('H:i:s');
            $attendance = Attendance::where('attendance_id', request('attendance_id'))
                                    ->where('date', $date_now)->first();

            if ($attendance && $attendance->time_in) {
                $id = $request->attendance_id;
                Notification::send($user, new Overtime($id));
                $attendance->time_out = $time_now;
                $attendance->save();
                // $totalTime = Attendance::selectRaw('(time_out - time_in) difference')->where('attendance_id', request('id'))->first()->difference;
                // if($totalTime > 32400) {
                //     auth()->user()
                // }
            }
            else {
                Notification::send($user, new Overtime());
                Attendance::create([
                    'name' => $employee->name,
    				'position' => $employee->position,
                    'attendance_id' => $employee->attendance_id,
    				'contact_no' => $employee->contact_no,
                    'date' => $date_now,
                    'time_in' => $time_now,
                    'time_out' => null
                ]);
            }

			// return response()->json([
   //              'response' => 'valid',
   //              'id' => $employee->id
   //          ]);
		}
        // else {
        //     return response()->json([
        //         'response' => 'invalid',
        //     ]);
        // }
        return redirect('/');
    }
}
