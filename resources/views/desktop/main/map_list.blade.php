@extends('desktop.layout.map_list_layout')

@section('title', '| List')

@section('styles')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIow86AS8K94ezmJPzrm-yjyIbTPAUkG8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.googlemap/1.5/jquery.googlemap.min.js"></script>
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
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
                <div class="w3-accordion" style="padding-top:15%;">
                    @foreach($meals as $meal)
                      <a id="{{ $meal->id }}" href="#{{ $meal->id }}" class="w3-white w3-btn-block w3-left-align dropDownList w3-leftbar w3-border-light-grey" style="margin:4px 0 4px 0;">
                        <div class="row">
                          <div class="col-md-4" id="title_img">
                              @foreach ($meal->images->take(1) as $image)
                                    <img src="{{ asset($image->image_path) }}" alt="Food1" style="width:100%">
                              @endforeach
                          </div>
                          <div class="col-md-8">
                              <div class="row">
                                <div class="col-md-offset-8 col-md-4">
                                  @for ($i = 0; $i < 5; $i++)
                                    <span class="w3-text-deep-orange star"><i class="fa fa-star"></i></span>
                                  @endfor
                                </div>
                              </div>
                              <div><span class="w3-text-grey w3-xlarge" id="meal-name"><b>{{ $meal->name }}<b></span></div>
                              <div class="row">
                                <div class="col-md-6">
                                  <section>
                                    <span class="w3-text-green w3-large" id="meal-price">${{ $meal->price }}</span>
                                    <span class="w3-text-grey w3-slim w3-right" style="padding-top:2px" id="meal-people">{{ $meal->datetimepeoples()->where('meal_id', $meal->id)->where('date', $date)->first()->people_left }} people left</span>
                                  </section>
                                </div>
                                <div id="method-label" class="col-md-6" style="display: none">
                                  @foreach ($meal->methods as $method)
                                    <p class="w3-tag w3-teal w3-tiny">{{ $method->method }}</p>
                                  @endforeach
                                </div>
                              </div>
                          </div>
                        </div>
                      </a>
                      <div id="drop_{{ $meal->id }}" class="w3-accordion-content w3-container w3-display-container w3-white">
                        <div class="row">
                            <div class="col-md-6 w3-padding-12">
                              <a href="#" class="w3-white">
                                @foreach ($meal->images->take(4) as $image)
                                    @if ($loop->iteration > 1)
                                      <div class="content-img w3-padding-8">
                                          <img src="{{ asset($image->image_path) }}" alt="Food{{ $image->id }}" style="width:100%">
                                      </div>
                                    @endif
                                @endforeach
                              </a>
                            </div>
                            <div class="col-md-6 w3-content w3-container">
                              <div class="w3-padding-12 w3-text-grey w3-justify">
                                 <p class="w3-text-grey" style="font-family:cursive;">{!! substr(strip_tags($meal->description), 0, 300) !!}{{ strlen(strip_tags($meal->description)) > 300 ? '...' : "" }}</p>
                              </div>
                            </div>
                        </div>

                        <a href="{{ route('product.show', ['id' => encrypt($meal->id), 'datetime_id' => encrypt($meal->datetimepeoples()->where('meal_id', $meal->id)->where('date', $date)->first()->id)])}}" target="_blank" class="w3-display-bottomright w3-white w3-text-blue w3-large zk-shrink-hover" style="margin-right:12px;margin-bottom:12px">Read More</a>
                        
                       </div>
                    @endforeach
                </div>

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
          var star = $(hash).find(".star");
          var method_label = $(hash).find("#method-label");
          var title_img = $(hash).find("#title_img");
          var content_img = $(contentID).find(".content-img");

          if(v) {
            // close the dropdown content
            $(hash).removeClass("w3-deep-orange").addClass("w3-white");
            meal_name.removeClass("w3-text-white").addClass("w3-text-grey");
            meal_price.removeClass("w3-text-white").addClass("w3-text-green");
            meal_people.removeClass("w3-text-white").addClass("w3-text-grey");
            // star.removeClass("w3-text-white").addClass("w3-text-deep-orange");
            star.show();
            method_label.hide();
            title_img.animate({width: '33%'}, 500);
            content_img.animate({width: '0'}, 500);
          } else {
            // open the dropdown content
            $(hash).removeClass("w3-white").addClass("w3-deep-orange");
            meal_name.removeClass("w3-text-grey").addClass("w3-text-white");
            meal_price.removeClass("w3-text-green").addClass("w3-text-white");
            meal_people.removeClass("w3-text-grey").addClass("w3-text-white");
            //star.removeClass("w3-text-deep-orange").addClass("w3-text-white");
            star.hide();
            method_label.show();
            title_img.animate({width: '0'}, 500);
            content_img.animate({width: '100%'}, 500);
          }
        }
      });
})
</script>
@endsection