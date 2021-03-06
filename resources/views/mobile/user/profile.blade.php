@extends('mobile.layout.master')

@section('title', '| User Profile')

@section('styles')
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://d4kfrsvmp3cgg.cloudfront.nets/2018051501.jpg" alt="profile" style="width:100%">
    </div>

    <!--content-->
    @inject('UserPresenter', 'App\Presenters\UserPresenter')
    <div class="w3-content w3-container w3-padding-32">
        <div class="w3-row" id="user-profile">
            <div class="">
                <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['user_profile']['profile_title'] }}</h1>
            </div>
            <div class="w3-col s12">
                <img src="{{ $user->user_profile_img }}" alt="profile" style="width:100%">
            </div> 
            <div class="w3-col s12 w3-center w3-panel w3-light-grey w3-padding-small w3-margin-top">
                <h2 class="w3-text-grey">{{ $lang->desktop()['user_profile']['profile_hello'] }}, {{ $user->first_name }}</h2>
                <span class="w3-text-grey">{{ $lang->desktop()['user_profile']['profile_member_since'] }} {{ date('F d, Y', strtotime($user->created_at)) }}</span><br>
                <span class="w3-text-grey">{{ $lang->desktop()['user_profile']['profile_email'] }}: {{ $user->email }}</span><br>
                <span class="w3-text-grey">{{ $lang->desktop()['user_profile']['profile_phone_number'] }}: {{ $user->phone_number }}</span>
            </div>

            <div class="w3-row w3-margin-top w3-border-grey w3-border-top">
                <div class="w3-col s12 w3-margin-top">
                    <a href="{{ url('/user_profile/create') }}" class="btn w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover"><b>{{ $lang->desktop()['user_profile']['profile_edit'] }}</b></a>
                </div>
            </div>  
        </div>

        <div class="w3-padding-12" id="shopping-cart" style="margin-top:3em;">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['user_profile']['cart_title'] }}<h1>
            @if ($carts->isEmpty())
                <div class="w3-center">
                    <h1 style="font-family:cursive;">{{ $lang->desktop()['user_profile']['cart_no_cart'] }}</h1>
                </div>
            @else
                @foreach ($carts as $cart)
                    @if (count($cart->meals))
                        <div class="w3-row w3-border w3-border-green w3-round-large w3-padding-tiny w3-margin-top">
                            <div class="w3-col s8" style="padding-left:0.5em;">
                                <span class="w3-text-grey w3-large"><b>{{ $cart->meals->name }}</b></span>
                            </div>
                            <div class="w3-col s4" style="">
                                <span class="w3-text-green w3-large">${{ $cart->unite_price }}TWD</span>
                            </div>
                            <div class="w3-col s12">
                                <img src="{{ asset($cart->meals->cover_img) }}" alt="meal photo" style="width:100%">
                            </div>
                            <div class="w3-col s9" style="padding-left:0.5em;">
                                <span class="w3-text-grey w3-large">{{ $cart->date }} / {{ $cart->time }}</span>
                            </div>
                            <div class="w3-col s3">
                                <p class="w3-tag w3-teal w3-small">{{ $cart->method }}</p>
                            </div>
                            <div class="w3-col s12 w3-center">
                                <span class="w3-text-grey w3-large">{{ $cart->people_order }} {{ $lang->desktop()['user_profile']['order_people'] }}</span>
                            </div>
                            
                            <div class="w3-row">
                                <div class="w3-rest"></div>
                                <div class="w3-col s5 w3-right">
                                    <span class="w3-text-green w3-large">$<span id="{{ $cart->id }}price" class="w3-text-green w3-large">{{ $cart->price }}</span></span>
                                </div>
                                <div class="w3-col s3 w3-right">
                                    <span class="w3-text-grey w3-large">{{ $lang->desktop()['user_profile']['cart_total'] }}:</span>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach

                    <div class="w3-row w3-margin-top w3-border-grey w3-border-top">
                        <div class="w3-col s12 w3-margin-top">
                            <a href="{!! route('product.cart.show', ['id' => Auth::user()->id]) !!}" class="btn w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover"><b>{{ $lang->desktop()['user_profile']['go_cart'] }}</b></a>
                        </div>
                    </div>  

            @endif
        </div>

        <div class="w3-padding-12" id="order-history" style="margin-top:3em;">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['user_profile']['order_title'] }}<h1>
            <div class="">
                @if ($userorders->isEmpty())
                    <div class="w3-center">
                        <h1 style="font-family:cursive;">{{ $lang->desktop()['user_profile']['order_no_order'] }}</h1>
                    </div>
                @else
                    <div class="">
                        @foreach ($userorders as $userorder)
                            @unless ($userorder->carts()->get()->isEmpty())
                                <div class="w3-margin-top w3-margin-bottom w3-border w3-border-green" style="border-radius:20px;">
                                    <a class="w3-btn-block w3-left-align w3-green" style="border-radius:18px 18px 0 0;">
                                        <div class="w3-row">
                                            <div class="w3-col s12 w3-medium w3-padding-4">
                                                <label>{{ $lang->desktop()['user_profile']['order_number'] }} #{{ $userorder->id }}</label>
                                            </div>
                                            <div class="w3-col s5 w3-medium w3-padding-4">
                                                <label>{{ $lang->desktop()['user_profile']['order_price'] }}:</label>
                                            </div>
                                            <div class="w3-col s7 w3-medium w3-padding-4">
                                                <span>${{ $userorder->total_price }}TWD</span>
                                            </div>
                                            <div class="w3-col s12 w3-medium w3-padding-4">
                                                <label>{{ $lang->desktop()['user_profile']['order_pay'] }}:</label>
                                            </div>
                                            <div class="w3-col s5 w3-medium w3-padding-4">
                                                <label>{{ $lang->desktop()['user_profile']['order_date'] }}:</label>
                                            </div>
                                            <div class="w3-col s7 w3-medium w3-padding-4">
                                                <span>{{ date('M j, Y - g:iA', strtotime($userorder->created_at)) }}</span>
                                            </div>
                                            <div class="w3-col s12 w3-medium w3-padding-4">
                                                <label>{{ $lang->desktop()['user_profile']['order_detail'] }}</label>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="">
                                        @foreach ($userorder->carts as $cart)
                                            <div class="w3-row w3-padding-tiny">
                                                <div class="w3-col s8" style="padding-left:0.5em;">
                                                    <span class="w3-text-grey w3-large"><b>{{ str_limit($UserPresenter->getMealName($cart), 24) }}</b></span>
                                                </div>
                                                <div class="w3-col s4">
                                                    <span class="w3-text-green w3-large">$<span id="{{ $cart->id }}united_price" class="w3-text-green w3-large">{{ $UserPresenter->getMealPrice($cart) }}</span>TWD</span>
                                                </div>
                                                <div class="w3-col s12">
                                                    <img src="{{ asset($cart->meals->cover_img) }}" alt="meal photo" style="width:100%">
                                                </div>
                                                <div class="w3-col s9" style="padding-left:0.5em;">
                                                    <span class="w3-text-grey w3-large">{{ $cart->date }} / {{ $cart->time }}</span>
                                                </div>
                                                <div class="w3-col s3">
                                                    <p class="w3-tag w3-teal w3-tiny">{{ $cart->method }}</p>
                                                </div>
                                                 <div class="w3-col s12 w3-center">
                                                    <span class="w3-text-grey w3-large">{{ $cart->people_order }} {{ $lang->desktop()['user_profile']['order_people'] }}</span>
                                                </div>
                                                <div class="w3-row">
                                                    <div class="w3-rest"></div>
                                                    <div class="w3-col s5 w3-right">
                                                        <span class="w3-text-green w3-large">$<span id="{{ $cart->id }}price" class="w3-text-green w3-large">{{ $cart->price }}</span></span>
                                                    </div>
                                                    <div class="w3-col s3 w3-right">
                                                        <span class="w3-text-grey w3-large">{{ $lang->desktop()['user_profile']['order_total'] }}:</span>
                                                    </div>
                                                </div>
                                                <div class="w3-col s12 w3-center w3-margin-bottom w3-padding-bottom w3-border-grey w3-border-bottom">
                                                    @if ($cart->cheforders()->withTrashed()->first()->checked)
                                                        <div class="">
                                                            <span class="w3-text-whtie w3-large">{{ $lang->desktop()['user_profile']['order_approved'] }}</span>
                                                        </div>
                                                    @else
                                                        @if ($cart->cheforders()->withTrashed()->first()->deleted_at)
                                                            <span class="w3-text-whtie w3-large">{{ $lang->desktop()['user_profile']['order_rejected'] }}</span>
                                                        @else
                                                            <span class="w3-text-whtie w3-large">{{ $lang->desktop()['user_profile']['order_pending'] }}</span>
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
                            <a href="{!! route('order.userorder', ['id' => Auth::user()->id]) !!}" class="btn w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover"><b>{{ $lang->desktop()['user_profile']['go_order'] }}</b></a>
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