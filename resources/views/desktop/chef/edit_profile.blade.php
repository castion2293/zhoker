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
        <img src="https://d4kfrsvmp3cgg.cloudfront.net/2018051604.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    @inject('ChefPresenter', 'App\Presenters\ChefPresenter')
    <div class="w3-content w3-container w3-padding-64"  id="chef-create">
        <div>
             <div class="w3-padding-12 w3-margin-top">
                <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['chef_edit_profile']['title'] }}</h1>
            </div>
            {!! Form::model($chef, ['route' => ['chef_profile.update', $chef->id], 'method' => 'PUT', 'data-parsley-validate' => '', 'files' => true]) !!}
                <div class="w3-row w3-border-grey w3-border-bottom" style="padding-bottom: 2em;">
                    <div class="w3-col l7 m7">
                        <div class="" style="padding-right:0.8em;">
                            <label class="w3-text-gery" style="font-family:cursive">{{ $lang->desktop()['chef_edit_profile']['address'] }}</label>
                            {{ Form::text('address', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'maxlength' => '255']) }} 
                        </div> 
                        <div class="" style="padding-right:0.8em;margin-top:10px;">
                            <label class="w3-text-gery" style="font-family:cursive">{{ $lang->desktop()['chef_edit_profile']['city'] }}</label>
                            {{ Form::text('city', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'maxlength' => '30']) }}  
                        </div>
                        <div class="" style="padding-right:0.8em;margin-top:10px;">
                            <label class="w3-text-gery" style="font-family:cursive">{{ $lang->desktop()['chef_edit_profile']['state'] }}</label>
                            {{ Form::text('state', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'maxlength' => '30']) }}  
                        </div>
                        <div class="" style="padding-right:0.8em;margin-top:10px;">
                            <label class="w3-text-gery" style="font-family:cursive">{{ $lang->desktop()['chef_edit_profile']['zip_code'] }}</label>
                            {{ Form::text('zip_code', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'maxlength' => '100']) }}
                        </div> 
                        <div class="" style="padding-right:0.8em;margin-top:10px;">
                            <label class="w3-text-gery" style="font-family:cursive">{{ $lang->desktop()['chef_edit_profile']['store_name'] }}</label>
                            {{ Form::text('store_name', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'required' => '', 'maxlength' => '255']) }}              
                        </div>
                        <div class="form-group w3-row">
                            <div class="w3-col l2 m2 w3-padding-small">
                                <img id="img_content" src="{{ $chef->profile_img }}" alt="image contetnt" style="width:100%">
                            </div>
                            <div class="w3-col l10 m10">
                                <input type="file" id="myFile" name="profile_img" onchange="readURL(this);" style="display:none;">
                                <button type="button" class="w3-btn w3-white w3-border w3-border-grey w3-margin-top w3-margin-left w3-text-grey" style="font-family:cursive;" onclick="document.getElementById('myFile').click();">{{ $lang->desktop()['chef_edit_profile']['photo'] }}</button>
                            </div>
                        </div>
                    </div>
                    <div class="w3-col l5 m5">
                        <img src="{{ URL::to('https://s3.amazonaws.com/zhoker-pics/2018051801.JPG') }}" alt="profile" style="width:100%">
                    </div>
                </div>
                <div class="w3-border-green w3-border-bottom w3-padding-12">
                    <div class="form-group">
                        <label class="w3-text-gery w3-large" style="font-family:cursive">{{ $lang->desktop()['chef_edit_profile']['store_description'] }}</label>
                        {{ Form::textarea('store_description', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="w3-row w3-margin-top">
                    <div class="w3-rest"></div>
                    <div class="w3-col l2 m2 w3-right">
                        {!! Form::submit($lang->desktop()['chef_edit_profile']['save_profile'] , ['class' => 'btn w3-large w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover', 'id' => 'save-profile']) !!}
                    </div>
                </div>  
            {!! Form::close() !!}
        </div>
    </div>

    <!--loader modal-->
    @include('desktop.partials.loader')
    
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

        // loader
        $("#save-profile").click(function() {
            $("#LoadingModal").modal();
        });
    </script>
@endsection
