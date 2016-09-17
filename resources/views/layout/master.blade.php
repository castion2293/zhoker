<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1.0, user-scalable=no">
    <meta charset="UTF-8">
    <title>Zhoker 作客 居家美食 @yield('title')</title>
    <link rel="stylesheet" href="{{ URL::to('css/w3.css') }}">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::to('css/main.css') }}">
    @yield('styles')
</head>

<body>
    @include('partials.header')
    
    @yield('content')

    @include('partials.footer')
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ URL::to('js/0609.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/JQ.js') }}"></script>
    <script src="{{ URL::to('js/parsley.min.js') }}"></script> <!--Parsley Validation-->
    @yield('scripts')
</body>
</html>