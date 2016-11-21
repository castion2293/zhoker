@extends('desktop.layout.master')

@section('title', '| User Order')

@section('styles')

@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1118201601.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-64">
        @if ($userorders->isEmpty())
            <div class="w3-center">
                <h1 style="font-family:cursive;">Sorry! You don't have any order right now!</h1>
            </div>
        @else
            <div class="w3-padding-12">
                <h1 class="w3-text-green w3-border-green w3-border-bottom">Order<h1>
            </div>
            
            <div class="w3-content w3-container">
                <div class="w3-accordion">

                    @foreach ($userorders as $userorder)
                        <a id="{{ $userorder->id }}" href="#{{ $userorder->id }}" class="w3-btn-block w3-left-align dropDownList w3-border-light-grey w3-teal" style="margin:4px 0 4px 0;">
                            <div class="w3-row">
                                <div class="w3-col l3 m3">
                                    <label>Order Number #{{ $userorder->id }}</label>
                                </div>
                                <div class="w3-col l2 m2">
                                    <label>Total Price</label>
                                </div>
                                <div class="w3-col l2 m2">
                                    <label>Pay Way</label>
                                </div>
                                <div class="w3-col l3 m3">
                                    <label>Order Date</label>
                                </div>
                                <div class="w3-col l2 m2" style="padding-right:4em;">
                                    <label>Order Details</label>
                                </div>
                            </div>
                            <div class="w3-row">
                                <div class="w3-col l6 m6" style="padding-left:16em;">
                                    <span style="font-family:cursive;">${{ $userorder->total_price }}</span>
                                </div>
                                <div class="w3-col l5 m5" style="padding-left:5.5em;">
                                    <span style="font-family:cursive;">{{ date('F j, Y - g:iA', strtotime($userorder->created_at)) }}</span>
                                </div>
                            </div>
                        </a>
                        <div id="drop_{{ $userorder->id }}" class="w3-accordion-content w3-container w3-display-container w3-light-grey">
                            <div class="w3-row w3-margin-top w3-padding-medium w3-border-grey w3-border-bottom">
                                <div class="w3-col l4 m4">
                                    <label class="w3-text-grey" style="font-family:cursive;">MEAL</label>
                                </div>
                                <div class="w3-col l6 m6" style="padding-left:1em;">
                                    <label class="w3-text-grey" style="font-family:cursive;">ITEM</label>
                                </div>
                                <div class="w3-col l1 m1" style="padding-left:0.5em;">
                                    <label class="w3-text-grey" style="font-family:cursive;">TOTAL</label>
                                </div>
                                <div class="w3-col l1 m1" style="padding-left:1em;">
                                    <label class="w3-text-grey" style="font-family:cursive;">STATUS</label>
                                </div>
                            </div>

                            @foreach ($userorder->carts()->get() as $cart)
                                <div class="w3-row w3-padding-24 w3-border-grey w3-border-bottom">
                                    <div class="w3-col l4 m4 w3-padding-right">
                                        <img src="{{ asset($cart->meals->img_path) }}" alt="meal photo" style="width:100%">
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
                    @endforeach

                </div>
            </div>
        @endif 
    </div>
@endsection

@section('scripts')
<script>
    $(function() {
        //order list drop down
        $(".dropDownList").click(function(){
            
            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                //  Store hash
                var prefix = "#drop_";

                var hash = this.hash;

                var contentID = prefix.concat(hash.substring(1));
                $(contentID).toggle();
            }
        });

    });
</script>
@endsection