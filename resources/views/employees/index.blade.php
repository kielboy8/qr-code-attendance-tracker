@extends ('layouts.admin')

@section ('content')
@include ('layouts.sidebar')
<main role="main" class="col ml-sm-auto pt-4 px-5">
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 ">
            <h1 class="h2">Employees</h1>
            <button type="button" class="btn btn-primary shadow" data-toggle="modal" data-target="#createEmployee">
                Add Employee
            </button>
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
                                <th>Date Updated</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->id }}</td>
                                <td>
                                    <div class="d-flex flex-row align-items-start">
                                        <img src="/storage/employee/images/{{ $employee->profile_image }}" style="width: 50px" class="mr-3 rounded-circle shadow">
                                        <div class="d-flex flex-column">
                                            <p class="mb-0 lead">{{ $employee->name }}</p>
                                            <p class="mt-0 text-muted"><small>{{ $employee->position }}</small></p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $employee->attendance_id }}</td>
                                <td>{{ $employee->created_at->toDayDatetimeString() }}</td>
                                <td>
                                    <button type="button"  id="editEmployeeBtn" class="btn btn-sm btn-primary shadow action-icon" data-id="{{ $employee->id }}" data-profile-image="{{ $employee->profile_image }}" data-name="{{ $employee->name }}" data-position="{{ $employee->position }}" data-attendance-id="{{ $employee->attendance_id }}" data-email="{{ $employee->email }}" data-contact-no="{{ $employee->contact_no }}" data-toggle="modal" data-target="#editEmployee" title="Edit Employee">
                                        &#xf6bb;
                                    </button>
                                    <button type="button" id="viewEmployeeBtn" class="action-btn btn-view btn btn-sm btn-primary shadow action-icon" data-id="{{ $employee->id }}" data-profile-image="{{ $employee->profile_image }}" data-name="{{ $employee->name }}" data-position="{{ $employee->position }}" data-attendance-id="{{ $employee->attendance_id }}" data-email="{{ $employee->email }}" data-contact-no="{{ $employee->contact_no }}"  data-toggle="modal" data-target="#viewEmployee" title="View Employee">
                                        &#xf6cf;
                                    </button>
                                    <form method="POST" action="/admin/employees/delete/{{ $employee->id }}" class="form-delete">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input type="submit" name="delete" class="btn btn-sm btn-primary shadow action-icon" title="Delete Employee" data-toggle="modal" data-target="#deleteAlert" value="&#xf9e6;">
                                    </form>
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

@include ('employees.modals')
@endsection
