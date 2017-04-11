@extends('desktop.layout.master')

@section('title', '| Chef index')

@section('styles')
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <div class="fixed-circle-nav w3-transparent">
        <section class="section section--nav">
		    <nav class="nav nav--shamso">
				<a href="#top-pic" class="nav__item nav__item--current" aria-label="Item 1"><span class="nav__item-title">{{ $lang->desktop()['chef_profile']['nav_top'] }}</span></a>
				<a href="#profile" class="nav__item " aria-label="Item 2"><span class="nav__item-title">{{ $lang->desktop()['chef_profile']['nav_profile'] }}</span></a>
				<a href="#menu" class="nav__item" aria-label="Item 3"><span class="nav__item-title">{{ $lang->desktop()['chef_profile']['nav_menu'] }}</span></a>
				<a href="#order" class="nav__item" aria-label="Item 4"><span class="nav__item-title">{{ $lang->desktop()['chef_profile']['nav_order'] }}</span></a>
				<a href="#account" class="nav__item" aria-label="Item 5"><span class="nav__item-title">{{ $lang->desktop()['chef_profile']['nav_account'] }}</span></a>
			</nav>
		</section>
    </div>

    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1031201601.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    @inject('ChefPresenter', 'App\Presenters\ChefPresenter')
    @inject('ProductPresenter', 'App\Presenters\ProductPresenter')
    @inject('OrderPresenter', 'App\Presenters\OrderPresenter')
    <div class="w3-content w3-container w3-padding-64">
        <div class="w3-row w3-padding-128" id="profile">
            <div class="w3-padding-12">
                <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['chef_profile']['profile'] }}</h1>
            </div>
            <div class="w3-display-container">
                <div class="w3-display-topleft" style="width:30%;margin-top:3em;margin-left:4em;">
                    <img src="{{ $chef->profile_img }}" alt="profile" style="width:100%">
                </div>
                <div class="w3-rest"></div>  
                <div class="w3-col l8 m8 w3-right w3-panel w3-light-grey">
                    <div style="padding-left:8em;padding-right:5em;">
                        <p class="w3-text-grey w3-center w3-xxlarge w3-margin-top" style="font-family: cursive">{{ $ChefPresenter->chefStoreName($chef->store_name) }}</p>
                        <p class="w3-text-grey w3-center" style="font-family: cursive">{!! $ChefPresenter->chefStoreDes($chef->store_description) !!}</p>
                    </div>
                </div>

                <div class="w3-col l12 m12 w3-row w3-margin-top w3-border-grey w3-border-top">
                    <div class="w3-rest"></div> 
                    <div class="w3-col l3 m3 w3-right w3-margin-top">
                        <a href="{{ url('/chef_profile') }}" class="btn w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover"><b>{{ $lang->desktop()['chef_profile']['edit_profile'] }}</b></a>
                    </div>
                </div> 
            </div>
        </div>
       
        <div class="w3-padding-128" id="menu">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['chef_profile']['menu'] }}</h1>

            @foreach ($meals->chunk(3) as $mealchunk)
                <div class="w3-row">
                    @foreach($mealchunk as $meal)
                        <div class="w3-col m4">
                            <a href="{{ route('chef.show', $meal->id) }}" style="text-decoration:none;">
                            <div class="thumbnail w3-border-0 w3-padding-tiny">
                                <div class="w3-white w3-border w3-border-green w3-round-large w3-padding-tiny">
                                    <span class="w3-text-grey w3-large" style="font-family: cursive">{{ $meal->name }}
                                        @if ($meal->people_eva > 0)
                                            @for ($i = 0; $i < $ProductPresenter->getEvaluateScore($meal->evaluation, $meal->people_eva); $i++)
                                                <span class="w3-text-orange w3-large"><i class="fa fa-star"></i></span>
                                            @endfor
                                        @else
                                            <span class="w3-text-orange w3-large">{{ $lang->desktop()['chef_index']['new_meal'] }}</span>
                                        @endif
                                    </span>
                                    <div class="img-wrapper">
                                        <img src="{{ asset($meal->cover_img) }}" alt="meal photo" style="width:100%;" class="zk-enlarge-hover">
                                    </div>
                                    <div class="caption w3-row w3-round-large">
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

            <div class="w3-row w3-border-grey w3-border-top">
                <div class="w3-rest"></div> 
                <div class="w3-col l3 m3 w3-right w3-margin-top">
                    <a href="{{ url('/chef') }}" class="btn w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover"><b>{{ $lang->desktop()['chef_profile']['go_menu'] }}</b></a>
                </div>
            </div> 

        </div>
        <div class="w3-padding-128" id="order">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['chef_profile']['order'] }}<h1>
            @if ($cheforders->isEmpty())
                <div class="w3-center">
                    <h1 style="font-family:cursive;">{{ $lang->desktop()['chef_profile']['no_order'] }}</h1>
                </div>
            @else
                <div class="w3-content w3-container">
                    <div class="w3-row w3-margin-top w3-padding-medium w3-border-grey w3-border-bottom">
                        <div class="w3-col l3 m3">
                            <label class="w3-text-grey w3-medium" style="font-family:cursive;">{{ $lang->desktop()['chef_profile']['order_meal'] }}</label>
                        </div>
                        <div class="w3-col l3 m3" style="padding-left:0.5em;">
                            <label class="w3-text-grey w3-medium" style="font-family:cursive;">{{ $lang->desktop()['chef_profile']['order_item'] }}</label>
                        </div>
                        <div class="w3-col l1 m1" style="">
                            <label class="w3-text-grey w3-medium" style="font-family:cursive;">{{ $lang->desktop()['chef_profile']['order_total'] }}</label>
                        </div>
                        <div class="w3-col l4 m4" style="padding-left:2.2em;">
                            <label class="w3-text-grey w3-medium" style="font-family:cursive;">{{ $lang->desktop()['chef_profile']['order_contact'] }}</label>
                        </div>
                        <div class="w3-col l1 m1" style="padding-left:0.5em;">
                            <label class="w3-text-grey w3-medium" style="font-family:cursive;">{{ $lang->desktop()['chef_profile']['order_action'] }}</label>
                        </div>
                    </div>

                    @foreach ($cheforders as $cheforder)
                        @foreach($cheforder->carts()->get() as $cart)
                            @if (count($cart->meals))
                                <div class="w3-row w3-padding-12 w3-border-grey w3-border-bottom">
                                    <div class="w3-col l3 m3 w3-padding-right">
                                        <img src="{{ asset($cart->meals->cover_img) }}" alt="meal photo" style="width:100%">
                                    </div>
                                    <div class="w3-col l3 m3 w3-padding-left">
                                        <div class="">
                                            <p class="w3-text-grey w3-medium" style="top:0;"><b>{{ $cart->meals->name }}</b></p>
                                        </div>
                                        <div class="">
                                            <p class="w3-text-green w3-medium">${{ $cart->meals->price }}</p>
                                        </div>
                                        <div class="">
                                            <p class="w3-text-grey w3-medium">{{ $cart->people_order }} {{ $lang->desktop()['chef_profile']['people_order'] }}</p>
                                        </div>
                                        <div class="">
                                            <p class="w3-text-grey w3-medium">{{ $cart->date }} / {{ $cart->time }}</p>
                                        </div>
                                        <div class="">
                                            <p class="w3-tag w3-teal w3-tiny">{{ $cart->method }}</p>
                                        </div>
                                    </div>
                                    <div class="w3-col l1 m1">
                                        <div class="">
                                            <p class="w3-text-green w3-medium">${{ $cart->price }}</p>
                                        </div>
                                    </div>
                                    <div class="w3-col l4 m4">
                                        <div style="padding-left:2em;">
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
                                    <div class="w3-col l1 m1">
                                        @if ($cheforder->checked)
                                            <div class="">
                                                <span class="w3-text-grey w3-large">{{ $lang->desktop()['chef_profile']['order_approved'] }}</span>
                                            </div>
                                            <div class="w3-margin-top">
                                                {{--<span class="w3-text-grey w3-large">{{ $OrderPresenter->paidCheck($cheforder->paid) }}</span>--}}
                                                <span class="w3-text-grey w3-large">{{ $cheforder->paid ? $lang->desktop()['chef_profile']['order_pay'] : $lang->desktop()['chef_profile']['order_not_pay']}}</span>
                                            </div>
                                        @else
                                            <div class="">
                                                <span class="w3-text-grey w3-large">{{ $lang->desktop()['chef_profile']['order_pending'] }}</span>
                                            </div>
                                            <div class="w3-margin-top" style="margin-top:6em;">
                                                <span class="w3-text-grey w3-large">{{ $lang->desktop()['chef_profile']['order_not_pay'] }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach

                    <div class="w3-row">
                        <div class="w3-rest"></div> 
                        <div class="w3-col l3 m3 w3-right w3-margin-top">
                            <a href="{!! route('order.cheforder', ['id' => Auth::user()->chef_id]) !!}" class="btn w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover"><b>{{ $lang->desktop()['chef_profile']['go_order'] }}</b></a>
                        </div>
                    </div> 

                </div>
            @endif
        </div>

        <div class="w3-padding-128" id="account">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['chef_profile']['account'] }}<h1>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ URL::to('js/animate_scroll.js') }}"></script>
    <script src="{{ URL::to('js/navbar.js') }}"></script>
@endsection