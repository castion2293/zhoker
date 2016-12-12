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
                        {{ Form::text('datetimepeople', $datetimepeople, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey w3-white', 'id' => 'dtp-result', 'placeholder' => 'Date', 'required' => '']) }}
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
  <div class="modal" id="DatetimePeopleModal" role="dialog">
    <div class="modal-dialog" style="width:500px;">

      <!-- Modal content-->
      <div class="modal-content">
        <div>
          <span class="glyphicon glyphicon-remove pull-right w3-large" data-dismiss="modal" style="cursor:pointer;margin-right:20px;margin-top:10px"></span>
        </div>
        <div>
          <h1 class="text-center w3-padding-8 w3-text-green">Select Data/Time/People</h1>
        </div>
        <div class="modal-body" style="padding:10px 50px;">
          {!! Form::open([null, 'data-parsley-validate' => '']) !!}
            <div class="form-group">
                <label for="date" class="w3-text-grey"> Date</label>
                {{ Form::text('date', null, ['class' => 'form-control w3-large w3-text-grey', 'id' => 'datepicker', 'required' => '']) }}
            </div>

            <div class="form-group">
                <label for="time" class="w3-text-grey"> Time</label>
                {{ Form::text('time', null, ['class' => 'form-control w3-large w3-text-grey', 'id' => 'timepicker', 'required' => '']) }}
            </div>

            <div class="form-ground">
                <label for="people" class="w3-text-grey"> People</label>
                <select class="form-control" id="peoplepicker" name="people" required="">
                    <option value='1'>1 Person</option>
                    <option value='2'>2 People</option>
                    <option value='3'>3 People</option>
                    <option value='4'>4 People</option>
                    <option value='5'>5 People</option>
                    <option value='6'>6 People</option>
                    <option value='7'>7 People</option>
                    <option value='8'>8 People</option>
                    <option value='9'>9 People</option>
                    <option value='10'>10 People</option>
                </select>
            </div>

            <a href="#modal-picker" class="btn btn-success form-control w3-margin-top " id="confirm-btn" data-dismiss="modal"><span class="w3-large"></span>Confirm</a>
            
          {!! Form::close() !!}
        </div>
      </div>

    </div>
  </div>  
@endsection

@section('scripts')
    <script>
    $(function () {
        var dptlist = "";
        var list = "";

        //Open Date Time People Modal
        $("#modal-picker").click(function(){
          $("#DatetimePeopleModal").modal();
        });

        //datetimepicker
        $("#datepicker").datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $("#timepicker").datetimepicker({
            format: 'LT'
        });

        //OnPicker Event
        $("#confirm-btn").on('click', function(event) {
           dptlist = $("#dtp-result").val();
           list = $("#datepicker").val() + "," + $("#timepicker").val() + "," + $("#peoplepicker").val() + ";";
           dptlist = dptlist.concat(list);
           $("#dtp-result").val(dptlist);
        });

        //Select-2
        $(".js-example-basic-multiple").select2();
        $("#shift-select2").select2().val({!! json_encode($meal->shifts()->getRelatedIds()) !!}).trigger('change');
        $("#category-select2").select2().val({!! json_encode($meal->categories()->getRelatedIds()) !!}).trigger('change');
        $("#method-select2").select2().val({!! json_encode($meal->methods()->getRelatedIds()) !!}).trigger('change');
    });
    </script>
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