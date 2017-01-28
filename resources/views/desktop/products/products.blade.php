@extends('desktop.layout.master')

@section('title', '| Product meal show' . $meal->name)

@section('styles')
    @foreach ($meal->images as $image)
      <meta property="og:image" content="{{ asset($image->image_path) }}">
    @endforeach
    <link rel="stylesheet" href="{{ URL::to('css/cs-select.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/cs-skin-elastic.css') }}">
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="w3-row" id="top-pic">
        @foreach ($meal->images->take(4) as $image)
            @if ($loop->iteration > 1)
              <div class="w3-col l4 m4">
                  <img src="{{ asset($image->image_path) }}" alt="profile" style="width:100%">
              </div>
            @endif
        @endforeach
    </div>

    <!--content-->
    @inject('ProductPresenter', 'App\Presenters\ProductPresenter')
    <div class="w3-content w3-container w3-padding-64">
        <div class="w3-row w3-margin-top w3-border-green w3-border-bottom">
            <div class="w3-col l10 m10">
                <h1 class="w3-text-grey w3-xxlarge w3-margin-left" style="font-family: cursive">{{ $meal->name }}<h1>
            </div>
            <div class="w3-col l2 m2">
                <b class="w3-text-green w3-xlarge w3-right w3-margin-right" style="margin-top:2em;">${{ $meal->price }}TWD</b>
            </div>
        </div>
        <div class="w3-row w3-padding-12">
            <div class="w3-col l7 m7 w3-padding-large">
                <div class="w3-padding-12 w3-display-container">
            
                    <div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
                        @foreach ($meal->images as $image)
                            @if ($loop->first)
                              <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                <a id="image_link" href="{{ $image->image_path }}" itemprop="contentUrl" data-size="1024x575">
                                    <img src="{{ asset($image->image_path) }}" alt="this is a photo" style="width:100%">
                                </a>                                   
                              </figure>
                            @else
                              <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                <a href="{{ $image->image_path }}" itemprop="contentUrl" data-size="1024x575">
                                    <img src="{{ asset($image->image_path) }}" alt="this is a photo" style="width:100%;display:none;">
                                </a>                                   
                              </figure>
                            @endif
                        @endforeach
                        
                    </div>
                    @include('desktop.partials.photoswipe')
                    <div class="w3-display-bottomright" style="padding-right:4em;padding-bottom:2em;">
                      <div id="image_btn" class="w3-btn-floating w3-text-white w3-transparent" style="border: 2px solid;"><i class="fa fa-instagram"></i></div>
                    </div>
                </div>
                <div class="w3-right">
                    @if (Auth::check())
                      <div id="bnt-btn" class="btn w3-medium w3-white w3-border w3-border-green w3-text-green zk-shrink-hover"><i class="{{ $ProductPresenter->checkUserBuyNextTimeItem(Auth::user(), $datetimepeople->id) ? 'fa fa-heart' : 'fa fa-heart-o' }}"></i> Buy Next Time</div>
                    @else
                      <div id="bnt-btn" class="btn w3-medium w3-white w3-border w3-border-green w3-text-green zk-shrink-hover"><i class="fa fa-heart-o"></i> Buy Next Time</div>
                    @endif  
                </div>
            </div>
            <div class="w3-col l5 m5 w3-padding-large">
              {!! Form::open(['route' => ['product.cart', $meal->id, $datetimepeople->id], 'data-parsley-validate' => '', 'files' => true, 'method' => 'POST']) !!}
                <div class="w3-margin-top w3-border-bottom w3-border-grey">
                    <label>Evaluation:  
                        @for ($i = 0; $i < 5; $i++)
                          <span class="w3-text-orange w3-large"><i class="fa fa-star"></i></span>
                        @endfor
                    </label>
                </div>
                <div class="w3-margin-top w3-border-bottom w3-border-grey">
                    <label>Type:
                      @foreach ($meal->categories as $category)
                          <p class="w3-tag w3-teal w3-tiny">{{ $category->category }}</p>
                      @endforeach
                    </label>
                </div>
                <div class="w3-padding-12 w3-border-bottom w3-border-grey">
                    <label>Date/time:
                        <sapn class="w3-text-grey w3-large">{{ $datetimepeople->date }} / {{ $datetimepeople->time }}</span>
                    </label>
                </div>
                <div class="w3-row w3-padding-12 w3-border-bottom w3-border-grey">
                    <div class="w3-col l3 m3" style="margin-top:0.5em;">
                      <label>How Many:</label>
                    </div>
                    <div class="w3-col l3 m3">
                      <select class="w3-select w3-border w3-text-grey w3-medium" id="people_order" name="people_order" required="" > 
                          @for ($i = 0;$i < $datetimepeople->people_left;$i++)
                              <option value='{{ $i + 1 }}'>{{ $i+1 }} people</option>
                          @endfor
                      </select>
                    </div>
                    <div class="w3-col l3 m3 w3-center" style="margin-top:0.5em;">
                      <label>Method:</label>
                    </div>
                    <div class="w3-col l3 m3">
                      <select class="w3-select w3-border w3-text-grey w3-medium" id="method_way" name="method_way" required="" > 
                          @foreach ($methods as $method)
                              <option value='{{ $method->id }}'>{{ $method->method }}</option>
                          @endforeach
                      </select>
                    </div>
                </div>
                <div class="w3-row w3-padding-12">
                    @if ($datetimepeople->people_left != 0)
                      {!! Form::submit('ADD TO CART', ['id' => 'add-to-cart', 'class' => 'btn w3-deep-orange w3-border w3-border-deep-orange btn-block w3-large zk-shrink-hover w3-hover-deep-orange']) !!}
                    @else
                      <div id="reserve" class="btn w3-deep-orange w3-border w3-border-deep-orange btn-block w3-large zk-shrink-hover w3-hover-deep-orange">Reserve Meal</div>
                      <!--link for going to shoppingcart page, not shown--> 
                      <a href="{{ url('/product/cart/show/' . encrypt(Auth::user() ? Auth::user()->id : 0) . '#reserve') }}" id="shopping-link" style="display:none;"></a>
                    @endif
                </div>
               {!! Form::close() !!}
            </div>

            <div class="w3-col s12 w3-padding-large">
                <div class="w3-rol">
                    <div class="w3-rest"></div>
                    <div class="w3-right">
                      <p id="shareBtn" class="w3-small w3-tag w3-center w3-round-medium" style="padding-top:2px;background-color:#3b5998;cursor:pointer;"><i class="fa fa-facebook-square w3-medium w3--text-indigo" style=""></i>   Share</p>
                    </div>
                </div>
                <label class="w3-text-grey w3-large" style="font-family: cursive">meal description</label>
                <p>{!! $meal->description !!}</p>
            </div>
        </div>
    </div>

    <!--Sign In Modal -->
  <div class="modal" id="myModal" role="dialog">
    <div class="modal-dialog" style="width:500px;">

      <!-- Modal content-->
      <div class="modal-content">
        <div>
          <span class="glyphicon glyphicon-remove pull-right w3-large" data-dismiss="modal" style="cursor:pointer;margin-right:20px;margin-top:10px"></span>
        </div>
        <div>
          <h1 class="text-center w3-padding-8 w3-text-green">Sign In</h1>
        </div>
        <div class="modal-body" style="padding:10px 50px;">
          {!! Form::open(['route' => 'login', 'data-parsley-validate' => '', 'method' => 'POST']) !!}
            <div class="form-group">
              <label for="email" class="w3-text-grey"><span class="fa fa-envelope w3-large"></span> Email</label>
              {{ Form::email('email', null, ['class' => 'form-control w3-large', 'required' => '', 'placeholder' => 'Enter Email']) }}              
            </div>
            <div class="form-group">
              <label for="password" class="w3-text-grey"><span class="glyphicon glyphicon-eye-open w3-large"></span> Password</label>
              {{ Form::password('password',['class' => 'form-control w3-large', 'required' => '', 'placeholder' => 'Enter Password']) }}
              <label class="w3-text-red w3-large" id="sign_in_wmsg"></label>
              <span class="w3-text-green" data-dismiss="modal" data-toggle="modal" data-target="#forgotModal" style="cursor:pointer;">Forgot Password?</span>
            </div>
            <div class="checkbox">
              <label class="w3-text-grey"><input type="checkbox" value="" checked>Remember me</label>
            </div>
            <div class="form-group">
              <span class="w3-text-grey w3-large">Sing in with
                <a href="{{ url('/auth/facebook') }}"><i class="fa fa-facebook-square w3-xxlarge w3-text-indigo" style="margin-left:5px;"></i></a>
                <i class="fa fa-google-plus-square w3-xxlarge w3-text-red" style="margin-left:10px;"></i>
              </span>
              <button type="submit" class="btn btn-success pull-right"><span class="glyphicon glyphicon-off w3-large"></span> Sign In</button>
            </div>
          {!! Form::close() !!}
        </div>
        <div class="modal-footer">
          <p class="text-center w3-large">Not a member?
            <span class="w3-text-green" data-dismiss="modal" data-toggle="modal" data-target="#signupModal" style="cursor:pointer;">Sign Up</span>
          </p>
        </div>
      </div>

    </div>
  </div>

<!--forgot Password modal-->
  <div class="modal" id="forgotModal" role="dialog">
    <div class="modal-dialog" style="width:600px;">

      <!-- Modal content-->
      <div class="modal-content">
        <div>
          <span class="glyphicon glyphicon-remove pull-right w3-large" data-dismiss="modal" style="cursor:pointer;margin-right:20px;margin-top:10px"></span>
        </div>
        <div>
          <h1 class="w3-xxlarge w3-text-green w3-center">Forgot Password</h1>
        </div>
        <div class="modal-body" style="padding:10px 50px;">
          <div class="w3-center">
            <span class="w3-medium w3-text-black w3-center">To reset your password, please enter the email address you sign in before</span>
          </div>
          {!! Form::open(['route' => 'postPasswordEmail', 'class' => 'form-horizontal', 'style' => 'margin:10px', 'method' => 'POST']) !!}
            <div class=" form-group ">
              <div class="col-sm-10" style="margin-top:1px">
                {{ Form::email('email', null, ['class' => 'form-control w3-large', 'placeholder' => 'Email Address']) }}
                <label class="w3-text-red w3-large" id="Forgot_pwd_wmsg"></label>
              </div>
              {{ Form::submit('Send', ['class' => 'w3-btn w3-green w3-round w3-medium col-sm-2 w3-hover-dark-grey', 'style' => 'height:35px']) }}
            </div>
          {!! Form::close() !!}
          <div style="margin-left:10px">
            <span class="w3-large w3-text-green" data-dismiss="modal" data-toggle="modal" data-target="#myModal" style="cursor:pointer;">Back to Sign in</span>
          </div>
        </div>
      </div>

    </div>
  </div>

<!--Sign up Modal-->
  <div class="modal" id="signupModal" role="dialog">
    <div class="modal-dialog" style="width:530px;">

      <!-- Modal content-->
      <div class="modal-content">
        <div>
          <span class="glyphicon glyphicon-remove pull-right w3-large" data-dismiss="modal" style="cursor:pointer;margin-right:20px;margin-top:10px"></span>
        </div>
        <div>
          <h1 class="w3-xxlarge w3-text-green w3-center">Sign up</h1>
        </div>
        <div class="modal-body" style="padding:10px 50px;">
          <div class="w3-center">
            <span class="w3-medium w3-text-black w3-center">Please sign up to keep track of your favorites and saved searches.</span>
          </div>
          <!--form role="form" style="margin:10px"-->
          {!! Form::open(['route' => 'register.sendconfrimemail', 'data-parsley-validate' => '', 'method' => 'POST']) !!}
            <div class=" form-group ">
              <div style="margin-top:1px">
                {{ Form::text('first_name', null, ['class' => 'form-control w3-large', 'required' => '', 'placeholder' => 'First Name ']) }}
                {{ Form::text('last_name', null, ['class' => 'form-control w3-large w3-margin-top', 'required' => '', 'placeholder' => 'Last Name ']) }}
                {{ Form::email('email', null, ['class' => 'form-control w3-large w3-margin-top', 'required' => '', 'placeholder' => 'Email Address ']) }}
                {{ Form::text('phone_number', null, ['class' => 'form-control w3-large w3-margin-top', 'required' => '', 'placeholder' => 'Phone Number ']) }}
                {{ Form::password('password', ['class' => 'form-control w3-large w3-margin-top', 'required' => '', 'minlength' => '6', 'placeholder' => 'Password ']) }}
                {{ Form::password('password_confirmation', ['class' => 'form-control w3-large w3-margin-top', 'required' => '', 'minlength' => '6', 'placeholder' => 'Verify Password ']) }}
                <div class="form-group w3-margin-top">
                  {!! app('captcha')->display()!!}
                  {!! $errors->first('g-recaptcha-response','<p class="alert alert-danger">:message</p>')!!}
                </div>
                <label class="w3-text-red w3-large" id="sign_up_wmsg"></label>
                <!--div class="checkbox">
                  <label><input type="checkbox" value="" checked>Receive Email alert after registering to be a member</label>
                </div-->
                <p class="w3-large">By registering, I accept the zhoker.com
                  <span class="w3-text-green" style="cursor:pointer;">Term of Use.</span>
                </p>
                <div class="form-group">
                  <span class="w3-text-grey w3-large">Sing up with
                   <i class="fa fa-facebook-square w3-xxlarge w3-text-indigo" style="margin-left:5px;"></i>
                   <i class="fa fa-google-plus-square w3-xxlarge w3-text-red" style="margin-left:10px;"></i>
                  </span>
                  <button type="submit" class="btn btn-success pull-right"><span class="glyphicon glyphicon-user w3-large"></span> Sign Up</button>
                </div>
              </div>
            </div>
          {!! Form::close() !!}
          <!--/form-->

          <div class="modal-footer">
            <p class="text-center w3-large">
              <span class="w3-text-green" data-dismiss="modal" data-toggle="modal" data-target="#myModal" style="cursor:pointer;">Sign In</span>              if you are already a member
            </p>
          </div>
        </div>
      </div>

    </div>
  </div>

@endsection

@section('scripts')
    <!-- Animated Select Option -->
    <script src="{{ URL::to('js/classie.js') }}"></script>
    <script src="{{ URL::to('js/selectFx.js') }}"></script>
    <!-- Animated Select option -->
    <script>
			// (function() {
			// 	 [].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
			// 		    new SelectFx(el);
			// 	 } );
			// })();
	 </script>

   <!--Facebook Share Link-->
   <script src="https://connect.facebook.net/en_US/all.js"></script>
   <script>
      FB.init({
          appId  : {{ env('FACEBOOK_ID') }},
      });
        
      document.getElementById('shareBtn').onclick = function() {
          FB.ui({
              method: 'share',
              display: 'popup',
              href: '{{ url()->current() }}',
          }, function(response){});
      }
   </script>

    <!--SignIn and SignUp Error show-->
    <script>
        $(function () {
            @if (count($errors) > 0)
              @foreach($errors->all() as $error)
                var status = '{{ $error }}';
                var form_name = "";

                // get the error message
                switch(status) {
                  case 'These credentials do not match our records.':
                      error_show = error_show.concat(status).concat('<br>');
                      form_name = "SignIn Form";
                      break;
                  case 'The email has already been taken.':
                      error_show = error_show.concat(status).concat('<br>');
                      form_name = "SignUp Form";
                      break;
                  case 'The phone number must be a number.':
                      error_show = error_show.concat(status).concat('<br>');
                      form_name = "SignUp Form";
                      break;
                  case 'The password confirmation does not match.':
                      error_show = error_show.concat(status).concat('<br>');
                      form_name = "SignUp Form";
                      break;
                  case 'We can&#039;t find a user with that e-mail address.':
                      error_show = error_show.concat(status).concat('<br>');
                      form_name = "Forgot Form";
                      break;
                  case 'Not Authicated':
                      $("#myModal").modal();
                  default:
                      break;
                }
              @endforeach

              //show the error message
              switch(form_name) {
                  case "SignIn Form":
                    $("#sign_in_wmsg").html(error_show);
                    $("#myModal").modal();//失敗後的顯示
                    break;
                  case "SignUp Form":
                    $("#sign_up_wmsg").html(error_show);
                    $("#signupModal").modal();//失敗後的顯示
                    break;
                  case "Forgot Form":
                    $("#Forgot_pwd_wmsg").html(error_show);
                    $("#forgotModal").modal();//失敗後的顯示
                    break;
                  default:
                    break;
              }

            @endif

            //re post to shopping cart
            @if (Session::has('repost'))
                
                //set default value
                $("#people_order").val("{{ Session::get('people_order') }}");
                $("#method_way").val("{{ Session::get('method_way') }}")
                
                {{ Session::forget('people_order') }}
                {{ Session::forget('method_way') }}

                $("#add-to-cart").trigger("click");
                return false;
            @endif
        });
    </script>

    <!--buy next time-->
    <script>
        $(function () {
          $("#bnt-btn").click(function() {

            @if (Auth::check())
              if ($("#bnt-btn").children().hasClass("fa fa-heart-o")) {
                  postBuyNextTime();
                  $("#bnt-btn").children().removeClass("fa fa-heart-o").addClass("fa fa-heart");
              } else {
                  postBuyNextTime();
                  $("#bnt-btn").children().removeClass("fa fa-heart").addClass('fa fa-heart-o');
              }
            @else
              $("#myModal").modal();
            @endif

          });

          function postBuyNextTime() {
            var user_id = {{ Auth::check() ? Auth::user()->id : 0 }};
            var datetimepeople_id = {{ $datetimepeople->id }};
            var token = '{{ Session::token() }}';

            var url = '{{ route('product.cart.buynexttime') }}';

            $.ajax({
                method: 'POST',
                url: url,
                data: {user_id: user_id, datetimepeople_id: datetimepeople_id, _token: token},
                // success : function(data){
                //     alert('success');
                // },
                // error : function(data){
                //     alert('failure');
                // },
            });
          }
        });
    </script>

    <!--reserve meal-->
    <script>
      $(function () {
        $("#reserve").click(function() {

          @if (Auth::check())
            postReserveMeal();
          @else
            $("#myModal").modal();
          @endif

        });

        function postReserveMeal() {
          var user_id = {{ Auth::check() ? Auth::user()->id : 0 }};
          var meal_id = {{ $meal->id }};
          var token = '{{ Session::token() }}';

          var url = '{{ route('product.cart.addreversemeal') }}';

          $.ajax({
                method: 'POST',
                url: url,
                data: {user_id: user_id, meal_id: meal_id, _token: token},
                success : function(data){
                    $("#shopping-link")[0].click();
                },
                error : function(data){
                    //alert('failure');
                },
            });
        }
      });
    </script>

    <!--swipe image btn-->
    <script>
      $(function () {
        $("#image_btn").click(function() {
          $("#image_link")[0].click();
        });
      });
    </script>
@endsection