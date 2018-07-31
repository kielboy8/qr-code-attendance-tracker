<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use Carbon\Carbon;

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

    	$attendances = $attendances->get();

		$today = request('month') . ' ' . request('day') . ' ' . request('year');
		$today = Carbon::parse($today)->format('F d Y');

    	return view('attendances.index', compact(['attendances', 'today']));
    }

	public function fetch()
	{
		$attendances = Attendance::all();
		$attendances = $attendances->map(function($item) {
			$formatted_time_in = Carbon::createFromTimeString($item->time_in);
			$late = $formatted_time_in->gt(Carbon::createFromTimeString("08:30:59"));

			$formatted_time_in = $formatted_time_in->format('h:i A');
			$formatted_time_out = Carbon::createFromTimeString($item->time_out)->format('h:i A');

			return [
				'title' 		=> $item->name,
				'start' 		=> $item->date . ' ' . $item->time_in,
				'end'			=> $item->date . ' ' . $item->time_out,
				'editable'		=> false,
				'description'	=> $formatted_time_in . ' - ' . $formatted_time_out,
				'color'			=> (($late) ? 'red' : '')
			];
		});

		return response()->json($attendances);
	}
}
