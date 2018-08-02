@extends ('layouts.admin')

@section ('content')
@include ('layouts.sidebar')
<main role="main" class="col ml-sm-auto pt-4 px-5">
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 ">
            <h1 class="h2">Attendance</h1>
            <div class="dropdown mb-2 mb-md-0">
                
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="d-flex flex-row">
                    <div class="mr-3">
                        <a href="/admin/attendance" class="btn btn-primary shadow" role="button">
                            View All
                        </a>
                    </div>        
                </div>
                <div class="card px-3 py-2 border-0 bg-white shadow mb-3">
                    <table class="table border-top-0">
                        <thead>
                            <tr>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($archives as $archive)
                            <tr>
                                <td>
                                    <a href="/admin/attendance?month={{ $archive->month }}&day={{ $archive->day }}&year={{ $archive->year }}" class="mb-0 pb-0 lead">
                                        {{ $archive->month . ' ' . $archive->day . ', ' . $archive->year }}
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> 
            <div class="col">
                <div class="card px-3 py-2 border-0 bg-white shadow mb-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Employee Name</th>
                                <th>Contact Number</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                            </tr>
                        </thead>
                        <tbody>
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection