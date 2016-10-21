<!-- Navbar (sit on top) -->
  <div class="w3-top w3-white w3-border-bottom w3-border-grey" style="height:10%;">
    <ul class="w3-navbar" id="myNavbar">
      @if (Auth::check())
        <li>
            <a href="{{ route('home.index') }}" class="w3-padding-large w3-xlarge w3-left w3-text-grey" id="hometag">Zhoker</a>
        </li>
        <li class="w3-hide-small w3-right">
            <a href="{{ route('logout') }}" class="w3-padding-large w3-xlarge w3-text-grey" id="sign-out-bar" ><i class="fa fa-sign-out"></i><span class="w3-large"> LogOut</span></a>
        </li>
      @else
        <li>
            <a href="{{ route('home.index') }}" class="w3-padding-large w3-xlarge w3-left w3-text-grey" id="hometag">Zhoker</a>
        </li>
        <li class="w3-right">
            <a href="#" class="w3-padding-large w3-xlarge w3-text-grey" id="sign-in-bar" ><i class="fa fa-sign-in"></i><span class="w3-large"> SignIn</span></a>
        </li>
        <li class="w3-right">
            <a href="#" class="w3-padding-large w3-xlarge w3-text-grey" id="sign-up-bar"><i class="fa fa-user"></i><span class="w3-large"> SignUp</span></a>
        </li>
        <li class="w3-right">
            <a href="#" class="w3-padding-large w3-xlarge w3-text-grey" id=""><i class="fa fa-cutlery"></i><span class="w3-large"> Chef</span></a>
        </li>
        <li class="w3-right">
            <a href="#" class="w3-padding-large w3-xlarge w3-text-grey" id="filter"><i class="fa fa-sliders"></i><span class="w3-large"> Filter</span></a>
        </li>
      @endif
    </ul>
  </div>

  <!--Filter Modal -->
  <div class="modal" id="filterModal" role="dialog">
    <div class="modal-dialog" style="width:500px;">

      <!-- Modal content-->
      <div class="modal-content">
        <div>
          <span class="glyphicon glyphicon-remove pull-right w3-large" data-dismiss="modal" style="cursor:pointer;margin-right:20px;margin-top:10px"></span>
        </div>
        <div>
          <h1 class="text-center w3-padding-8 w3-text-green">Search</h1>
          <ul class="nav nav-tabs nav-justified">
            <li class="active"><a data-toggle="tab" href="#basic">Basic</a></li>
            <li><a data-toggle="tab" href="#advanced">Advanced</a></li>
            <li><a data-toggle="tab" href="#detailed">Detailed</a></li>
          </ul>
        </div>

        {!! Form::open(['route' => 'main.maplist', 'data-parsley-validate' => '', 'method' => 'POST']) !!}
        <div class="modal-body" style="padding:10px 50px;">
            <div class="tab-content">
              <div id="basic" class="tab-pane fade in active">
                <div class="form-group">
                  <label for="city" class="w3-text-grey"><span class="fa fa-map-marker w3-large"></span> City</label>
                  {{ Form::text('city', null, ['class' => 'form-control w3-large w3-khaki', 'required' => '']) }}              
                </div>
                <div class="form-group">
                  <label for="date" class="w3-text-grey"><span class="fa fa-calendar-o w3-large"></span> Date</label>
                  {{ Form::text('date', null, ['class' => 'form-control w3-large w3-khaki w3-text-grey', 'id' => 'datepicker', 'required' => '', 'readonly' => '', 'style' => 'font-weight:bold;cursor:pointer;']) }}
                </div>
                <div class="form-group">
                  <label for="shift" class="w3-text-grey"><span class="fa fa-clock-o w3-large"></span> Time</label>
                  <select class="w3-select w3-border w3-text-grey w3-khaki w3-large cs-select cs-skin-elastic" name="shift" style="height:50px;">
                    <option class="w3-text-grey w3-large">All</option>
                    <option class="w3-text-grey w3-large">Dinner</option>
                    <option class="w3-text-grey w3-large">Lunch</option>
                    <option class="w3-text-grey w3-large">Brunch</option>
                    <option class="w3-text-grey w3-large">Breakfast</option>
                    <option class="w3-text-grey w3-large">Tea Time</option>
                  </select>              
                </div>
              </div>
              <div id="advanced" class="tab-pane fade">
                <div class="form-group">
                  <label for="minPrice" class="w3-text-grey"><span class="fa fa-money w3-large"></span> Price</label>
                  <div class="row">
                    <div class="col-md-5">
                      {{ Form::text('minPrice', null, ['class' => 'form-control w3-large w3-text-grey w3-khaki', 'placeholder' => 'Min', 'style' => 'font-weight:bold;']) }}
                    </div>
                    <div class="col-md-2">
                      <span class="w3-large w3-center w3-text-grey"> TO </span>
                    </div>
                    <div class="col-md-5">
                      {{ Form::text('maxPrice', null, ['class' => 'form-control w3-large w3-text-grey w3-khaki', 'placeholder' => 'Max', 'style' => 'font-weight:bold;']) }}
                    </div>
                  </div>
                </div>
                <div class="form-group w3-padding-12">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="people" class="w3-text-grey"><span class="fa fa-users w3-large"></span> People left</label>
                      <select class="w3-select w3-border w3-text-grey w3-khaki w3-large cs-select cs-skin-elastic" name="people">
                        <option class="w3-text-grey w3-white w3-large">All</option>
                        <option class="w3-text-grey w3-white w3-large">1 Person left</option>
                        <option class="w3-text-grey w3-white w3-large">2 People left</option>
                        <option class="w3-text-grey w3-white w3-large">3 People left</option>
                        <option class="w3-text-grey w3-white w3-large">4 People left</option>
                        <option class="w3-text-grey w3-white w3-large">5 People left</option>
                        <option class="w3-text-grey w3-white w3-large">6 People left</option>
                        <option class="w3-text-grey w3-white w3-large">7 People left</option>
                        <option class="w3-text-grey w3-white w3-large">8 People left</option>
                        <option class="w3-text-grey w3-white w3-large">9 People left</option>
                        <option class="w3-text-grey w3-white w3-large">10 People left</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="method" class="w3-text-grey"><span class="fa fa-reply w3-large"></span> Method</label>
                      <select class="w3-select w3-border w3-text-grey w3-khaki w3-large cs-select cs-skin-elastic" name="method">
                        <option class="w3-text-grey w3-white w3-large">All</option>
                        <option class="w3-text-grey w3-white w3-large">In House</option>
                        <option class="w3-text-grey w3-white w3-large">To Go</option>
                        <option class="w3-text-grey w3-white w3-large">Delieve</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div id="detailed" class="tab-pane fade">
                <div class="form-group">
                  <label for="rank" class="w3-text-grey"><span class="fa fa-sort-numeric-asc w3-large"></span> Rank</label>
                  <select class="w3-select w3-border w3-text-grey w3-khaki w3-large cs-select cs-skin-elastic" name="rank">
                      <option class="w3-text-grey w3-white w3-large">Price Low->High</option>
                      <option class="w3-text-grey w3-white w3-large">Price High->Low</option>
                      <option class="w3-text-grey w3-white w3-large">Score High->Low</option>
                      <option class="w3-text-grey w3-white w3-large">Score Low->Hight</option>
                  </select>
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <div class="form-group">
            <button class="btn w3-center w3-border-green w3-large w3-green form-control">
              <span><i class="w3-text-shadow fa fa-search"></i>Search</span>
            </button>
          </div>
        </div>
        {!! Form::close() !!}
      </div>

    </div>
  </div>

  <!-- Sidebar (sit on top) in small screen -->
  <nav class="w3-sidenav w3-white w3-animate-left " style="display:none;z-index:5;left:0;width:50%">
  
    <div class="w3-container w3-content"style="">
      <div>
         <h1 class="w3-xxlarge w3-text-green w3-center">Search</h1>
      </div>
      
      {!! Form::open(['route' => 'main.maplist', null, 'method' => 'POST']) !!}
        <div class="w3-row">
          <div class="w3-col l6 m6 w3-padding">
              <span class="w3-text-grey w3-large">City:</span>
              {{ Form::text('city', null, ['class' => 'form-control w3-large w3-text-black inputbkg clickdown', 'required' => '', 'id' => 'eatlocation', 'style' => 'font-weight:bold;']) }}
          </div> 
          <div class="w3-col l6 m6 w3-padding">
              <span class="w3-text-grey w3-large">Date:</span>
              <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                  <span class="input-group-addon inputbkg clickdown"><span class="glyphicon glyphicon-calendar"></span></span>
                  {{ Form::text('date', null, ['class' => 'form-control w3-large w3-white w3-text-black inputbkg clickdown', 'required' => '', 'readonly' => '', 'style' => 'font-weight:bold;']) }}
              </div>
          </div>
        </div>
        <div class="w3-row">
            <div class="w3-col l4 m4 w3-padding">
              <span class="w3-text-grey w3-large">Time:</span>
              <select class="form-control w3-text-black w3-large inputbkg cs-select cs-skin-elastic clickdown" name="shift">
                <option class="w3-text-black w3-white w3-large">All</option>
                <option class="w3-text-black w3-white w3-large">Dinner</option>
                <option class="w3-text-black w3-white w3-large">Lunch</option>
                <option class="w3-text-black w3-white w3-large">Brunch</option>
                <option class="w3-text-black w3-white w3-large">Breakfast</option>
                <option class="w3-text-black w3-white w3-large">Tea Time</option>
              </select>
            </div>
            <div class="w3-col l4 m4 w3-padding">
                <span class="w3-text-grey w3-large">Max Price:</span>
                {{ Form::text('maxPrice', null, ['class' => 'form-control w3-large w3-text-black clickdown', 'required' => '', 'style' => 'font-weight:bold;']) }}
            </div>
            <div class="w3-col l4 m4 w3-padding">
                <span class="w3-text-grey w3-large">Min Price:</span>
                {{ Form::text('minPrice', null, ['class' => 'form-control w3-large w3-text-black clickdown', 'required' => '', 'style' => 'font-weight:bold;']) }}
            </div>
        </div>
        <div class="w3-row">
            <div class="w3-col l4 m4 w3-padding">
              <span class="w3-text-grey w3-large">People:</span>
              <select class="form-control w3-text-black w3-large inputbkg cs-select cs-skin-elastic" name="people">
                <option class="w3-text-black w3-white w3-large">All</option>
                <option class="w3-text-black w3-white w3-large">1 Person left</option>
                <option class="w3-text-black w3-white w3-large">2 People left</option>
                <option class="w3-text-black w3-white w3-large">3 People left</option>
                <option class="w3-text-black w3-white w3-large">4 People left</option>
                <option class="w3-text-black w3-white w3-large">5 People left</option>
                <option class="w3-text-black w3-white w3-large">6 People left</option>
                <option class="w3-text-black w3-white w3-large">7 People left</option>
                <option class="w3-text-black w3-white w3-large">8 People left</option>
                <option class="w3-text-black w3-white w3-large">9 People left</option>
                <option class="w3-text-black w3-white w3-large">10 People left</option>
              </select>
            </div>
            <div class="w3-col l4 m4 w3-padding">
                <span class="w3-text-grey w3-large">Method:</span>
                <select class="form-control w3-text-black w3-large inputbkg cs-select cs-skin-elastic clickdown" name="shift">
                  <option class="w3-text-black w3-white w3-large">All</option>
                  <option class="w3-text-black w3-white w3-large">In House</option>
                  <option class="w3-text-black w3-white w3-large">To Go</option>
                  <option class="w3-text-black w3-white w3-large">Delieve</option>
                </select>
            </div>
            <div class="w3-col l4 m4 w3-padding">
                <span class="w3-text-grey w3-large">Rank:</span>
                <select class="form-control w3-text-black w3-large inputbkg cs-select cs-skin-elastic clickdown" name="rank">
                  <option class="w3-text-black w3-white w3-large">Price Low->High</option>
                  <option class="w3-text-black w3-white w3-large">Price High->Low</option>
                  <option class="w3-text-black w3-white w3-large">Score High->Low</option>
                  <option class="w3-text-black w3-white w3-large">Score Low->Hight</option>
                </select>
            </div>
        </div>
        <button class="btn w3-right w3-border-green w3-large w3-green">
              <span><i class="w3-text-shadow fa fa-search"></i>Search</span>
        </button>
      {!! Form::close() !!}
    </div>
  </nav>

  <div class="w3-overlay w3-animate-opacity" style="cursor:pointer"></div>

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


  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <script type="text/javascript">
        $(".js-example-basic-multiple").select2();
  </script>

<!--Add DatetimePicker-->
<script src="{{ URL::to('js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
<!-- Animated Select Option -->
<script src="{{ URL::to('js/classie.js') }}"></script>
<script src="{{ URL::to('js/selectFx.js') }}"></script>
<!-- Animated Select option -->
<script>
	(function() {
		 [].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
			    new SelectFx(el);
		 } );
	})();
</script>


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
          $("#sign-up-bar").click(function(){
            $("#signupModal").modal();
          });
        @else
          $("#sign-in-bar").click(function(){
            $("#myModal").modal();
          });
          $("#sign-up-bar").click(function(){
            $("#signupModal").modal();
          });
        @endif

        //Filter click
        $("#filter").click(function(){
          $("#filterModal").modal();
        });

        //datetimepicker
        $( "#datepicker" ).datepicker();
  });
</script>
