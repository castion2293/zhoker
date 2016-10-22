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
                            <label for="datetime" class="w3-text-grey"> Date/Time</label>
                            {{ Form::text('datetime', null, ['class' => 'form-control w3-large w3-text-grey w3-white', 'id' => 'datetimepicker', 'required' => '', 'style' => 'cursor:pointer;']) }}
                        </div>

                        <div class="foreground">
                            <label for="people" class="w3-text-grey"> People</label>
                            <select class="form-control" name="people" required="">
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
@endsection

@section('scripts')
    <script>
    $(function () {
        //datetimepicker
        $("#datetimepicker").datetimepicker();

        //Select-2
        $(".js-example-basic-multiple").select2();
    });
    </script>
@endsection