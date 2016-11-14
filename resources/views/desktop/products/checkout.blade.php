@extends('desktop.layout.master')

@section('title', '| Shopping Cart')

@section('styles')

@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1031201604.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-64">
        <div class="w3-padding-12">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">Checkout<h1>
        </div>

        <div class="w3-row w3-content w3-container">
            <div class="w3-col l5 m5">
                <div class="w3-row w3-margin-top w3-padding-12 w3-border-grey w3-border-bottom">
                    <div class="w3-col l5 m5">
                        <label class="w3-text-grey" style="font-family:cursive;">MEAL</label>
                    </div>
                    <div class="w3-col l5 m5">
                        <label class="w3-text-grey" style="font-family:cursive;">ITEM</label>
                    </div>
                    <div class="w3-col l2 m2">
                        <label class="w3-text-grey" style="font-family:cursive;">TOTAL</label>
                    </div>
                </div>

                @foreach ($carts as $cart)
                    <div class="w3-row w3-padding-16 w3-border-grey w3-border-bottom">
                        <div class="w3-col l5 m5 w3-padding-right" style="margin-top:0.5em;">
                            <img src="{{ asset($cart->meals->img_path) }}" alt="meal photo" style="width:100%">
                        </div>
                        <div class="w3-col l5 m5 w3-padding-right">
                            <div class="">
                                <span class="w3-text-grey w3-large"><b>{{ $cart->meals->name }}</b></span>
                            </div>
                            <div class="">
                                <span class="w3-text-green w3-large">${{ $cart->unite_price }}</span>
                            </div>
                            <div class="">
                                <span class="w3-text-grey w3-large">{{ $cart->people_order }} people</span>
                            </div>
                        </div>
                        <div class="w3-col l2 m2">
                            <div class="" style="margin-top:4.5em;">
                                <span class="w3-text-green w3-large"><b>${{ $cart->price }}</b></span>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="w3-row">
                    <div class="w3-rest"></div>
                    <div class="w3-col l6 m6 w3-right w3-margin-top">
                        <span class="w3-text-grey w3-xlarge" style="padding-left:0.5em;">Subtotal: <span class="w3-text-green w3-xlarge">${{ $totalPrice }}</span></span>
                    </div>
                </div>
            </div>

            <div class="w3-col l7 m7">
                
            </div>
        </div>

    </div>
@endsection

@section('scripts')

@endsection