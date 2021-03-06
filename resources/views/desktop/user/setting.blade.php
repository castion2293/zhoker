@extends('desktop.layout.master')

@section('title', '| User Profile Setting')

@section('styles')
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://d4kfrsvmp3cgg.cloudfront.net/2018051504.jpg" alt="profile" style="width:100%">
    </div>

    <!--content-->
    @inject('UserPresenter', 'App\Presenters\UserPresenter')
    <div class="w3-content w3-container w3-padding-64">
        <div class="w3-padding-12">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['user_edit_profile']['title'] }}<h1>
        </div>
        
        <div class="w3-row" style="padding-bottom: 2em;">
            {!! Form::model($user, ['route' => ['user_profile.update', $user->id], 'method' => 'PUT', 'data-parsley-validate' => '', 'files' => true]) !!}
               <div class="w3-col l7 m7 w3-padding-small">
                    <div class="w3-border-grey w3-border-bottom w3-margin-bottom">
                        <span class="w3-text-grey w3-xlarge">{{ $lang->desktop()['user_edit_profile']['public_info'] }}</span>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col l6 m6" style="padding-right:0.8em;">
                            <label class="w3-text-gery" style="font-family:cursive">{{ $lang->desktop()['user_edit_profile']['first_name'] }}</label>
                            {{ Form::text('first_name', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'maxlength' => '255']) }} 
                        </div>
                        <div class="w3-col l6 m6" style="padding-right:0.8em;">
                            <label class="w3-text-gery" style="font-family:cursive">{{ $lang->desktop()['user_edit_profile']['last_name'] }}</label>
                            {{ Form::text('last_name', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'maxlength' => '255']) }} 
                        </div> 
                    </div>
                    <div class="w3-margin-top" style="padding-right:0.8em;">
                        <label class="w3-text-gery" style="font-family:cursive">{{ $lang->desktop()['user_edit_profile']['email'] }}</label>
                        {{ Form::text('email', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'maxlength' => '255']) }} 
                    </div>
                    <div class="w3-margin-top" style="padding-right:0.8em;">
                        <label class="w3-text-gery" style="font-family:cursive">{{ $lang->desktop()['user_edit_profile']['phone_number'] }}</label>
                        {{ Form::text('phone_number', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'maxlength' => '255']) }} 
                    </div>
                    <div class="form-group w3-row w3-margin-top">
                        <div class="w3-col l2 m2 w3-padding-small">
                            <img id="img_content" src="{{ $user->user_profile_img }}" alt="image contetnt" style="width:100%">
                        </div>
                        <div class="w3-col l10 m10">
                            <input type="file" id="myFile" name="user_profile_img" onchange="readURL(this);" style="display:none;">
                            <button type="button" class="w3-btn w3-white w3-border w3-border-grey w3-margin-top w3-margin-left w3-text-grey" style="font-family:cursive;" onclick="document.getElementById('myFile').click();">{{ $lang->desktop()['user_edit_profile']['photo'] }}</button>
                        </div>
                    </div>
                    <div class="w3-row w3-margin-top w3-border-grey w3-border-top">
                        <div class="w3-rest"></div> 
                        <div class="w3-col l3 m3 w3-right w3-margin-top">
                            {!! Form::submit( $lang->desktop()['user_edit_profile']['save_profile'] , ['class' => 'btn w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover']) !!}
                        </div>
                    </div>  
               </div>
            {!! Form::close() !!}

            {!! Form::open(['route' => 'user.resetpassword', 'data-parsley-validate' => '', 'files' => true, 'method' => 'POST']) !!}
                <div class="w3-col l5 m5 w3-padding-small">
                    <div class="w3-border-grey w3-border-bottom w3-margin-bottom">
                        <span class="w3-text-grey w3-xlarge">{{ $lang->desktop()['user_edit_profile']['reset_password'] }}</span>
                    </div>
                    <div class="w3-margin-top" style="padding-right:0.8em;">
                        <label class="w3-text-gery" style="font-family:cursive">{{ $lang->desktop()['user_edit_profile']['old_password'] }}</label>
                        {{ Form::password('old_password', ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'minlength' => '6']) }}  
                    </div>
                    <div class="w3-margin-top" style="padding-right:0.8em;">
                        <label class="w3-text-gery" style="font-family:cursive">{{ $lang->desktop()['user_edit_profile']['new_password'] }}</label>
                        {{ Form::password('password', ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'minlength' => '6']) }}  
                    </div>
                    <div class="w3-margin-top" style="padding-right:0.8em;">
                        <label class="w3-text-gery" style="font-family:cursive">{{ $lang->desktop()['user_edit_profile']['verify_password'] }}</label>
                        {{ Form::password('password_confirmation', ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'minlength' => '6']) }}  
                    </div>
                     <div class="w3-row w3-margin-top w3-border-grey w3-border-top">
                        <div class="w3-rest"></div> 
                        <div class="w3-col l5 m5 w3-right w3-margin-top">
                            {!! Form::submit( $lang->desktop()['user_edit_profile']['change_password'] , ['class' => 'btn w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover']) !!}
                        </div>
                    </div>  
                </div>
            {!! Form::close() !!}
        </div>

        <div class="w3-padding-12" id="payment">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['user_edit_profile']['payment_title'] }}<h1>
        </div>

        <div class="w3-row" style="padding-bottom: 2em;">
            <div class="w3-col l4 m4 w3-padding-small">
                <img src="{{ URL::to('https://d4kfrsvmp3cgg.cloudfront.net/2018051608.JPG') }}" alt="profile" style="width:100%">
            </div>
            <div class="w3-col l7 m7" style="margin-left:3em;">
                @if ($user->creditcards()->get()->isEmpty())
                    {!! Form::open(['route' => 'user.payment.create', 'data-parsley-validate' => '', 'id' => 'checkout-form', 'files' => true, 'method' => 'POST']) !!}
                        <div class="" style="padding-right:0.8em;margin-top:0em;">
                            <label class="w3-text-gery" style="font-family:cursive">{{ $lang->desktop()['user_edit_profile']['card_number'] }}</label>
                            {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-number']) }} 
                        </div>
                        <div class="w3-row" style="margin-top:1em;">
                            <div class="w3-col l4 m4" style="padding-right:1em;">
                                <label class="w3-text-gery" style="font-family:cursive">{{ $lang->desktop()['user_edit_profile']['exp_date'] }}</label>
                                {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-expiry-month', 'placeholder' => 'MM']) }} 
                            </div>
                            <div class="w3-col l4 m4" style="padding-right:1em;">
                                <label class="w3-text-gery" style="font-family:cursive">{{ $lang->desktop()['user_edit_profile']['exp_year'] }}</label>
                                {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-expiry-year', 'placeholder' => 'YYYY']) }} 
                            </div>
                                <div class="w3-col l4 m4" style="padding-right:0.8em;">
                                <label class="w3-text-gery" style="font-family:cursive">{{ $lang->desktop()['user_edit_profile']['cvc'] }}</label>
                                {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-cvc']) }} 
                            </div>
                        </div>
                        <div class="w3-border-grey w3-border-bottom" style="padding-right:0.8em;padding-bottom:2.5em;margin-top:1em;">
                            <label class="w3-text-gery" style="font-family:cursive">{{ $lang->desktop()['user_edit_profile']['holder_name'] }}</label>
                            {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-name']) }} 
                        </div>
                        <div class="w3-row">
                            <div class="w3-rest"></div> 
                            <div class="w3-col l4 m4 w3-right w3-margin-top">
                                {!! Form::submit( $lang->desktop()['user_edit_profile']['confirm'] , ['class' => 'btn w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover confirm-credit-btn']) !!}
                            </div>
                        </div> 
                    {!! Form::close() !!}
                @else
                    <div class="w3-accordion">
                        <div id="dropdown"  class="w3-row">
                            <div class="w3-col l11 m11 w3-row w3-btn-block w3-white w3-left-align w3-border-grey w3-border">
                                <span class="w3-col l10 m10 w3-xlarge w3-text-grey">
                                    <i class="fa fa-cc-visa w3-text-green"></i>
                                    .... .... .... {{ $user->creditcards()->first()->last4 }}
                                    {{ $user->creditcards()->first()->exp_month}}/{{ $user->creditcards()->first()->exp_year}}
                                </span>
                                <!--div class="w3-col l2 m2 w3-padding-tiny">
                                    <button id="del-visa" class="w3-btn-block w3-green w3-medium w3-hover-dark-grey">Delete</button>
                                </div-->
                                <div class="w3-col l2 m2 w3-padding-tiny">
                                    <button id="edit-visa" class="btn w3-green btn-block w3-large zk-shrink-hover">{{ $lang->desktop()['user_edit_profile']['edit'] }}</button>
                                </div>
                            </div>
                            <div class="">
                                <span id="delete-warn" class="glyphicon glyphicon-remove zk-shrink-hover" style="cursor:pointer;margin-top:1.5em;padding-left:1em;"></span>
                                <a href="{!! route('user.payment.delete', ['id' => $user->id]) !!}" class="btn w3-white w3-text-red w3-border w3-border-red btn-block w3-small zk-shrink-hover" id="delete-confirm" style="display:none;">{{ $lang->desktop()['user_edit_profile']['delete'] }}</a>
                            </div>
                        </div>
                        <div class="w3-accordion-content w3-container">

                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

  <!--Edit Modal -->
  <div class="modal" id="edit-modal" role="dialog">
    <div class="modal-dialog" style="width:500px;">

      <!-- Modal content-->
      <div class="modal-content">
        <div>
          <span class="glyphicon glyphicon-remove pull-right w3-large" data-dismiss="modal" style="cursor:pointer;margin-right:20px;margin-top:10px"></span>
        </div>
        <div>
          <h1 class="text-center w3-padding-8 w3-text-green">{{ $lang->desktop()['user_edit_profile']['modal_title'] }}</h1>
        </div>
        <div class="modal-body" style="padding:10px 50px;">
          {!! Form::open(['route' => 'user.payment.edit', 'data-parsley-validate' => '', 'id' => 'checkout-form', 'files' => true, 'method' => 'POST']) !!}
            <div class="" style="padding-right:0.8em;margin-top:0em;">
                <label class="w3-text-gery" style="font-family:cursive">{{ $lang->desktop()['user_edit_profile']['card_number'] }}</label>
                {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-number']) }} 
            </div>
            <div class="w3-row" style="margin-top:1em;">
                <div class="w3-col l4 m4" style="padding-right:1em;">
                    <label class="w3-text-gery" style="font-family:cursive">{{ $lang->desktop()['user_edit_profile']['exp_date'] }}</label>
                    {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-expiry-month', 'placeholder' => 'MM']) }} 
                </div>
                <div class="w3-col l4 m4" style="padding-right:1em;">
                    <label class="w3-text-gery" style="font-family:cursive">{{ $lang->desktop()['user_edit_profile']['exp_year'] }}</label>
                    {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-expiry-year', 'placeholder' => 'YYYY']) }} 
                </div>
                    <div class="w3-col l4 m4" style="padding-right:0.8em;">
                    <label class="w3-text-gery" style="font-family:cursive">{{ $lang->desktop()['user_edit_profile']['cvc'] }}</label>
                    {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-cvc']) }} 
                </div>
            </div>
            <div class="" style="padding-right:0.8em;margin-top:1em;">
                <label class="w3-text-gery" style="font-family:cursive">{{ $lang->desktop()['user_edit_profile']['holder_name'] }}</label>
                {{ Form::text(null, null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'id' => 'card-name']) }} 
            </div>
            <div class="w3-margin-top" style="padding-right:0.8em;">
                {!! Form::submit($lang->desktop()['user_edit_profile']['confirm'] , ['class' => 'btn w3-green btn-block zk-shrink-hover confirm-credit-btn']) !!}
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

            //hide the credit card edit modal
            $('#edit-modal').modal('hide');
            $("#LoadingModal").modal();
        });
    </script>
@endsection