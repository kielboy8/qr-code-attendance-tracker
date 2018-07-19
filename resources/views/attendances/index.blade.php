@extends ('layouts.admin')

@section ('content')
@include ('layouts.sidebar')
<main role="main" class="col ml-sm-auto pt-4 px-5">
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 ">
            <h1 class="h2">Attendance</h1>
            <div class="dropdown mb-2 mb-md-0">
                <a href="/admin/attendance" class="btn btn-primary rounded-0 shadow" role="button">
                    View All
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="card px-3 py-2 border-0 bg-white shadow mb-3">
                    <table class="table table-borderless border-top-0">
                        <thead>
                            <tr>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($archives as $archive)
                            <tr>
                                <td>
                                    <a href="/admin/attendance?month={{ $archive->month }}&day={{ $archive->day }}&year={{ $archive->year }}" class="mb-0 pb-0">
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
                                <th>Time In</th>
                                <th>Time Out</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendances as $attendance)
                            <tr>
                                <td>
                                    <p class="lead mb-0">{{ $attendance->name }}</p>
                                    <p class="text-muted"><small>{{ $attendance->position }}</small></p>
                                </td>
                                <td>
                                    {{ $attendance->created_at->toDayDatetimeString() }}
                                </td>
                                <td>
                                    {{ $attendance->updated_at->toDayDatetimeString() }}
                                </td>
                                <td>
                                    <i class="mdi mdi-account-edit h5"></i>
                                    <i class="mdi mdi-eye-outline h5"></i>
                                    <i class="mdi mdi-delete-outline h5"></i>
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