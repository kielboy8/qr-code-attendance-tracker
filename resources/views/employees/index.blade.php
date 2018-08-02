@extends ('layouts.admin')

@section ('content')
@include ('layouts.sidebar')
<main role="main" class="col ml-sm-auto pt-4 px-5">
    <div class="container-fluid">
        <div class="d-flex flex-column  flex-wrap flex-md-nowrap pb-2 mb-2">
            <h1 class="h2">Employees</h1>
            <div class="mt-2">
                <div class="d-flex flex-row">
                    <div class="mr-3">
                        <button type="button" class="btn btn-primary shadow" data-toggle="modal" data-target="#createEmployee">
                            Add Employee
                        </button>
                    </div>
                    <div class="dropdown mr-3">
                        <button class="btn btn-secondary dropdown-toggle shadow" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Filter Status
                        </button>
                        <div class="dropdown-menu py-0" aria-labelledby="dropdownMenu2">
                            <a class="dropdown-item py-2" href="/admin/employees?status=in-office">In-Office</a>
                            <div class="dropdown-divider m-0"></div>
                            <a class="dropdown-item py-2" href="/admin/employees?status=out-of-office">Out-Of-Office</a>
                        </div>
                    </div>
                    <form class="form-inline ml-auto" action="/admin/employees/search" method="POST" role="search">
                        @csrf
                        <div class="form-group mr-2">
                            @if ($errors->has('search')) 
                                <span class="mr-3 text-danger">Please input something.</span>
                            @endif
                            <label for="search" class="sr-only">Search</label>
                            <input type="text" class="form-control bg-light border-top-0 border-left-0 border-right-0 rounded-0" name="search" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-primary shadow">Search</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card px-3 py-2 border-0 bg-white shadow mb-3">
                    <table class="table" data-toggle="dataTable" data-form="deleteForm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Employee Name</th>
                                <th>Attendance ID</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employees as $employee)
                            <tr>
                                <td>{{ $employee->id }}</td>
                                <td>
                                    <div class="d-flex flex-row align-items-start">
                                        <img src="/storage/employee/images/{{ $employee->profile_image }}" class="mr-3 profile-icon rounded-circle shadow">
                                        <div class="d-flex flex-column">
                                            <p class="mb-0 lead">{{ $employee->name }}</p>
                                            <p class="mt-0 text-muted"><small>{{ $employee->position }}</small></p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $employee->attendance_id }}</td>
                                <td>
                                    <h5>
                                        <span class="badge {{ $employee->status == 'In-Office' ? 'badge-success' : 'badge-primary' }}">
                                            {{ $employee->status }}
                                        </span>
                                    </h5>
                                </td>
                                <td>
                                    <button type="button"  id="editEmployeeBtn" class="btn btn-sm btn-primary shadow action-icon" data-id="{{ $employee->id }}"
                                    data-profile-image="{{ $employee->profile_image }}" data-name="{{ $employee->name }}" data-position="{{ $employee->position }}"
                                    data-attendance-id="{{ $employee->attendance_id }}" data-email="{{ $employee->email }}" data-contact-no="{{ $employee->contact_no }}"
                                    data-toggle="modal" data-target="#editEmployee" title="Edit Employee">
                                        &#xf6bb;
                                    </button>
                                    <button type="button" id="viewEmployeeBtn" class="action-btn btn-view btn btn-sm btn-primary shadow action-icon" 
                                    data-id="{{ $employee->id }}" data-profile-image="{{ $employee->profile_image }}" data-name="{{ $employee->name }}" 
                                    data-position="{{ $employee->position }}" data-attendance-id="{{ $employee->attendance_id }}" data-email="{{ $employee->email }}" 
                                    data-contact-no="{{ $employee->contact_no }}" data-created-at="{{ $employee->created_at->toFormattedDateString() }}" 
                                    data-status="{{ $employee->status }}" data-toggle="modal" data-target="#viewEmployee" title="View Employee">
                                        &#xf6cf;
                                    </button>
                                    <form method="POST" action="/admin/employees/delete/{{ $employee->id }}" class="form-delete">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input type="submit" name="delete" class="btn btn-sm btn-primary shadow action-icon" title="Delete Employee" data-toggle="modal" data-target="#deleteAlert" value="&#xf9e6;">
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td></td>
                                <td><p class="lead">There are no employees.</p></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if (count($employees) > 0)
                <div class="d-flex justify-content-end mb-4">
                    {{ $employees->links() }}
                    @if (Request::is('admin/employees*'))
                    <div>
                        <a href="/admin/employees" class="ml-3 btn btn-primary">Back</a>
                    </div>
                    @endif
                </div>
                @else
                <div class="d-flex justify-content-end">
                    <a href="/admin/employees" class="btn btn-primary">Back</a>
                </div>
                @endif
            </div> 
        </div>
    </div>
</main>

@include ('employees.modals')
@endsection
