@extends('layout.master')

@section('title', '| List')

@section('styles')
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDIow86AS8K94ezmJPzrm-yjyIbTPAUkG8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.googlemap/1.5/jquery.googlemap.min.js"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-7">
            <div  id="fixed" style="position:fixed;height:100%;width:60%;">
                <div id="map" style="height:100%"></div>
                <a class="scroll w3-bottom" href="#about">about</a>
                <!--a class="scroll w3-bottom" href="#contact">contact</a-->
            </div>
        </div>
        <div class="col-md-5 row">
            <div class="col-md-12">
                <!-- Container (About Section) -->
                <div id="about" class="container-fluid">
                  <div class="row">
                    <div class="col-sm-8">
                      <h2>About Company Page</h2><br>
                      <h2>About Company Page</h2><br>
                      <h2>About Company Page</h2><br>
                      <h2>About Company Page</h2><br>
                      <h2>About Company Page</h2><br>
                      <h2>About Company Page</h2><br>
                      <h2>About Company Page</h2><br>
                      <h2>About Company Page</h2><br>
                      <h2>About Company Page</h2><br>
                    </div>
                  </div>
                </div>

                <!-- Container (Services Section) -->
                <div id="services" class="container-fluid text-center">
                  <h2>SERVICES</h2>
                  <h4>What we offer</h4>
                  <h4>What we offer</h4>
                  <h4>What we offer</h4>
                  <h4>What we offer</h4>
                  <h4>What we offer</h4>
                  <h4>What we offer</h4>
                  <h4>What we offer</h4>
                  <br>
                </div>

                <!-- Container (Portfolio Section) -->
                <div id="portfolio" class="container-fluid text-center bg-grey">
                  <h2>Portfolio</h2><br>
                  <h4>What we have created</h4>
                </div>

                <!-- Container (Pricing Section) -->
                <div id="pricing" class="container-fluid">
                  <div class="text-center">
                    <h2>Pricing</h2>
                    <h4>Choose a payment plan that works for you</h4>
                    <h4>Choose a payment plan that works for you</h4>
                    <h4>Choose a payment plan that works for you</h4>
                    <h4>Choose a payment plan that works for you</h4>
                    <h4>Choose a payment plan that works for you</h4>
                    <h4>Choose a payment plan that works for you</h4>
                    <h4>Choose a payment plan that works for you</h4>
                  </div>
                </div>

                <!-- Container (Contact Section) -->
                <div id="contact" class="container-fluid bg-grey">
                  <h2 class="text-center">CONTACT</h2>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
  $(function() {
      var pos = "";

      $("#map").googleMap({
         zoom: 13,
         type: "ROADMAP" // Map type (optional)
      });
      $("#map").addMarker({
    	   address: "751 S 300 E Salt Lake City Utah", // Postale Address
         id: 'marker1',
         url: '#!about', // Link
      }).addClass("scroll");
      $("#map").addMarker({
    	   address: "751 S 600 W Salt Lake City Utah", // Postale Address
         id: 'marker2',
    	   url: '#!contact', // Link
      })

      // Add smooth scrolling to all links in navbar + footer link
      $(".scroll").on('click', function(event) {
        
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
          // Prevent default anchor click behavior
          event.preventDefault();
          
          //  Store hash
          var marker_url = window.location.hash.split("!");  // split url to # and link
          var hash = marker_url[0].concat(marker_url[1]);    // conbine url into #link
         
          // Using jQuery's animate() method to add smooth page scroll
          // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
          $('html, body').animate({
              scrollTop: $(hash).offset().top
            }, 900, function(){
             
            // Add hash (#) to URL when done scrolling (default click behavior)
            //window.location.hash = hash;
          });
       } // End if
      });
})
</script>
@endsection