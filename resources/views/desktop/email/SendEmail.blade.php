@extends('desktop.layout.master')

@section('title', '| Send Confirm Email')

@section('styles')
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1104201601.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-64">
        <div class="w3-padding-12 w3-margin-top">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['send_email']['title'] }}<h1>
        </div>
        <div class="w3-content w3-container w3-center w3-border-green w3-border-bottom">
            <h3 class="w3-text-grey"  style="font-family: cursive">{{ $lang->desktop()['send_email']['congraduate'] }} <a href="{{ route('home.index') }}" style="text-decoration:none; "><span class="w3-text-green">{{ $lang->desktop()['send_email']['link'] }}</span></a> {{ $lang->desktop()['send_email']['account'] }}!</h3>
            <div class="w3-padding-24">
                <p class="w3-large">{{ $lang->desktop()['send_email']['p1'] }}.</p>
                <p class="w3-large">{{ $lang->desktop()['send_email']['p2'] }}!</p>
                <p class="w3-large">{{ $lang->desktop()['send_email']['p3'] }}.</p>
            </div>
        </div>
        <div class="w3-row w3-margin-top">
            <div class="w3-rest"></div>
            <div class="w3-col l2 m2 w3-right">
                <a href="{{ route('home.index') }}" class="btn w3-green btn-block">{{ $lang->desktop()['send_email']['shop'] }}</a>
            </div>
        </div>  
    </div>

@endsection