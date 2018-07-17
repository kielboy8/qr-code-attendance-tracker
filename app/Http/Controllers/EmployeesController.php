<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Employee;

class EmployeesController extends Controller
{
   	public function index() {
   		$employees = Employee::get();
   		return view('employees.index', compact('employees'));
   	}

   	public function store() {
   		$this->validate(request(), [
   			'name' => 'required'
   		]);

   		Employee::create([
            'name' => request('name'),
            'attendance_id' => Str::random()
        ]);

   		return redirect('/admin/employees');
   	}
}
