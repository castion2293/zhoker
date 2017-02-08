@extends('desktop.layout.master')

@section('title', '| Chef Order')

@section('styles')
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1114201604.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-64">
        @if ($cheforders->isEmpty())
            <div class="w3-center">
                <h1 style="font-family:cursive;">Sorry! There is no one order your meal yet!</h1>
            </div>
        @else
            <div class="w3-padding-6">
                <h1 class="w3-text-green w3-border-green w3-border-bottom">Meal Order<h1>
            </div>

            <div class='tabs tabs_active'>
                    <ul class='horizontal w3-right'>
                        <li><a id="calendar-link" href="#tab-1" class="w3-small tab-link">Calendar</a></li>
                        <li><a href="#tab-2" class="w3-small tab-link">list</a></li>
                    </ul>
                <div id='tab-1' class="w3-content w3-container">
                    <!--Chef Order Calendar View -->
                    @include('desktop.partials.ChefOrderCalendar');
                </div>                
                <div id='tab-2' class="w3-content w3-container">
                    <!--Chef Order list View -->
                    @include('desktop.partials.ChefOrderList');
                </div>
            </div>
            
        @endif 
    </div>
@endsection

@section('scripts')
    
@endsection