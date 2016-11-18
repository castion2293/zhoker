@extends('desktop.layout.master')

@section('title', '| Order')

@section('styles')

@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/110401.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-64">
        @if (Auth::user()->userorders()->get()->isEmpty())
            <div class="w3-center">
                <h1 style="font-family:cursive;">Sorry! You don't have any order right now!</h1>
            </div>
        @else
            <div class="w3-padding-12">
                <h1 class="w3-text-green w3-border-green w3-border-bottom">Order<h1>
            </div>
            
            
        @endif 
    </div>
@endsection