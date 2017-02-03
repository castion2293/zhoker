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
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1031201605.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    @inject('ChefPresenter', 'App\Presenters\ChefPresenter')
    <div class="w3-content w3-container w3-padding-64"  id="chef-create">
        <div>
             <div class="w3-padding-12 w3-margin-top">
                <h1 class="w3-text-green w3-border-green w3-border-bottom">Edit Chef Profile<h1>
            </div>
            {!! Form::model($chef, ['route' => ['chef_profile.update', encrypt($chef->id)], 'method' => 'PUT', 'data-parsley-validate' => '', 'files' => true]) !!}
                <div class="w3-row w3-border-grey w3-border-bottom" style="padding-bottom: 2em;">
                    <div class="w3-col l7 m7">
                        <div class="" style="padding-right:0.8em;">
                            <label class="w3-text-gery" style="font-family:cursive">Address</label>   
                            {{ Form::text('address', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'maxlength' => '255']) }} 
                        </div> 
                        <div class="" style="padding-right:0.8em;margin-top:10px;">
                            <label class="w3-text-gery" style="font-family:cursive">City</label>  
                            {{ Form::text('city', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'maxlength' => '30']) }}  
                        </div>
                        <div class="" style="padding-right:0.8em;margin-top:10px;">
                            <label class="w3-text-gery" style="font-family:cursive">State</label>
                            {{ Form::text('state', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'maxlength' => '30']) }}  
                        </div>
                        <div class="" style="padding-right:0.8em;margin-top:10px;">
                            <label class="w3-text-gery" style="font-family:cursive">Zip Code</label>
                            {{ Form::text('zip_code', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'maxlength' => '100']) }}
                        </div> 
                        <div class="" style="padding-right:0.8em;margin-top:10px;">
                            <label class="w3-text-gery" style="font-family:cursive">Store Name</label>
                            {{ Form::text('store_name', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'maxlength' => '255']) }}              
                        </div>
                        <div class="form-group w3-row">
                            <div class="w3-col l2 m2 w3-padding-small">
                                <img id="img_content" src="{{ $ChefPresenter->chefProfileImg($chef->profile_img) }}" alt="image contetnt" style="width:100%">
                            </div>
                            <div class="w3-col l10 m10">
                                <input type="file" id="myFile" name="profile_img" onchange="readURL(this);" style="display:none;">
                                <button type="button" class="w3-btn w3-white w3-border w3-border-grey w3-margin-top w3-margin-left w3-text-grey" style="font-family:cursive;" onclick="document.getElementById('myFile').click();">Upload a Photo</button>
                            </div>
                        </div>
                    </div>
                    <div class="w3-col l5 m5">
                        <img src="{{ URL::to('https://s3-us-west-2.amazonaws.com/zhoker/images/1028201602.jpg') }}" alt="profile" style="width:100%">
                    </div>
                </div>
                <div class="w3-border-green w3-border-bottom w3-padding-12">
                    <div class="form-group">
                        <label class="w3-text-gery w3-large" style="font-family:cursive">Store Description</label> 
                        {{ Form::textarea('store_description', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="w3-row w3-margin-top">
                    <div class="w3-rest"></div>
                    <div class="w3-col l2 m2 w3-right">
                        {!! Form::submit('Save Profile', ['class' => 'btn w3-large w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover']) !!}
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
