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
    <div class="bgimg-2 w3-opacity" id="top-pic"></div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-64">
        <div class="w3-row" id="profile">
            <div class="w3-col l4 m4">
                <img src="{{ URL::to('img/DSC_0902.JPG') }}" alt="profile" width="250" height="300">
            </div>
            <div class="w3-col l8 m8">
                <div class="w3-padding-12">
                    <h1 class="w3-text-green w3-border-green w3-border-bottom">Introduction<h1>
                </div>
                <p class="w3-tect-grey">One of the popular frameworks for managing infrastructure provisioning and configuration is Chef. It provides an extensive library of primitives for managing every resource that is used in the process of building and maintaining web infrastructure. Powered by a Ruby-based domain      specific language (DSL), it provides a consistent abstraction layer that allows developers and system administrators to design and build scalable environments with ease. </p>
            </div>
        </div>
        <div>
            <div class="w3-padding-12 w3-margin-top">
                <h1 class="w3-text-green w3-border-green w3-border-bottom">Zhang Noodle<h1>
            </div>
            <p>Nodes use a tool called Chef client to ask the Chef server for configuration details and then applies them to itself. This process of applying changes on nodes is called a Chef run.<br>
            Cookbooks are made of one or more recipes that will perform automated steps, called actions, such as installing and configuring applications or creating files. All data needed in this process is downloaded from the Chef server as the first step in a Chef run.<br>
            Note that the Chef client is installed within the bootstrap process, when a node is created and registered on a Chef server.<br>
            Each node can have one or more roles. A role defines a set of attributes (node specific settings) and a list of recipes for a node. It can be reused by multiple nodes, so you can have a cluster of nodes with the same role in the system. The computed list of recipes associated with a node via role or as dependency of other recipes is called a run list, and it is executed in the same order it's defined.<br>
            </p>
        </div>
        <div class="w3-padding-12" id="menu">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">Menu<h1>
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