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

    	$archives = Attendance::selectRaw('monthname(time_in) month, day(time_in) day, year(time_in) year')
    		->groupBy('day')
    		->orderByRaw('min(time_in) desc')
    		->get();

    	if($month = request('month')) {
    		$attendances->whereMonth('time_in', Carbon::parse($month)->month);
    	}

    	if($day = request('day')) {
    		$attendances->whereDay('time_in', $day);
    	}

    	if($year = request('year')) {
    		$attendances->whereYear('time_in', $year);
    	}

    	$attendances = $attendances->get();

    	return view('attendances.index', compact(['attendances', 'archives']));
    }
}
