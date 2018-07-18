<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Redirect</title>
    </head>
    <body>
        <p>Hello, {{ $employee->name }}!</p>

        <form action="/reader/login" method="POST">
            @csrf
            <button type="submit" name="button">Click here to time in.</button>
        </form>
    </body>
</html>
