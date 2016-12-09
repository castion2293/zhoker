@extends('mobile.layout.master')

@section('title', '| User Order')
    
@section('styles')
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1118201601.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-32">
        @if ($userorders->isEmpty())
            <div class="w3-center">
                <h1 style="font-family:cursive;">Sorry! You don't have any order right now!</h1>
            </div>
        @else
            <div class="w3-padding-4">
                <h1 class="w3-text-green w3-border-green w3-border-bottom">Order<h1>
            </div>
            
            <div class="">
                @foreach ($userorders as $userorder)
                    
                        <div class="w3-margin-top w3-margin-bottom w3-border w3-border-green" style="border-radius:20px;">
                            <a class="w3-btn-block w3-left-align w3-green" style="border-radius:18px 18px 0 0;">
                                <div class="w3-row">
                                    <div class="w3-col s12 w3-medium">
                                        <label>Order Number #{{ $userorder->id }}</label>
                                    </div>
                                    <div class="w3-col s5 w3-medium">
                                        <label>Total Price:</label>
                                    </div>
                                    <div class="w3-col s7 w3-medium">
                                        <span>${{ $userorder->total_price }}TWD</span>
                                    </div>
                                    <div class="w3-col s12 w3-medium">
                                        <label>Pay Way:</label>
                                    </div>
                                    <div class="w3-col s5 w3-medium">
                                        <label>Order Date:</label>
                                    </div>
                                    <div class="w3-col s7 w3-medium">
                                        <span>{{ date('M j, Y - g:iA', strtotime($userorder->created_at)) }}</span>
                                    </div>
                                    <div class="w3-col s12 w3-medium">
                                        <label>Order Details</label>
                                    </div>
                                </div>
                            </a>
                            <div class="">
                                @foreach ($userorder->carts()->withTrashed()->get() as $cart)
                                    <div class="w3-row w3-padding-tiny w3-margin-top">
                                        <div class="w3-col s8" style="padding-left:0.5em;">
                                            <span class="w3-text-grey w3-large"><b>{{ $cart->meals->name }}</b></span>
                                        </div>
                                         <div class="w3-col s4">
                                            <span class="w3-text-green w3-large">$<span id="{{ $cart->id }}united_price" class="w3-text-green w3-large">{{ $cart->meals->price }}</span>TWD</span>
                                        </div>
                                        <div class="w3-col s12">
                                            <img src="{{ asset($cart->meals->img_path) }}" alt="meal photo" style="width:100%">
                                        </div>
                                        <div class="w3-col s9 w3-margin-top" style="padding-left:0.5em;">
                                            <span class="w3-text-grey w3-large">{{ $cart->date }} / {{ $cart->time }}</span>
                                        </div>
                                        <div class="w3-col s3 w3-margin-top" style="margin-top:0.2em;">
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
                                                <div class="w3-green">
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
                    
                @endforeach
            </div>
        @endif 
    </div>
@endsection

@section('scripts')

@endsection