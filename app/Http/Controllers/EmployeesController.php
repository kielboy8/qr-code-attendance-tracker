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

    public function index(Request $request) {
		$employees = new Employee;

		if($request->status == 'in-office') {
			$employees = $employees->where('status', 'In-Office');
		}
		
		if($request->status == 'out-of-office') {
			$employees = $employees->where('status', 'Out-Of-Office');
		}

		$employees = $employees->paginate(8);

		return view('employees.index', compact('employees'));
	}

	public function search(Request $request) {
        //$search = $request->search;
        $search = isset($_GET['s']) ? $_GET['s'] : $request->search;
        $employees = Employee::where('name', 'LIKE', '%' . $search . '%')
        			->orWhere('position', 'LIKE', '%' . $search . '%')
        			->paginate(8)
        			->setPath('');
        $employees->appends(array(
        	's' => $search
        ));

        return view('employees.index', compact('employees'));
	}

	public function store(Request $request) {
		$request->validate([
			'addName' => 'required',
			'addPosition' => 'required',
			'addEmail' => 'required|email',
			'addContact_no' => 'required|numeric',
			'addProfile-image' => 'image|nullable|max:2048'
		]);

		if($request->hasFile('addProfile_image')) {
			$filenameWithExt = $request->file('addProfile_image')->getClientOriginalName();
			$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
			$extension = $request->file('addProfile_image')->getClientOriginalExtension();
			$filenameToStore = $filename . '_' . time() . '.' . $extension;
			$path = $request->file('addProfile_image')->storeAs('public/employee/images', $filenameToStore);
		} 
		else {
			$filenameToStore = "noimage.jpg";
		}

		Employee::create([
            'name' => $request->input('addName'),
            'attendance_id' => Str::random(),
            'position' => $request->input('addPosition'),
			'email' => $request->input('addEmail'),
			'contact_no' => $request->input('addContact_no'),
			'status' => 'Out-Of-Office',
			'profile_image' => $filenameToStore
        ]);

		return redirect('/admin/employees');
	}

	public function update(Request $request) {
		$request->validate([
			'editName' => 'required',
			'editPosition' => 'required',
			'editEmail' => 'required|email',
			'editContact_no' => 'required|numeric',
			'editProfile-image' => 'image|nullable|max:2048'
		]);

		$employee = Employee::findOrFail($request->editId);

		if($request->hasFile('editProfile_image')) {
			$filenameWithExt = $request->file('editProfile_image')->getClientOriginalName();
			$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
			$extension = $request->file('editProfile_image')->getClientOriginalExtension();
			$filenameToStore = $filename . '_' . time() . '.' . $extension;
			$path = $request->file('editProfile_image')->storeAs('public/employee/images', $filenameToStore);

			$employee->update([
	            'name' => $request->input('editName'),
	            'position' => $request->input('editPosition'),
				'email' => $request->input('editEmail'),
				'contact_no' => $request->input('editContact_no'),
				'profile_image' => $filenameToStore
	        ]);
		}
		else {
			$employee->update([
	            'name' => $request->input('editName'),
	            'position' => $request->input('editPosition'),
				'email' => $request->input('editEmail'),
				'contact_no' => $request->input('editContact_no'),
	        ]);
		}

		return redirect('/admin/employees');
	}

	public function delete(Employee $employee) {
		$employee->delete();
		return back();
	}
}
