<!-- Navbar (sit on top) -->
  <div class="w3-top">
    <ul class="w3-navbar" id="myNavbar">
      @if (Auth::check())
          <li><a href="#font" class="w3-padding-large w3-xlarge w3-left listcolor" id="hometag">Zhoker</a></li>
          <li class="w3-hide-small w3-right">
            <a href="{{ route('logout') }}" class="w3-padding-large w3-xlarge listcolor" id="sign-out-bar" ><i class="fa fa-sign-out"></i><span class="w3-large"> LogOut</span></a>
          </li>
          <li class="w3-hide-large w3-hide-medium">
            <a href="#" class="w3-padding-large w3-xlarge w3-right w3-opennav listcolor"><i class="fa fa-bars"></i></a>
          </li>
      @else
          <li><a href="#font" class="w3-padding-large w3-xlarge w3-left listcolor" id="hometag">Zhoker</a></li>
          <li class="w3-hide-small w3-right">
            <a href="#" class="w3-padding-large w3-xlarge listcolor" id="sign-in-bar" ><i class="fa fa-sign-in"></i><span class="w3-large"> SignIn</span></a>
          </li>
          <li class="w3-hide-small w3-right">
            <a href="#" class="w3-padding-large w3-xlarge listcolor" id="sign-up-bar"><i class="fa fa-user"></i><span class="w3-large"> SignUp</span></a>
          </li>
          <li class="w3-hide-small w3-right">
            <a href="#" class="w3-padding-large w3-xlarge listcolor" id=""><i class="fa fa-cutlery"></i><span class="w3-large"> Chef</span></a>
          </li>
          <li class="w3-hide-large w3-hide-medium">
            <a href="#" class="w3-padding-large w3-xlarge w3-right w3-opennav listcolor"><i class="fa fa-bars"></i></a>
          </li>
       @endif
    </ul>
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
                <i class="fa fa-facebook-square w3-xxlarge w3-text-indigo" style="margin-left:5px;"></i>
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
          {!! Form::open(['route' => 'register', 'data-parsley-validate' => '', 'method' => 'POST']) !!}
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


<!-- Sidebar (sit on top) in small screen -->
  <nav class="w3-sidenav w3-white w3-animate-right w3-hide-large w3-hide-medium" style="display:none;z-index:5;right:0;width:50%">
    <a href="#" class="w3-hover-green w3-large"><i class="fa fa-home"></i> Home</a>
    <a href="#" class="w3-hover-green w3-large"><i class="fa fa-android"></i> App</a>
    <a href="#" class="w3-hover-green w3-large"><i class="fa fa-cutlery"></i> Become a Chef</a>
    <a href="#" class="w3-hover-green w3-large"><i class="fa fa-bell-o"></i> Alert</a>
    <a href="#" class="w3-hover-green w3-large"><i class="fa fa-folder-open-o"></i> Inbox</a>
    <a href="#" class="w3-hover-green w3-large"><i class="fa fa-cart-arrow-down"></i> Discover</a>
    <a href="#" class="w3-hover-green w3-large"><i class="fa fa-search"></i> Search</a>
    <br>
    <a href="#" class="w3-hover-green w3-large"><i class="fa fa-book"></i> Help</a>
    <a href="#" class="w3-hover-green w3-large"><i class="fa fa-share-alt"></i> Invite Friends</a>
    <a href="#" class="w3-hover-green w3-large"><i class="fa fa-sign-in"></i> Log In</a>
  </nav>

  <div class="w3-overlay w3-animate-opacity" style="cursor:pointer"></div>

<!--SignIn and SignUp Error show-->
<script>
  $(function () {
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
        @else
          $("#sign-in-bar").click(function(){
            $("#myModal").modal();
          });
          $("#sign-up-bar").click(function(){
            $("#signupModal").modal();
          });
        @endif
    
  });
</script>