@extends('mobile.layout.master')

@section('title', '| Chef index')

@section('styles')
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://d4kfrsvmp3cgg.cloudfront.net/2018051505.jpg" alt="profile" style="width:100%">
    </div>

    <!--content-->
    @inject('ChefPresenter', 'App\Presenters\ChefPresenter')
    @inject('ProductPresenter', 'App\Presenters\ProductPresenter')
    <div class="w3-content w3-container w3-padding-32">
        <div class="w3-row" id="profile">
            <div class="">
                <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['chef_profile']['profile'] }}</h1>
            </div>
            
            <div class="w3-col s12" style="">
                <img src="{{ $chef->profile_img }}" alt="profile" style="width:100%">
            </div>
            <div class="w3-col s12 w3-panel w3-light-grey">
                <div class="w3-margin-top">
                    <p class="w3-text-grey w3-center w3-xlarge w3-margin-top" style="font-family: cursive">{{ $ChefPresenter->chefStoreName($chef->store_name) }}</p>
                    <div class="w3-padding-small">
                        <p class="w3-text-grey w3-center" style="font-family: cursive">{!! $ChefPresenter->chefStoreDes($chef->store_description) !!}</p>
                    </div>
                </div>
            </div>

            <div class="w3-row w3-margin-top w3-border-grey w3-border-top"> 
                <div class="w3-col s12 w3-margin-top">
                    <a href="{{ url('/chef_profile') }}" class="btn w3-white w3-text-green w3-border w3-border-green w3-large btn-block zk-shrink-hover"><b>{{ $lang->desktop()['chef_profile']['edit_profile'] }}</b></a>
                </div>
            </div>
        </div>
       
        <div class="w3-padding-12" id="menu" style="margin-top:3em;">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['chef_profile']['menu'] }}<h1>

            @foreach ($meals->chunk(3) as $mealchunk)
                <div class="w3-row">
                    @foreach($mealchunk as $meal)
                        <div class="w3-col s12">
                            <a href="{{ route('chef.show', $meal->id) }}" style="text-decoration:none;">
                            <div class="thumbnail w3-border-0 w3-padding-tiny">
                                <div class="w3-white w3-border w3-border-green w3-round-large w3-padding-tiny">
                                    <div class="w3-row">
                                        <div class="w3-rest"></div>
                                        <div class="w3-col s6 w3-right">
                                            @if ($meal->people_eva > 0)
                                                @for ($i = 0; $i < $ProductPresenter->getEvaluateScore($meal->evaluation, $meal->people_eva); $i++)
                                                    <span class="w3-text-orange w3-large"><i class="fa fa-star"></i></span>
                                                @endfor
                                            @else
                                                <span class="w3-text-orange w3-large">{{ $lang->desktop()['chef_index']['new_meal'] }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <p class="w3-text-grey w3-xlarge">{{ $meal->name }}</p>
                                    <div class="img-wrapper">
                                       <img src="{{ asset($meal->cover_img) }}" alt="meal photo" style="width:100%;" class="zk-enlarge-hover">
                                    </div>
                                    <div class="caption w3-row w3-round-large">
                                        <div class="w3-col s9">
                                            @foreach ($meal->methods as $method)
                                                <p class="w3-tag w3-teal w3-tiny">{{ $method->method }}</p>
                                            @endforeach
                                        </div>
                                        <div class="w3-col s3 w3-right" style="padding-top:9px;">
                                            <b class="w3-text-green w3-right w3-large w3-margin-top">${{ $meal->price }}TWD</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <div class="w3-row w3-border-grey w3-border-top"> 
                <div class="w3-col s12 w3-margin-top">
                    <a href="{{ url('/chef') }}" class="btn w3-white w3-text-green w3-border w3-border-green w3-large btn-block zk-shrink-hover"><b>{{ $lang->desktop()['chef_profile']['go_menu'] }}</b></a>
                </div>
            </div> 

        </div>
        <div class="w3-padding-12" id="order" style="margin-top:3em;">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['chef_profile']['order'] }}<h1>
            @if ($cheforders->isEmpty())
                <div class="w3-center">
                    <p class="w3-large" style="font-family:cursive;">{{ $lang->desktop()['chef_profile']['no_order'] }}</p>
                </div>
            @else
                @foreach ($cheforders as $cheforder)
                    @foreach($cheforder->carts()->get() as $cart)
                        @if (count($cart->meals))
                            <div class="w3-row w3-border w3-border-green w3-round-large w3-padding-tiny w3-margin-top">
                                
                                <div class="w3-col s9 w3-margin-top">
                                    <div class="">
                                        <p class="w3-text-grey w3-large"><b>{{ str_limit($cart->meals->name, 24) }}</b></p>
                                    </div>
                                    <div class="">
                                        <p class="w3-text-green w3-medium"><b>${{ $cart->meals->price }}TWD</b></p>
                                    </div>
                                    <div class="">
                                        <p class="w3-text-grey w3-medium">{{ $cart->people_order }} {{ $lang->desktop()['chef_profile']['people_order'] }}</p>
                                    </div>
                                    <div class="">
                                        <p class="w3-text-grey w3-medium">{{ $cart->date }} / {{ $cart->time }}</p>
                                    </div>
                                </div>
                                <div class="w3-col s3">
                                    <div class="">
                                        <p class="w3-tag w3-teal w3-tiny">{{ $cart->method }}</p>
                                    </div>
                                    <div class="" style="margin-top:0.2em;">
                                        <label class="w3-text-grey w3-medium">{{ $lang->desktop()['chef_profile']['order_total'] }}:</label>
                                        <p class="w3-text-green w3-medium"><b>${{ $cart->price }}TWD</b></p>
                                    </div>
                                </div>
                                <div class="w3-col s12" style="margin-top:0.1em;">
                                    <img src="{{ asset($cart->meals->cover_img) }}" alt="meal photo" style="width:100%">
                                </div>
                                <div class="w3-col s12">
                                    <div class="w3-margin-top">
                                        @foreach ($cart->userorders()->get() as $userorder)
                                            <div class="">
                                                <p class="w3-text-grey w3-medium">{{ $userorder->contact_first_name }} {{ $userorder->contact_last_name }}</p>
                                            </div>
                                            <div class="">
                                                <span class="w3-text-grey w3-medium">{{ $userorder->contact_phone_number }}</span>
                                            </div>
                                            <div class="">
                                                <span class="w3-text-grey w3-medium">{{ $userorder->contact_email }}</span>
                                            </div>
                                            <div class="">
                                                <span class="w3-text-grey w3-medium">{{ $userorder->contact_address }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                
                                @if ($cheforder->checked)
                                    <div class="w3-col s6 w3-center">
                                        <span class="w3-text-grey w3-medium">{{ $lang->desktop()['chef_profile']['order_approved'] }}</span>
                                    </div>
                                    <div class="w3-col s6 w3-center">
                                        @inject('ChefPresenter', 'App\Presenters\ChefPresenter')
                                        <span class="w3-text-grey w3-medium">{{ $cheforder->paid ? $lang->desktop()['chef_profile']['order_pay'] : $lang->desktop()['chef_profile']['order_not_pay']}}</span>
                                    </div>
                                @else
                                    <div class="w3-col s6 w3-center">
                                        <span class="w3-text-grey w3-large">{{ $lang->desktop()['chef_profile']['order_pending'] }}</span>
                                    </div>
                                    <div class="w3-col s6 w3-center">
                                        <span class="w3-text-grey w3-large">{{ $lang->desktop()['chef_profile']['order_not_pay'] }}</span>
                                    </div>
                                @endif
                                
                            </div>
                        @endif
                    @endforeach
                @endforeach

                <div class="w3-row">
                    <div class="w3-col s12 w3-margin-top">
                        <a href="{!! route('order.cheforder', ['id' => Auth::user()->chef_id]) !!}" class="btn w3-white w3-text-green w3-border w3-border-green w3-large btn-block zk-shrink-hover"><b>{{ $lang->desktop()['chef_profile']['go_order'] }}</b></a>
                    </div>
                </div> 
            @endif
        </div>

        <div class="w3-padding-12" id="account" style="margin-top:3em;">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['chef_profile']['account'] }}<h1>
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