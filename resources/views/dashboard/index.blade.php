@extends ('layouts.admin')

@section ('content')
@include ('layouts.sidebar')
<main role="main" class="col ml-sm-auto pt-4 px-5">
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 ">
            <h1 class="h2">Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card px-3 py-2 border-0 bg-white shadow mb-3">
                    <table class="table">
                        <tbody>
                            <thead>
                                <tr>
                                    <th>
                                        <a class="card-title mb-0" href="/admin/attendance">Today's Attendances - {{ Carbon\Carbon::now()->toFormattedDateString() }}</a>
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            @forelse ($attendanceToday as $attendance)
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
                                    <p><span class="text-muted">In:</span> {{ $attendance->time_in }}</p>
                                    <p><span class="text-muted">Out:</span> {{ $attendance->time_out }}</p>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>There are no attendances today.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection