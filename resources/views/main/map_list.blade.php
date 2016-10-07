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
                      <a id="{{ $map->id }}" href="#{{ $map->id }}" class="w3-white w3-btn-block w3-left-align dropDownList w3-border-light-grey w3-border-top w3-border-bottom w3-leftbar" style="margin:4px 0 4px 0;border-style: solid;border-color:#4CAF50;">
                        <div class="row">
                          <div class="col-md-4" id="title_img">
                              <img src="{{ URL::to('img/DSC_0395.JPG') }}" alt="Food1" style="width:100%">
                          </div>
                          <div class="col-md-5">
                              <div><span class="w3-text-grey w3-xlarge" id="meal-name"><b>Chicken Rice<b></span></div>
                              <div style="padding-top:10px;">
                                <section>
                                  <span class="w3-text-green w3-large" id="meal-price">$50 TW</span>
                                  <span class="w3-text-grey w3-slim w3-right" style="padding-top:2px" id="meal-people">3 people left</span>
                                </section>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div style="margin-top:8px;">
                                @for ($i = 0; $i < 5; $i++)
                                  <span class="w3-text-orange"><i class="fa fa-star"></i></span>
                                @endfor
                              </div>
                          </div>
                        </div>
                      </a>
                      <!--button id="{{ $map->id }}" class="w3-btn-block w3-left-align dropDownList">Open Section 1</button-->
                      <div id="drop_{{ $map->id }}" class="w3-accordion-content w3-container w3-display-container w3-white">
                        <div class="row">
                            <div class="col-md-6 w3-padding-12">
                              <div class="content-img" style="width:0">
                                  <img src="{{ URL::to('img/DSC_0419.JPG') }}" alt="Food1" style="width:100%">
                              </div>
                              <div class="content-img" style="margin-top:10px;width:0">
                                  <img src="{{ URL::to('img/DSC_0417.JPG') }}" alt="Food1" style="width:100%;">
                              </div>
                              <div class="content-img" style="margin-top:10px;width:0">
                                  <img src="{{ URL::to('img/DSC_0410.JPG') }}" alt="Food1" style="width:100%;">
                              </div>
                            </div>
                            <div class="col-md-6 w3-content w3-container">
                              <div class="w3-padding-12 w3-text-grey w3-justify">
                                 <p>Some women swear that castor oil works, but there's no proof that's true. Plus, the side effects of this gross tasting stuff are, well, pretty gross. Castor oil affects your bowels more than it affects your uterus (which could make the photos taken in the delivery room a bit…spotty). The same goes for herbal preparations, such as red raspberry leaf tea, which (minus the gut-wrenching consequences) is said to tone and relax the uterus. </p>
                              </div>
                            </div>
                        </div>

                        <div>
                            <a href="#" class="btn w3-display-bottomright w3-border w3-round w3-large w3-green w3-text-white" style="margin-right:12px;margin-bottom:12px;">
                                <span>Read More</span>
                            </a>
                        </div>
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

          $(hash).addClass("w3-leftbar w3-border-green");
       } // End if
      });

      //manu list drop down
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
          var meal_name = $(hash).find("#meal-name");
          var meal_price = $(hash).find("#meal-price");
          var meal_people = $(hash).find("#meal-people");
          var title_img = $(hash).find("#title_img");
          var content_img = $(contentID).find(".content-img");

          if(v) {
            // close the dropdown content
            $(hash).removeClass("w3-green w3-hover-green").addClass("w3-white");
            meal_name.removeClass("w3-text-white").addClass("w3-text-grey");
            meal_price.removeClass("w3-text-white").addClass("w3-text-green");
            meal_people.removeClass("w3-text-white").addClass("w3-text-grey");
            title_img.animate({width: '33%'}, 500);
            content_img.animate({width: '0'}, 500);
          } else {
            // open the dropdown content
            $(hash).removeClass("w3-white").addClass("w3-green w3-hover-green");
            meal_name.removeClass("w3-text-grey").addClass("w3-text-white");
            meal_price.removeClass("w3-text-green").addClass("w3-text-white");
            meal_people.removeClass("w3-text-grey").addClass("w3-text-white");
            title_img.animate({width: '0'}, 500);
            content_img.animate({width: '100%'}, 500);
          }
        }
      });
})
</script>
@endsection