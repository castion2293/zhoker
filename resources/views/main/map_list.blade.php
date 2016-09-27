@extends('layout.master')

@section('title', '| List')

@section('styles')
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAQp20MFB985Begc6VpjpvOPwcJ9jPH-3c"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.googlemap/1.5/jquery.googlemap.min.js"></script>
@endsection

@section('content')
    <div id="map" style="width: 100%; height: 600px;"></div>

    <script>
        $(function() {
            $("#map").googleMap({
                zoom: 10, // Initial zoom level (optional)
                coords: [48.895651, 2.290569], // Map center (optional)
                type: "ROADMAP" // Map type (optional)
            });
            // $("#map").googleMap();
            // $("#map").addMarker({
            //     address: "751 S 300 E Salt Lake City Utah", // Postale Address
            //     url: 'http://www.yahoo.com' // Link
            // });
            // $("#map").addMarker({
            //     address: "751 S 600 W Salt Lake City Utah", // Postale Address
            //     url: 'http://www.yahoo.com' // Link
            // });
        })
    </script>
@endsection