<!-- Navbar (sit on top) -->
  <div class="w3-top w3-white w3-border-bottom w3-border-grey" style="height:10%">
    <ul class="w3-navbar" id="myNavbar">
      <li>
          <a href="{{ route('home.index') }}" class="w3-padding-large w3-xlarge w3-left w3-text-grey" id="hometag">Zhoker</a>
      </li>
      <!--li class="w3-right">
          <a href="#" class="w3-padding-large w3-xlarge w3-text-grey" id="sign-in-bar" ><i class="fa fa-sign-in"></i><span class="w3-large"> SignIn</span></a>
      </li>
      <li class="w3-right">
          <a href="#" class="w3-padding-large w3-xlarge w3-text-grey" id="sign-up-bar"><i class="fa fa-user"></i><span class="w3-large"> SignUp</span></a>
      </li>
      <li class="w3-right">
          <a href="#" class="w3-padding-large w3-xlarge w3-text-grey" id=""><i class="fa fa-cutlery"></i><span class="w3-large"> Chef</span></a>
      </li-->
      <li class="w3-right">
          <a href="#" class="w3-padding-large w3-xlarge w3-text-grey" id="filter"><i class="fa fa-sliders"></i><span class="w3-large"> {{ $lang->desktop()['maplist_header']['filter'] }}</span></a>
      </li>
    </ul>
  </div>

  <!-- Sidebar (sit on top) in small screen -->
  <nav class="w3-sidenav w3-white w3-animate-left" style="display:none;z-index:5;left:0;width:60%">

    <!--content-->
    <div class="w3-content w3-container w3-padding-8" id="chef-create">
        <div class="">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['maplist_search']['detail_title'] }}</h1>
        </div>

        {!! Form::open(['route' => 'maplist.detailed', 'data-parsley-validate' => '', null, 'method' => 'POST']) !!}
            <div class="w3-row">
               <div class="w3-col l4 m4">
                  <div class="w3-margin-top">
                    <img src="{{ URL::to('https://s3.amazonaws.com/zhoker-pics/2018051804.JPG') }}" alt="profile" style="width:100%">
                  </div>
                </div>
                <div class="w3-col l8 m8" style="padding-left:2em;">
                  <div>
                      <label class="w3-text-grey w3-large" style="font-family:cursive">{{ $lang->desktop()['maplist_search']['city'] }}</label>
                      <input type="text" name="city" placeholder="{{ $lang->desktop()['maplist_search']['city'] }}" value="{{ old('city') }}" required maxlength="255" class="w3-input w3-border w3-border-grey w3-large w3-text-grey">
                  </div>
                  <div class="" style="margin-top:2em;">
                      <label class="w3-text-grey w3-large" style="font-family:cursive">{{ $lang->desktop()['maplist_search']['date'] }}</label>
                      <div class="input-group">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                          {{ Form::text('date', null, ['class' => 'w3-input w3-border w3-large w3-text-grey', 'id' => 'datepicker', 'required' => '', 'placeholder' => $lang->desktop()['maplist_search']['date'], 'style' => 'font-weight:bold;cursor:pointer;"']) }}
                      </div>
                  </div>
                  <div class="" style="margin-top:2em;">
                      <label class="w3-text-grey w3-large" style="font-family:cursive">{{ $lang->desktop()['maplist_search']['price_range'] }}</label>
                      <div class="w3-row">
                        <div class="w3-col l3 m3">
                            {{ Form::text('minPrice', null, ['class' => 'w3-input w3-border w3-large w3-text-grey', 'placeholder' => $lang->desktop()['maplist_search']['min'] ]) }}
                        </div>
                        <div class="w3-col l2 m2">
                            <label class="w3-large w3-text-grey w3-padding-small" style="font-weight:bold;font-family:cursive;">TWD</label>
                        </div>
                        <div class="w3-col l2 m2 w3-center">
                          <span class="w3-xxlarge w3-text-grey" style="font-weight:bold;font-family:cursive;line-height: 1.2em;">~</span>
                        </div>
                        <div class="w3-col l3 m3">
                          {{ Form::text('maxPrice', null, ['class' => 'w3-input w3-border w3-large w3-text-grey', 'placeholder' => $lang->desktop()['maplist_search']['max'] ]) }}
                        </div>
                        <div class="w3-col l2 m2">
                            <label class="w3-large w3-text-grey w3-padding-small" style="font-weight:bold;font-family:cursive;">TWD<label>
                        </div>
                      </div>
                  </div>
                </div>
            </div>
            <div class="w3-row w3-border-green w3-border-bottom w3-padding-12" style="margin-top:2em;">
                <div class="w3-col l3 m3" style="padding-left:2em;">
                  <div class="">
                      <label class="w3-text-grey w3-large" style="font-family:cursive">{{ $lang->desktop()['maplist_search']['time'] }}</label>
                      <select class="form-control w3-text-grey w3-large" name="shift" id="shift">
                        <option class="w3-text-grey w3-white w3-large" value="All">{{ $lang->desktop()['maplist_search']['all'] }}</option>
                        <option class="w3-text-grey w3-white w3-large" value="Dinner">{{ $lang->desktop()['maplist_search']['dinner'] }}</option>
                        <option class="w3-text-grey w3-white w3-large" value="Lunch">{{ $lang->desktop()['maplist_search']['lunch'] }}</option>
                        <option class="w3-text-grey w3-white w3-large" value="Brunch">{{ $lang->desktop()['maplist_search']['brunch'] }}</option>
                        <option class="w3-text-grey w3-white w3-large" value="Breakfast">{{ $lang->desktop()['maplist_search']['breakfast'] }}</option>
                        <option class="w3-text-grey w3-white w3-large" value="Tea Time">{{ $lang->desktop()['maplist_search']['tea_time'] }}</option>
                      </select>
                  </div>
                  <div class="">
                     <label class="w3-text-grey w3-large" style="font-family:cursive">{{ $lang->desktop()['maplist_search']['people_left'] }}</label>
                     <select class="form-control w3-text-grey w3-large" name="people" id="people">
                        <option class="w3-text-grey w3-white w3-large" value="1">1 {{ $lang->desktop()['maplist_search']['person'] }}</option>
                        <option class="w3-text-grey w3-white w3-large" value="2">2 {{ $lang->desktop()['maplist_search']['people'] }}</option>
                        <option class="w3-text-grey w3-white w3-large" value="3">3 {{ $lang->desktop()['maplist_search']['people'] }}</option>
                        <option class="w3-text-grey w3-white w3-large" value="4">4 {{ $lang->desktop()['maplist_search']['people'] }}</option>
                        <option class="w3-text-grey w3-white w3-large" value="5">5 {{ $lang->desktop()['maplist_search']['people'] }}</option>
                        <option class="w3-text-grey w3-white w3-large" value="6">6 {{ $lang->desktop()['maplist_search']['people'] }}</option>
                        <option class="w3-text-grey w3-white w3-large" value="7">7 {{ $lang->desktop()['maplist_search']['people'] }}</option>
                        <option class="w3-text-grey w3-white w3-large" value="8">8 {{ $lang->desktop()['maplist_search']['people'] }}</option>
                        <option class="w3-text-grey w3-white w3-large" value="9">9 {{ $lang->desktop()['maplist_search']['people'] }}</option>
                        <option class="w3-text-grey w3-white w3-large" value="10">10 {{ $lang->desktop()['maplist_search']['people'] }}</option>
                    </select>
                  </div>
                  <div class="">
                      <label class="w3-text-grey w3-large" style="font-family:cursive">{{ $lang->desktop()['maplist_search']['method'] }}</label>
                      <select class="form-control w3-text-grey w3-large" name="method" id="method">
                        <option class="w3-text-grey w3-white w3-large" value="All">{{ $lang->desktop()['maplist_search']['all'] }}</option>
                        <option class="w3-text-grey w3-white w3-large" value="In House">{{ $lang->desktop()['maplist_search']['house'] }}</option>
                        <option class="w3-text-grey w3-white w3-large" value="To Go">{{ $lang->desktop()['maplist_search']['to_go'] }}</option>
                        <option class="w3-text-grey w3-white w3-large" value="Delieve">{{ $lang->desktop()['maplist_search']['deliever'] }}</option>
                      </select>
                  </div>
                  <div class="">
                      <label class="w3-text-grey w3-large" style="font-family:cursive">{{ $lang->desktop()['maplist_search']['sorting'] }}</label>
                      <select class="form-control w3-text-grey w3-large" name="sort" id="sort">
                        <option class="w3-text-grey w3-white w3-large" value="1">{{ $lang->desktop()['maplist_search']['price_low'] }}</option>
                        <option class="w3-text-grey w3-white w3-large" value="2">{{ $lang->desktop()['maplist_search']['price_high'] }}</option>
                      </select>
                  </div>
                </div>
                <div class="w3-col l9 m9" style="padding-left:2em;">
                  <div class="">
                      <label class="w3-text-grey w3-large" style="font-family:cursive">{{ $lang->desktop()['maplist_search']['type'] }}</label>
                      <div class="w3-row w3-padding-small w3-border w3-border-grey w3-round-large">
                        <div class="w3-col l3 m3">
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select1" value="1">
                              <label class="w3-validate">{{ $lang->desktop()['maplist_search']['american'] }}</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select4" value="4">
                              <label class="w3-validate">{{ $lang->desktop()['maplist_search']['brazilian'] }}</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select7" value="7">
                              <label class="w3-validate">{{ $lang->desktop()['maplist_search']['french'] }}</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select12" value="12">
                              <label class="w3-validate">{{ $lang->desktop()['maplist_search']['korean'] }}</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select13" value="13">
                              <label class="w3-validate">{{ $lang->desktop()['maplist_search']['mexican'] }}</label>
                            </p>
                        </div>
                        <div class="w3-col l3 m3">
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select2" value="2">
                              <label class="w3-validate">{{ $lang->desktop()['maplist_search']['asian'] }}</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select5" value="5">
                              <label class="w3-validate">{{ $lang->desktop()['maplist_search']['chinese'] }}</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select19" value="19">
                              <label class="w3-validate">{{ $lang->desktop()['maplist_search']['indian'] }}</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select8" value="8">
                              <label class="w3-validate">{{ $lang->desktop()['maplist_search']['hawaiian'] }}</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select11" value="11">
                              <label class="w3-validate">{{ $lang->desktop()['maplist_search']['japanese'] }}</label>
                            </p>
                        </div>
                        <div class="w3-col l3 m3">
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select3" value="3">
                              <label class="w3-validate">{{ $lang->desktop()['maplist_search']['barbecue'] }}</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select6" value="6">
                              <label class="w3-validate">{{ $lang->desktop()['maplist_search']['european'] }}</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select9" value="9">
                              <label class="w3-validate">{{ $lang->desktop()['maplist_search']['italian'] }}</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select10" value="10">
                              <label class="w3-validate">{{ $lang->desktop()['maplist_search']['indonesian'] }}</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select17" value="17">
                              <label class="w3-validate">{{ $lang->desktop()['maplist_search']['thai'] }}</label>
                            </p>
                        </div>
                        <div class="w3-col l3 m3">
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select14" value="14">
                              <label class="w3-validate">{{ $lang->desktop()['maplist_search']['mediterr'] }}</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select16" value="16">
                              <label class="w3-validate">{{ $lang->desktop()['maplist_search']['seafood'] }}</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select18" value="18">
                              <label class="w3-validate">{{ $lang->desktop()['maplist_search']['vegatarian'] }}</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" name="type[]" id="select15" value="15">
                              <label class="w3-validate">{{ $lang->desktop()['maplist_search']['middle_east'] }}</label>
                            </p>
                            <p>
                              <input class="w3-check" type="checkbox" id="select0" value="0">
                              <label class="w3-validate">{{ $lang->desktop()['maplist_search']['all'] }}</label>
                            </p>
                        </div>
                      </div>
                  </div>
                </div>
            </div>
            <div class="w3-row w3-margin-top">
                <div class="w3-rest"></div>
                <div class="w3-col l2 m2 w3-right">
                    {!! Form::submit($lang->desktop()['maplist_search']['search'] , ['class' => 'btn w3-green btn-block']) !!}
                </div>
            </div>  
        {!! Form::close() !!}
    </div>

  </nav>

  <div class="w3-overlay w3-animate-opacity" style="cursor:pointer"></div>

  <!--script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script-->
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
        $(".w3-overlay").click(function(){
          $(".w3-sidenav").css("display","none");
          $(".w3-overlay").css("display","none");
        });

        // datepicker
        $(function () {
            $("#datepicker").datetimepicker({
                format: 'YYYY-MM-DD',
                minDate: moment()
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
        $("#shift").val("{{ count(old('shift')) ? old('shift') : 'All' }}");
        $("#people").val("{{ count(old('people')) ? old('people') : '1' }}");
        $("#method").val("{{ count(old('method')) ? old('method') : 'All' }}");
        $("#sort").val("{{ count(old('sort')) ? old('sort') : '1' }}");
        
        @if (old('type') != null) 
          @foreach (old('type') as $type)
            $('#select{{ $type }}').prop('checked', true);
          @endforeach
        @endif
        
  });
</script>
