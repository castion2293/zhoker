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
    <link rel="stylesheet" href="{{ URL::to('css/component.css') }}">
    <!--Add Jquery-UI CSS-->
    <link rel="stylesheet" href="{{ URL::to('css/jquery-ui.css') }}">
    <!--Select-2-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ URL::to('js/0609.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/JQ.js') }}"></script>
    <script src="{{ URL::to('js/parsley.min.js') }}"></script> <!--Parsley Validation-->
    <!--Add Jquery UI JS-->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!--Select-2-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <!--TinyMCE-->
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    @yield('styles')
</head>

<body>
    @include('desktop.partials.header')
    
    @yield('content')

    @include('desktop.partials.footer')
    
    @yield('scripts')
</body>
</html>