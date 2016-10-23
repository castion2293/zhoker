@extends('desktop.layout.master')

@section('title', '| Chef profile')

@section('styles')
    <script>
        tinymce.init({
            selector:'textarea',
            plugins: "link code",
            menubar: false,
        });
    </script>
@endsection

@section('content')
    <!--header picture-->
    <div class="bgimg-6 w3-opacity"></div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-64">
        <div>
             <div class="w3-padding-12 w3-margin-top">
                <h1 class="w3-text-green w3-border-green w3-border-bottom">Edit Chef Profile<h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {!! Form::model($chef, ['route' => ['chef_profile.update', $chef->id], 'method' => 'PUT', 'files' => true]) !!}
                        <div class="form-group">
                            <label for="address" class="w3-text-grey"> Address</label>
                            {{ Form::text('address', null, ['class' => 'form-control w3-large w3-text-grey', 'required' => '', 'maxlength' => '255']) }}              
                        </div>

                        <div class="form-group">
                            <label for="city" class="w3-text-grey"> City</label>
                            {{ Form::text('city', null, ['class' => 'form-control w3-large w3-text-grey', 'required' => '', 'maxlength' => '30']) }}              
                        </div>

                        <div class="form-group">
                            <label for="state" class="w3-text-grey"> State</label>
                            {{ Form::text('state', null, ['class' => 'form-control w3-large w3-text-grey', 'required' => '', 'maxlength' => '30']) }}              
                        </div>

                        <div class="form-group">
                            <label for="zip_code" class="w3-text-grey"> Zip Code</label>
                            {{ Form::text('zip_code', null, ['class' => 'form-control w3-large w3-text-grey', 'required' => '', 'maxlength' => '10']) }}              
                        </div>

                        <div class="form-group">
                            <label for="store_name" class="w3-text-grey"> Store Name</label>
                            {{ Form::text('store_name', null, ['class' => 'form-control w3-large w3-text-grey', 'required' => '', 'maxlength' => '255']) }}              
                        </div>

                        <div class="form-group">
                            <label for="profile_img" class="w3-text-grey"> Upload Image</label>
                            {{ Form::file('profile_img', null, ['required' => '']) }}
                        </div>

                        <div class="form-group">
                            <label for="store_description" class="w3-text-grey"> Store Description</label>
                            {{ Form::textarea('store_description', null, ['class' => 'form-control']) }}
                        </div>

                        {{ Form::submit('Save Profile', ['class' => 'btn btn-success btn-lg btn-block']) }} 

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
