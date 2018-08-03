@extends ('layouts.admin')

@section ('content')
@include ('layouts.sidebar')
<main role="main" class="col ml-sm-auto pt-4 px-5">
    <div class="container-fluid">
        <div class="d-flex flex-column justify-content-between flex-wrap flex-md-nowrap pb-2 mb-2">
            <h1 class="h2">
                Attendance
                @if (isset($attendances))
                    - ({{ $today }})
                @endif
            </h1>
            @if (isset($attendances))
            <div class="mt-2">
                <div class="d-flex flex-row">
                    <div class="mr-3">
                        <a href="/admin/attendance" class="btn btn-primary shadow" role="button">
                            View All
                        </a>
                    </div>
                    <div class="mr-3">
                        <form method="POST" action="/admin/attendance/export" class="form-inline">
                            @csrf
                            <input type="hidden" name="month" value="{{ $_GET['month'] }}">
                            <input type="hidden" name="day" value="{{ $_GET['day'] }}">
                            <input type="hidden" name="year" value="{{ $_GET['year'] }}">
                            <input type="submit" name="export" value="Export to Excel" class="btn btn-success shadow">
                        </form>
                    </div>    
                </div>
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
                        <table class="table" data-form="deleteForm">
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
                                            <div class="d-flex flex-row align-items-start">
                                                <img src="/storage/employee/images/{{ $attendance->profile_image }}" class="mr-3 profile-icon rounded-circle shadow">
                                                <div class="d-flex flex-column">
                                                    <p class="mb-0 lead">{{ $attendance->name }}</p>
                                                    <p class="mt-0 text-muted"><small>{{ $attendance->position }}</small></p>
                                                </div>
                                            </div>
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
                                            <form method="POST" action="/admin/attendance/delete/{{ $attendance->id }}" class="form-delete">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <input type="submit" name="delete" class="btn btn-sm btn-primary shadow action-icon" title="Delete Attendance" data-toggle="modal" data-target="#deleteAlert" value="&#xf9e6;">
                                            </form>
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
@include ('attendances.modals')
@endsection
