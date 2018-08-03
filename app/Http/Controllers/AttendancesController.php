<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use App\Employee;
use App\Exports\AttendanceExport;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class AttendancesController extends Controller
{
	public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $attendances = new Attendance;

    	if ($month = request('month') && $day = request('day') && $year = request('year')) {
    		$attendances = $attendances->whereMonth('date', Carbon::parse(request('month'))->month);
			$attendances = $attendances->whereDay('date', request('day'));
	    	$attendances = $attendances->whereYear('date', request('year'));
    	}
		else {
			return view('attendances.index');
		}

    	$attendances = $attendances->paginate(10);

		$today = request('month') . ' ' . request('day') . ' ' . request('year');
		$today = Carbon::parse($today)->format('F d Y');

    	return view('attendances.index', compact(['attendances', 'today']));
    }

	public function events() {
		$start = Carbon::parse(request('start'));
		$end = Carbon::parse(request('end'))->subDay();
		$attendances = Attendance::whereBetween('date', [$start, $end])->get();

		$attendances = $attendances->map(function($item) {
			$in = Carbon::parse($item->time_in);
			$out = Carbon::parse($item->time_out);
			$late = $in->gte(Carbon::parse("08:31:00"));

			return [
				'title' 		=> $item->name,
				'start' 		=> $item->date . ' ' . $item->time_in,
				'end'			=> $item->date . ' ' . $item->time_out,
				'editable'		=> false,
				'description'	=> $in->format('g:i A') . ' - ' . $out->format('g:i A'),
				'color'			=> (($late) ? 'red' : '')
			];
		});

		return response()->json($attendances);
	}

	public function export(Request $request) {
		$date = $request->year . '-' . Carbon::parse($request->month)->month . '-' . $request->day;
		return (new AttendanceExport($date))->download('attendances-' . $date . '.xlsx');
	}

	public function delete(Attendance $attendance) {
		$employee = Employee::where('id', $attendance->employee_id)->first();
		$employee->status = "Out-Of-Office";
		$employee->save();

		$attendance->delete();
		return back();
	}
}
