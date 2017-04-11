@extends('mobile.layout.master')

@section('title', '| User Profile Setting')

@section('styles')
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1104201604.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    @inject('UserPresenter', 'App\Presenters\UserPresenter')
    <div class="w3-content w3-container w3-padding-32">
        <div class="">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['user_edit_profile']['title'] }}<h1>
        </div>
        
        <div class="w3-row" style="padding-bottom: 2em;">
            {!! Form::model($user, ['route' => ['user_profile.update', $user->id], 'method' => 'PUT', 'data-parsley-validate' => '', 'files' => true]) !!}
               <div class="w3-col s12 w3-padding-small">
                    <div class="w3-border-grey w3-border-bottom w3-margin-bottom">
                        <span class="w3-text-grey w3-xlarge">{{ $lang->desktop()['user_edit_profile']['public_info'] }}<span>
                    </div>
                    <div class="w3-padding-tiny">
                        <div class="w3-col s12">
                            <label class="w3-text-gery w3-large">{{ $lang->desktop()['user_edit_profile']['first_name'] }}</label>
                            {{ Form::text('first_name', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'maxlength' => '255']) }} 
                        </div>
                        <div class="w3-col s12 w3-margin-top">
                            <label class="w3-text-gery w3-large">{{ $lang->desktop()['user_edit_profile']['last_name'] }}</label>
                            {{ Form::text('last_name', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'maxlength' => '255']) }} 
                        </div> 
                        <div class="w3-col s12 w3-margin-top">
                            <label class="w3-text-gery w3-large">{{ $lang->desktop()['user_edit_profile']['email'] }}</label>
                            {{ Form::text('email', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'maxlength' => '255']) }} 
                        </div>
                        <div class="w3-col s12 w3-margin-top">
                            <label class="w3-text-gery w3-large">{{ $lang->desktop()['user_edit_profile']['phone_number'] }}</label>
                            {{ Form::text('phone_number', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'maxlength' => '255']) }} 
                        </div>
                    </div>
                    
                    <div class="form-group w3-row w3-margin-top">
                        <div class="w3-col s12 w3-padding-small">
                            <img id="img_content" src="{{ $user->user_profile_img }}" alt="image contetnt" style="width:100%">
                        </div>
                        <div class="w3-rest"></div>
                        <div class="w3-col s7 w3-right">
                            <input type="file" id="myFile" name="user_profile_img" onchange="readURL(this);" style="display:none;">
                            <button type="button" class="w3-btn w3-white w3-border w3-border-grey w3-margin-top w3-large w3-margin-left w3-text-grey" style="font-family:cursive;" onclick="document.getElementById('myFile').click();">{{ $lang->desktop()['user_edit_profile']['photo'] }}</button>
                        </div>
                    </div>

                    <div class="w3-row w3-margin-top w3-border-grey w3-border-top">
                        <div class="w3-col s12 w3-center w3-margin-top">
                            {!! Form::submit($lang->desktop()['user_edit_profile']['save_profile'], ['class' => 'btn w3-white w3-text-green w3-border w3-border-green w3-large btn-block zk-shrink-hover']) !!}
                        </div>
                    </div>  
               </div>
            {!! Form::close() !!}

            {!! Form::open(['route' => 'user.resetpassword', 'data-parsley-validate' => '', 'files' => true, 'method' => 'POST']) !!}
                <div class="w3-col s12 w3-padding-small" style="margin-top:3em;">
                    <div class="w3-border-grey w3-border-bottom w3-margin-bottom">
                        <span class="w3-text-grey w3-xlarge">{{ $lang->desktop()['user_edit_profile']['reset_password'] }}<span>
                    </div>
                    <div class="w3-margin-top">
                        <label class="w3-text-gery w3-large">{{ $lang->desktop()['user_edit_profile']['old_password'] }}</label>
                        {{ Form::password('old_password', ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'minlength' => '6']) }}  
                    </div>
                    <div class="w3-margin-top">
                        <label class="w3-text-gery w3-large">{{ $lang->desktop()['user_edit_profile']['new_password'] }}</label>
                        {{ Form::password('password', ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'minlength' => '6']) }}  
                    </div>
                    <div class="w3-margin-top">
                        <label class="w3-text-gery w3-large">{{ $lang->desktop()['user_edit_profile']['verify_password'] }}</label>
                        {{ Form::password('password_confirmation', ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'minlength' => '6']) }}  
                    </div>
                     <div class="w3-row w3-margin-top w3-border-grey w3-border-top">
                        <div class="w3-col s12 w3-center w3-margin-top">
                            {!! Form::submit($lang->desktop()['user_edit_profile']['change_password'], ['class' => 'btn w3-white w3-text-green w3-border w3-border-green w3-large btn-block zk-shrink-hover']) !!}
                        </div>
                    </div>  
                </div>
            {!! Form::close() !!}
        </div>

        <div class="w3-padding-12" id="payment">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['user_edit_profile']['payment_title'] }}<h1>
        </div>

        <div class="w3-row" style="padding-bottom: 2em;">
            <div class="w3-col s12">
                <img src="{{ URL::to('https://s3-us-west-2.amazonaws.com/zhoker/images/1028201602.jpg') }}" alt="profile" style="width:100%">
            </div>
            <div class="w3-col s12">
                @if ($user->creditcards()->get()->isEmpty())
                    {!! Form::open(['route' => 'user.payment.create', 'data-parsley-validate' => '', 'id' => 'checkout-form', 'files' => true, 'method' => 'POST']) !!}
                        <div class="w3-margin-top">
                            <label class="w3-text-gery w3-large">{{ $lang->desktop()['user_edit_profile']['card_number'] }}</label>
                            {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-number']) }} 
                        </div>
                        <div class="w3-margin-top">
                            <label class="w3-text-gery w3-large">{{ $lang->desktop()['user_edit_profile']['exp_date'] }}</label>
                            {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-expiry-month', 'placeholder' => 'MM']) }} 
                        </div>
                        <div class="w3-margin-top">
                            <label class="w3-text-gery w3-large">{{ $lang->desktop()['user_edit_profile']['exp_year'] }}</label>
                            {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-expiry-year', 'placeholder' => 'YYYY']) }} 
                        </div>
                        <div class="w3-margin-top">
                            <label class="w3-text-gery w3-large">{{ $lang->desktop()['user_edit_profile']['cvc'] }}</label>
                            {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-cvc']) }} 
                        </div>
                        <div class="w3-border-grey w3-border-bottom" style="padding-bottom:2.5em;margin-top:1em;">
                            <label class="w3-text-gery w3-large">{{ $lang->desktop()['user_edit_profile']['holder_name'] }}</label>
                            {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-name']) }} 
                        </div>
                        <div class="w3-row">
                            <div class="w3-rest"></div> 
                            <div class="w3-col l4 m4 w3-right w3-margin-top">
                                {!! Form::submit($lang->desktop()['user_edit_profile']['confirm'], ['class' => 'btn w3-white w3-text-green w3-border w3-border-green w3-large btn-block zk-shrink-hover confirm-credit-btn']) !!}
                            </div>
                        </div> 
                    {!! Form::close() !!}
                @else
                    <div class="w3-accordion w3-margin-top">
                        <div id="dropdown"  class="w3-row">
                            <div class="w3-col s12 w3-row w3-btn-block w3-white w3-medium w3-left-align w3-border-grey w3-border">
                                <span class="w3-col s12 w3-medium w3-text-grey">
                                    <i class="fa fa-cc-visa w3-text-green w3-xlarge"></i>
                                    .... {{ $user->creditcards()->first()->last4 }}
                                    {{ $user->creditcards()->first()->exp_month}}/{{ $user->creditcards()->first()->exp_year}}       
                                    <span class="w3-text-grey" style="font-family:cursive;">{{ $user->creditcards()->first()->card_name}}</sapn>
                                </span>
                            </div>
                                <!--div class="w3-col l2 m2 w3-padding-tiny">
                                    <button id="edit-visa" class="btn w3-green btn-block w3-large zk-shrink-hover">Edit</button>
                                </div-->
                            
                            <!--div class="">
                                <span id="del-visa" class="glyphicon glyphicon-remove zk-shrink-hover" style="cursor:pointer;margin-top:1.5em;padding-left:1em;"></span>
                            </div-->
                        </div>
                        <div class="w3-accordion-content w3-container">

                        </div>

                        <div class="w3-col s12 w3-margin-top">
                            <button id="edit-visa" class="btn w3-white w3-text-green w3-border w3-border-green btn-block w3-large zk-shrink-hover">{{ $lang->desktop()['user_edit_profile']['modal_title'] }}</button>
                        </div>

                        <div class="w3-col s12 w3-margin-top">
                            <button id="delete-warn" class="btn w3-white w3-text-red w3-border w3-border-red btn-block w3-large zk-shrink-hover">{{ $lang->desktop()['user_edit_profile']['delete'] }}</button>
                            <a href="{!! route('user.payment.delete', ['id' => $user->id]) !!}" class="btn w3-white w3-text-red w3-border w3-border-red btn-block w3-small zk-shrink-hover" id="delete-confirm" style="display:none;">Delete Credit Card</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

  <!--Edit Modal -->
  <div class="modal" id="edit-modal" role="dialog" style="width:100%;">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div>
          <span class="glyphicon glyphicon-remove pull-right w3-large" data-dismiss="modal" style="cursor:pointer;margin-right:20px;margin-top:10px"></span>
        </div>
        <div class="w3-center">
          <h1 class="text-center w3-text-green w3-xlarge">{{ $lang->desktop()['user_edit_profile']['modal_title'] }}</h1>
        </div>
        <div class="modal-body" style="padding:10px 30px;">
          {!! Form::open(['route' => 'user.payment.edit', 'data-parsley-validate' => '', 'id' => 'checkout-form', 'files' => true, 'method' => 'POST']) !!}
            <div class="">
                <label class="w3-text-gery w3-large">{{ $lang->desktop()['user_edit_profile']['card_number'] }}</label>
                {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-number']) }} 
            </div>
            <div class="w3-margin-top">
                <label class="w3-text-gery w3-large">{{ $lang->desktop()['user_edit_profile']['exp_date'] }}</label>
                {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-expiry-month', 'placeholder' => 'MM']) }} 
            </div>
            <div class="w3-margin-top">
                <label class="w3-text-gery w3-large">{{ $lang->desktop()['user_edit_profile']['exp_year'] }}</label>
                {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-expiry-year', 'placeholder' => 'YYYY']) }} 
            </div>
            <div class="w3-margin-top">
                <label class="w3-text-gery w3-large">{{ $lang->desktop()['user_edit_profile']['cvc'] }}</label>
                {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-cvc']) }} 
            </div>
            <div class="w3-margin-top">
                <label class="w3-text-gery w3-large">{{ $lang->desktop()['user_edit_profile']['holder_name'] }}</label>
                {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-name']) }} 
            </div>
            <div class="w3-margin-top">
                {!! Form::submit($lang->desktop()['user_edit_profile']['confirm'], ['class' => 'btn w3-green btn-block w3-large zk-shrink-hover']) !!}
            </div>
          {!! Form::close() !!}
        </div>
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
        //Upload Picture
         function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img_content')
                        .attr('src', e.target.result)
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        $(function () {
          //edit modal show
          $("#edit-visa").click(function(){
            $("#edit-modal").modal();
          });
        });
    </script>

    <!--delete credit card-->
    <script>
        $(function () {
            $("#delete-warn").click(function () {
              swal({
                title: "{{ $lang->desktop()['flash']['are_you_sure'] }}",
                text: "{{ $lang->desktop()['flash']['delete_card_warn'] }}",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "{{ $lang->desktop()['flash']['delete_confirm_btn'] }}",
                cancelButtonText: "{{ $lang->desktop()['flash']['cancel_btn'] }}",
                closeOnConfirm: false
              },
              function(){
                $("#delete-confirm")[0].click();
              });
            });
        });
    </script>

    <!--loader-->
    <script>
        $(".confirm-credit-btn").click(function() {
            $("#LoadingModal").modal();
        });
    </script>
@endsection