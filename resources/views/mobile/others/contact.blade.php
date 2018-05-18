@extends('mobile.layout.master')

@section('title', '| Contact')

@section('styles')
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3.amazonaws.com/zhoker-pics/2018051609.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-32">
        <div class="">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['contact']['title'] }}</h1>
        </div>
        {!! Form::open(['route' => 'contact.post', 'data-parsley-validate' => '', 'files' => true, 'method' => 'POST']) !!}
            <div class="w3-row w3-border-grey w3-border-bottom" style="">
                <div class="w3-col s12">
                    {{ Form::text('name', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'placeholder' => $lang->desktop()['contact']['name'], 'required' => '', 'maxlength' => '255']) }}
                </div>
                <div class="w3-col s12 w3-margin-top">
                    {{ Form::text('email', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'placeholder' => $lang->desktop()['contact']['email'], 'required' => '']) }}
                </div>
                <div class="w3-col s12 w3-margin-top">
                    {{ Form::text('subject', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'placeholder' => $lang->desktop()['contact']['subject'], 'required' => '', 'maxlength' => '255']) }}
                </div>
                <div class="w3-col s12 w3-margin-top">
                    <textarea name="content" class="w3-input w3-border w3-border-grey w3-large w3-text-grey" rows="10" required></textarea>
                </div>
                <div class="w3-col s12 w3-margin-top">
                    {!! $errors->first('name','<label class="w3-text-red w3-medium">:message</label>')!!}
                    {!! $errors->first('email','<label class="w3-text-red w3-medium">:message</label>')!!}
                    {!! $errors->first('subject','<label class="w3-text-red w3-medium">:message</label>')!!}
                    {!! $errors->first('content','<label class="w3-text-red w3-medium">:message</label>')!!}
                </div>
            </div>
            <div class="w3-row w3-margin-top">
                <div class="w3-rest"></div>
                <div class="w3-col l3 m3 w3-right">
                    {!! Form::submit($lang->desktop()['contact']['submit'], ['class' => 'btn w3-large w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover']) !!}
                </div>
            </div> 
        {!! Form::close() !!}
    </div>
@endsection