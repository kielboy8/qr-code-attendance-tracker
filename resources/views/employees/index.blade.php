@extends ('layouts.admin')

@section ('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 ">
        <h1 class="h2">Employees</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-outline-secondary my-auto" data-toggle="modal" data-target="#createEmployee">
                Add Employee
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card p-5 border-0 rounded-0 bg-white shadow-sm">
                <table class="table">
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
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->attendance_id }}</td>
                            <td>{{ $employee->updated_at }}</td>
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

<div class="modal fade" id="createEmployee" tabindex="-1" role="dialog" aria-labelledby="createEmployee" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createJournal">Add an Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/admin/employees/create" method="POST">
                <div class="modal-body mx-5">
                    @csrf
                    <div class="form-group">
                        <label for="title">Employee Name: </label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection