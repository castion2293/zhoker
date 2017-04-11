@extends('desktop.layout.master')

@section('title', '| Home')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $lang->desktop()['Reset Password']['title'] }}</div>

                <div class="panel-body">
                    {!! Form::open(['route' => 'postPasswordReset', 'method' =>'POST']) !!}
                    
                    {{ Form::hidden('token', $token) }}

                    {{ Form::label('email', $lang->desktop()['reset_password']['title']) }}
                    {{ Form::email('email', $email, ['class' => 'form-control']) }}

                    {{ Form::label('password', $lang->desktop()['reset_password']['password']) }}
                    {{ Form::password('password', ['class' => 'form-control']) }}

                    {{ Form::label('password_confirmation' , $lang->desktop()['reset_password']['password_confirm'] ) }}
                    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}

                    {{ Form::submit($lang->desktop()['Reset Password']['title'] , ['class' => 'btn btn-primary']) }}
                
                    {!! Form::close() !!}
                </div>
            <div>
        </div>
    </div>
@endsection