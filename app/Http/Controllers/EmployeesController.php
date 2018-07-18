<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Employee;
use Carbon\Carbon;

class EmployeesController extends Controller 
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
		$employees = Employee::get();
		return view('employees.index', compact('employees'));
	}

	public function store() {
		$this->validate(request(), [
			'name' => 'required',
			'position' => 'required',
			'email' => 'required|email',
			'contact_no' => 'required|numeric'
		]);

		Employee::create([
            'name' => request('name'),
            'attendance_id' => Str::random(),
            'position' => request('position'),
			'email' => request('email'),
			'contact_no' => request('contact_no')
        ]);

		return redirect('/admin/employees');
	}
}
