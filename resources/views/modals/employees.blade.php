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
                                    <input type="text" class="form-control mr-3 rounded-0 border-top-0 border-left-0 border-right-0" id="name" name="name" placeholder="Full Name">
                                    @if(count($errors))
                                        <small class="text-danger mt-1">{{ $errors->first('name') }}</small>
                                    @endif
                                </div>
                                <div class="form-group pb-2">
                                    <input type="text" class="form-control py-2 mb-1 rounded-0 border-top-0 border-left-0 border-right-0" id="position" name="position" placeholder="Position">
                                    @if(count($errors))
                                        <small class="text-danger mt-1">{{ $errors->first('position') }}</small>
                                    @endif
                                </div>
                                <div class="form-group pb-2">
                                    <input type="email" class="form-control py-2 mb-1 rounded-0 border-top-0 border-left-0 border-right-0" id="email" name="email" placeholder="E-Mail">
                                    @if(count($errors))
                                        <small class="text-danger mt-1">{{ $errors->first('email') }}</small>
                                    @endif
                                </div>
                                <div class="form-group pb-2">
                                    <input type="number" class="form-control py-2 mb-1 rounded-0 border-top-0 border-left-0 border-right-0" id="contact_no" name="contact_no" placeholder="Contact Number">
                                    @if(count($errors))
                                        <small class="text-danger mt-1">{{ $errors->first('contact_no') }}</small>
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
                                                <img src="" id="profile-img" class="img-fluid profile-img rounded mb-3 text-center">
                                                <input type="file" name="profile_image" id="img-input">
                                                @if(count($errors))
                                                    <small class="text-danger mt-2">{{ $errors->first('profile_image') }}</small>
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
                    <button type="button" class="btn btn-secondary rounded-0 shadow" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary rounded-0 shadow">
                </div>
            </form>
        </div>
    </div>
</div>


<!-- QR Code Modal -->
<div class="modal fade" id="QrModal" tabindex="-1" role="dialog" aria-labelledby="QrModalLabel" aria-hidden="true">
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
                        <div class="col">
                            
                        </div>
                        <div class="col">
                            <img id="qr-field" src="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
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
                <button type="button" class="btn btn-secondary rounded-0 shadow" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary rounded-0 shadow" id="delete-btn">Delete</button>
            </div>    
        </div>
    </div>
</div>