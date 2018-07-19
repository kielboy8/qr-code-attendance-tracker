@extends ('layouts.admin')

@section ('content')
<main role="main" class="col ml-sm-auto pt-4 px-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col"></div>
            <main role="main" class="col-5 ml-sm-auto pt-4 px-5 text-center">
                <div class="card p-3 border-0 rounded-0 shadow-sm">
                    <div class="card-body px-5">
                        <div class="text-center mb-3">
                            <i class="mdi mdi-account-outline display-2 text-black-50"></i>
                            <h1 class="h4">Administrator Login</h3>
                        </div>
                        <form action="/login" method="POST">
                            @csrf
                            @include ('errors.login')

                            <div class="form-group mb-4">
                                <input type="email" name="email" placeholder="Email" class="form-control rounded-0 py-3 border-top-0 border-left-0 border-right-0 mb-3">
                                <input type="password" name="password" placeholder="Password" class="form-control rounded-0 py-3 border-top-0 border-left-0 border-right-0">
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" name="login" value="Sign In" class="btn btn-primary btn-lg rounded-0 shadow form-control">
                            </div>
                        </form>
                    </div>
                </div>
            </main>
            <div class="col"></div>
        </div>
    </div>
</main>

@endsection