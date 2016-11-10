@extends('desktop.layout.master')

@section('title', '| User Profile Setting')

@section('styles')

@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1104201604.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-64">
        <div class="w3-padding-12">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">User Profile Setting<h1>
        </div>
        
        <div class="w3-row" style="padding-bottom: 2em;">
            {!! Form::model($user, ['route' => ['user_profile.update', $user->id], 'method' => 'PUT', 'data-parsley-validate' => '', 'files' => true]) !!}
               <div class="w3-col l7 m7 w3-padding-small">
                    <div class="w3-border-grey w3-border-bottom w3-margin-bottom">
                        <span class="w3-text-grey w3-xlarge">Public Info<span>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col l6 m6" style="padding-right:0.8em;">
                            <label class="w3-text-gery" style="font-family:cursive">First Name</label>   
                            {{ Form::text('first_name', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'maxlength' => '255']) }} 
                        </div>
                        <div class="w3-col l6 m6" style="padding-right:0.8em;">
                            <label class="w3-text-gery" style="font-family:cursive">Last Name</label>   
                            {{ Form::text('last_name', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'maxlength' => '255']) }} 
                        </div> 
                    </div>
                    <div class="w3-margin-top" style="padding-right:0.8em;">
                        <label class="w3-text-gery" style="font-family:cursive">Email</label>   
                        {{ Form::text('email', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'maxlength' => '255']) }} 
                    </div>
                    <div class="w3-margin-top" style="padding-right:0.8em;">
                        <label class="w3-text-gery" style="font-family:cursive">Phone Number</label>   
                        {{ Form::text('phone_number', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'maxlength' => '255']) }} 
                    </div>
                    <div class="form-group w3-row w3-margin-top">
                        <div class="w3-col l2 m2 w3-padding-small">
                            @if ($user->user_profile_img != null)
                                <img id="img_content" src="{{ asset($user->user_profile_img) }}" alt="image contetnt" style="width:100%">
                            @else
                                <img id="img_content" src="{{ URL::to('img\default-user-icon-profile.PNG') }}" alt="image contetnt" style="width:100%">
                            @endif
                        </div>
                        <div class="w3-col l10 m10">
                            <input type="file" id="myFile" name="user_profile_img" onchange="readURL(this);" style="display:none;">
                            <button type="button" class="w3-btn w3-white w3-border w3-border-grey w3-margin-top w3-margin-left w3-text-grey" style="font-family:cursive;" onclick="document.getElementById('myFile').click();">Upload a Photo</button>
                        </div>
                    </div>
                    <div class="w3-row w3-margin-top w3-border-grey w3-border-top">
                        <div class="w3-rest"></div> 
                        <div class="w3-col l3 m3 w3-right w3-margin-top">
                            {!! Form::submit('Save Profile', ['class' => 'btn w3-green btn-block']) !!}
                        </div>
                    </div>  
               </div>
            {!! Form::close() !!}

            {!! Form::open(['route' => 'user.resetpassword', 'data-parsley-validate' => '', 'files' => true, 'method' => 'POST']) !!}
                <div class="w3-col l5 m5 w3-padding-small">
                    <div class="w3-border-grey w3-border-bottom w3-margin-bottom">
                        <span class="w3-text-grey w3-xlarge">Reset Password<span>
                    </div>
                    <div class="w3-margin-top" style="padding-right:0.8em;">
                        <label class="w3-text-gery" style="font-family:cursive">Old Password</label> 
                        {{ Form::password('old_password', ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'minlength' => '6']) }}  
                    </div>
                    <div class="w3-margin-top" style="padding-right:0.8em;">
                        <label class="w3-text-gery" style="font-family:cursive">New Password</label> 
                        {{ Form::password('password', ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'minlength' => '6']) }}  
                    </div>
                    <div class="w3-margin-top" style="padding-right:0.8em;">
                        <label class="w3-text-gery" style="font-family:cursive">Verify Password</label> 
                        {{ Form::password('password_confirmation', ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'minlength' => '6']) }}  
                    </div>
                     <div class="w3-row w3-margin-top w3-border-grey w3-border-top">
                        <div class="w3-rest"></div> 
                        <div class="w3-col l5 m5 w3-right w3-margin-top">
                            {!! Form::submit('Change Password', ['class' => 'btn w3-green btn-block']) !!}
                        </div>
                    </div>  
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        //Upload Picture
         function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img_content')
                        .attr('src', e.target.result)
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection