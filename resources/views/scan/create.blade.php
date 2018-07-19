@extends ('layouts.admin')

@section ('content')
<div class="container-fluid">
    <div class="row">
        <main role="main" class="col ml-sm-auto pt-4 px-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col"></div>
                    <main role="main" class="col ml-sm-auto pt-1 px-5">
                        <div class="card p-0">
                            <div class="card-body text-center">
                                <h1 class="h3 card-title">Attendance Input Sample</h1>
                                <form action="/scan" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Attendance ID:</label>
                                        <input type="text" name="attendance_id" placeholder="Employee Code" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="send" class="btn btn-muted">
                                    </div>
                                </form>
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