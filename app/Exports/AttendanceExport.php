<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Attendance;
use Carbon\Carbon;

class AttendanceExport implements FromQuery, withHeadings, ShouldAutoSize
{
	use Exportable;

	public function __construct($date) {
		$this->date = $date;
	}

	public function headings() : array {
		return [
			'Employee Name',
			'Position',
			'Attendance ID',
			'Contact No',
			'Attendance Date',
			'Time In',
			'Time Out',
			'Time Spent'
		];
	}

    public function query() {
    	return Attendance::query()->selectRaw('name, position, attendance_id, contact_no, date, time_in, time_out, TIMEDIFF(time_out, time_in)')->where('date', $this->date);
    }
}
