@extends('desktop.layout.master')

@section('title', '| Chef index')

@section('styles')

@endsection

@section('content')
    <div class="fixed-circle-nav w3-transparent">
        <section class="section section--nav">
		    <nav class="nav nav--shamso">
				<a href="#top-pic" class="nav__item nav__item--current" aria-label="Item 1"><span class="nav__item-title">Top</span></a>
				<a href="#profile" class="nav__item " aria-label="Item 2"><span class="nav__item-title">Profile</span></a>
				<a href="#menu" class="nav__item" aria-label="Item 3"><span class="nav__item-title">Menu</span></a>
				<a href="#order" class="nav__item" aria-label="Item 4"><span class="nav__item-title">Order</span></a>
				<a href="#account" class="nav__item" aria-label="Item 5"><span class="nav__item-title">Account</span></a>
			</nav>
		</section>
    </div>

    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1031201601.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-64" style="position: static;">
        <div class="w3-row" id="profile">
            <div class="w3-padding-12">
                <h1 class="w3-text-green w3-border-green w3-border-bottom">Profile<h1>
            </div>
            <div class="w3-display-container">
                <div class="w3-display-topleft" style="width:40%;margin-top:5em;margin-left:1em;">
                    <img src="{{ asset($chef->profile_img) }}" alt="profile" style="width:100%">
                </div>
                <div class="w3-rest"></div>  
                <div class="w3-col l8 m8 w3-right w3-panel w3-light-grey">
                    <div style="padding-left:8em;padding-right:5em;">
                        <p class="w3-text-grey w3-center w3-xxlarge w3-margin-top" style="font-family: cursive">{{ $chef->store_name }}</p>
                        <p class="w3-text-grey w3-center" style="font-family: cursive">{!! $chef->store_description !!}</p>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="w3-padding-12" id="menu">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">Menu<h1>
            @foreach ($meals->chunk(3) as $mealchunk)
                <div class="w3-row">
                @foreach($mealchunk as $meal)
                    <div class="w3-col m4">
                        <a href="{{ route('chef.show', $meal->id) }}" style="text-decoration:none;">
                        <div class="thumbnail w3-border-0 w3-padding-tiny">
                            <div class="w3-light-grey w3-padding-tiny">
                                <span class="w3-text-grey w3-large" style="font-family: cursive">{{ $meal->name }}
                                    @for ($i = 0; $i < 5; $i++)
                                        <span class="w3-text-orange w3-right"><i class="fa fa-star"></i></span>
                                    @endfor
                                </span>
                                <img src="{{ asset($meal->img_path) }}" alt="meal" style="width:100%;">
                                <div class="caption w3-light-grey w3-row">
                                    <div class="w3-col m8">
                                        @foreach ($meal->methods as $method)
                                            <p class="w3-tag w3-teal w3-tiny">{{ $method->method }}</p>
                                        @endforeach
                                    </div>
                                    <div class="w3-col m4">
                                        <b class="w3-text-green w3-right w3-medium w3-margin-top">${{ $meal->price }}TWD</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
                </div>
            @endforeach
        </div>
        <div class="w3-padding-12" id="order">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">Order<h1>
        </div>
        <div class="w3-padding-12" id="account">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">Account<h1>
        </div>
    </div>
@endsection

@section('scripts')
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".fixed-circle-nav a").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>
<script>
(function(window) {
	function init() {
		[].slice.call(document.querySelectorAll('.nav')).forEach(function(nav) {
			var navItems = [].slice.call(nav.querySelectorAll('.nav__item')),
				itemsTotal = navItems.length,
				setCurrent = function(item) {
					// return if already current
					if( item.classList.contains('nav__item--current') ) {
						return false;
					}
					// remove current
					var currentItem = nav.querySelector('.nav__item--current');
					currentItem.classList.remove('nav__item--current');
					
					// set current
					item.classList.add('nav__item--current');
				};
			
			navItems.forEach(function(item) {
				item.addEventListener('click', function() { setCurrent(item); });
			});
		});
	}

	init();

})(window);
</script>
@endsection