@extends('layout.map_list_layout')

@section('title', '| List')

@section('styles')
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDIow86AS8K94ezmJPzrm-yjyIbTPAUkG8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.googlemap/1.5/jquery.googlemap.min.js"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-7">
            <div  id="fixed" style="position:fixed;height:80%;width:60%;margin-top:10%;">
                @include('partials.map_list_header')
                <div id="map" style="height:100%"></div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="col-md-12 w3-light-grey">
                <div class="w3-accordion">
                    @foreach($maps as $map)
                      <a id="{{ $map->id }}" href="#{{ $map->id }}" class="w3-white w3-btn-block w3-left-align dropDownList w3-border-light-grey w3-border-top w3-border-bottom" style="margin:4px 0 4px 0">
                        <div class="row">
                          <div class="col-md-2">
                              <img src="{{ URL::to('img/DSC_0395.JPG') }}" alt="Food1" style="width:100%">
                          </div>
                          <div class="col-md-10">
                              KKKK
                          </div>
                        </div>
                      </a>
                      <!--button id="{{ $map->id }}" class="w3-btn-block w3-left-align dropDownList">Open Section 1</button-->
                      <div id="drop_{{ $map->id }}" class="w3-accordion-content w3-container">
                        <h2>{{ $map->address }}</h2><br>
                        <h2>{{ $map->city }}</h2><br>
                        <h2>{{ $map->state }}</h2>
                      </div>
                    @endforeach
                </div>

                <!--@foreach($maps as $map)
                  
                  <div id="{{ $map->id }}" class="container-fluid">
                    <div class="row">
                      <div class="col-sm-8">
                        <h2>{{ $map->address }}</h2><br>
                        <h2>{{ $map->city }}</h2><br>
                        <h2>{{ $map->state }}</h2>
                      </div>
                    </div>
                  </div>
                @endforeach-->
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
  $(function() {
      
      // Google Map
      $("#map").googleMap({
         zoom: 13,
         type: "ROADMAP" // Map type (optional)
      });
      $("#map").addClass("scroll")
      @foreach($maps as $map)
        $("#map").addMarker({
    	     address: "{{ $map->address }} . ' ' . {{ $map->city }} . ' ' . {{ $map->state }}", // Postale Address
           id: '{{ $map->id }}',
           url: '#!{{ $map->id }}', // Link
        });
      @endforeach

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
             
          });
       } // End if
      });

      $(".dropDownList").click(function(){

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
          // Prevent default anchor click behavior
          event.preventDefault();

          //  Store hash
          var prefix = "#drop_";

          var hash = this.hash;

          var contentID = prefix.concat(hash.substring(1));
          $(contentID).toggle();

          var v = $(hash).hasClass("w3-green");
          if(v) {
             $(hash).removeClass("w3-green w3-hover-green");
            $(hash).addClass("w3-white");
          } else {
            $(hash).removeClass("w3-white");
            $(hash).addClass("w3-green w3-hover-green");
          }
        }
      });
})
</script>
@endsection