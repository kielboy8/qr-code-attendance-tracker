@extends ('layouts.admin')

@section ('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 ">
        <h1 class="h2">Attendance</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="card p-5 border-0 rounded-0 bg-white shadow-sm">
            </div>
        </div>
        <div class="col-8">
            <div class="card p-5 border-0 rounded-0 bg-white shadow-sm">
            </div>
        </div> 
    </div>
</div>
@endsection