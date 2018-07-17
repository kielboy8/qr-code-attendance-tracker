<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/2.5.94/css/materialdesignicons.min.css" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
    @include ('layouts.navbar')

    <div class="container-fluid">
        <div class="row">
        	<div class="col"></div>
            <main role="main" class="col-6 ml-sm-auto pt-4 px-5">
            	<div class="card p-5">
                    <div class="card-body">
                        <h1 class="h3 card-title">Attendance Input Sample</h1>
                        <form>
                            <div class="form-group">
                                <label for="name">Enter Employee Code:</label>
                                <input type="text" name="name" placeholder="Employee Code" class="form-control">
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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/ionicons@4.2.4/dist/ionicons.js"></script>
</body>
</html>
