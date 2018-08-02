<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use Carbon\Carbon;

class AdminController extends Controller
{
	public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
    	$attendanceToday = Attendance::where('date', Carbon::now()->format('Y-m-d'))->take(5)->get();
    	return view('dashboard.index', compact('attendanceToday'));
    }
}
