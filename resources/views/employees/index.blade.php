@extends ('layouts.admin')

@section ('content')
@include ('layouts.sidebar')
<main role="main" class="col ml-sm-auto pt-4 px-5">
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 ">
            <h1 class="h2">Employees</h1>
            <button type="button" class="btn btn-primary rounded-0 shadow" data-toggle="modal" data-target="#createEmployee">
            {{-- <button type="button" class="menu-toggle btn btn-primary rounded-0 shadow">  --}}
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
                                    <button class="btn btn-sm btn-primary shadow action-icon" title="Edit Employee">
                                        &#xf6bb;
                                    </button>
                                    <button id="{{$employee->attendance_id}}" class="action-btn btn-view btn btn-sm btn-primary  shadow action-icon" data-toggle="modal" data-target="#QrModal" title="View Employee">
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

@include ('modals.employees')
@endsection
