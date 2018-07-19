<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class ReaderController extends Controller
{
    public function index() {
        return view('reader.index');
    }

    public function scan() {
        $attendance_id = request('id');
        $employee = Employee::where('attendance_id', $attendance_id)->first();

        if ($employee != null)
            return response()->json([
                'response' => 'valid',
                'id' => $employee->id
            ]);
        else
            return response()->json([
                'response' => 'invalid',
            ]);
    }

    public function show() {
        $employee = Employee::find(request('id'));

        return view('reader.dashboard', compact('employee'));
    }

    public function login() {
        // Attendance time in logic here

        return redirect('/reader');
    }
}
