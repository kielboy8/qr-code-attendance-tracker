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
        // $attendance = Attendance::selectRaw('(time_out - time_in) difference')
        // dd($attendances->difference)

    	$archives = Attendance::selectRaw('monthname(date) month, day(date) day, year(date) year')
    		->groupBy('day')
    		->orderByRaw('min(date) desc')
    		->get();

    	if($month = request('month')) {
    		$attendances = $attendances->whereMonth('date', Carbon::parse($month)->month);
    	}

    	if($day = request('day')) {
    		$attendances = $attendances->whereDay('date', $day);
    	}

    	if($year = request('year')) {
    		$attendances = $attendances->whereYear('date', $year);
    	}

    	$attendances = $attendances->paginate(10);

    	return view('attendances.index', compact(['attendances', 'archives']));
    }
}
