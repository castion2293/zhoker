@extends('desktop.layout.map_list_layout')

@section('title', '| List')

@section('styles')
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDIow86AS8K94ezmJPzrm-yjyIbTPAUkG8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.googlemap/1.5/jquery.googlemap.min.js"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-7">
            <div  id="fixed" class="w3-display-container" style="position:fixed;height:90%;width:60%;margin-top:4%;">
                <div id="map" style="height:100%"></div>
            </div>      
        </div>
        <div class="col-md-5">
            <div class="col-md-12 w3-light-grey">
                <div class="w3-accordion">
                    <div class="w3-red"><h1>Zhoker</h1></div>
                    @foreach($meals as $meal)
                      <a id="{{ $meal->id }}" href="#{{ $meal->id }}" class="w3-white w3-btn-block w3-left-align dropDownList w3-leftbar w3-border-light-grey" style="margin:4px 0 4px 0;">
                        <div class="row">
                          <div class="col-md-4" id="title_img">
                              <img src="{{ asset($meal->img_path) }}" alt="Food1" style="width:100%">
                          </div>
                          <div class="col-md-5">
                              <div><span class="w3-text-grey w3-xlarge" id="meal-name"><b>{{ $meal->name }}<b></span></div>
                              <div style="padding-top:10px;">
                                <section>
                                  <span class="w3-text-green w3-large" id="meal-price">${{ $meal->price }}</span>
                                  <span class="w3-text-grey w3-slim w3-right" style="padding-top:2px" id="meal-people">{{ $meal->datetimepeoples()->where('meal_id', $meal->id)->where('date', $date)->first()->people_left }} people left</span>
                                </section>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div style="margin-top:8px;">
                                @for ($i = 0; $i < 5; $i++)
                                  <span class="w3-text-white"><i class="fa fa-star"></i></span>
                                @endfor
                              </div>
                          </div>
                        </div>
                      </a>
                      <div id="drop_{{ $meal->id }}" class="w3-accordion-content w3-container w3-display-container w3-white">
                        <div class="row">
                            <div class="col-md-6 w3-padding-12">
                              <a href="#" class="w3-white">
                                <div class="content-img" style="width:0">
                                    <img src="{{ asset($meal->img_path) }}" alt="Food1" style="width:100%">
                                </div>
                                <div class="content-img" style="margin-top:10px;width:0">
                                    <img src="{{ asset($meal->img_path) }}" alt="Food1" style="width:100%;">
                                </div>
                                <div class="content-img" style="margin-top:10px;width:0">
                                    <img src="{{ asset($meal->img_path) }}" alt="Food1" style="width:100%;">
                                </div>
                              </div>
                            </a>
                            <div class="col-md-6 w3-content w3-container">
                              <div class="w3-padding-12 w3-text-grey w3-justify">
                                 <p class="w3-text-grey" style="font-family:cursive;">{!! substr(strip_tags($meal->description), 0, 400) !!}{{ strlen(strip_tags($meal->description)) > 400 ? '...' : "" }}</p>
                              </div>
                            </div>
                        </div>

                        <a href="#" class="w3-display-bottomright w3-white w3-text-blue w3-large zk-shrink-hover" style="margin-right:12px;margin-bottom:12px">Read More</a>
                        
                       </div>
                    @endforeach
                </div>

                <!--@foreach($meals as $meal)
                  
                  <div id="{{ $meal->id }}" class="container-fluid">
                    <div class="row">
                      <div class="col-sm-8">
                        <h2>{{ $meal->address }}</h2><br>
                        <h2>{{ $meal->city }}</h2><br>
                        <h2>{{ $meal->state }}</h2>
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
      var old_id = "";// store last trigger id
      
      // Google Map
      $("#map").googleMap({
         zoom: 13,
         type: "ROADMAP" // Map type (optional)
      });
      $("#map").addClass("scroll")
      @foreach ($meals as $meal)
        $("#map").addMarker({
    	     address: "{{ $meal->chefs->address }} . ' ' . {{ $meal->chefs->city }} . ' ' . {{ $meal->chefs->state }} . ' ' . {{ $meal->chefs->zip_code }}", // Postale Address
           //address: "751 S 300 E Salt Lake City Utah",
           id: '{{ $meal->id }}',
           url: '#!{{ $meal->id }}', // Link
           icon: new google.maps.MarkerImage("{{ URL::to('img/marker.png') }}"),
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
              scrollTop: ($(hash).offset().top -200)
              //scrollTop: ($($anchor.attr('href')).offset().top - 50)
          }, 900, function(){
             
          });

          // remove last id leftbar
          if (old_id != "") {
            $(old_id).removeClass("w3-border-deep-orange").addClass("w3-border-light-grey");
          }
          
          $(hash).removeClass("w3-border-light-grey").addClass("w3-border-deep-orange");// add leftbar
          old_id = hash;// store hash_id to old_id

          
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

          var v = $(hash).hasClass("w3-deep-orange");
          var meal_name = $(hash).find("#meal-name");
          var meal_price = $(hash).find("#meal-price");
          var meal_people = $(hash).find("#meal-people");
          var title_img = $(hash).find("#title_img");
          var content_img = $(contentID).find(".content-img");

          if(v) {
            // close the dropdown content
            $(hash).removeClass("w3-deep-orange").addClass("w3-white");
            meal_name.removeClass("w3-text-white").addClass("w3-text-grey");
            meal_price.removeClass("w3-text-white").addClass("w3-text-green");
            meal_people.removeClass("w3-text-white").addClass("w3-text-grey");
            title_img.animate({width: '33%'}, 500);
            content_img.animate({width: '0'}, 500);
          } else {
            // open the dropdown content
            $(hash).removeClass("w3-white").addClass("w3-deep-orange");
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