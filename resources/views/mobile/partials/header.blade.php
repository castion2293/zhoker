<!-- Navbar (sit on top) -->
  <div class="w3-top">
    <ul class="w3-navbar" id="myNavbar">
        <li><a href="{{ route('home.index') }}" class="w3-padding-large w3-xlarge w3-left listcolor" id="hometag">Zhoker</a></li>
        <li class="">
          <a href="#" class="w3-padding-large w3-xlarge w3-right w3-opennav listcolor"><i class="fa fa-bars"></i></a>
        </li>
    </ul>
  </div>

<!-- Sidebar (sit on top) in small screen -->
  <nav class="w3-sidenav w3-white w3-animate-right" style="display:none;z-index:5;right:0;width:50%">
    @if (Auth::check())
       @if (Auth::user()->isChef() && Session::get('login') == 'chef')
          <a href="{{ route('home.index') }}" class="w3-hover-green w3-large"><i class="fa fa-home"></i> Home</a>
          <a href="{{ url('/chef_content') }}" class="w3-hover-green w3-large w3-margin-top"><i class="fa fa-cutlery"></i> Chef</a>
          <a href="{!! route('order.cheforder', ['id' => Auth::user()->chef_id]) !!}" class="w3-hover-green w3-large w3-margin-top"><i class="fa fa-credit-card"></i> Order</a>
          <a href="{{ url('/chef') }}" class="w3-hover-green w3-large w3-margin-top"><i class="fa fa-th-list"></i> Menu</a>
          <a href="{{url('/chef/create')}}" class="w3-hover-green w3-large w3-margin-top"><i class="fa fa-pencil-square-o"></i> Create</a>
          <a href="{{ url('/chef_profile') }}" class="w3-hover-green w3-large w3-margin-top"><i class="fa fa-cog"></i> Seting</a>
          <a href="#" class="w3-hover-green w3-large"><i class="fa fa-book w3-margin-top"></i> Help</a>
          <hr>
          <a href="{{ route('logout') }}" class="w3-hover-green w3-large"><i class="fa fa-sign-out"></i> LogOut</a>
       @else
          <div class="w3-margin-left">
            @if (Auth::user()->user_profile_img != null)
              <img src="{{ asset(Auth::user()->user_profile_img) }}" class="w3-circle w3-margin-top w3-margin-right" style="width:35px;height:35px;">
            @else
              <img src="{{ URL::to('img\default-user-icon-profile.png') }}" class="w3-circle w3-margin-top w3-margin-right" style="width:35px;height:35px;">
            @endif
          </div>
          <hr>
          <a href="{{ route('home.index') }}" class="w3-hover-green w3-large"><i class="fa fa-home"></i> Home</a>
          <a href="{{ url('/user_profile') }}" class="w3-hover-green w3-large w3-margin-top"><i class="fa fa-user"></i> Profile</a>
          <a href="{!! route('product.cart.show', ['id' => Auth::user()->id]) !!}" class="w3-hover-green w3-large w3-margin-top"><i class="fa fa-shopping-cart"></i> Shopping Cart</a>
          <a href="{!! route('order.userorder', ['id' => Auth::user()->id]) !!}" class="w3-hover-green w3-large w3-margin-top"><i class="fa fa-credit-card"></i> Order</a>
          <a href="{{ url('/user_profile/create') }}" class="w3-hover-green w3-large w3-margin-top"><i class="fa fa-cog"></i> Seting</a>
          <a href="#" class="w3-hover-green w3-large w3-margin-top"><i class="fa fa-book"></i> Help</a>
          <hr>
          <a href="{{ route('logout') }}" class="w3-hover-green w3-large"><i class="fa fa-sign-out"></i> LogOut</a>
       @endif
    @else
      <a href="{{ route('home.index') }}" class="w3-hover-green w3-large"><i class="fa fa-home"></i> Home</a>
      <a href="#" class="w3-hover-green w3-large w3-margin-top" id="chef-bar"><i class="fa fa-cutlery"></i> Chef</a>
      <a href="#" class="w3-hover-green w3-large w3-margin-top"><i class="fa fa-book"></i> Help</a>
      <hr>
      <a href="#" class="w3-hover-green w3-large" id="sign-up-bar"><i class="fa fa-pencil"></i> Sign Up</a>
      <a href="#" class="w3-hover-green w3-large w3-margin-top" id="sign-in-bar"><i class="fa fa-sign-in"></i> Sign In</a>
    @endif
  </nav>

<!--Sign In Modal -->
  <div class="modal" id="myModal" role="dialog" style="width:100%;">
    <div class="modal-dialog">

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
            <div class="w3-row">
              <div class="w3-col s8">
                  <span class="w3-text-grey w3-medium">Sing in with
                    <a href="{{ url('/auth/facebook') }}"><i class="fa fa-facebook-square w3-xxlarge w3-text-indigo" style="margin-left:5px;"></i></a>
                    <i class="fa fa-google-plus-square w3-xxlarge w3-text-red" style="margin-left:10px;"></i>
                  </span>
              </div>
              <div class="w3-col s4" style="">
                  <button type="submit" class="btn w3-green btn-block"><span class="glyphicon glyphicon-off w3-medium"></span> Sign In</button>
              </div>
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
  <div class="modal" id="forgotModal" role="dialog" style="width:100%;">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div>
          <span class="glyphicon glyphicon-remove pull-right w3-large" data-dismiss="modal" style="cursor:pointer;margin-right:20px;margin-top:10px"></span>
        </div>
        <div>
          <h1 class="w3-xxlarge w3-text-green w3-center">Forgot Password</h1>
        </div>
        <div class="modal-body" style="">
          <div class="w3-center">
            <span class="w3-medium w3-text-black w3-center">To reset your password, please enter the email address you sign in before</span>
          </div>
          {!! Form::open(['route' => 'postPasswordEmail', 'class' => 'form-horizontal', 'style' => 'margin:10px', 'method' => 'POST']) !!}
            <div class="w3-row">
              <div class="w3-col s10" style="margin-top:1px; padding-right:3px;">
                {{ Form::email('email', null, ['class' => 'form-control w3-medium', 'placeholder' => 'Email Address']) }}
                <label class="w3-text-red w3-large" id="Forgot_pwd_wmsg"></label>
              </div>
              <div class="w3-col s2">
                {{ Form::submit('Send', ['class' => 'w3-btn w3-green w3-round w3-medium col-sm-2 w3-hover-dark-grey', 'style' => 'height:35px']) }}
              </div>
              <div class="w3-col s12">
                <span class="w3-large w3-text-green" data-dismiss="modal" data-toggle="modal" data-target="#myModal" style="cursor:pointer;">Back to Sign in</span>
              </div>
            </div>
          {!! Form::close() !!}
        </div>
      </div>

    </div>
  </div>

<!--Sign up Modal-->
  <div class="modal" id="signupModal" role="dialog" style="width:100%;">
    <div class="modal-dialog">

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
                <div class="w3-margin-top">
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
                <div class="w3-row">
                  <div class="w3-col s8">
                      <span class="w3-text-grey w3-medium">Sign up with
                      <i class="fa fa-facebook-square w3-xxlarge w3-text-indigo" style="margin-left:5px;"></i>
                      <i class="fa fa-google-plus-square w3-xxlarge w3-text-red" style="margin-left:5px;"></i>
                      </span>
                  </div>
                  <div class="w3-col s4">
                      <button type="submit" class="btn w3-green btn-block w3-left"><span class="glyphicon glyphicon-user w3-medium"></span> Sign Up</button>
                  </div>
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

<!--Chef Sign In Modal -->
  <div class="modal" id="chefModal" role="dialog" style="width:100%;">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div>
          <span class="glyphicon glyphicon-remove pull-right w3-large" data-dismiss="modal" style="cursor:pointer;margin-right:20px;margin-top:10px"></span>
        </div>
        <div>
          <h1 class="text-center w3-padding-8 w3-text-green">Chef Sign In</h1>
        </div>
        <div class="modal-body" style="padding:10px 50px;">
          {!! Form::open(['route' => 'main.cheflogin', 'data-parsley-validate' => '', 'method' => 'POST']) !!}
            <div class="form-group">
              <label for="email" class="w3-text-grey"><span class="fa fa-envelope w3-large"></span> Email</label>
              {{ Form::email('email', null, ['class' => 'form-control w3-large', 'required' => '', 'placeholder' => 'Enter Email']) }}              
            </div>
            <div class="form-group">
              <label for="password" class="w3-text-grey"><span class="glyphicon glyphicon-eye-open w3-large"></span> User Password</label>
              {{ Form::password('password',['class' => 'form-control w3-large', 'required' => '', 'placeholder' => 'Enter Password']) }}
              <span class="w3-text-green" data-dismiss="modal" data-toggle="modal" data-target="#forgotModal" style="cursor:pointer;">Forgot Password?</span>
            </div>
            <div class="form-group">
              <label for="chef_psw" class="w3-text-grey"><span class="glyphicon glyphicon-cutlery w3-large"></span> Chef Password</label>
              {{ Form::password('chef_psw',['class' => 'form-control w3-large', 'required' => '', 'placeholder' => 'Enter Password']) }}
              <a href="#" style="text-decoration:none;"><span class="w3-text-green">Forgot Chef Password?</span></a>
              <label class="w3-text-red w3-large" id="chef_wmsg"></label>
            </div>
            <div class="checkbox">
              <label class="w3-text-grey"><input type="checkbox" value="" checked>Remember me</label>
              <button type="submit" class="btn btn-success pull-right"><span class="glyphicon glyphicon-off w3-large"></span> Sign In</button>
            </div>
          {!! Form::close() !!}
        </div>
        <div class="modal-footer">
          <p class="text-center w3-large">
            <span class="w3-text-grey w3-large w3-center">Not a Chef ?
              <a href="#" style="text-decoration:none;">
                <span class="w3-text-deep-orange">Become a Chef</span>
                <img src="{{ URL::to('img/marker.png') }}" alt="marker1" style="width:8%;height:8%;">
              </a>
            </span>
          </p>
        </div>
      </div>

    </div>
  </div>

  <div class="w3-overlay w3-animate-opacity" style="cursor:pointer"></div>

<!--SignIn and SignUp Error show-->
<script>
  $(function () {
      @if (!Auth::check())
        var error_show = '';
        
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

          $("#sign-in-bar").click(function(){
            $("#myModal").modal();
          });
          $("#sign-up-bar").click(function(){
            $("#signupModal").modal();
          });
          $("#chef-bar").click(function(){
            $("#chefModal").modal();
          });
        @else
        
          //Show Chef Login Error message
          @if (Session::has('ChefError'))
            $("#chef_wmsg").text('{{ Session::get('ChefError') }}');
            $("#chefModal").modal();
          @endif

          $("#sign-in-bar").click(function(){
            $("#myModal").modal();
          });
          $("#sign-up-bar").click(function(){
            $("#signupModal").modal();
          });
          $("#chef-bar").click(function(){
            $("#chefModal").modal();
          });
        @endif

      @endif
    
  });
</script>