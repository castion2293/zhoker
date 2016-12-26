@extends('mobile.layout.master')

@section('title', '| Chef create')

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
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1031201602.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-32" id="chef-create">
        <div>
            <div class="">
                <h1 class="w3-text-green w3-border-green w3-border-bottom">Create a Menu<h1>
            </div>
            {!! Form::open(['route' => 'chef.store', 'data-parsley-validate' => '', 'files' => true, 'method' => 'POST']) !!}
                <div class="w3-row w3-border-grey w3-border-bottom" style="padding-bottom: 2em;">
                    <div class="w3-col l5 m5">
                        <img src="{{ URL::to('https://s3-us-west-2.amazonaws.com/zhoker/images/1026201601.png') }}" alt="profile" style="width:100%">
                    </div>
                    <div class="w3-col s12">
                        <div class="w3-row">
                            <div class="w3-col s12" style="margin-top:1.5em;">
                                {{ Form::text('name', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'placeholder' => 'Menu Name', 'required' => '', 'maxlength' => '255']) }}   
                            </div>
                            <div class="w3-col s12" style="margin-top:1.5em;">
                                {{ Form::text('price', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'placeholder' => 'Menu Price', 'required' => '', 'maxlength' => '11']) }}              
                            </div>
                        </div>
                                
                        <div class="input-group" style="margin-top:1.5em;">    
                            {{ Form::text('datetimepeople', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey w3-white', 'id' => 'dtp-result', 'placeholder' => 'Date', 'required' => '']) }}
                            <span class="input-group-addon" id="modal-picker" style="cursor:pointer;"><span class="glyphicon glyphicon-calendar"></span></span>   
                        </div>

                        <div class="" style="margin-top:1em;">
                            <label class="w3-text-gery w3-large" style="font-family:cursive">Time</label>               
                            <select id="sel2" class="w3-select js-example-basic-multiple" name="shifts[]" multiple="multiple" placeholder="Shift" required=""> 
                                @foreach($shifts as $shift)
                                    <option value='{{ $shift->id }}'>{{ $shift->shift }}</option>
                                @endforeach
                            </select>
                        </div>
                                
                        <div class="" style="margin-top:1em;">
                            <label class="w3-text-gery w3-large" style="font-family:cursive">Category</label>  
                            <select class="w3-select js-example-basic-multiple" name="categories[]" multiple="multiple" required=""> 
                                @foreach($categories as $category)
                                    <option value='{{ $category->id }}'>{{ $category->category }}</option>
                                @endforeach
                            </select>
                        </div>
                               
                        <div class="" style="margin-top:1em;">
                            <label class="w3-text-gery w3-large" style="font-family:cursive">Method</label>  
                            <select class="w3-select js-example-basic-multiple" name="methods[]" multiple="multiple" required=""> 
                                @foreach($methods as $method)
                                    <option value='{{ $method->id }}'>{{ $method->method }}</option>
                                @endforeach
                            </select>
                        </div> 
                                   
                        <div class="form-group w3-row" style="margin-top:1em;">
                            <div class="w3-col s12 w3-padding-small">
                                <img id="img_content" src="{{ URL::to('https://s3-us-west-2.amazonaws.com/zhoker/images/image.png') }}" alt="image contetnt" style="width:100%">
                            </div>
                            <div class="w3-rest"></div>
                            <div class="w3-col s7 w3-right">
                                <input type="file" id="myFile" name="img" onchange="readURL(this);" style="display:none;" required="" />
                                <button type="button" class="w3-btn w3-white w3-border w3-border-grey w3-large w3-margin-top w3-margin-left w3-text-grey" style="font-family:cursive;" onclick="document.getElementById('myFile').click();">Upload a Photo</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w3-border-green w3-border-bottom w3-padding-8">
                    <div class="form-group">
                        <label class="w3-text-gery w3-large" style="font-family:cursive">Menu Description</label> 
                        {{ Form::textarea('description', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="w3-row w3-margin-top">
                    <div class="w3-col s12 w3-right">
                        {!! Form::submit('Create Menu', ['class' => 'btn w3-large w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover']) !!}
                    </div>
                </div>  
            {!! Form::close() !!}
        </div>
    </div>  

  <!--Data Time People Modal -->
  @include('mobile.partials.ChefCreateFullCalendar'); 
@endsection

@section('scripts')
    <!--Select-2-->
    <script>
         $(function () {
            $(".js-example-basic-multiple").select2();
        });
    </script>

    <!--Upload Picture-->
    <script>
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