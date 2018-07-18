@extends ('layouts.admin')

@section ('content')
<div class="container-fluid">
    <div class="row">
        @include ('layouts.sidebar')
        <main role="main" class="col ml-sm-auto pt-4 px-5">
            <div class="container-fluid">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 ">
                    <h1 class="h2">Employees</h1>
                    <button type="button" class="btn btn-primary rounded-0 shadow-sm" data-toggle="modal" data-target="#createEmployee">
                        Add Employee
                    </button>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card p-0 border-0 rounded-0 bg-white shadow-sm mb-3">
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
                                        <td>
                                            <div class="d-flex flex-row align-items-center">
                                                <i class="mdi mdi-account-circle h1 mr-3"></i>
                                                <div class="d-flex flex-column">
                                                    <p class="mb-0 lead">{{ $employee->name }}</p>
                                                    <p class="mt-0 text-muted"><small>{{ $employee->position }}</small></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $employee->attendance_id }}</td>
                                        <td>{{ $employee->created_at->toDayDatetimeString() }}</td>
                                        <td>
                                            <i class="mdi mdi-account-edit h3"></i>
                                            <a id="{{$employee->attendance_id}}" class="action-btn btn-view" data-toggle="modal" data-target="#QrModal">
                                                <i class="mdi mdi-eye-outline h3"></i>
                                            </a>
                                            <i class="mdi mdi-delete-outline h3"></i>
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

<!-- Create Employee Modal -->
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
                        <label for="title">Name: </label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="title">Position: </label>
                        <input type="text" class="form-control" id="position" name="position">
                    </div>
                    <div class="form-group">
                        <label for="title">Email: </label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="title">Contact Number: </label>
                        <input type="number" class="form-control" id="contact_no" name="contact_no">
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

<!-- QR Code Modal -->
<div class="modal fade" id="QrModal" tabindex="-1" role="dialog" aria-labelledby="QrModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="qr-field" src="">
            </div>
            <!-- div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div -->
        </div>
    </div>
</div>
@endsection
