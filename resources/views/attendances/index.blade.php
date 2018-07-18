@extends ('layouts.admin')

@section ('content')
<div class="container-fluid">
    <div class="row">
        @include ('layouts.sidebar')
        <main role="main" class="col ml-sm-auto pt-4 px-5">
            <div class="container-fluid">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 ">
                    <h1 class="h2">Attendance</h1>
                    <div class="dropdown mb-2 mb-md-0">
                        <a href="#" class="btn btn-primary dropdown-toggle rounded-0 shadow-sm" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Filter by Date
                        </a>
                        <div class="dropdown-menu rounded-0 dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="card p-0 border-0 rounded-0 bg-white shadow-sm">
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
                        <div class="card p-0 border-0 rounded-0 bg-white shadow-sm">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Employee Name</th>
                                        <th>Time In</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendances as $attendance)
                                    <tr>
                                        <td>{{ $attendance->id }}</td>
                                        <td>
                                            <p class="lead mb-0">{{ $attendance->name }}</p>
                                            <p class="text-muted"><small>{{ $attendance->position }}</small></p>
                                        </td>
                                        <td>
                                            {{ $attendance->created_at->toDayDatetimeString() }}
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
    </div>
</div>
@endsection