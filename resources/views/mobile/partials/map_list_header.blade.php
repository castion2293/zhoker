<!-- Navbar (sit on top) -->
  <div class="w3-top w3-white w3-border-bottom w3-border-grey" style="height:10%;">
    <ul class="w3-navbar" id="myNavbar">
      <li>
          <a href="{{ route('home.index') }}" class="w3-padding-large w3-xlarge w3-left w3-text-grey" id="hometag">Zhoker</a>
      </li>
      <li class="">
          <a href="#" class="w3-padding-large w3-xlarge w3-right w3-text-grey" id="filter"><i class="fa fa-sliders"></i><span class="w3-large"></span></a>
      </li>
    </ul>
  </div>

  <!-- Sidebar (sit on top) in small screen -->
  <nav class="w3-sidenav w3-white w3-animate-left" style="display:none;z-index:5;left:0;width:100%">

    <!--content-->
    <div class="w3-content w3-container w3-padding-8" id="chef-create">
        <div>
          <span class="glyphicon glyphicon-remove pull-right w3-large w3-text-grey" id="close_filter" style="cursor:pointer;margin-right:20px;margin-top:10px"></span>
        </div>
        <div class="">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">Detailed Search<h1>
        </div>

        {!! Form::open(['route' => 'maplist.detailed', 'data-parsley-validate' => '', null, 'method' => 'POST']) !!}
            <div class="w3-row">
               <div class="w3-col s12">
                  <div class="w3-margin-top">
                    <img src="{{ URL::to('https://s3-us-west-2.amazonaws.com/zhoker/images/1026201601.png') }}" alt="profile" style="width:100%">
                  </div>
                </div>
                <div class="w3-col s12">
                  <div style="margin-top:1em;">
                      <label class="w3-text-grey w3-large" style="font-family:cursive">City</label>
                      <input type="text" name="city" placeholder="City" value="{{ old('city') }}" required maxlength="255" class="w3-input w3-border w3-border-grey w3-large w3-text-grey">
                  </div>
                  <div class="" style="margin-top:1em;">
                      <label class="w3-text-grey w3-large" style="font-family:cursive">Date</label>
                      <div class="input-group">
                          {{ Form::text('date', null, ['class' => 'w3-input w3-border w3-large w3-text-grey', 'id' => 'datepicker', 'required' => '', 'placeholder' => 'Date', 'style' => 'font-weight:bold;cursor:pointer;"']) }}
                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                      </div>
                  </div>
                  <div class="" style="margin-top:1em;">
                      <label class="w3-text-grey w3-large" style="font-family:cursive">Price Range</label>
                      <div class="w3-row">
                        <div class="w3-col s4">
                            {{ Form::text('minPrice', null, ['class' => 'w3-input w3-border w3-medium w3-text-grey', 'placeholder' => 'MIN']) }}
                        </div>
                        <div class="w3-col s1">
                            <label class="w3-small w3-text-grey w3-padding-small" style="font-weight:bold;font-family:cursive;margin-top:0.5em;">TWD<label>
                        </div>
                        <div class="w3-col s2 w3-center">
                          <span class="w3-large w3-text-grey" style="font-weight:bold;font-family:cursive;line-height:2em;padding-left:0.5em;">~</span>
                        </div>
                        <div class="w3-col s4">
                          {{ Form::text('maxPrice', null, ['class' => 'w3-input w3-border w3-medium w3-text-grey', 'placeholder' => 'MAX']) }}
                        </div>
                        <div class="w3-col s1">
                            <label class="w3-small w3-text-grey w3-padding-small" style="font-weight:bold;font-family:cursive;margin-top:0.5em;">TWD<label>
                        </div>
                      </div>
                  </div>
                  <div class="" style="">
                      <label class="w3-text-grey w3-large" style="font-family:cursive">Time</label>
                      <select class="form-control w3-text-grey w3-large" name="shift" id="shift">
                        <option class="w3-text-grey w3-white w3-large">All</option>
                        <option class="w3-text-grey w3-white w3-large">Dinner</option>
                        <option class="w3-text-grey w3-white w3-large">Lunch</option>
                        <option class="w3-text-grey w3-white w3-large">Brunch</option>
                        <option class="w3-text-grey w3-white w3-large">Breakfast</option>
                        <option class="w3-text-grey w3-white w3-large">Tea Time</option>
                      </select>
                  </div>
                  <div class="" style="margin-top:1em;">
                     <label class="w3-text-grey w3-large" style="font-family:cursive">People Left</label>
                     <select class="form-control w3-text-grey w3-large" name="people" id="people">
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
                  <div class="" style="margin-top:1em;">
                     <label class="w3-text-grey w3-large" style="font-family:cursive">Method</label>
                     <select class="form-control w3-text-grey w3-large" name="method" id="method">
                        <option class="w3-text-grey w3-white w3-large">All</option>
                        <option class="w3-text-grey w3-white w3-large">In House</option>
                        <option class="w3-text-grey w3-white w3-large">To Go</option>
                        <option class="w3-text-grey w3-white w3-large">Delieve</option>
                     </select>
                  </div>
                  <div class="" style="margin-top:1em;">
                     <label class="w3-text-grey w3-large" style="font-family:cursive">Sorting</label>
                     <select class="form-control w3-text-grey w3-large" name="sort" id="sort">
                        <option class="w3-text-grey w3-white w3-large" value="1">Price Low->High</option>
                        <option class="w3-text-grey w3-white w3-large" value="2">Price High->Low</option>
                     </select>
                  </div>
                  <div class="" style="margin-top:1em;">
                     <label class="w3-text-grey w3-large" style="font-family:cursive">Type</label>
                     <div class="w3-row w3-padding-small w3-border w3-border-grey w3-round-large">
                        <div class="w3-col s6">
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select1" value="1">
                              <label class="w3-validate">American</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select3" value="3">
                              <label class="w3-validate">Barbecue</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select5" value="5">
                              <label class="w3-validate">Chinese</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select7" value="7">
                              <label class="w3-validate">French</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select9" value="9">
                              <label class="w3-validate">Italian</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select11" value="11">
                              <label class="w3-validate">Japanese</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select13" value="13">
                              <label class="w3-validate">Mexican</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select15" value="15">
                              <label class="w3-validate">Middle East</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select17" value="17">
                              <label class="w3-validate">Thai</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select19" value="19">
                              <label class="w3-validate">Indian</label>
                            </p>
                        </div>
                        <div class="w3-col s6">
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select2" value="2">
                              <label class="w3-validate">Asian</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select4" value="4">
                              <label class="w3-validate">Brazilian</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select6" value="6">
                              <label class="w3-validate">European</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select8" value="8">
                              <label class="w3-validate">Hawaiian</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select10" value="10">
                              <label class="w3-validate">Indonesian</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select12" value="12">
                              <label class="w3-validate">Korean</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select14" value="14">
                              <label class="w3-validate">Mediterr</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select16" value="16">
                              <label class="w3-validate">Seafood</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select18" value="18">
                              <label class="w3-validate">Vegatarian</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" id="select0" value="0">
                              <label class="w3-validate">All</label>
                            </p>
                        </div>
                     </div>
                  </div>
                </div>
            </div>
      
            <div class="w3-row w3-margin-top">
                <div class="w3-rest"></div>
                <div class="w3-col l2 m2 w3-right">
                    {!! Form::submit('Search', ['class' => 'btn w3-green btn-block']) !!}
                </div>
            </div>  
        {!! Form::close() !!}
    </div>

  </nav>

  <div class="w3-overlay w3-animate-opacity" style="cursor:pointer"></div>

<script type="text/javascript">
      $(".js-example-basic-multiple").select2();
</script>

<!--Add DatetimePicker-->
<!--script src="{{ URL::to('js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script-->
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

        $("#filter").click(function(){
          $(".w3-sidenav").css("display","block");
          $(".w3-overlay").css("display","block"); 
        });
        $("#close_filter").click(function(){
          $(".w3-sidenav").css("display","none");
          $(".w3-overlay").css("display","none");
        });

        // datepicker
        $(function () {
            $("#datepicker").datetimepicker({
                format: 'YYYY-MM-DD'
            });
        });

        //Type check box
        $("#select0").change(function(){
            if( $("#select0").is(':checked') ) {
              $('.w3-check').prop('checked', true);
            } else {
              $('.w3-check').prop('checked', false);
            }
        });

        //set default value
        $("#shift").val("{{ old('shift') }}");
        $("#people").val("{{ old('people') }}");
        $("#method").val("{{ old('method') }}");
        $("#sort").val("{{ old('sort') }}");
        
        @if (old('type') != null) 
          @foreach (old('type') as $type)
            $('#select{{ $type }}').prop('checked', true);
          @endforeach
        @endif
        
  });
</script>
