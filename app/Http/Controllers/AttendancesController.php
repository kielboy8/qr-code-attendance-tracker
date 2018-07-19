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

        $attendances = Attendance::latest();

    	$archives = Attendance::selectRaw('monthname(created_at) month, day(created_at) day, year(created_at) year')
    		->groupBy('day')
    		->orderByRaw('min(created_at) desc')
    		->get();

    	if($month = request('month')) {
    		$attendances->whereMonth('created_at', Carbon::parse($month)->month);
    	}

    	if($day = request('day')) {
    		$attendances->whereDay('created_at', $day);
    	}

    	if($year = request('year')) {
    		$attendances->whereYear('created_at', $year);
    	}

    	$attendances = $attendances->get();

    	return view('attendances.index', compact(['attendances', 'archives']));
    }
}
