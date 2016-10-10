@extends('layout.master')

@section('title', '| Home')

@section('styles')
    <!--Add DatetimePicker-->
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap-datetimepicker.min.css') }}">
    <!-- Animated Select Option -->
    <link rel="stylesheet" href="{{ URL::to('css/cs-select.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/cs-skin-elastic.css') }}">
@endsection

@section('content')
    <!-- First Parallax Image with Logo Text -->
    <div id="font" class="bgimg-1 w3-opacity w3-display-container">
        <div class="w3-center" style="padding-top:16em">
            <span class="w3-center w3-padding-xlarge w3-text-white w3-xxlarge w3-wide w3-text-shadow w3-animate-opacity">EATING</span><br>
            <span class="w3-center w3-padding-xlarge w3-text-white w3-xxlarge w3-wide w3-text-shadow w3-animate-opacity w3-hide-small
                ">Tasty and Fresh</span><br>
            <!--<span class="w3-center w3-text-white w3-xlarge w3-animate-opacity">-->
            <button class="w3-btn w3-transparent w3-border w3-round w3-xlarge w3-card-16 w3-hover-green w3-hover-border-green" id="orderbtn">
                <span class="w3-text-shadow">Order Now</span>
            </button>
        </div>

        <!--Input Form large medium screen-->
        <div class="w3-content w3-container w3-hide-small" style="padding-top:9em">
            {!! Form::open(['route' => 'main.maplist', 'data-parsley-validate' => '', 'method' => 'POST']) !!}
                <div class="w3-col l5 m5">
                    {{ Form::text('city', null, ['class' => 'w3-input w3-border w3-large w3-text-black inputbkg clickdown', 'required' => '', 'id' => 'eatlocation', 'style' => 'font-weight:bold;']) }}
                </div>
                <div class="w3-col l2 m2">
                    <select class="w3-select w3-border w3-text-black w3-large inputbkg cs-select cs-skin-elastic clickdown" name="shift" style="height:50px">
                        <option class="w3-text-black w3-white w3-large">Dinner</option>
                        <option class="w3-text-black w3-white w3-large">Lunch</option>
                        <option class="w3-text-black w3-white w3-large">Brunch</option>
                        <option class="w3-text-black w3-white w3-large">Breakfast</option>
                        <option class="w3-text-black w3-white w3-large">Tea Time</option>
                    </select>
                </div>
                <div class="input-group w3-col l4 m4 date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <span class="input-group-addon inputbkg clickdown"><span class="glyphicon glyphicon-calendar"></span></span>
                    {{ Form::text('date', null, ['class' => 'w3-input w3-border w3-large w3-text-black inputbkg clickdown', 'required' => '', 'placeholder' => 'Date', 'readonly' => '', 'style' => 'font-weight:bold;']) }}
                </div>
                <!--div class="w3-col l2 m2">
                    <select class="w3-select w3-border w3-text-black w3-large inputbkg cs-select cs-skin-elastic" style="height:50px">
                        <option class="w3-text-black w3-white w3-large">1 Person</option>
                        <option class="w3-text-black w3-white w3-large">2 People</option>
                        <option class="w3-text-black w3-white w3-large">3 People</option>
                        <option class="w3-text-black w3-white w3-large">4 People</option>
                        <option class="w3-text-black w3-white w3-large">5 People</option>
                        <option class="w3-text-black w3-white w3-large">6 People</option>
                        <option class="w3-text-black w3-white w3-large">7 People</option>
                        <option class="w3-text-black w3-white w3-large">8 People</option>
                        <option class="w3-text-black w3-white w3-large">9 People</option>
                        <option class="w3-text-black w3-white w3-large">10 People</option>
                    </select>
                </div-->
                <button class="w3-col l1 m1 w3-btn w3-border-green w3-large w3-green" style="height:50px">
                    <i class="w3-text-shadow fa fa-search"></i>
                </button>
            {!! Form::close() !!}
        </div>

         <!--Input Form small screen-->
        <div class="w3-content w3-container w3-hide-large w3-hide-medium" style="padding-top:9em">
            <form class="w3-row  w3-card-14">
                <div class="w3-col s10">
                <input class="w3-input w3-border w3-large w3-text-black inputbkg" type="text" value="Where to eat?" id="eatlocationSmall">
                </div>
                <button class="w3-col s2 w3-btn w3-border-green w3-large w3-green" style="height:50px">
                <i class="w3-text-shadow fa fa-search"></i>
                </button>
            </form>
        </div>

    </div>

     <!-- Container (About Section) -->
    <div class="w3-content w3-container w3-padding-64" id="about ">
        <h3 class="w3-center ">關於</h3>
        <p class="w3-center "><em>Zhoker</em></p>
        <p>"回家吃飯"是吃的共享經濟第一品牌。作為全國最大的家庭廚房共享平台，致力於挖掘美食達人，與身邊飯友共享家庭美味。
            平台經過實地上門認證、衛生標準核查、專業服務培訓和上門拍照試吃等，已發掘上萬家民間“美食家”。
            家廚以配送、上門自取、提供堂食等多種方式，為忙碌的上班族，不願下廚的年輕人提供安心可口的家常菜。
            解決對健康飲食的需求與富餘生產力的對接問題，創造一種全新的生活方式。</p>
        <div class="w3-row ">


        <!-- Hide this text on small devices -->
        <div class="w3-col w3-hide-small w3-section ">
            <p>"回家吃飯"是吃的共享經濟第一品牌。作為全國最大的家庭廚房共享平台，致力於挖掘美食達人，與身邊飯友共享家庭美味。
                平台經過實地上門認證、衛生標準核查、專業服務培訓和上門拍照試吃等，已發掘上萬家民間“美食家”。
                家廚以配送、上門自取、提供堂食等多種方式，為忙碌的上班族，不願下廚的年輕人提供安心可口的家常菜。
                解決對健康飲食的需求與富餘生產力的對接問題，創造一種全新的生活方式。</p>
        </div>
        </div>
    </div>

    <!--Carousel Photo show-->
    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">

        <div class="item w3-display-container active">
            <img src="{{ URL::to('img/DSC_0395.JPG') }}" alt="Food1" style="width:100%">
        </div>

        <div class="item w3-display-container">
            <img src="{{ URL::to('img/DSC_0394.JPG') }}" alt="Food3" style="width:100%">
        </div>

        <div class="item w3-display-container">
            <img src="{{ URL::to('img/DSC_0416.JPG') }}" alt="Food3" style="width:100%">
        </div>

        <div class="item w3-display-container">
            <img src="{{ URL::to('img/DSC_0417.JPG') }}" alt="Food3" style="width:100%">
        </div>

        <div class="item w3-display-container">
            <img src="{{ URL::to('img/DSC_0410.JPG') }}" alt="Food3" style="width:100%">
        </div>

        <div class="item w3-display-container">
            <img src="{{ URL::to('img/DSC_0419.JPG') }}" alt="Food3" style="width:100%">
        </div>

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true" style="opacity:0.4"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="opacity:0.4"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Container (Portfolio Section) -->
    <div class="w3-content w3-container w3-padding-64 ">
        <h3 class="w3-center ">MY WORK</h3>
        <p class="w3-center "><em>Here are some of my latest lorem work ipsum tipsum.<br> Click on the images to make them bigger</em></p><br>

        <!-- Responsive Grid. Four columns on tablets, laptops and desktops. Will stack on mobile devices/small screens (100% width) -->
        <div class="w3-row-padding w3-center ">
        <div class="w3-col m4 ">
            <a href="#pic1" data-toggle="collapse">
            <img src="https://c7.staticflickr.com/8/7665/28175883150_44dac7229f_z.jpg " alt="picture1" style="width:100% " class="w3-hover-shadow ">
            </a>
            <div id="pic1" class="collapse">
            <p>韓國出生的金大叔從小</p>
            <p>就喜愛下廚，從母親手</p>
            <p>中傳承了地道的韓國傳</p>
            </div>
        </div>

        <div class="w3-col m4 ">
            <a href="#pic2" data-toggle="collapse">
            <img src="https://c6.staticflickr.com/9/8736/28380400941_f64a8560b5_z.jpg" alt="picture2" style="width:100% " class="w3-hover-shadow ">
            </a>
            <div id="pic2" class="collapse">
            <p>小的時候姥姥經常給我</p>
            <p>做純正的炸醬麵和各重</p>
            <p>點心，所以我也學會</p>
            </div>
        </div>

        <div class="w3-col m4 ">
            <a href="#pic3" data-toggle="collapse">
            <img src="https://c4.staticflickr.com/9/8611/28380421891_67a0c3fbdb_z.jpg" alt="picture3" style="width:100% " class="w3-hover-shadow ">
            </a>
            <div id="pic3" class="collapse">
            <p>大塊大塊的帶肉羊骨，</p>
            <p>塞得滿滿的孜然羊肉肉</p>
            <p>夾饃，好客的草原名族</p>
            </div>
        </div>
        </div>

    </div>

@endsection

@section('scripts')
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
    <script>
    <!--DataTimePicker-->
    $(function () {
        $('.form_date').datetimepicker({
            language:  '',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });
    })
    </script>
@endsection