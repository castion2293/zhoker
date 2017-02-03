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
    @inject('UserPresenter', 'App\Presenters\UserPresenter')
    <div class="w3-content w3-container w3-padding-64">
        <div class="w3-row w3-padding-128" id="user-profile">
            <div class="w3-padding-12">
                <h1 class="w3-text-green w3-border-green w3-border-bottom">User Profile<h1>
            </div>
            <div class="w3-display-container">
                <div class="w3-col l3 m3">
                    <img src="{{ $user->user_profile_img }}" alt="profile" style="width:100%">
                </div>
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

        <div class="w3-padding-12 w3-padding-128" id="shopping-cart">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">Shopping Cart<h1>
            @if ($carts->isEmpty())
                <div class="w3-center">
                    <h1 style="font-family:cursive;">Sorry! Please Add Your Items first!</h1>
                </div>
            @else
                <div class="w3-row w3-margin-top w3-padding-medium w3-border-grey w3-border-bottom">
                    <div class="w3-col l3 m3">
                        <label class="w3-text-grey w3-medium" style="font-family:cursive;">MEAL</label>
                    </div>
                    <div class="w3-col l7 m7" style="padding-left:2em;">
                        <label class="w3-text-grey w3-medium" style="font-family:cursive;">ITEM</label>
                    </div>
                    <div class="w3-col l2 m2" style="padding-left:1.5em;">
                        <label class="w3-text-grey w3-medium" style="font-family:cursive;">TOTAL</label>
                    </div>
                </div>

                @foreach ($carts as $cart)
                    <div class="w3-row w3-padding-24 w3-border-grey w3-border-bottom">
                        <div class="w3-col l3 m3 w3-padding-right">
                            @foreach ($cart->meals->images->take(1) as $image)
                                <img src="{{ asset($image->image_path) }}" alt="meal photo" style="width:100%">
                            @endforeach
                        </div>
                        <div class="w3-col l7 m7" style="padding-left:2em;">
                            <div class="w3-row">
                                <div class="w3-col l5 m5">
                                    <div class="">
                                        <span class="w3-text-grey w3-large"><b>{{ $cart->meals->name }}</b></span>
                                    </div>
                                    <div class="">
                                        <span class="w3-text-green w3-large">${{ $cart->meals->price }}</span>
                                    </div>
                                    <div class="">
                                        <span class="w3-text-grey w3-large">{{ $cart->people_order }} people order</span>
                                    </div>
                                </div>
                                <div class="w3-col l7 m7">
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
                @endforeach

                <div class="w3-row w3-margin-top w3-border-grey w3-border-top">
                    <div class="w3-rest"></div> 
                    <div class="w3-col l3 m3 w3-right w3-margin-top">
                        <a href="{!! route('product.cart.show', ['id' => encrypt(Auth::user()->id)]) !!}" class="btn w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover"><b>Go To Shopping Cart</b></a>
                    </div>
                </div>  

            @endif
        </div>

        <div class="w3-padding-128" id="order-history">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">Order History<h1>
            <div class="w3-content w3-container">
                @if ($userorders->isEmpty())
                    <div class="w3-center">
                        <h1 style="font-family:cursive;">Sorry! You don't have any order right now!</h1>
                    </div>
                @else
                    <div class="w3-content w3-container">
                        @foreach ($userorders as $userorder)
                            @unless ($userorder->carts()->get()->isEmpty())
                                <div class="w3-margin-top w3-margin-bottom w3-border w3-border-green" style="border-radius:20px;">
                                    <a class="w3-btn-block w3-left-align w3-green" style="border-radius:18px 18px 0 0;">
                                        <div class="w3-row">
                                            <div class="w3-col l3 m3">
                                                <label class="w3-medium">Order Number #{{ $userorder->id }}</label>
                                            </div>
                                            <div class="w3-col l2 m2">
                                                <label class="w3-medium">Total Price</label>
                                            </div>
                                            <div class="w3-col l2 m2">
                                                <label class="w3-medium">Pay Way</label>
                                            </div>
                                            <div class="w3-col l3 m3">
                                                <label class="w3-medium">Order Date</label>
                                            </div>
                                            <div class="w3-col l2 m2">
                                                <label class="w3-medium" style="padding-left:1em;">Order Details</label>
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
                                                <label class="w3-text-grey w3-medium" style="font-family:cursive;">MEAL</label>
                                            </div>
                                            <div class="w3-col l6 m6" style="padding-left:0.5em;">
                                                <label class="w3-text-grey w3-medium" style="font-family:cursive;">ITEM</label>
                                            </div>
                                            <div class="w3-col l1 m1" style="padding-left:0.2em;">
                                                <label class="w3-text-grey w3-medium" style="font-family:cursive;">TOTAL</label>
                                            </div>
                                            <div class="w3-col l1 m1" style="padding-left:0.5em;">
                                                <label class="w3-text-grey w3-medium" style="font-family:cursive;">STATUS</label>
                                            </div>
                                        </div>

                                        @foreach ($userorder->carts()->get() as $cart)
                                            <div class="w3-row w3-padding-24">
                                                <div class="w3-col l4 m4 w3-padding-right">
                                                    @foreach ($cart->meals->images->take(1) as $image)
                                                        <img src="{{ asset($image->image_path) }}" alt="meal photo" style="width:100%">
                                                    @endforeach
                                                </div>
                                                <div class="w3-col l6 m6 w3-padding-left">
                                                    <div class="w3-row">
                                                        <div class="w3-col l5 m5">
                                                            <div class="">
                                                                <span class="w3-text-grey w3-large"><b>{{ $cart->meals->name }}</b></span>
                                                            </div>
                                                            <div class="">
                                                                <span class="w3-text-green w3-large">$<span id="{{ $cart->id }}united_price" class="w3-text-green w3-large">{{ $cart->meals->price }}</span></span>
                                                            </div>
                                                            <div class="">
                                                                <span class="w3-text-grey w3-large">{{ $cart->people_order }} people order</span>
                                                            </div>
                                                        </div>
                                                        <div class="w3-col l7 m7">
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
                                                        <span class="w3-text-grey w3-large">{{ ($cart->cheforders()->first()->checked) ? 'Approved' : 'Pending' }}</span>
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
                            <a href="{!! route('order.userorder', ['id' => encrypt(Auth::user()->id)]) !!}" class="btn w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover"><b>Go To Order</b></a>
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