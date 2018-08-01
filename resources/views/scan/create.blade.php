@extends ('layouts.admin')

@section ('content')
<div class="container-fluid">
    <div class="row">
        <main role="main" class="col ml-sm-auto px-5 pr-5 pl-5 mt-3">
            <div class="container-fluid">
                <div class="d-flex flex-row align-items-center">
                    <div class="col"></div>
                    <div class="col-3">
                        <div class="card p-3 border-0 rounded-0 bg-white shadow">
                            <div class="card-body pt-5">
                                <div class="text-center">
                                    <img src="/storage/employee/images/noimage.jpg" class="profile-img img-fluid rounded-circle text-center" id="emp-img">
                                </div>
                                <h1 class="card-title h4 mt-4 text-center" id="emp-name">Employee Name</h1>
                                <p class="text-muted text-center"><small id="emp-pos">Employee Position</small></p>
                                <p class="mt-5" id="emp-in">Time-In:</p>
                                <p id="emp-out">Time-Out:</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <main role="main" class="col ml-sm-auto pt-1 px-5">
                            <div class="card p-3 border-0 rounded-0 bg-white shadow">
                                <div class="card-body p-0 text-center">
                                    <video id="preview"></video>

                                    {{-- <form action="/scan" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="attendance_id" placeholder="Employee Code" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="send" class="btn btn-muted">
                                        </div>
                                    </form> --}}

                                </div>
                            </div>
                        </main>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
