@extends('desktop.layout.master')

@section('title', '| Chef create')

@section('styles')
    <script>
        tinymce.init({
            selector:'textarea',
            plugins: "link code",
            menubar: false,
        });
    </script>
@endsection

@section('content')
    <!--header picture-->
    <div class="bgimg-3 w3-opacity"></div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-64">
        <div>
            <div class="w3-padding-12 w3-margin-top">
                <h1 class="w3-text-green w3-border-green w3-border-bottom">Create a Menu<h1>
            </div>
            <div class="row">
                 <div class="col-md-12">
                    {!! Form::open(['route' => 'chef.store', 'data-parsley-validate' => '', 'files' => true, 'method' => 'POST']) !!}
                        <div class="form-group">
                            <label for="name" class="w3-text-grey"> Name</label>
                            {{ Form::text('name', null, ['class' => 'form-control w3-large w3-text-grey', 'required' => '', 'maxlength' => '255']) }}              
                        </div>

                        <div class="form-group">
                            <label for="price" class="w3-text-grey"> Price</label>
                            {{ Form::text('price', null, ['class' => 'form-control w3-large w3-text-grey', 'required' => '', 'maxlength' => '11']) }}              
                        </div>

                        <div class="form-group">
                            <label for="datetime" class="w3-text-grey"> Date/Time/People</label>
                            <div class="input-group">
                                <span class="input-group-addon" id="modal-picker" style="cursor:pointer;"><span class="glyphicon glyphicon-calendar"></span></span>   
                                {{ Form::text('datetimepeople', null, ['class' => 'form-control w3-large w3-text-grey w3-white', 'id' => 'dtp-result', 'required' => '']) }}
                            </div>
                        </div>

                        <div class="form-group">
                             <label for="shifts" class="w3-text-grey"> Shift</label>
                             <select class="form-control js-example-basic-multiple" name="shifts[]" multiple="multiple" required=""> 
                                @foreach($shifts as $shift)
                                    <option value='{{ $shift->id }}'>{{ $shift->shift }}</option>
                                @endforeach
                             </select>
                        </div>

                        <div class="form-group">
                             <label for="categories" class="w3-text-grey"> Category</label>
                             <select class="form-control js-example-basic-multiple" name="categories[]" multiple="multiple" required=""> 
                                @foreach($categories as $category)
                                    <option value='{{ $category->id }}'>{{ $category->category }}</option>
                                @endforeach
                             </select>
                        </div>

                        <div class="form-group">
                             <label for="methods" class="w3-text-grey"> Mehtod</label>
                             <select class="form-control js-example-basic-multiple" name="methods[]" multiple="multiple" required=""> 
                                @foreach($methods as $method)
                                    <option value='{{ $method->id }}'>{{ $method->method }}</option>
                                @endforeach
                             </select>
                        </div>

                        <div class="form-group">
                            <label for="img" class="w3-text-grey"> Upload Image</label>
                            {{ Form::file('img', null, ['required' => '']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('description', 'Description') }}
                            {{ Form::textarea('description', null, ['class' => 'form-control']) }}
                        </div>

                        {{ Form::submit('Create Menu', ['class' => 'btn btn-success btn-lg btn-block']) }} 

                    {!! Form::close() !!}
                 </div>
            </div>
        </div>
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

            <a href="#modal-picker" class="btn btn-success form-control w3-margin-top" id="confirm-btn" data-dismiss="modal"><span class="w3-large"></span>Confirm</a>
            
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
    });
    </script>
@endsection