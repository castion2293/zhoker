@extends('desktop.layout.master')

@section('title', '| Shopping Cart')

@section('styles')
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1114201602.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    <div class="w3-content w3-container w3-center w3-border-green w3-border-bottom">
        <div class="w3-padding-24">
            <h1>The item has already been removed!</h1>
            <div class="w3-row w3-border-grey w3-border-top w3-padding-24" style="margin-top:3em;">
                <div class="w3-rest"></div>
                <div class="w3-col l3 m3 w3-right">
                    <a href="{!! route('product.cart.show', ['id' => encrypt(Auth::user()->id)]) !!}" class="btn w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover"><b>Back to Shopping Cart</b></a>
                </div>
            </div>
        </div>
    </div>

@endsection