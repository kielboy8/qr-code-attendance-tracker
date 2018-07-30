@extends ('layouts.admin')

@section ('content')
@include ('layouts.sidebar')
<main role="main" class="col ml-sm-auto pt-4 px-5">
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 ">
            <h1 class="h2">
                Attendance
                @if (isset($attendances))
                    - ({{ $today }})
                @endif
            </h1>
            @if (isset($attendances))
                <div class="dropdown mb-2 mb-md-0">
                    <a href="/admin/attendance" class="btn btn-primary shadow" role="button">
                        View All
                    </a>
                </div>
            @endif
        </div>
        <div class="row">
            @if (empty($attendances))
                <div class="col">
                    <div class="card px-3 py-2 border-0 bg-white shadow mb-3">
                        <div id="calendar"></div>
                    </div>
                </div>
            @else
                <div class="col">
                    <div class="card px-3 py-2 border-0 bg-white shadow mb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Contact Number</th>
                                    <th>Time In</th>
                                    <th>Time Out</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($attendances) > 0)
                                    @foreach ($attendances as $attendance)
                                    <tr>
                                        <td>
                                            <p class="lead mb-0">{{ $attendance->name }}</p>
                                            <p class="text-muted"><small>{{ $attendance->position }}</small></p>
                                        </td>
                                        <td>
                                            {{ $attendance->contact_no }}
                                        </td>
                                        <td>
                                            {{ $attendance->time_in }}
                                        </td>
                                        <td>
                                            {{ $attendance->time_out }}
                                        </td>
                                        <td>
                                            <i class="mdi mdi-account-edit h5"></i>
                                            <i class="mdi mdi-eye-outline h5"></i>
                                            <i class="mdi mdi-delete-outline h5"></i>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">
                                            <p class="lead mb-0 text-center">No attendance record found on this day</p>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
</main>
@endsection
