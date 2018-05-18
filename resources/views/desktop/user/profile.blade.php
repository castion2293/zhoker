@extends('desktop.layout.master')

@section('title', '| User Profile')

@section('styles')
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')

    <!--navbar-->
    <div class="fixed-circle-nav w3-transparent"style="right:2em;">
        <section class="section section--nav">
		    <nav class="nav nav--shamso">
				<a href="#top-pic" class="nav__item nav__item--current" aria-label="Item 1"><span class="nav__item-title">{{ $lang->desktop()['user_profile']['top'] }}</span></a>
				<a href="#user-profile" class="nav__item " aria-label="Item 2"><span class="nav__item-title">{{ $lang->desktop()['user_profile']['profile'] }}</span></a>
				<a href="#shopping-cart" class="nav__item" aria-label="Item 3"><span class="nav__item-title">{{ $lang->desktop()['user_profile']['shopping_cart'] }}</span></a>
				<a href="#order-history" class="nav__item" aria-label="Item 4"><span class="nav__item-title">{{ $lang->desktop()['user_profile']['order_history'] }}</span></a>
			</nav>
		</section>
    </div>

    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3.amazonaws.com/zhoker-pics/2018051501.jpg" alt="profile" style="width:100%">
    </div>

    <!--content-->
    @inject('UserPresenter', 'App\Presenters\UserPresenter')
    <div class="w3-content w3-container w3-padding-64">
        <div class="w3-row w3-padding-128" id="user-profile">
            <div class="w3-padding-12">
                <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['user_profile']['profile_title'] }}</h1>
            </div>
            <div class="w3-display-container">
                <div class="w3-col l3 m3">
                    <img src="{{ $user->user_profile_img }}" alt="profile" style="width:100%">
                </div>
                <div class="w3-rest"></div>  
                <div class="w3-col l8 m8 w3-right w3-panel w3-light-grey">
                    <div style="padding-left:8em;padding-right:5em;">
                        <h2 class="w3-text-grey">{{ $lang->desktop()['user_profile']['profile_hello'] }}, {{ $user->first_name }}</h2>
                        <span class="w3-text-grey">{{ $lang->desktop()['user_profile']['profile_member_since'] }} {{ date('F d, Y', strtotime($user->created_at)) }}</span><br>
                        <span class="w3-text-grey">{{ $lang->desktop()['user_profile']['profile_email'] }}: {{ $user->email }}</span><br>
                        <span class="w3-text-grey">{{ $lang->desktop()['user_profile']['profile_phone_number'] }}:: {{ $user->phone_number }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="w3-padding-12 w3-padding-128" id="shopping-cart">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['user_profile']['cart_title'] }}<h1>
            @if ($carts->isEmpty())
                <div class="w3-center">
                    <h1 style="font-family:cursive;">{{ $lang->desktop()['user_profile']['cart_no_cart'] }}</h1>
                </div>
            @else
                <div class="w3-row w3-margin-top w3-padding-medium w3-border-grey w3-border-bottom">
                    <div class="w3-col l3 m3">
                        <label class="w3-text-grey w3-medium" style="font-family:cursive;">{{ $lang->desktop()['user_profile']['cart_meal'] }}</label>
                    </div>
                    <div class="w3-col l7 m7" style="padding-left:2em;">
                        <label class="w3-text-grey w3-medium" style="font-family:cursive;">{{ $lang->desktop()['user_profile']['cart_item'] }}</label>
                    </div>
                    <div class="w3-col l2 m2" style="padding-left:1.5em;">
                        <label class="w3-text-grey w3-medium" style="font-family:cursive;">{{ $lang->desktop()['user_profile']['cart_total'] }}</label>
                    </div>
                </div>

                @foreach ($carts as $cart)
                    @if (count($cart->meals))
                        <div class="w3-row w3-padding-24 w3-border-grey w3-border-bottom">
                            <div class="w3-col l3 m3 w3-padding-right">
                                <img src="{{ asset($cart->meals->cover_img) }}" alt="meal photo" style="width:100%">
                            </div>
                            <div class="w3-col l7 m7" style="padding-left:2em;">
                                <div class="w3-row">
                                    <div class="w3-col l5 m5">
                                        <div class="">
                                            <span class="w3-text-grey w3-large"><b>{{ str_limit($cart->meals->name, 24) }}</b></span>
                                        </div>
                                        <div class="">
                                            <span class="w3-text-green w3-large">${{ $cart->meals->price }}</span>
                                        </div>
                                        <div class="">
                                            <span class="w3-text-grey w3-large">{{ $cart->people_order }} {{ $lang->desktop()['user_profile']['order_people'] }}</span>
                                        </div>
                                    </div>
                                    <div class="w3-col l6 m6 w3-right">
                                        <div class="">
                                            <span class="w3-text-grey w3-large">{{ $cart->date }} / {{ $cart->time }}</span>
                                        </div>
                                        <div class="w3-margin-top">
                                            <p class="w3-tag w3-teal w3-tiny">{{ $cart->method }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w3-col l2 m2" style="padding-left:1em;">
                                <div class="">
                                    <span class="w3-text-green w3-large">$<span id="{{ $cart->id }}price" class="w3-text-green w3-large">{{ $cart->price }}</span></span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

                <div class="w3-row w3-margin-top w3-border-grey w3-border-top">
                    <div class="w3-rest"></div> 
                    <div class="w3-col l3 m3 w3-right w3-margin-top">
                        <a href="{!! route('product.cart.show', ['id' => Auth::user()->id]) !!}" class="btn w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover"><b>{{ $lang->desktop()['user_profile']['go_cart'] }}</b></a>
                    </div>
                </div>  

            @endif
        </div>

        <div class="w3-padding-128" id="order-history">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['user_profile']['order_title'] }}<h1>
            <div class="w3-content w3-container">
                @if ($userorders->isEmpty())
                    <div class="w3-center">
                        <h1 style="font-family:cursive;">{{ $lang->desktop()['user_profile']['order_no_order'] }}</h1>
                    </div>
                @else
                    <div class="w3-content w3-container">
                        @foreach ($userorders as $userorder)
                            @unless ($userorder->carts()->get()->isEmpty())
                                <div class="w3-margin-top w3-margin-bottom w3-border w3-border-green" style="border-radius:20px;">
                                    <a class="w3-btn-block w3-left-align w3-green" style="border-radius:18px 18px 0 0;">
                                        <div class="w3-row">
                                            <div class="w3-col l3 m3">
                                                <label class="w3-medium">{{ $lang->desktop()['user_profile']['order_number'] }} #{{ $userorder->id }}</label>
                                            </div>
                                            <div class="w3-col l2 m2">
                                                <label class="w3-medium">{{ $lang->desktop()['user_profile']['order_price'] }}</label>
                                            </div>
                                            <div class="w3-col l2 m2">
                                                <label class="w3-medium">{{ $lang->desktop()['user_profile']['order_pay'] }}</label>
                                            </div>
                                            <div class="w3-col l3 m3">
                                                <label class="w3-medium">{{ $lang->desktop()['user_profile']['order_date'] }}</label>
                                            </div>
                                            <div class="w3-col l2 m2">
                                                <label class="w3-medium" style="padding-left:1em;">{{ $lang->desktop()['user_profile']['order_detail'] }}</label>
                                            </div>
                                        </div>
                                        <div class="w3-row">
                                            <div class="w3-col l6 m6" style="padding-left:6em;">
                                                <span class="w3-medium" style="font-family:cursive;">${{ $userorder->total_price }}</span>
                                            </div>
                                            <div class="w3-col l5 m5" style="padding-left:2em;">
                                                <span class="w3-medium" style="font-family:cursive;">{{ date('F j, Y - g:iA', strtotime($userorder->created_at)) }}</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="w3-container w3-display-container">
                                        <div class="w3-row w3-margin-top w3-padding-medium w3-border-grey w3-border-bottom">
                                            <div class="w3-col l4 m4">
                                                <label class="w3-text-grey w3-medium" style="font-family:cursive;">{{ $lang->desktop()['user_profile']['order_meal'] }}</label>
                                            </div>
                                            <div class="w3-col l6 m6" style="padding-left:0.5em;">
                                                <label class="w3-text-grey w3-medium" style="font-family:cursive;">{{ $lang->desktop()['user_profile']['order_item'] }}</label>
                                            </div>
                                            <div class="w3-col l1 m1" style="padding-left:0.2em;">
                                                <label class="w3-text-grey w3-medium" style="font-family:cursive;">{{ $lang->desktop()['user_profile']['order_total'] }}</label>
                                            </div>
                                            <div class="w3-col l1 m1" style="padding-left:0.5em;">
                                                <label class="w3-text-grey w3-medium" style="font-family:cursive;">{{ $lang->desktop()['user_profile']['order_status'] }}</label>
                                            </div>
                                        </div>

                                        @foreach ($userorder->carts()->get() as $cart)
                                            <div class="w3-row w3-padding-24">
                                                <div class="w3-col l4 m4 w3-padding-right">
                                                    <img src="{{ asset($cart->meals->cover_img) }}" alt="meal photo" style="width:100%">
                                                </div>
                                                <div class="w3-col l6 m6 w3-padding-left">
                                                    <div class="w3-row">
                                                        <div class="w3-col l5 m5">
                                                            <div class="">
                                                                <span class="w3-text-grey w3-large"><b>{{ str_limit($UserPresenter->getMealName($cart), 24) }}</b></span>
                                                            </div>
                                                            <div class="">
                                                                <span class="w3-text-green w3-large">$<span id="{{ $cart->id }}united_price" class="w3-text-green w3-large">{{ $UserPresenter->getMealPrice($cart) }}</span></span>
                                                            </div>
                                                            <div class="">
                                                                <span class="w3-text-grey w3-large">{{ $cart->people_order }} {{ $lang->desktop()['user_profile']['order_people'] }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="w3-col l6 m6 w3-right">
                                                            <div class="">
                                                                <span class="w3-text-grey w3-large">{{ $cart->date }} / {{ $cart->time }}</span>
                                                            </div>
                                                            <div class="w3-margin-top">
                                                                <p class="w3-tag w3-teal w3-tiny">{{ $cart->method }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w3-col l1 m1">
                                                    <div class="">
                                                        <span class="w3-text-green w3-large">${{ $cart->price }}</span></span>
                                                    </div>
                                                </div>
                                                    <div class="w3-col l1 m1">
                                                    <div class="">
                                                        <span class="w3-text-grey w3-large">{{ ($cart->cheforders()->first()->checked) ? $lang->desktop()['user_profile']['order_approved'] : $lang->desktop()['user_profile']['order_pending']  }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            @endunless
                        @endforeach
                    </div>

                    <div class="w3-row w3-margin-top w3-border-grey w3-border-top">
                        <div class="w3-rest"></div> 
                        <div class="w3-col l3 m3 w3-right w3-margin-top">
                            <a href="{!! route('order.userorder', ['id' => Auth::user()->id]) !!}" class="btn w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover"><b>{{ $lang->desktop()['user_profile']['go_order'] }}</b></a>
                        </div>
                    </div> 

                @endif
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ URL::to('js/animate_scroll.js') }}"></script>
    <script src="{{ URL::to('js/navbar.js') }}"></script>
@endsection