@extends('desktop.layout.master')

@section('title', '| Chef create')

@section('styles')
    <script src="{{ URL::to('js/tinyMCE.js') }}"></script>
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
                            
                    <div class=" w3-padding-8">
                        <label class="w3-text-gery" style="font-family:cursive">Method</label>  
                        <select class="w3-select js-example-basic-multiple" id="method-select2" name="methods[]" multiple="multiple" required=""> 
                            @foreach($methods as $method)
                                <option value='{{ $method->id }}'>{{ $method->method }}</option>
                            @endforeach
                        </select>
                    </div> 
                </div>
            </div>

            <div class="w3-padding-12">
                <div class="form-group">
                    <label class="w3-text-gery w3-large" style="font-family:cursive">Menu Description</label> 
                    {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'meal-description', 'rows' => '30']) }}
                </div>
            </div>
            
            <div class="form-group">
                <label class="w3-text-gery w3-large" style="font-family:cursive">Upload Photos(10 max)</label> 
                <div class="dropzone" id="my-dropzone">
                    <div class="fallback">
                        <input name="img" type="file" multiple  required="" />
                    </div>
                </div>
            </div>

            <div class="w3-row w3-margin-top w3-border-green w3-border-top" style="padding-top:1em;">
                <div class="w3-rest"></div>
                <div class="w3-col l3 m3 w3-right">
                    {!! Form::submit('Create Menu', ['class' => 'btn w3-large w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover', 'id' => 'submit-all']) !!}
                    <a href="{{ url('/chef') }}" id="success-link" style="display:none;">Success Link</a>
                </div>
            </div>  
            
        </div>
    </div>  

  <!--Data Time People Modal -->
  @include('desktop.partials.ChefCreateFullCalendar');

@endsection

@section('scripts')
    <!--Select-2-->
    <script>
        $(function () {
            $(".js-example-basic-multiple").select2();
        });
    </script>

    <!--Upload file-->
    <script>
        Dropzone.options.myDropzone= {
            url: '{{ url::to('\chef') }}',
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 10,
            maxFiles: 10,
            maxFilesize: 5,
            method: 'POST',
            acceptedFiles: 'image/*',
            addRemoveLinks: true,
            headers: {
                'X-CSRF-Token': $('input[name="_token"]').val()
            },
            init: function() {
                dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

                document.getElementById("submit-all").addEventListener("click", function(e) {
                    // Make sure that the form isn't actually being sent.
                    e.preventDefault();
                    e.stopPropagation();
                    dzClosure.processQueue();
                });

                //send all the form data along with the files:
                this.on("sendingmultiple", function(data, xhr, formData) {
                    formData.append("name", jQuery("#menu-name").val());
                    formData.append("price", jQuery("#menu-price").val());
                    formData.append("datetimepeople", jQuery("#dtp-result").val());
                    formData.append("shifts",  jQuery("#shift-select2").select2().val().toString());
                    formData.append("categories", jQuery("#category-select2").select2().val().toString());
                    formData.append("methods", jQuery("#method-select2").select2().val().toString());

                    tinyMCE.triggerSave();//get tinyMCE textarea value
                    formData.append("description", jQuery("#meal-description").val());
                });
            },
            success: function(file, response){
                $("#success-link")[0].click();
            }
        }
    </script>
@endsection