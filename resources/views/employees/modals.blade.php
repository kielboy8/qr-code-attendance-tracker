<!-- Create Employee Modal -->
<div class="modal fade" id="createEmployee" tabindex="-1" role="dialog" aria-labelledby="createEmployee" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content px-3 py-2">
            <div class="modal-header">
                <h5 class="modal-title" id="createJournal">Add an Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/admin/employees/create" method="POST" enctype="multipart/form-data" runat="server">
                <div class="modal-body mt-2">
                    @csrf
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <div class="form-group pb-2">
                                    <input type="text" class="form-control mr-3 rounded-0 border-top-0 border-left-0 border-right-0" id="addName" name="addName" placeholder="Full Name">
                                    @if(count($errors))
                                        <small class="text-danger mt-1">{{ $errors->first('addName') }}</small>
                                    @endif
                                </div>
                                <div class="form-group pb-2">
                                    <input type="text" class="form-control py-2 mb-1 rounded-0 border-top-0 border-left-0 border-right-0" id="addPosition" name="addPosition" placeholder="Position">
                                    @if(count($errors))
                                        <small class="text-danger mt-1">{{ $errors->first('addPosition') }}</small>
                                    @endif
                                </div>
                                <div class="form-group pb-2">
                                    <input type="email" class="form-control py-2 mb-1 rounded-0 border-top-0 border-left-0 border-right-0" id="addEmail" name="addEmail" placeholder="E-Mail">
                                    @if(count($errors))
                                        <small class="text-danger mt-1">{{ $errors->first('addEmail') }}</small>
                                    @endif
                                </div>
                                <div class="form-group pb-2">
                                    <input type="number" class="form-control py-2 mb-1 rounded-0 border-top-0 border-left-0 border-right-0" id="addContact_no" name="addContact_no" placeholder="Contact Number">
                                    @if(count($errors))
                                        <small class="text-danger mt-1">{{ $errors->first('addContact_no') }}</small>
                                    @endif
                                </div>
                                <small class="text-muted">* Employee QR Code will be generated upon creation.</small>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col">
                                                <label for="profile_image" class="text-muted">Profile Picture:</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <img src="" id="add-profile-img" class="img-fluid profile-img rounded mb-3 text-center">
                                                <input type="file" name="addProfile_image" id="add-img-input">
                                                @if(count($errors))
                                                    <small class="text-danger mt-2">{{ $errors->first('addProfile_image') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary shadow" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary shadow" name="add">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View Employee Modal -->
<div class="modal fade" id="viewEmployee" tabindex="-1" role="dialog" aria-labelledby="viewEmployeeLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content px-3 py-2">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Employee Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col text-center">
                            <img src="" class="rounded-circle profile-img img-fluid mt-3 mb-4 shadow" id="view-profile-img">
                            <p id="name" class="lead mb-0"></p>
                            <p id="position" class="text-muted"></p>
                            <p id="email" class="text-muted mb-0">k</p>
                            <p id="contactNo" class="text-muted"></p>
                            <p class="mb-0 text-muted">Date Created: <span id="createdAt" class="text-dark"></span></p>
                            <p class="text-muted">Status: <span id="status" class="text-dark"></span></p>
                        </div>
                        <div class="col text-center">
                            <img id="qr-field" class="mb-0" src="">
                            <p id="attendanceId" class="mt-0 text-muted"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary shadow" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Employee Modal -->
<div class="modal fade" id="editEmployee" tabindex="-1" role="dialog" aria-labelledby="editEmployee" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content px-3 py-2">
            <div class="modal-header">
                <h5 class="modal-title" id="createJournal">Edit Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/admin/employees/update" method="POST" enctype="multipart/form-data" runat="server">
                <div class="modal-body mt-2">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <input type="hidden" name="editId" id="editId" value="">
                                <div class="form-group pb-2">
                                    <input type="text" class="form-control mr-3 rounded-0 border-top-0 border-left-0 border-right-0" id="editName" name="editName" placeholder="Full Name">
                                    @if(count($errors))
                                        <small class="text-danger mt-1">{{ $errors->first('editName') }}</small>
                                    @endif
                                </div>
                                <div class="form-group pb-2">
                                    <input type="text" class="form-control py-2 mb-1 rounded-0 border-top-0 border-left-0 border-right-0" id="editPosition" name="editPosition" placeholder="Position">
                                    @if(count($errors))
                                        <small class="text-danger mt-1">{{ $errors->first('editPosition') }}</small>
                                    @endif
                                </div>
                                <div class="form-group pb-2">
                                    <input type="email" class="form-control py-2 mb-1 rounded-0 border-top-0 border-left-0 border-right-0" id="editEmail" name="editEmail" placeholder="E-Mail">
                                    @if(count($errors))
                                        <small class="text-danger mt-1">{{ $errors->first('editEmail') }}</small>
                                    @endif
                                </div>
                                <div class="form-group pb-2">
                                    <input type="number" class="form-control py-2 mb-1 rounded-0 border-top-0 border-left-0 border-right-0" id="editContact_no" name="editContact_no" placeholder="Contact Number">
                                    @if(count($errors))
                                        <small class="text-danger mt-1">{{ $errors->first('editContact_no') }}</small>
                                    @endif
                                </div>
                                <small class="text-muted">* Employee QR Code will stay the same upon edit.</small>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col">
                                                <label for="profile_image" class="text-muted">Currrent Profile Picture:</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <img src="" id="edit-profile-img" class="img-fluid profile-img rounded mb-3 text-center">
                                                <input type="file" name="editProfile_image" id="edit-img-input">
                                                @if(count($errors))
                                                    <small class="text-danger mt-2">{{ $errors->first('editProfile_image') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary shadow" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary shadow">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="deleteAlertLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content px-3 py-2">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="lead mb-0">
                    Are you sure you want to delete this employee?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary shadow" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary shadow" id="delete-btn">Delete</button>
            </div>    
        </div>
    </div>
</div>

@if ($errors->has('addEmployee'))
    <script type="text/javascript">
        $(document).ready(function() {
            $('#createEmployee').modal('show');
        });
    </script>
@endif