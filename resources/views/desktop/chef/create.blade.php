@extends('desktop.layout.master')

@section('title', '| Chef create')

@section('styles')
    <script src="{{ URL::to('js/tinymce.js') }}"></script>
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1031201602.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-64" id="chef-create">
        <div>
            <div class="w3-padding-12 w3-margin-top">
                <h1 class="w3-text-green w3-border-green w3-border-bottom">Create a Menu<h1>
            </div>
            
            {!! Form::open(['route' => 'chef.store', 'data-parsley-validate' => '', 'files' => true, 'method' => 'POST']) !!}
                <div class="w3-row" style="padding-bottom: 2em;">
                    <div class="w3-col l5 m5">
                        <img src="{{ URL::to('https://s3-us-west-2.amazonaws.com/zhoker/images/1026201601.png') }}" alt="profile" style="width:100%">
                    </div>
                    <div class="w3-col l7 m7" style="padding-left:2em;">
                        
                        <div class="" style="padding-right:0.5em;">
                            {{ Form::text('name', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'id'=>'menu-name', 'placeholder' => 'Menu Name', 'required' => '', 'maxlength' => '255']) }}   
                        </div>

                        <div class="w3-padding-8 w3-margin-top" style="padding-right:0.5em;">
                            {{ Form::text('price', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'id'=>'menu-price', 'placeholder' => 'Menu Price', 'required' => '', 'maxlength' => '11']) }}              
                        </div>
                        
                                
                        <div class="input-group w3-padding-8 w3-margin-top">
                            <span class="input-group-addon" id="modal-picker" style="cursor:pointer;"><span class="glyphicon glyphicon-calendar"></span></span>   
                            {{ Form::text('datetimepeople', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey w3-white', 'id' => 'dtp-result', 'placeholder' => 'Date', 'required' => '', 'readonly' => '']) }}
                        </div>

                        <div class=" w3-padding-8">
                            <label class="w3-text-gery" style="font-family:cursive">Time</label>               
                            <select class="w3-select js-example-basic-multiple" id="shift-select2" name="shifts[]" multiple="multiple" placeholder="Shift" required=""> 
                                @foreach($shifts as $shift)
                                    <option value='{{ $shift->id }}'>{{ $shift->shift }}</option>
                                @endforeach
                            </select>
                        </div>
                                
                        <div class=" w3-padding-8">
                            <label class="w3-text-gery" style="font-family:cursive">Category</label>  
                            <select class="w3-select js-example-basic-multiple" id="category-select2" name="categories[]" multiple="multiple" required=""> 
                                @foreach($categories as $category)
                                    <option value='{{ $category->id }}'>{{ $category->category }}</option>
                                @endforeach
                            </select>
                        </div>
                                
                        <div class=" w3-padding-8" id="method-form">
                            <label class="w3-text-gery" style="font-family:cursive">Method</label>  
                            <select class="w3-select js-example-basic-multiple" id="method-select2" name="methods[]" multiple="multiple" required=""> 
                                @foreach($methods as $method)
                                    <option value='{{ $method->id }}'>{{ $method->method }}</option>
                                @endforeach
                            </select>
                        </div> 
                    </div>
                </div>

                <div class="w3-padding-12" id="image-form">
                    <div class="w3-row">
                        <div class="w3-col l2 m2">
                            <div id="select-modal-trigger" class="btn w3-large w3-white w3-text-grey w3-border w3-border-grey btn-block zk-shrink-hover"><i class="fa fa-picture-o"></i> Phote</div>
                        </div>
                    </div>

                    <!--for image input, not shown-->
                    {{ Form::text('img', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'id'=>'image-input', 'style'=>'display:none;']) }} 

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
                </div>

                <div class="w3-padding-12">
                    <div class="form-group">
                        <label class="w3-text-gery w3-large" style="font-family:cursive">Menu Description</label> 
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'meal-description', 'rows' => '30']) }}
                    </div>
                </div>

                <div class="w3-row w3-margin-top w3-border-green w3-border-top" style="padding-top:1em;">
                    <div class="w3-rest"></div>
                    <div class="w3-col l3 m3 w3-right">
                        {!! Form::submit('Create Menu', ['class' => 'btn w3-large w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover', 'id' => 'create-btn']) !!}
                    </div>
                </div>  
            {!! Form::close() !!}
        </div>
    </div>  

    

  <!--Data Time People Modal -->
  @include('desktop.partials.ChefCreateFullCalendar');
  <!--Image select-->
  @include('desktop.partials.ChefCreateImageSelect');
  <!--loader modal-->
  @include('desktop.partials.loader');

@endsection

@section('scripts')
    <script>
        $(function () {
            // Select-2
            $(".js-example-basic-multiple").select2();

            // loader
            $("#create-btn").click(function() {
                $("#LoadingModal").modal();
            });
        });
    </script>
@endsection