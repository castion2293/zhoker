@extends('desktop.layout.master')

@section('title', '| Shopping Cart')

@section('styles')
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/110401.JPG" alt="profile" style="width:100%">
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
                        <label class="w3-text-dark-grey" style="font-family:cursive;">MEAL</label>
                    </div>
                    <div class="w3-col l5 m5">
                        <label class="w3-text-dark-grey" style="font-family:cursive;">ITEM</label>
                    </div>
                    <div class="w3-col l2 m2">
                        <label class="w3-text-dark-grey" style="font-family:cursive;">TOTAL</label>
                    </div>
                </div>

                @foreach ($carts as $cart)
                    <div class="w3-row w3-padding-16 w3-border-grey w3-border-bottom">
                        <div class="w3-col l5 m5 w3-padding-right" style="margin-top:0.5em;">
                            @foreach ($cart->meals->images->take(1) as $image)
                                    <img src="{{ asset($image->image_path) }}" alt="meal photo" style="width:100%">
                            @endforeach
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

                <div class="w3-row">
                    <div class="w3-rest"></div>
                    <div class="w3-col l6 m6 w3-right w3-margin-top">
                        <a href="{!! route('product.cart.show', ['id' => encrypt(Auth::user()->id)]) !!}" class="btn w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover" style="padding-left:0.5em;"><b>Back to Shopping Cart</b></a>
                    </div>
                </div>
            </div>

            <div class="w3-col l7 m7 w3-content w3-container">
                <div class="w3-margin-top w3-margin-left w3-padding-12 w3-border-grey w3-border-bottom">
                    <label class="w3-text-dark-grey" style="font-family:cursive;">PAYMENT</label>
                </div>
                <div class="w3-row w3-padding-12">
                    <div class="w3-col l6 m6 w3-padding-left">
                        <input class="w3-radio" type="radio" id="bind-card" name="payment_choice" checked>
                        <label class="w3-validate" style="font-family:cursive;">Using Binding Card</label>
                    </div>
                    <div class="w3-col l6 m6">
                        <input class="w3-radio" type="radio" id="no-card" name="payment_choice">
                        <label class="w3-validate" style="font-family:cursive;">One Time Payment</label>
                    </div>
                </div>

                {!! Form::open(['route' => 'product.cart.bindingpayment', 'data-parsley-validate' => '', 'files' => true, 'method' => 'POST']) !!}
                    <div id="bindcardpayment" class="w3-center  w3-padding-left">
                        @if ($user->creditcards()->get()->isEmpty())
                            <span class="w3-text-grey" style="font-family:cursive;">Sorry! you are not binding your credit card yet!<span><br>
                            <span class="w3-text-grey" style="font-family:cursive;">You can binding your card in the link below:<span>
                            <div class="w3-padding-large">
                                <a href="{{ route('product.cart.bindingcard', ['id' => encrypt($user->id)]) }}" class="btn w3-green btn-block w3-large zk-shrink-hover">Binding Credit Card</a>
                            </div>
                        @else 
                            <div id="dropdown" class=" w3-row w3-btn-block w3-white w3-left-align w3-border-grey w3-border">
                                <span class="w3-col l8 m8 w3-large w3-text-grey">
                                    <i class="fa fa-cc-visa w3-text-green w3-xlarge"></i>
                                    .... .... .... {{ $user->creditcards()->first()->last4 }}
                                    {{ $user->creditcards()->first()->exp_month}}/{{ $user->creditcards()->first()->exp_year}}       
                                    <span class="w3-text-grey" style="font-family:cursive;">{{ $user->creditcards()->first()->card_name}}</sapn>
                                </span>
                            </div>
                            <div class="w3-accordion-content w3-container">

                            </div>
                            <div class="w3-row">
                                <div class="w3-rest"></div> 
                                <div class="w3-col l4 m4 w3-right w3-margin-top">
                                    {!! Form::submit('Confirm & Pay', ['class' => 'btn w3-deep-orange btn-block zk-shrink-hover']) !!}
                                </div>
                            </div>  
                        @endif
                    </div>
                {!! Form::close() !!}

                {!! Form::open(['route' => 'product.cart.onetimepayment', 'data-parsley-validate' => '', 'id' => 'checkout-form', 'files' => true, 'method' => 'POST']) !!}
                    <div id="onetimepayment" style="display:none;">
                        <div class="w3-margin-left">
                            <div class="" style="padding-right:0.8em;margin-top:1em;">
                                <label class="w3-text-gery" style="font-family:cursive">Card Number</label>   
                                {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-number']) }} 
                            </div>
                            <div class="w3-row" style="margin-top:0.5em;">
                                <div class="w3-col l4 m4" style="padding-right:1em;">
                                    <label class="w3-text-gery" style="font-family:cursive">Exp. Date</label>   
                                    {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-expiry-month', 'placeholder' => 'MM']) }} 
                                </div>
                                <div class="w3-col l4 m4" style="padding-right:1em;">
                                    <label class="w3-text-gery" style="font-family:cursive">Exp. Year</label>   
                                    {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-expiry-year', 'placeholder' => 'YYYY']) }} 
                                </div>
                                <div class="w3-col l4 m4" style="padding-right:0.8em;">
                                    <label class="w3-text-gery" style="font-family:cursive">CVC</label>   
                                    {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-cvc']) }} 
                                </div>
                            </div>
                            <div class="w3-border-grey w3-border-bottom" style="padding-right:0.8em;padding-bottom:1em;margin-top:0.5em;">
                                <label class="w3-text-gery" style="font-family:cursive">Card Holder Name</label>   
                                {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-name']) }} 
                            </div>
                        </div> 
                        <div class="w3-row">
                            <div class="w3-rest"></div> 
                            <div class="w3-col l4 m4 w3-right w3-margin-top">
                                {!! Form::submit('Confirm & Pay', ['class' => 'btn w3-deep-orange btn-block w3-large zk-shrink-hover']) !!}
                            </div>
                        </div>  
                    </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        Stripe.setPublishableKey('{{ config('services.stripe.key') }}');

        var $form = $('#checkout-form');

        $form.submit(function(event) {
            //$('#charge-error').addClass('hidden');
            $form.find('button').prop('disabled', true);
            Stripe.card.createToken({
                number: $('#card-number').val(),
                cvc: $('#card-cvc').val(),
                exp_month: $('#card-expiry-month').val(),
                exp_year: $('#card-expiry-year').val(),
                name: $('#card-name').val()
            }, stripeResponseHandler);
            return false;
        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                //$('#charge-error').removeClass('hidden');
                //$('#charge-error').text(response.error.message);
                $form.find('button').prop('disabled', false);
            } else {
                var token = response.id;
                $form.append($('<input type="hidden" name="stripeToken" />').val(token));

                //Submit the form
                $form.get(0).submit();
            }
        }
    </script>
    <script>
        $(function () {
            $(".w3-radio").change(function(){
                if($("#no-card").is(":checked")) {
                    $("#onetimepayment").show();
                    $("#bindcardpayment").hide();
                } else if ($("#bind-card").is(":checked")) {
                    $("#onetimepayment").hide();
                    $("#bindcardpayment").show();
                }
            });
        });
    </script>
@endsection