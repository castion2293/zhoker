@extends('mobile.layout.master')

@section('title', '| Contact')

@section('styles')
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1128201615.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    <div class="w3-content w3-container w3-center w3-border-green w3-border-bottom">
        <div class="w3-padding-24">
            <p class="w3-large">Your Contact Email has already been Sent</p>
            <a href="{{ route('home.index') }}" class="btn w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover"><b>Home Page</b></a>
        </div>
    </div>
    
@endsection