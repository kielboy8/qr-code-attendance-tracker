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
}
