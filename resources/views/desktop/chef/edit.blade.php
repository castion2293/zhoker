@extends('desktop.layout.master')

@section('title', '| Chef edit')

@section('styles')
    <script>
        tinymce.init({
            selector:'textarea',
            plugins: ['advlist autolink lists link image charmap print preview anchor',
                      'searchreplace visualblocks code fullscreen',
                      'insertdatetime media table contextmenu paste code'],
            toobar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            menubar: false,
        });
    </script>
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
     <!--header picture-->
     <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1031201606.JPG" alt="profile" style="width:100%">
    </div>

     <!--content-->
     <div class="w3-content w3-container w3-padding-64" id="chef-create">
         <div class="w3-padding-12 w3-margin-top">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">Edit Menu<h1>
         </div>
         {!! Form::model($meal, ['route' => ['chef.update', $meal->id], 'method' => 'PUT', 'files' => true]) !!}
            <div class="w3-row" style="padding-bottom: 2em;">
                <div class="w3-col l5 m5">
                    <img src="{{ URL::to('https://s3-us-west-2.amazonaws.com/zhoker/images/1028201601.jpg') }}" alt="profile" style="width:100%">
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
                        {{ Form::select('shifts[]', $shifts, null, ['id' => 'shift-select2', 'class' => 'form-control js-example-basic-multiple', 'multiple' => 'multiple']) }}
                    </div>

                    <div class=" w3-padding-8">
                        <label class="w3-text-gery" style="font-family:cursive">Category</label>  
                        {{ Form::select('categories[]', $categories, null, ['id' => 'category-select2', 'class' => 'form-control js-example-basic-multiple', 'multiple' => 'multiple']) }}
                    </div>
                               
                    <div class=" w3-padding-8">
                        <label class="w3-text-gery" style="font-family:cursive">Method</label>  
                        {{ Form::select('methods[]', $methods, null, ['id' => 'method-select2', 'class' => 'form-control js-example-basic-multiple', 'multiple' => 'multiple']) }}
                    </div> 
                </div>
            </div>

            <div class="w3-border-green w3-border-bottom w3-padding-12">
                <div class="form-group">
                    <label class="w3-text-gery w3-large" style="font-family:cursive">Menu Description</label> 
                    {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'meal-description', 'rows' => '30']) }}
                </div>
            </div>

            <div class="w3-row w3-margin-top">
                <div class="w3-rest"></div>
                <div class="w3-col l2 m2 w3-right">
                    {!! Form::submit('Save Menu', ['class' => 'btn w3-large w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover', 'id' => 'submit']) !!}
                </div>
            </div>  
         {!! Form::close() !!}

         <div class="w3-padding-12 w3-margin-top">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">Edit Image<h1>
        </div>

         <div class="w3-border w3-border-green w3-round-large w3-padding-24 w3-margin-top">
            <div class="w3-row-padding">
                @foreach ($meal->images as $image)
                    <div class="w3-col m2 l2 w3-display-container">
                        {!! Form::open(['route' => ['chef.delete.delete_image', $image->id, $meal->id], 'method' => 'DELETE']) !!}
                            <img src="{{ asset($image->image_path) }}" alt="meal" style="width:100%;">
                            <button type="submit" id="delete_img" class="w3-xxlarge w3-text-white w3-transparent w3-display-topmiddle zk-shrink-hover" style="border:none;"><i class="fa fa-times"></i></button>
                        {!! Form::close() !!}
                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group w3-margin-top">
            <label class="w3-text-gery w3-large" style="font-family:cursive">Upload Photos(10 max)</label> 
            <div class="dropzone" id="my-dropzone">
                <div class="fallback">
                    <input name="img" type="file" multiple  required="" />
                </div>
            </div>

            <div class="w3-row w3-margin-top w3-border-green w3-border-top" style="padding-top:1em;">
                <div class="w3-rest"></div>
                <div class="w3-col l2 m2 w3-right">
                    <button class="btn w3-large w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover" id="upload-img">Upload Image</button>
                    <a href="{{ url('/chef/' . encrypt($meal->id) . '/edit#submit') }}" id="success-link" style="display:none;">Success Link</a>
                </div>
            </div>  
        </div>

     </div>

  <!--Data Time People Modal -->
  @include('desktop.partials.ChefEditFullCalendar');
  
@endsection

@section('scripts')
    <!--Select-2-->
    <script>
         $(function () {
            $(".js-example-basic-multiple").select2();
            $("#shift-select2").select2().val({!! json_encode($meal->shifts()->getRelatedIds()) !!}).trigger('change');
            $("#category-select2").select2().val({!! json_encode($meal->categories()->getRelatedIds()) !!}).trigger('change');
            $("#method-select2").select2().val({!! json_encode($meal->methods()->getRelatedIds()) !!}).trigger('change');
        });
    </script>

    <!--Upload file-->
    <script>
        Dropzone.options.myDropzone= {
            url: '{{ route('chef.upload.upload_image', ['meal_id' => $meal->id]) }}',
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 10,
            maxFiles: 10,
            maxFilesize: 4,
            method: 'POST',
            acceptedFiles: 'image/*',
            addRemoveLinks: true,
            headers: {
                'X-CSRF-Token': $('input[name="_token"]').val()
            },
            init: function() {
                dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

                document.getElementById("upload-img").addEventListener("click", function(e) {
                    // Make sure that the form isn't actually being sent.
                    e.preventDefault();
                    e.stopPropagation();
                    dzClosure.processQueue();
                });

                //send all the form data along with the files:
                this.on("sendingmultiple", function(data, xhr, formData) {
                
                });
            },
            success: function(file, response){
                $("#success-link")[0].click();
            }
        }
    </script>
@endsection