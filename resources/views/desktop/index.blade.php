@extends('desktop.layout.master')

@section('title', '| Home')

@section('styles')
    <link rel="stylesheet" href="{{ URL::to('css/cs-select.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/cs-skin-elastic.css') }}">
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!-- First Parallax Image with Logo Text -->
    <div id="font" class="bgimg-1 w3-opacity w3-display-container">
        <div class="w3-center" style="padding-top:16em">
            <span class="w3-center w3-padding-xlarge w3-text-white w3-xxlarge w3-wide w3-text-shadow w3-animate-opacity">{{ $lang->desktop()['index']['title1'] }}</span><br>
            <span class="w3-center w3-padding-xlarge w3-text-white w3-xxlarge w3-wide w3-text-shadow w3-animate-opacity w3-hide-small
                ">{{ $lang->desktop()['index']['title2'] }}</span><br>
            <!--<span class="w3-center w3-text-white w3-xlarge w3-animate-opacity">-->
            <a href="{{ route('maplist.search.get') }}" class="w3-btn w3-transparent w3-border w3-round w3-xlarge w3-card-16 w3-hover-green w3-hover-border-green" id="orderbtn">
                <span class="w3-text-shadow">{{ $lang->desktop()['index']['order'] }}</span>
            </a>
        </div>

        <!--Input Form large medium screen-->
        <div class="w3-content w3-container w3-hide-small" style="padding-top:9em">
            {!! Form::open(['route' => 'maplist', 'data-parsley-validate' => '', 'method' => 'POST']) !!}
                <div class="w3-col l5 m5">
                    {{ Form::text('city', null, ['class' => 'w3-input w3-border w3-large w3-text-black inputbkg clickdown', 'required' => '', 'id' => 'eat-location', 'style' => 'font-weight:bold;']) }}
                </div>
                <div class="w3-col l2 m2">
                    <select class="w3-select w3-border w3-text-black w3-large inputbkg cs-select cs-skin-elastic clickdown" name="shift" style="height:50px">
                        <option class="w3-text-black w3-white w3-large" value="All">{{ $lang->desktop()['index']['search_all'] }}</option>
                        <option class="w3-text-black w3-white w3-large" value="Dinner">{{ $lang->desktop()['index']['search_dinner'] }}</option>
                        <option class="w3-text-black w3-white w3-large" value="Lunch">{{ $lang->desktop()['index']['search_lunch'] }}</option>
                        <option class="w3-text-black w3-white w3-large" value="Brunch">{{ $lang->desktop()['index']['search_brunch'] }}</option>
                        <option class="w3-text-black w3-white w3-large" value="Breakfast">{{ $lang->desktop()['index']['search_breakfast'] }}</option>
                        <option class="w3-text-black w3-white w3-large" value="Tea Time">{{ $lang->desktop()['index']['search_teatime'] }}</option>
                    </select>
                </div>
                <div class="input-group w3-col l4 m4">
                    <span class="input-group-addon inputbkg clickdown"><span class="glyphicon glyphicon-calendar"></span></span>
                    {{ Form::text('date', null, ['class' => 'w3-input w3-border w3-large w3-text-black inputbkg clickdown', 'id' => 'datepicker', 'required' => '', 'placeholder' => $lang->desktop()['index']['search_date'] , 'style' => 'font-weight:bold;cursor:pointer;"']) }}
                </div>
                <button class="w3-col l1 m1 w3-btn w3-border-green w3-large w3-green" style="height:50px">
                    <i class="w3-text-shadow fa fa-search"></i>
                </button>
            {!! Form::close() !!}
        </div>

    </div>

     <!-- Container (About Section) -->
    <div class="w3-content w3-container w3-padding-64" id="about ">
        <h3 class="w3-center "><em>Zhoker</em></h3>
        <p>  {{ $lang->desktop()['index']['about_description'] }}</p>
    </div>

    <!-- Container (Portfolio Section) -->
    <div class="w3-padding64 w3-content w3-container" style="margin-top:5em;margin-bottom: 10em;">
        <h3 class="w3-center ">{{ $lang->desktop()['index']['work_title'] }}</h3>
        <p class="w3-center "><em>{{ $lang->desktop()['index']['work_description'] }}</em></p><br>

        <div class="w3-row-padding">
            <div class="w3-col l4 m4 w3-center">
                <i class="fa fa-television w3-text-green" style="font-size:100px;"></i>
                <p class="w3-text-green w3-large"><b>1. {{ $lang->desktop()['index']['work_search'] }}</b></p>
            </div>

            <div class="w3-col l4 m4 w3-center">
                <i class="fa fa-credit-card w3-text-green" style="font-size:100px;"></i>
                <p class="w3-text-green w3-large"><b>2. {{ $lang->desktop()['index']['work_pay'] }}</b></p>
            </div>

            <div class="w3-col l4 m4 w3-center">
                <i class="fa fa-cutlery w3-text-green" style="font-size:100px;"></i>
                <p class="w3-text-green w3-large"><b>3. {{ $lang->desktop()['index']['work_enjoy'] }}</b></p>
            </div>
        </div>
    </div>

    <!--Carousel Photo show-->
    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">

        <div class="item w3-display-container active">
            <img src="https://s3.amazonaws.com/zhoker-pics/2018051701.JPG" alt="Food1" style="width:100%">
        </div>

        <div class="item w3-display-container">
            <img src="https://s3.amazonaws.com/zhoker-pics/2018051702.JPG" alt="Food3" style="width:100%">
        </div>

        <div class="item w3-display-container">
            <img src="https://s3.amazonaws.com/zhoker-pics/2018051703.JPG" alt="Food3" style="width:100%">
        </div>

        <div class="item w3-display-container">
            <img src="https://s3.amazonaws.com/zhoker-pics/2018051704.JPG" alt="Food3" style="width:100%">
        </div>

        <div class="item w3-display-container">
            <img src="https://s3.amazonaws.com/zhoker-pics/2018051705.JPG" alt="Food3" style="width:100%">
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
        <h3 class="w3-center ">{{ $lang->desktop()['index']['chef_title'] }}</h3>
        <p class="w3-center "><em>{{ $lang->desktop()['index']['chef_description'] }}</em></p><br>
    </div>

    <!-- Container (Portfolio Section) -->
    <div class="w3-padding-jumbo" style="margin-top:5em;margin-bottom:5em;">
        <h3 class="w3-center ">{{ $lang->desktop()['index']['serve_title'] }}</h3>
        <p class="w3-center "><em>{{ $lang->desktop()['index']['serve_description'] }}</em></p><br>

        <!-- Responsive Grid. Four columns on tablets, laptops and desktops. Will stack on mobile devices/small screens (100% width) -->
        <div class="w3-row-padding">
            <div class="w3-col l4 m4">
                <a href="#">
                    <div class="w3-display-container img-wrapper">
                        <img src="https://cdn.pixabay.com/photo/2018/03/15/12/17/food-3228058_1280.jpg" alt="picture1" style="width:100%;margin-bottom:0;" class="zk-enlarge-hover">
                        <div class="w3-display-bottommiddle w3-deep-orange w3-text-white" style="width:100%;opacity:0.8;">
                            <h3 class="w3-xxlarge"><b>{{ $lang->desktop()['index']['serve_chinese'] }}</b></h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="w3-col l4 m4">
                <a href="#">
                    <div class="w3-display-container img-wrapper">
                        <img src="https://cdn.pixabay.com/photo/2018/04/28/00/44/food-3356314_1280.jpg" alt="picture1" style="width:100%;margin-bottom:0;" class="zk-enlarge-hover">
                        <div class="w3-display-bottommiddle w3-deep-orange w3-text-white" style="width:100%;opacity:0.8;">
                            <h3 class="w3-xxlarge"><b>{{ $lang->desktop()['index']['serve_french'] }}</b></h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="w3-col l4 m4">
                <a href="#">
                    <div class="w3-display-container img-wrapper">
                        <img src="https://cdn.pixabay.com/photo/2014/08/14/14/21/shish-kebab-417994_1280.jpg" alt="picture1" style="width:100%;margin-bottom:0;" class="zk-enlarge-hover">
                        <div class="w3-display-bottommiddle w3-deep-orange w3-text-white" style="width:100%;opacity:0.8;">
                            <h3 class="w3-xxlarge"><b>{{ $lang->desktop()['index']['serve_barbecu'] }}</b></h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="w3-col l4 m4">
                <a href="#">
                    <div class="w3-display-container img-wrapper">
                        <img src="https://cdn.pixabay.com/photo/2016/03/05/23/01/asian-1239427_1280.jpg" alt="picture1" style="width:100%;margin-bottom:0;" class="zk-enlarge-hover">
                        <div class="w3-display-bottommiddle w3-deep-orange w3-text-white" style="width:100%;opacity:0.8;">
                            <h3 class="w3-xxlarge"><b>{{ $lang->desktop()['index']['serve_seafood'] }}</b></h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="w3-col l4 m4">
                <a href="#">
                    <div class="w3-display-container img-wrapper">
                        <img src="https://cdn.pixabay.com/photo/2017/10/10/11/37/japan-2836904_1280.jpg" alt="picture1" style="width:100%;margin-bottom:0;" class="zk-enlarge-hover">
                        <div class="w3-display-bottommiddle w3-deep-orange w3-text-white" style="width:100%;opacity:0.8;">
                            <h3 class="w3-xxlarge"><b>{{ $lang->desktop()['index']['serve_japanese'] }}</b></h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="w3-col l4 m4">
                <a href="#">
                    <div class="w3-display-container img-wrapper">
                        <img src="https://cdn.pixabay.com/photo/2017/08/08/09/44/food-photography-2610863_1280.jpg" alt="picture1" style="width:100%;margin-bottom:0;" class="zk-enlarge-hover">
                        <div class="w3-display-bottommiddle w3-deep-orange w3-text-white" style="width:100%;opacity:0.8;">
                            <h3 class="w3-xxlarge"><b>{{ $lang->desktop()['index']['serve_korean'] }}</b></h3>
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
    // datepicker
    $(function () {
        $("#datepicker").datetimepicker({
            format: 'YYYY-MM-DD',
            minDate: moment(),
            locale: '{{ $lang->desktop()['language'] }}'
        });

        $("#eat-location").val("{{ $lang->desktop()['index']['search_city'] }}");

        $("#eat-location").focus(function(){
            if( $("#eat-location").val() == "{{ $lang->desktop()['index']['search_city'] }}")
                $("#eat-location").val("");
        });

        $("#eat-location").focusout(function(){
            if( $("#eat-location").val() == '')
                $("#eat-location").val("{{ $lang->desktop()['index']['search_city'] }}");
        });
    })
    </script>
@endsection