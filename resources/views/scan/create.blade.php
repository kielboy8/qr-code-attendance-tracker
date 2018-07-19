@extends ('layouts.admin')

@section ('content')
<div class="container-fluid">
    <div class="row">
        <main role="main" class="col ml-sm-auto px-5 mt-5">
            <div class="container-fluid">
                <div class="d-flex flex-row align-items-center">
                    <div class="col"></div>
                    <div class="col-3">
                        <div class="card p-3 border-0 rounded-0 bg-white shadow">
                            <div class="card-body pt-5">
                                <div class="user-img text-center">
                                    <i class="mdi mdi-account-circle display-1 h1"></i>
                                </div>
                                <h1 class="card-title h4 mt-4 text-center">Employee Name</h1>
                                <p class="text-muted text-center"><small>Employee Position</small></p>
                                <p class="mt-5">Time-In:</p>
                                <p>Time-Out:</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <main role="main" class="col ml-sm-auto pt-1 px-5">
                            <div class="card p-3 border-0 rounded-0 bg-white shadow">
                                <div class="card-body p-0 text-center">
                                    <video id="preview"></video>
                                    
                                    <!-- 
                                    <form action="/scan" method="POST">
                                        <video id="preview"></video>
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="attendance_id" placeholder="Employee Code" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="send" class="btn btn-muted">
                                        </div>
                                    </form>
                                    -->
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

@section('scanner-script')
<script type="text/javascript" src="{{ asset('js/instascan.min.js') }}"></script>
@endsection

@section('qr-reader-script')
<script src="{{ asset('js/qrreader.js') }}"></script>
@endsection