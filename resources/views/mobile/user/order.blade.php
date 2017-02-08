@extends('mobile.layout.master')

@section('title', '| User Order')
    
@section('styles')
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1118201601.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-32">
        @if ($userorders->isEmpty())
            <div class="w3-center">
                <h1 style="font-family:cursive;">Sorry! You don't have any order right now!</h1>
            </div>
        @else
            <div class="w3-padding-4">
                <h1 class="w3-text-green w3-border-green w3-border-bottom">Order<h1>
            </div>
            
            <div class='tabs tabs_active'>
                    <ul class='horizontal w3-right'>
                        <li><a id="calendar-link" href="#tab-1" class="w3-small tab-link">Calendar</a></li>
                        <li><a href="#tab-2" class="w3-small tab-link">list</a></li>
                    </ul>
                <div id='tab-1' class="w3-content w3-container">
                    <!--Chef Order Calendar View -->
                    @include('mobile.partials.UserOrderCalendar')
                </div>                
                <div id='tab-2' class="w3-content w3-container">
                    <!--Chef Order list View -->
                    @include('mobile.partials.UserOrderList')
                </div>
            </div>
            
        @endif 
    </div>
@endsection

@section('scripts')

@endsection