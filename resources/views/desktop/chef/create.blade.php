@extends('desktop.layout.master')

@section('title', '| Chef create')

@section('styles')

@endsection

@section('content')
    <!--header picture-->
    <div class="bgimg-3 w3-opacity"></div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-64">
        <div>
            <div class="w3-padding-12 w3-margin-top">
                <h1 class="w3-text-green w3-border-green w3-border-bottom">Create a Menu<h1>
            </div>
            <div class="row">
                 <div class="col-md-12">
                    {!! Form::open(['route' => 'chef.store', 'data-parsley-validate' => '', 'files' => true, 'method' => 'POST']) !!}
                        <div class="form-group">
                            <label for="name" class="w3-text-grey"> Name</label>
                            {{ Form::text('name', null, ['class' => 'form-control w3-large', 'required' => '', 'maxlength' => '255']) }}              
                        </div>

                        <div class="form-group">
                            <label for="price" class="w3-text-grey"> Price</label>
                            {{ Form::text('price', null, ['class' => 'form-control w3-large', 'required' => '', 'maxlength' => '11']) }}              
                        </div>

                        <div class="form-group">
                            <label for="date" class="w3-text-grey"><span class="fa fa-calendar-o w3-large"></span> Date</label>
                            <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                <span class="input-group-addon inputbkg clickdown"><span class="glyphicon glyphicon-calendar"></span></span>
                                {{ Form::text('date', null, ['class' => 'form-control w3-large w3-khaki w3-text-grey', 'required' => '', 'readonly' => '', 'style' => 'font-weight:bold;']) }}
                            </div>
                        </div>
                    {!! Form::close() !!}
                 </div>
            </div>
        </div>
    </div>    
@endsection