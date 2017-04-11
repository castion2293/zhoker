@extends('mobile.layout.master')

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
    <div class="w3-content w3-container w3-padding-32">
        <div class="">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop() ['checkout']['title'] }}</h1>
        </div>

        <div class="w3-row">
            <div class="w3-col s12">
                @foreach ($carts as $cart)
                    <div class="w3-row w3-border w3-border-green w3-round-large w3-padding-tiny w3-margin-top">
                        <div class="w3-col s8" style="margin-top:0.5em;padding-left:0.5em;">
                            <span class="w3-text-grey w3-large"><b>{{ str_limit($cart->meals->name, 24) }}</b></span>
                        </div>
                        <div class="w3-col s4" style="margin-top:0.5em;">
                            <span class="w3-text-green w3-large">${{ $cart->unite_price }}TWD</span>
                        </div>
                        <div class="w3-col s12">
                            <img src="{{ asset($cart->meals->cover_img) }}" alt="meal photo" style="width:100%">
                        </div>
                        <div class="w3-col s12" style="margin-top:1em;padding-left:0.5em;">
                            <span class="w3-text-grey w3-large">{{ $cart->people_order }} {{ $lang->desktop() ['checkout']['people'] }}</span>
                        </div>

                        <div class="w3-row">
                            <div class="w3-rest"></div>
                            <div class="w3-col s5 w3-right" style="margin-top:0.5em;">
                                <span class="w3-text-green w3-large"><b>${{ $cart->price }}</b></span>
                            </div>
                            <div class="w3-col s4 w3-center w3-right" style="margin-top:0.5em;">
                                <span class="w3-text-grey w3-large">{{ $lang->desktop() ['checkout']['total'] }}:</span>
                            </div>
                        </div>
                        
                    </div>
                @endforeach

                <div class="w3-col s12 w3-center w3-margin-top">
                    <span class="w3-text-grey w3-xlarge" style="padding-left:0.5em;">{{ $lang->desktop() ['checkout']['subtotal'] }}: <span class="w3-text-green w3-xlarge">${{ $totalPrice }}</span></span>
                </div>
               
                <div class="w3-col s12 w3-center w3-margin-top">
                    <a href="{!! route('product.cart.show', ['id' => Auth::user()->id]) !!}" class="btn w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover" style="padding-left:0.5em;">{{ $lang->desktop() ['checkout']['back_cart'] }}</a>
                </div>
                
            </div>

            <div class="w3-col s12" style="margin-top:3em;">
                <div class="w3-padding-12 w3-border-grey w3-border-bottom">
                    <label class="w3-text-dark-grey w3-large" style="font-family:cursive;">{{ $lang->desktop() ['checkout']['payment'] }}</label>
                </div>
                <div class="w3-row w3-padding-12 w3-center">
                    <div class="w3-col s12">
                        <input class="w3-radio" type="radio" id="bind-card" name="payment_choice" checked>
                        <label class="w3-validate w3-large" style="font-family:cursive;">{{ $lang->desktop() ['checkout']['using_binding_card'] }}</label>
                    </div>
                    <div class="w3-col s12">
                        <input class="w3-radio" type="radio" id="no-card" name="payment_choice">
                        <label class="w3-validate w3-large" style="font-family:cursive;">{{ $lang->desktop() ['checkout']['one_time'] }}</label>
                    </div>
                </div>

                {!! Form::open(['route' => 'product.cart.bindingpayment', 'data-parsley-validate' => '', 'files' => true, 'method' => 'POST']) !!}
                    <div id="bindcardpayment" class="w3-center  w3-padding-left">
                        @if ($user->creditcards()->get()->isEmpty())
                            <span class="w3-text-grey" style="font-family:cursive;">{{ $lang->desktop() ['checkout']['no_binding_card'] }}<span><br>
                            <span class="w3-text-grey" style="font-family:cursive;">{{ $lang->desktop() ['checkout']['binding_card_link'] }}:<span>
                            <div class="w3-padding-large">
                                <a href="{{ route('product.cart.bindingcard', ['id' => $user->id]) }}" class="btn w3-green btn-block w3-large zk-shrink-hover">{{ $lang->desktop() ['checkout']['binding_card'] }}</a>
                            </div>
                        @else 
                            <div id="dropdown" class=" w3-row w3-btn-block w3-white w3-left-align w3-border-grey w3-border">
                                <span class="w3-col s12 w3-medium w3-text-grey">
                                    <i class="fa fa-cc-visa w3-text-green w3-xlarge"></i>
                                    .... {{ $user->creditcards()->first()->last4 }}
                                    {{ $user->creditcards()->first()->exp_month}}/{{ $user->creditcards()->first()->exp_year}}       
                                    <span class="w3-text-grey" style="font-family:cursive;">{{ $user->creditcards()->first()->card_name}}</sapn>
                                </span>
                            </div>
                            <div class="w3-accordion-content w3-container">

                            </div>
                            <div class="w3-row">
                                <div class="w3-rest"></div> 
                                <div class="w3-col l4 m4 w3-right w3-margin-top">
                                    {!! Form::submit($lang->desktop() ['checkout']['confirm'], ['class' => 'btn w3-deep-orange w3-largeEE btn-block zk-shrink-hover pay-btn']) !!}
                                </div>
                            </div>  
                        @endif
                    </div>
                {!! Form::close() !!}

                {!! Form::open(['route' => 'product.cart.onetimepayment', 'data-parsley-validate' => '', 'id' => 'checkout-form', 'files' => true, 'method' => 'POST']) !!}
                    <div id="onetimepayment" style="display:none;">
                        <div class="">
                            <div class="w3-col s12" style="margin-top:1em;">
                                <label class="w3-text-gery w3-large">{{ $lang->desktop() ['user_edit_profile']['card_number'] }}</label>
                                {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-number']) }} 
                            </div>
                            <div class="w3-col s12" style="margin-top:1em;">
                                <label class="w3-text-gery w3-large">{{ $lang->desktop() ['user_edit_profile']['exp_date'] }}</label>
                                {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-expiry-month', 'placeholder' => 'MM']) }} 
                            </div>
                            <div class="w3-col s12" style="margin-top:1em;">
                                <label class="w3-text-gery w3-large">{{ $lang->desktop() ['user_edit_profile']['exp_year'] }}</label>
                                {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-expiry-year', 'placeholder' => 'YYYY']) }} 
                            </div>
                            <div class="w3-col s12" style="margin-top:1em;">
                                <label class="w3-text-gery w3-large">{{ $lang->desktop() ['user_edit_profile']['cvc'] }}</label>
                                {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-cvc']) }} 
                            </div>
                            <div class="w3-col s12 w3-border-grey w3-border-bottom" style="padding-bottom:1em;margin-top:1em;">
                                <label class="w3-text-gery w3-large">{{ $lang->desktop() ['user_edit_profile']['holder_name'] }}</label>
                                {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-name']) }} 
                            </div>
                        </div> 
                        <div class="w3-row">
                            <div class="w3-rest"></div> 
                            <div class="w3-col l4 m4 w3-right w3-margin-top">
                                {!! Form::submit($lang->desktop() ['checkout']['confirm'], ['class' => 'btn w3-deep-orange btn-block w3-large zk-shrink-hover pay-btn']) !!}
                            </div>
                        </div>  
                    </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>

     <!--loader modal-->
    @include('desktop.partials.loader')

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

    <!--loader-->
    <script>
        $(".pay-btn").click(function() {
            $("#LoadingModal").modal();
        });
    </script>
@endsection