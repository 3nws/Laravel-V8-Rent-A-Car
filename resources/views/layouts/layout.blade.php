<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @yield('css')
    @yield('js')
</head>
<body>

    <div class="jumbotron text-center">
        <h1>Header</h1>
        <p>Resize this responsive page to see the effect</p>
        @yield('header')
    </div>

    <div class="container">
        <div class="row">
            @yield('sidebar')
            @yield('content')
        </div>
    </div>

    <div class="jumbotron text-center">
        <h1>Footer</h1>
        <p>footer</p>
        @yield('footer')
    </div>

</body>
</html>
