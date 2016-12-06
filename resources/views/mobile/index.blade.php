@extends('mobile.layout.master')

@section('title', '| Home')

@section('styles')
    <link rel="stylesheet" href="{{ URL::to('css/cs-select.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/cs-skin-elastic.css') }}">
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!-- First Parallax Image with Logo Text -->
    <div id="font" class="bgimg-1 w3-opacity w3-display-container">
        <div class="w3-center" style="padding-top:14em">
            <span class="w3-center w3-padding-xlarge w3-text-white w3-xlarge w3-wide w3-text-shadow w3-animate-opacity">EATING</span><br>
            <span class="w3-center w3-padding-xlarge w3-text-white w3-xlarge w3-wide w3-text-shadow w3-animate-opacity
                ">Tasty and Fresh</span><br>
            <!--<span class="w3-center w3-text-white w3-xlarge w3-animate-opacity">-->
            <a href="{{ route('maplist.search.get') }}" class="w3-btn w3-transparent w3-border w3-round w3-xlarge w3-card-16 w3-hover-green w3-hover-border-green" id="orderbtn">
                <span class="w3-text-shadow">Order Now</span>
            </a>
        </div>

        <!--Input Form small screen-->
        <div class="w3-content w3-container w3-hide-large w3-hide-medium" style="padding-top:9em">
            {!! Form::open(['route' => 'maplist', 'data-parsley-validate' => '', 'method' => 'POST']) !!}
                <div class="w3-row">
                    <div class="w3-col s10">
                        {{ Form::text('city', null, ['class' => 'w3-input w3-border w3-large w3-text-black inputbkg clickdown', 'required' => '', 'id' => 'eatlocation', 'style' => 'font-weight:bold;']) }}
                    </div>
                    <!--date and shift not display-->
                    <div style="display:none;">
                        {{ Form::text('shift', 'Dinner', ['required' => '']) }}
                        {{ Form::text('date', null, ['id' => 'default_date', 'required' => '']) }}
                    </div>
                    <button class="w3-col s2 w3-btn w3-border-green w3-large w3-green" style="height:50px">
                        <i class="w3-text-shadow fa fa-search"></i>
                    </button>
                </div>
            {!! Form::close() !!}
        </div>

    </div>

     <!-- Container (About Section) -->
    <div class="w3-content w3-container w3-padding-64" id="about ">
        <h3 class="w3-center ">關於</h3>
        <p class="w3-center "><em>Zhoker</em></p>
        <p>"回家吃飯"是吃的共享經濟第一品牌。作為全國最大的家庭廚房共享平台，致力於挖掘美食達人，與身邊飯友共享家庭美味。
            平台經過實地上門認證、衛生標準核查、專業服務培訓和上門拍照試吃等，已發掘上萬家民間“美食家”。
            家廚以配送、上門自取、提供堂食等多種方式，為忙碌的上班族，不願下廚的年輕人提供安心可口的家常菜。
            解決對健康飲食的需求與富餘生產力的對接問題，創造一種全新的生活方式。 </p>
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
            <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1128201601.jpg" alt="Food1" style="width:100%">
        </div>

        <div class="item w3-display-container">
            <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1128201605.jpg" alt="Food3" style="width:100%">
        </div>

        <div class="item w3-display-container">
            <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1128201602.jpg" alt="Food3" style="width:100%">
        </div>

        <div class="item w3-display-container">
            <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1128201604.jpg" alt="Food3" style="width:100%">
        </div>

        <div class="item w3-display-container">
            <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1128201603.jpg" alt="Food3" style="width:100%">
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
    <div class="w3-padding64 w3-content w3-container" style="margin-top:5em;">
        <h3 class="w3-center ">OUR CHEF</h3>
        <p class="w3-center "><em>Here are some of my latest lorem work ipsum tipsum.<br> Click on the images to make them bigger</em></p><br>

        <!--div class="w3-row-padding">
            <div class="w3-col l4 m4">
                <a href="#">
                    <div class="w3-display-container">
                        <img src="{{ URL::to('img/1128201612.JPG') }}" alt="picture1" style="width:100%;margin-bottom:0;">
                        <div class="w3-display-bottommiddle w3-deep-orange w3-text-white" style="width:100%;opacity:0.8;">
                            <h3 class="w3-xxlarge"><b>Mr. Smith</b></h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="w3-col l4 m4">
                <a href="#">
                    <div class="w3-display-container">
                        <img src="{{ URL::to('img/1128201613.JPG') }}" alt="picture1" style="width:100%;margin-bottom:0;">
                        <div class="w3-display-bottommiddle w3-deep-orange w3-text-white" style="width:100%;opacity:0.8;">
                            <h3 class="w3-xxlarge"><b>Mr. Smith</b></h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="w3-col l4 m4">
                <a href="#">
                    <div class="w3-display-container">
                        <img src="{{ URL::to('img/1128201614.JPG') }}" alt="picture1" style="width:100%;margin-bottom:0;">
                        <div class="w3-display-bottommiddle w3-deep-orange w3-text-white" style="width:100%;opacity:0.8;">
                            <h3 class="w3-xxlarge"><b>Mr. Smith</b></h3>
                        </div>
                    </div>
                </a>
            </div>
        </div-->
    </div>

    <!-- Container (Portfolio Section) -->
    <div class="w3-padding64 w3-content w3-container" style="margin-top:5em;">
        <h3 class="w3-center ">HOW TO WORK</h3>
        <p class="w3-center "><em>Here are some of my latest lorem work ipsum tipsum.<br> Click on the images to make them bigger</em></p><br>

        <div class="w3-row">
            <div class="w3-col s12 w3-center">
                <i class="fa fa-television w3-text-green" style="font-size:100px;"></i>
                <p class="w3-text-green w3-large"><b>1. Search online</b></p>
            </div>

            <div class="w3-col s12 w3-center" style="margin-top:5em;">
                <i class="fa fa-credit-card w3-text-green" style="font-size:100px;"></i>
                <p class="w3-text-green w3-large"><b>2. pay online</b></p>
            </div>

            <div class="w3-col s12 w3-center" style="margin-top:5em;">
                <i class="fa fa-cutlery w3-text-green" style="font-size:100px;"></i>
                <p class="w3-text-green w3-large"><b>3. Enjoy the meal</b></p>
            </div>
        </div>
    </div>

    <!-- Container (Portfolio Section) -->
    <div class="w3-padding-small" style="margin-top:5em;margin-bottom:5em;">
        <h3 class="w3-center ">WHAT WE SERVE</h3>
        <p class="w3-center "><em>Here are some of my latest lorem work ipsum tipsum.<br> Click on the images to make them bigger</em></p><br>

        <!-- Responsive Grid. Four columns on tablets, laptops and desktops. Will stack on mobile devices/small screens (100% width) -->
        <div class="w3-row-padding">
            <div class="w3-col s12">
                <a href="#">
                    <div class="w3-display-container img-wrapper">
                        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1128201606.jpg" alt="picture1" style="width:100%;margin-bottom:0;" class="zk-enlarge-hover">
                        <div class="w3-display-bottommiddle w3-deep-orange w3-text-white" style="width:100%;opacity:0.8;">
                            <h3 class="w3-xxlarge"><b>Chinese</b></h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="w3-col s12">
                <a href="#">
                    <div class="w3-display-container img-wrapper w3-margin-top">
                        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1128201607.jpg" alt="picture1" style="width:100%;margin-bottom:0;" class="zk-enlarge-hover">
                        <div class="w3-display-bottommiddle w3-deep-orange w3-text-white" style="width:100%;opacity:0.8;">
                            <h3 class="w3-xxlarge"><b>French</b></h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="w3-col s12">
                <a href="#">
                    <div class="w3-display-container img-wrapper w3-margin-top">
                        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1128201608.jpg" alt="picture1" style="width:100%;margin-bottom:0;" class="zk-enlarge-hover">
                        <div class="w3-display-bottommiddle w3-deep-orange w3-text-white" style="width:100%;opacity:0.8;">
                            <h3 class="w3-xxlarge"><b>Barbecu</b></h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="w3-col s12">
                <a href="#">
                    <div class="w3-display-container img-wrapper w3-margin-top">
                        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1128201609.jpg" alt="picture1" style="width:100%;margin-bottom:0;" class="zk-enlarge-hover">
                        <div class="w3-display-bottommiddle w3-deep-orange w3-text-white" style="width:100%;opacity:0.8;">
                            <h3 class="w3-xxlarge"><b>Seafood</b></h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="w3-col s12">
                <a href="#">
                    <div class="w3-display-container img-wrapper w3-margin-top">
                        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1128201610.jpg" alt="picture1" style="width:100%;margin-bottom:0;" class="zk-enlarge-hover">
                        <div class="w3-display-bottommiddle w3-deep-orange w3-text-white" style="width:100%;opacity:0.8;">
                            <h3 class="w3-xxlarge"><b>Japanese</b></h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="w3-col s12">
                <a href="#">
                    <div class="w3-display-container img-wrapper w3-margin-top">
                        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1128201611.jpg" alt="picture1" style="width:100%;margin-bottom:0;" class="zk-enlarge-hover">
                        <div class="w3-display-bottommiddle w3-deep-orange w3-text-white" style="width:100%;opacity:0.8;">
                            <h3 class="w3-xxlarge"><b>Korean</b></h3>
                        </div>
                    </div>
                </a>
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
			(function() {
				 [].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
					    new SelectFx(el);
				 } );
			})();
	</script>
    <script>
    // date
    $(function () {
        $("#default_date").val("{{ date("Y-m-d" , strtotime(\Carbon\Carbon::now()) ) }}");
    })
    </script>
@endsection