<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Reader</title>

        <script type="text/javascript" src="{{ asset('js/instascan.min.js') }}"></script>
    </head>
    <body>
        <video id="preview"></video>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="{{ asset('js/jquery.redirect.js') }}"></script>
        <script src="{{ asset('js/qrreader.js') }}"></script>
    </body>
</html>
