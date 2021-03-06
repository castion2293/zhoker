<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1.0, user-scalable=no">
    <meta charset="UTF-8">
    <title>Zhoker 作客 居家美食 @yield('title')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" /><!--Select-2-->
    <link rel="stylesheet" href="{{ URL::to('css/all.css') }}">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.css' rel='stylesheet' /><!--FullCalendar-->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.print.css' rel='stylesheet' media='print' /><!--FullCalendar-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css"><!--dropzonejs-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css"><!--sweetalert-->
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.css'><!--photoswipe-->
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/default-skin/default-skin.min.css'><!--photoswipe-->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script><!--Boostrap DateTimePicker-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script><!--Select-2-->
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script><!--TinyMCE-->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script><!--FullCalendar-->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js'></script><!--dropzonejs-->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script><!--sweetalert-->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.js'></script><!--photoswipe-->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe-ui-default.min.js'></script><!--photoswipe-->
    <script src="https://unpkg.com/vue@2.1.8/dist/vue.js"></script>
    <script src="{{ URL::to('js/fullcalendar/locale/zh-tw.js') }}"></script><!--Chinese fullcalendar-->
    <script src="{{ URL::to('js/all.js') }}"></script>
    @yield('styles')
</head>

<body>

    @include('mobile.partials.header')

    @include('desktop.partials.flash')

    @yield('content')

    @include('mobile.partials.footer')

    @yield('scripts')

    <script src="{{ URL::to('js/vue_component.js') }}"></script>
</body>
</html>