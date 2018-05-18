@extends('mobile.layout.master')

@section('title', '| Chef create')

@section('styles')
    <script src="{{ URL::to('js/tinymce.js') }}"></script>
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3.amazonaws.com/zhoker-pics/2018051601.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-32" id="chef-create">
        <div>
            <div class="">
                <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['chef_create']['title'] }}</h1>
            </div>

            {!! Form::open(['route' => 'chef.store', 'data-parsley-validate' => '', 'files' => true, 'method' => 'POST']) !!}
                <div class="w3-row" style="padding-bottom: 2em;">
                    <div class="w3-col s12">
                        <div class="w3-row" id="name-form">
                            <div class="w3-col s12" style="margin-top:1.5em;">
                                {{ Form::text('name', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'id'=>'menu-name', 'placeholder' => $lang->desktop()['chef_create']['meal_name'], 'required' => '', 'maxlength' => '255']) }}
                            </div>
                            <div class="w3-col s12" style="margin-top:1.5em;">
                                {{ Form::text('price', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'id'=>'menu-price', 'placeholder' => $lang->desktop()['chef_create']['meal_price'], 'required' => '', 'maxlength' => '11']) }}
                            </div>
                        </div>
                                
                        <!--div class="input-group" style="margin-top:1.5em;">    
                            {{ Form::text('datetimepeople', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey w3-white', 'id' => 'dtp-result', 'placeholder' => 'Date', 'required' => '']) }}
                            <span class="input-group-addon" id="modal-picker" style="cursor:pointer;"><span class="glyphicon glyphicon-calendar"></span></span>   
                        </div-->

                        <div class="" style="margin-top:1em;">
                            <label class="w3-text-gery w3-large" style="font-family:cursive">{{ $lang->desktop()['chef_create']['time'] }}</label>
                            <select class="w3-select js-example-basic-multiple" id="shift-select2" name="shifts[]" multiple="multiple" placeholder="Shift" required=""> 
                                @foreach($shifts as $shift)
                                    <option value='{{ $shift->id }}'>{{ $shift->shift }}</option>
                                @endforeach
                            </select>
                        </div>
                                
                        <div class="" style="margin-top:1em;">
                            <label class="w3-text-gery w3-large" style="font-family:cursive">{{ $lang->desktop()['chef_create']['category'] }}</label>
                            <select class="w3-select js-example-basic-multiple" name="categories[]" id="category-select2" multiple="multiple" required=""> 
                                @foreach($categories as $category)
                                    <option value='{{ $category->id }}'>{{ $category->category }}</option>
                                @endforeach
                            </select>
                        </div>
                                
                        <div class="" style="margin-top:1em;">
                            <label class="w3-text-gery w3-large" style="font-family:cursive">{{ $lang->desktop()['chef_create']['method'] }}</label>
                            <select class="w3-select js-example-basic-multiple" name="methods[]" id="method-select2" multiple="multiple" required=""> 
                                @foreach($methods as $method)
                                    <option value='{{ $method->id }}'>{{ $method->method }}</option>
                                @endforeach
                            </select>
                        </div> 
                    </div>
                </div>

                <div class="w3-padding-12" id="cover-form">
                    <label class="w3-text-gery w3-large" style="font-family:cursive">{{ $lang->desktop()['chef_create']['cover_image'] }}</label>
                    <div id="" class="w3-padding-medium cover-select-modal-trigger" style="cursor:pointer;">
                        <img src="{{ URL::to('img/cover_image.jpg') }}" id="cover-image-origin" alt="meal-image" style="width:100%">
                    </div>
                    <!--for cover image picture, not shown in the previous-->
                    @foreach ($images as $image)
                        <div id="cover-image-show{{ $image->id }}" class="w3-padding-48 cover-image-show cover-select-modal-trigger" style="display:none;">
                            <img src="{{ asset($image->image_path) }}" alt="meal-image" style="width:100%;">
                        </div>
                    @endforeach
                    <!--for cover image input, not shown-->
                    {{ Form::text('cover_img', null, ['class' => '', 'id'=>'cover-image-input', 'style'=>'display:none;']) }} 
                </div>

                <div class="w3-padding-12" id="image-form">
                    <label class="w3-text-gery w3-large" style="font-family:cursive">{{ $lang->desktop()['chef_create']['meal_image'] }}</label>

                    <div class="w3-border w3-border-grey w3-round-large w3-padding-24 w3-margin-top">
                        <div class="w3-row-padding">
                            @foreach ($images as $image)
                                <div class="w3-col m2 l2 w3-padding-12 w3-display-container ckb-display" id="dpy{{ $image->id }}" style="display:none;">
                                    <img src="{{ asset($image->image_path) }}" alt="image" style="width:100%;">
                                    <div class="w3-display-bottomright" style="padding-right:1em;pading-bottom:1em;cursor:pointer;">
                                        <div class="w3-large image-link" data-toggle="lko{{ $image->id }}" data-placement="bottom" title="copied">
                                            <i id="lko{{ $image->id }}" class="fa fa-link zk-enlarge-hover"></i>
                                        </div>
                                    </div>
                                    <!--for copy link use, not shown-->
                                    <p id="lko{{ $image->id }}_catch" style="display:none;">{{ $image->ori_image_path }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="w3-row w3-margin-top">
                        <div class="w3-col s12">
                            <div id="select-modal-trigger" class="btn w3-large w3-white w3-text-grey w3-border w3-border-grey btn-block zk-shrink-hover"><i class="fa fa-picture-o"></i> {{ $lang->desktop()['chef_create']['photo'] }}</div>
                        </div>
                    </div>

                    <!--for image input, not shown-->
                    {{ Form::text('img', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'id'=>'image-input', 'style'=>'display:none;']) }} 
                </div>

                <div class="">
                    <div class="form-group">
                        <label class="w3-text-gery w3-large" style="font-family:cursive">{{ $lang->desktop()['chef_create']['meal_description'] }}</label>
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'meal-description', 'rows' => '30']) }}
                    </div>
                </div>

                <div class="w3-row w3-margin-top w3-border-green w3-border-top" style="padding-top:1em;">
                    <div class="w3-col s12 w3-right">
                        {!! Form::submit($lang->desktop()['chef_create']['create_meal'], ['class' => 'btn w3-large w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover', 'id' => 'create-btn']) !!}
                    </div>
                </div>  
            {!! Form::close() !!}
        </div>
    </div>  

  <!--Cover Image Select-->
  @include('mobile.partials.ChefCreateCoverImageSelect')
  <!--Image select-->
  @include('mobile.partials.ChefCreateImageSelect') 
  <!--loader modal-->
  @include('desktop.partials.loader')

@endsection

@section('scripts')
    <script>
        //Select-2
        $(function () {
            $(".js-example-basic-multiple").select2();
        });

        // loader
            $("#create-btn").click(function() {
                $("#LoadingModal").modal();
            });
    </script>
@endsection