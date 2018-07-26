<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;

use App\User;
use App\Employee;
use App\Notifications\Overtime;
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

	public function store(Request $request) {
		$request->validate([
			'name' => 'required',
			'position' => 'required',
			'email' => 'required|email',
			'contact_no' => 'required|numeric',
			'profile-image' => 'image|nullable|max:2048'
		]);

		if($request->hasFile('profile_image')) {
			$filenameWithExt = $request->file('profile_image')->getClientOriginalName();
			$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
			$extension = $request->file('profile_image')->getClientOriginalExtension();
			$filenameToStore = $filename . '_' . time() . '.' . $extension;
			$path = $request->file('profile_image')->storeAs('public/employee/images', $filenameToStore);
		} 
		else {
			$filenameToStore = "noimage.jpg";
		}

		Employee::create([
            'name' => $request->input('name'),
            'attendance_id' => Str::random(),
            'position' => $request->input('position'),
			'email' => $request->input('email'),
			'contact_no' => $request->input('contact_no'),
			'profile_image' => $filenameToStore
        ]);

        $user = User::where('id', 1)->get();
		Notification::send($user, new Overtime());

		return redirect('/admin/employees');
	}

	public function update(Request $request) {
		$request->validate([
			'name' => 'required',
			'position' => 'required',
			'email' => 'required|email',
			'contact_no' => 'required|numeric',
			'profile-image' => 'image|nullable|max:2048'
		]);

		$employee = Employee::findOrFail($request->id);

		if($request->hasFile('profile_image')) {
			$filenameWithExt = $request->file('profile_image')->getClientOriginalName();
			$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
			$extension = $request->file('profile_image')->getClientOriginalExtension();
			$filenameToStore = $filename . '_' . time() . '.' . $extension;
			$path = $request->file('profile_image')->storeAs('public/employee/images', $filenameToStore);

			$employee->update([
	            'name' => $request->input('name'),
	            'position' => $request->input('position'),
				'email' => $request->input('email'),
				'contact_no' => $request->input('contact_no'),
				'profile_image' => $filenameToStore
	        ]);
		}
		else {
			$employee->update([
	            'name' => $request->input('name'),
	            'position' => $request->input('position'),
				'email' => $request->input('email'),
				'contact_no' => $request->input('contact_no'),
	        ]);
		}

		return redirect('/admin/employees');
	}

	public function delete(Employee $employee) {
		$employee->delete();
		return back();
	}
}
