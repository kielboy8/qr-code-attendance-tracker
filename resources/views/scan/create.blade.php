@extends ('layouts.admin')

@section ('content')
<div class="container-fluid">
    <div class="row">
        <main role="main" class="col ml-sm-auto px-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col"></div>
                    <main role="main" class="col ml-sm-auto pt-1 px-5">
                        <div class="card p-0">
                            <div class="card-body text-center">
                                <h1 class="h3 card-title">Attendance Input Sample</h1>
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