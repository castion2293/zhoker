@extends('desktop.layout.master')

@section('title', '| Chef show')

@section('styles')

@endsection

@section('content')
    <!--header picture-->
    <div class="bgimg-4 w3-opacity"></div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-64">
        <div>
            <div class="w3-padding-12 w3-margin-top">
                <h1 class="w3-text-green w3-border-green w3-border-bottom">New Menu<h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                         <label for="name" class="w3-text-grey"> Name</label>
                         <h3>{{ $meal->name }}</h3>
                    </div>
                    <hr>
                    <div class="form-group">
                         <label for="Price" class="w3-text-grey"> Price</label>
                         <h3>{{ $meal->price }}</h3>
                    </div>
                    <hr>
                    <div class="form-group">
                         <label for="Date" class="w3-text-grey"> Date</label>
                          @foreach ($meal->datetimepeoples as $datetimepeople)
                            <h3>{{ date('M j, Y', strtotime($datetimepeople->date)) }}</h3>      
                          @endforeach
                    </div>
                    <hr>
                    <div class="form-group">
                         <label for="Time" class="w3-text-grey"> Time</label>
                          @foreach ($meal->datetimepeoples as $datetimepeople)
                            <h3>{{ date('h:ia', strtotime($datetimepeople->time)) }}</h3>      
                          @endforeach
                    </div>
                    <hr>
                    <div class="form-group">
                         <label for="Prople" class="w3-text-grey"> People</label>
                          @foreach ($meal->datetimepeoples as $datetimepeople)
                            <h3>{{ $datetimepeople->people_left }}</h3>      
                          @endforeach
                    </div>
                    <hr>
                    <div class="form-group">
                         <label for="Shift" class="w3-text-grey"> Shift</label>
                          @foreach ($meal->shifts as $shift)
                            <h3>{{ $shift->shift }}</h3>      
                          @endforeach
                    </div>
                    <hr>
                    <div class="form-group">
                         <label for="Category" class="w3-text-grey"> Category</label>
                          @foreach ($meal->categories as $category)
                            <h3>{{ $category->category }}</h3>      
                          @endforeach
                    </div>
                    <hr>
                    <div class="form-group">
                         <label for="Method" class="w3-text-grey"> Method</label>
                          @foreach ($meal->methods as $method)
                            <h3>{{ $method->method }}</h3>      
                          @endforeach
                    </div>
                    <hr>
                    <div class="form-group">
                         <label for="Image" class="w3-text-grey"> Imgae</label>
                         <img src="{{ asset('images/' . $meal->img_path) }}" alt="this is a photo">
                    </div>
                    <hr>
                     <div class="form-group">
                         <label for="Description" class="w3-text-grey"> Description</label>
                          <p>{!! $meal->description !!}</p>
                    </div>
                    <hr>
                    {!! Html::linkRoute('chef.edit', 'Edit', [$meal->id], ['class' => 'btn btn-primary btn-block']) !!}
                     
                    {!! Form::open(['route' => ['chef.destroy', $meal->id], 'method' => 'DELETE']) !!}

                      {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block w3-margin-top']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection