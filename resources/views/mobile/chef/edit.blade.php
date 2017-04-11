@extends('mobile.layout.master')

@section('title', '| Chef edit')

@section('styles')
    <script src="{{ URL::to('js/tinymce.js') }}"></script>
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
     <!--header picture-->
     <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1031201606.JPG" alt="profile" style="width:100%">
    </div>

     <!--content-->
     <div class="w3-content w3-container w3-padding-32" id="chef-create">
         <div class="">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['chef_edit']['title'] }}<h1>
         </div>
         {!! Form::model($meal, ['route' => ['chef.update', $meal->id], 'method' => 'PUT', 'files' => true]) !!}
            <div class="w3-row w3-border-grey w3-border-bottom" style="padding-bottom: 2em;">
                <div class="w3-col s12">
                    <div class="w3-row" id="name-form">
                        <div class="w3-col s12">
                            {{ Form::text('name', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'placeholder' => $lang->desktop()['chef_edit']['meal_name'], 'required' => '', 'maxlength' => '255']) }}
                        </div>
                        <div class="w3-col s12" style="margin-top:1.5em;">
                            {{ Form::text('price', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'placeholder' => $lang->desktop()['chef_edit']['meal_price'], 'required' => '', 'maxlength' => '11']) }}
                        </div>
                    </div>

                    <!--div class="input-group w3-padding-8 w3-margin-top"> 
                        {{ Form::text('datetimepeople', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey w3-white', 'id' => 'dtp-result', 'placeholder' => 'Date', 'required' => '']) }}
                        <span class="input-group-addon" id="modal-picker" style="cursor:pointer;"><span class="glyphicon glyphicon-calendar"></span></span>  
                    </div-->

                    <div class=" w3-padding-8">
                        <label class="w3-text-gery w3-large" style="font-family:cursive">{{ $lang->desktop()['chef_edit']['time'] }}</label>
                        {{ Form::select('shifts[]', $shifts, null, ['id' => 'shift-select2', 'class' => 'form-control js-example-basic-multiple', 'multiple' => 'multiple']) }}
                    </div>

                    <div class=" w3-padding-8">
                        <label class="w3-text-gery w3-large" style="font-family:cursive">{{ $lang->desktop()['chef_edit']['category'] }}</label>
                        {{ Form::select('categories[]', $categories, null, ['id' => 'category-select2', 'class' => 'form-control js-example-basic-multiple', 'multiple' => 'multiple']) }}
                    </div>
                               
                    <div class=" w3-padding-8">
                        <label class="w3-text-gery w3-large" style="font-family:cursive">{{ $lang->desktop()['chef_edit']['method'] }}</label>
                        {{ Form::select('methods[]', $methods, null, ['id' => 'method-select2', 'class' => 'form-control js-example-basic-multiple', 'multiple' => 'multiple']) }}
                    </div> 
                </div>
            </div>

            <div class="w3-padding-12" id="cover-form">
                <label class="w3-text-gery w3-large" style="font-family:cursive">{{ $lang->desktop()['chef_edit']['cover_image'] }}</label>
                <div id="" class="w3-padding-medium cover-select-modal-trigger" style="cursor:pointer;">
                    <img src="{{ $meal->cover_img }}" id="cover-image-origin" alt="meal-image" style="width:100%">
                </div>
                <!--for cover image picture, not shown in the previous-->
                @foreach ($images as $image)
                    <div id="cover-image-show{{ $image->id }}" class="w3-padding-48 cover-image-show cover-select-modal-trigger" style="display:none;">
                        <img src="{{ asset($image->image_path) }}" alt="meal-image" style="width:100%;">
                    </div>
                @endforeach
                <!--for cover image input, not shown-->
                {{ Form::text('cover_img', $meal->cover_img_id, ['class' => '', 'id'=>'cover-image-input', 'style'=>'display:none;']) }} 
            </div>

            <div class="w3-padding-12" id="image-form">
                <label class="w3-text-gery w3-large" style="font-family:cursive">{{ $lang->desktop()['chef_edit']['meal_image'] }}</label>

                <div class="w3-border w3-border-grey w3-round-large w3-padding-24 w3-margin-top">
                    <div class="w3-row-padding">
                        @foreach ($images as $image)
                            <div class="w3-col m2 l2 w3-padding-12 w3-display-container ckb-display" id="dpy{{ $image->id }}" style="display:none;">
                                <img src="{{ asset($image->image_path) }}" alt="image" style="width:100%;">
                                <div class="w3-display-bottomright" style="padding-right:1em;pading-bottom:1em;cursor:pointer;">
                                    <div class="w3-large image-link" data-toggle="tooltip"  >
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
                    <div class="w3-col l2 m2">
                        <div id="select-modal-trigger" class="btn w3-large w3-white w3-text-grey w3-border w3-border-grey btn-block zk-shrink-hover"><i class="fa fa-picture-o"></i> {{ $lang->desktop()['chef_edit']['photo'] }}</div>
                    </div>
                </div>

                <!--for image input, not shown-->
                {{ Form::text('img', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'id'=>'image-input', 'style' => 'display:none;']) }} 
            </div>

            <div class="w3-border-green w3-border-bottom w3-padding-12">
                <div class="form-group">
                    <label class="w3-text-gery w3-large" style="font-family:cursive">{{ $lang->desktop()['chef_edit']['meal_description'] }}</label>
                    {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => '30']) }}
                </div>
            </div>

            <div class="w3-row w3-margin-top">
                <div class="w3-rest"></div>
                <div class="w3-col l2 m2 w3-right">
                    {!! Form::submit($lang->desktop()['chef_edit']['save_meal'] , ['class' => 'btn w3-large w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover', 'id' => 'submit']) !!}
                </div>
            </div>  
         {!! Form::close() !!}
     </div>

  <!--Cover Image Select-->
  @include('mobile.partials.ChefCreateCoverImageSelect')
  <!--Image Select-->
  @include('mobile.partials.ChefEditImageSelect')
  <!--loader modal-->
  @include('desktop.partials.loader')

@endsection

@section('scripts')
    <script>
        //Select-2
         $(function () {
            $(".js-example-basic-multiple").select2();
            $("#shift-select2").select2().val({!! json_encode($meal->shifts()->getRelatedIds()) !!}).trigger('change');
            $("#category-select2").select2().val({!! json_encode($meal->categories()->getRelatedIds()) !!}).trigger('change');
            $("#method-select2").select2().val({!! json_encode($meal->methods()->getRelatedIds()) !!}).trigger('change');
        });
    </script>

    <script>
        $("#submit").click(function() {
            $("#LoadingModal").modal();
        });
    </script>
@endsection