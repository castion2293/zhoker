@extends('mobile.layout.master')

@section('title', '| User Profile')

@section('styles')
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1104201603.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    @inject('UserPresenter', 'App\Presenters\UserPresenter')
    <div class="w3-content w3-container w3-padding-32">
        <div class="w3-row" id="user-profile">
            <div class="">
                <h1 class="w3-text-green w3-border-green w3-border-bottom">User Profile<h1>
            </div>
            <div class="w3-col s12">
                <img src="{{ $UserPresenter->userProfileImg($user->user_profile_img) }}" alt="profile" style="width:100%">
            </div> 
            <div class="w3-col s12 w3-center w3-panel w3-light-grey w3-padding-small w3-margin-top">
                <h2 class="w3-text-grey">Hello, {{ $user->first_name }}</h2>
                <span class="w3-text-grey">Member since {{ date('F d, Y', strtotime($user->created_at)) }}</span><br>
                <span class="w3-text-grey">Email: {{ $user->email }}</span><br>
                <span class="w3-text-grey">Phone Number:: {{ $user->phone_number }}</span>
            </div>

            <div class="w3-row w3-margin-top w3-border-grey w3-border-top">
                <div class="w3-col s12 w3-margin-top">
                    <a href="{{ url('/user_profile/create') }}" class="btn w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover"><b>Edit Profile</b></a>
                </div>
            </div>  
        </div>

        <div class="w3-padding-12" id="shopping-cart" style="margin-top:3em;">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">Shopping Cart<h1>
            @if ($carts->isEmpty())
                <div class="w3-center">
                    <h1 style="font-family:cursive;">Sorry! Please Add Your Items first!</h1>
                </div>
            @else
                @foreach ($carts as $cart)
                    <div class="w3-row w3-border w3-border-green w3-round-large w3-padding-tiny w3-margin-top">
                         <div class="w3-col s8" style="padding-left:0.5em;">
                            <span class="w3-text-grey w3-large"><b>{{ $cart->meals->name }}</b></span>
                        </div>
                        <div class="w3-col s4" style="">
                            <span class="w3-text-green w3-large">${{ $cart->unite_price }}TWD</span>
                        </div>
                        <div class="w3-col s12">
                            <img src="{{ asset($cart->meals->img_path) }}" alt="meal photo" style="width:100%">
                        </div>
                        <div class="w3-col s9" style="padding-left:0.5em;">
                            <span class="w3-text-grey w3-large">{{ $cart->date }} / {{ $cart->time }}</span>
                        </div>
                        <div class="w3-col s3">
                            <p class="w3-tag w3-teal w3-small">{{ $cart->method }}</p>
                        </div>
                        <div class="w3-col s12 w3-center">
                            <span class="w3-text-grey w3-large">{{ $cart->people_order }} people order</span>
                        </div>
                        
                        <div class="w3-row">
                            <div class="w3-rest"></div>
                            <div class="w3-col s5 w3-right">
                                <span class="w3-text-green w3-large">$<span id="{{ $cart->id }}price" class="w3-text-green w3-large">{{ $cart->price }}</span></span>
                            </div>
                            <div class="w3-col s3 w3-right">
                                <span class="w3-text-grey w3-large">TOTAL:</span>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="w3-row w3-margin-top w3-border-grey w3-border-top">
                    <div class="w3-col s12 w3-margin-top">
                        <a href="{!! route('product.cart.show', ['id' => Auth::user()->id]) !!}" class="btn w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover"><b>Go To Shopping Cart</b></a>
                    </div>
                </div>  

            @endif
        </div>

        <div class="w3-padding-12" id="order-history" style="margin-top:3em;">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">Order History<h1>
            <div class="">
                @if ($userorders->isEmpty())
                    <div class="w3-center">
                        <h1 style="font-family:cursive;">Sorry! You don't have any order right now!</h1>
                    </div>
                @else
                    <div class="">
                        @foreach ($userorders as $userorder)
                            @unless ($userorder->carts()->get()->isEmpty())
                                <div class="w3-margin-top w3-margin-bottom w3-border w3-border-green" style="border-radius:20px;">
                                    <a class="w3-btn-block w3-left-align w3-green" style="border-radius:18px 18px 0 0;">
                                        <div class="w3-row">
                                            <div class="w3-col s12 w3-medium w3-padding-4">
                                                <label>Order Number #{{ $userorder->id }}</label>
                                            </div>
                                            <div class="w3-col s5 w3-medium w3-padding-4">
                                                <label>Total Price:</label>
                                            </div>
                                            <div class="w3-col s7 w3-medium w3-padding-4">
                                                <span>${{ $userorder->total_price }}TWD</span>
                                            </div>
                                            <div class="w3-col s12 w3-medium w3-padding-4">
                                                <label>Pay Way:</label>
                                            </div>
                                            <div class="w3-col s5 w3-medium w3-padding-4">
                                                <label>Order Date:</label>
                                            </div>
                                            <div class="w3-col s7 w3-medium w3-padding-4">
                                                <span>{{ date('M j, Y - g:iA', strtotime($userorder->created_at)) }}</span>
                                            </div>
                                            <div class="w3-col s12 w3-medium w3-padding-4">
                                                <label>Order Details</label>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="">
                                        @foreach ($userorder->carts()->get() as $cart)
                                            <div class="w3-row w3-padding-tiny">
                                                <div class="w3-col s8" style="padding-left:0.5em;">
                                                    <span class="w3-text-grey w3-large"><b>{{ $cart->meals->name }}</b></span>
                                                </div>
                                                <div class="w3-col s4">
                                                    <span class="w3-text-green w3-large">$<span id="{{ $cart->id }}united_price" class="w3-text-green w3-large">{{ $cart->meals->price }}</span>TWD</span>
                                                </div>
                                                <div class="w3-col s12">
                                                    <img src="{{ asset($cart->meals->img_path) }}" alt="meal photo" style="width:100%">
                                                </div>
                                                <div class="w3-col s9" style="padding-left:0.5em;">
                                                    <span class="w3-text-grey w3-large">{{ $cart->date }} / {{ $cart->time }}</span>
                                                </div>
                                                <div class="w3-col s3">
                                                    <p class="w3-tag w3-teal w3-tiny">{{ $cart->method }}</p>
                                                </div>
                                                 <div class="w3-col s12 w3-center">
                                                    <span class="w3-text-grey w3-large">{{ $cart->people_order }} people order</span>
                                                </div>
                                                <div class="w3-row">
                                                    <div class="w3-rest"></div>
                                                    <div class="w3-col s5 w3-right">
                                                        <span class="w3-text-green w3-large">$<span id="{{ $cart->id }}price" class="w3-text-green w3-large">{{ $cart->price }}</span></span>
                                                    </div>
                                                    <div class="w3-col s3 w3-right">
                                                        <span class="w3-text-grey w3-large">TOTAL:</span>
                                                    </div>
                                                </div>
                                                <div class="w3-col s12 w3-center w3-margin-bottom w3-padding-bottom w3-border-grey w3-border-bottom">
                                                    @if ($cart->cheforders()->withTrashed()->first()->checked)
                                                        <div class="">
                                                            <span class="w3-text-whtie w3-large">Approved</span>
                                                        </div>
                                                    @else
                                                        @if ($cart->cheforders()->withTrashed()->first()->deleted_at)
                                                            <span class="w3-text-whtie w3-large">Rejected</span>
                                                        @else
                                                            <span class="w3-text-whtie w3-large">Pending</span>
                                                        @endif
                                                    @endif
                                                </div>
                                                
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            @endunless
                        @endforeach
                    </div>

                    <div class="w3-row w3-margin-top w3-border-grey w3-border-top">
                        <div class="w3-col s12 w3-margin-top">
                            <a href="{!! route('order.userorder', ['id' => Auth::user()->id]) !!}" class="btn w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover"><b>Go To Order</b></a>
                        </div>
                    </div> 

                @endif
            </div>
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