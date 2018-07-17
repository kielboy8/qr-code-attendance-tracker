@extends ('layouts.admin')

@section ('content')
<div class="container-fluid">
    <div class="row">
        @include ('layouts.sidebar')
        <main role="main" class="col ml-sm-auto pt-4 px-5">
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
                    <div class="col">
                        <div class="card p-5 border-0 rounded-0 bg-white shadow-sm">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Employee Name</th>
                                        <th>Time-in</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div> 
                </div>
            </div>
        </main>
    </div>
</div>
@endsection