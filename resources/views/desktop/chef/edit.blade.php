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
            <div class="w3-row w3-border-grey w3-border-bottom" style="padding-bottom: 2em;">
                <div class="w3-col l5 m5">
                    <img src="{{ URL::to('https://s3-us-west-2.amazonaws.com/zhoker/images/1028201601.jpg') }}" alt="profile" style="width:100%">
                </div>
                <div class="w3-col l7 m7" style="padding-left:2em;">
                    <div class="w3-row">
                        <div class="w3-col l6 m6" style="padding-right:0.5em;">
                            {{ Form::text('name', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'placeholder' => 'Menu Name', 'required' => '', 'maxlength' => '255']) }}   
                        </div>
                        <div class="w3-col l6 m6" style="padding-left:0.5em;">
                            {{ Form::text('price', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey', 'placeholder' => 'Menu Price', 'required' => '', 'maxlength' => '11']) }}              
                        </div>
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

                    <div class="form-group w3-row">
                        <div class="w3-col l2 m2 w3-padding-small">
                            <img id="img_content" src="{{ asset($meal->img_path) }}" alt="image contetnt" style="width:100%">
                         </div>
                        <div class="w3-col l10 m10">
                            <input type="file" id="myFile" name="img" onchange="readURL(this);" style="display:none;">
                            <button type="button" class="w3-btn w3-white w3-border w3-border-grey w3-margin-top w3-margin-left w3-text-grey" style="font-family:cursive;" onclick="document.getElementById('myFile').click();">Upload a Photo</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w3-border-green w3-border-bottom w3-padding-12">
                <div class="form-group">
                    <label class="w3-text-gery w3-large" style="font-family:cursive">Menu Description</label> 
                    {{ Form::textarea('description', null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="w3-row w3-margin-top">
                <div class="w3-rest"></div>
                <div class="w3-col l2 m2 w3-right">
                    {!! Form::submit('Save Menu', ['class' => 'btn w3-large w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover']) !!}
                </div>
            </div>  
         {!! Form::close() !!}
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