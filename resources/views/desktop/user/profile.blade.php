@extends('desktop.layout.master')

@section('title', '| User Profile')

@section('styles')

@endsection

@section('content')
    <div class="fixed-circle-nav w3-transparent"style="right:2em;">
        <section class="section section--nav">
		    <nav class="nav nav--shamso">
				<a href="#top-pic" class="nav__item nav__item--current" aria-label="Item 1"><span class="nav__item-title">Top</span></a>
				<a href="#user-profile" class="nav__item " aria-label="Item 2"><span class="nav__item-title">Profile</span></a>
				<a href="#shopping-cart" class="nav__item" aria-label="Item 3"><span class="nav__item-title">Shopping Cart</span></a>
				<a href="#order-history" class="nav__item" aria-label="Item 4"><span class="nav__item-title">Order History</span></a>
			</nav>
		</section>
    </div>

    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1104201603.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-64">
        <div class="w3-row" id="user-profile">
            <div class="w3-padding-12">
                <h1 class="w3-text-green w3-border-green w3-border-bottom">User Profile<h1>
            </div>
            <div class="w3-display-container">
                <!--div class="w3-col l3 m3">
                    <img src="{{ asset($user->user_profile_img) }}" alt="profile" style="width:100%">
                </div-->
                <div class="w3-rest"></div>  
                <div class="w3-col l8 m8 w3-right w3-panel w3-light-grey">
                    <div style="padding-left:8em;padding-right:5em;">
                        <h2 class="w3-text-grey">Hello, {{ $user->first_name }}</h2>
                        <span class="w3-text-grey">Member since {{ date('F d, Y', strtotime($user->created_at)) }}</span><br>
                        <span class="w3-text-grey">Email: {{ $user->email }}</span><br>
                        <span class="w3-text-grey">Phone Number:: {{ $user->phone_number }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="w3-padding-12" id="shopping-cart">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">Shopping Cart<h1>
        </div>

        <div class="w3-padding-12" id="order-history">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">Order History<h1>
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