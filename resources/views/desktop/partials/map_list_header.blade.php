<!-- Navbar (sit on top) -->
  <div class="w3-top w3-white" style="height:10%;width:60%;">
    <ul class="w3-navbar" id="myNavbar">
      <li>
          <a href="#" class="w3-padding-large w3-xlarge w3-right w3-opennav w3-text-green"><i class="fa fa-sliders"></i></a>
      </li>
      <li>
          <a href="{{ route('home.index') }}" class="w3-padding-large w3-xlarge w3-left w3-text-green" id="hometag">Zhoker</a>
      </li>
      <li class="w3-right">
          <a href="#" class="w3-padding-large w3-xlarge w3-text-green"><i id="sign-in-bar" class="fa fa-sign-in"></i></a>
      </li>
    </ul>
  </div>

  <!-- Sidebar (sit on top) in small screen -->
  <nav class="w3-sidenav w3-white w3-animate-left " style="display:none;z-index:5;left:0;width:50%">
    <div class="w3-container w3-content"style="">
      <div>
         <h1 class="w3-xxlarge w3-text-green w3-center">Search</h1>
      </div>
      {!! Form::open(['route' => 'main.maplist', null, 'method' => 'POST']) !!}
        <div class="w3-row">
          <div class="w3-col l12 m12 w3-padding">
              {{ Form::text('city', null, ['class' => 'w3-input w3-border w3-large w3-text-black inputbkg clickdown', 'required' => '', 'id' => 'eatlocation', 'style' => 'font-weight:bold;']) }}
          </div> 
        </div>
        <button class="w3-btn w3-right w3-border-green w3-large w3-green">
              <span><i class="w3-text-shadow fa fa-search"></i>Search</span>
        </button>
      {!! Form::close() !!}
    </div>
  </nav>

  <div class="w3-overlay w3-animate-opacity" style="cursor:pointer"></div>


  <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <script type="text/javascript">
        $(".js-example-basic-multiple").select2();
  </script>

  <script>
  //sidebar display
  $(function() {
    $(".w3-opennav").click(function () {
        $(".w3-sidenav").css("display", "block");
        $(".w3-overlay").css("display", "block");
    });
    $(".w3-overlay").click(function () {
        $(".w3-sidenav").css("display", "none");
        $(".w3-overlay").css("display", "none");
    });
  })
  </script>
