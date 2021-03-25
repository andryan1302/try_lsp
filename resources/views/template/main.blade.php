<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK INDONESIA</title>
    <link rel="stylesheet" href="{{ asset('style.css')}}">
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <img src="{{ asset('images/header.jpg') }}" alt="">
        </div>
        @yield('navbar')
        <div class="main">
            @yield('main')
        </div>
        <div class="footer" style="text-align:center">
        copyright
        </div>
    </div>
</body>
</html>