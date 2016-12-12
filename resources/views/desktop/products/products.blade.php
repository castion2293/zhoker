@extends('desktop.layout.master')

@section('title', '| Product meal show')

@section('styles')
    <link rel="stylesheet" href="{{ URL::to('css/cs-select.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/cs-skin-elastic.css') }}">
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="w3-row" id="top-pic">
        <div class="w3-col l4 m4">
            <img src="{{ asset($meal->img_path) }}" alt="profile" style="width:100%">
        </div>
        <div class="w3-col l4 m4">
            <img src="{{ asset($meal->img_path) }}" alt="profile" style="width:100%">
        </div>
        <div class="w3-col l4 m4">
            <img src="{{ asset($meal->img_path) }}" alt="profile" style="width:100%">
        </div>
    </div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-64">
        <div class="w3-row w3-margin-top w3-border-green w3-border-bottom">
            <div class="w3-col l10 m10">
                <h1 class="w3-text-grey w3-xxlarge w3-margin-left" style="font-family: cursive">{{ $meal->name }}<h1>
            </div>
            <div class="w3-col l2 m2">
                <b class="w3-text-green w3-xlarge w3-right w3-margin-right" style="margin-top:2em;">${{ $meal->price }}TWD</b>
            </div>
        </div>
        <div class="w3-row w3-padding-12">
            <div class="w3-col l7 m7 w3-padding-large">
                <div class="w3-padding-12">
                    <img src="{{ asset($meal->img_path) }}" alt="this is a photo" style="width:100%">
                </div>
            </div>
            <div class="w3-col l5 m5 w3-padding-large">
              {!! Form::open(['route' => ['product.cart', $meal->id, $datetimepeople->id], 'data-parsley-validate' => '', 'files' => true, 'method' => 'POST']) !!}
                <div class="w3-margin-top w3-border-bottom w3-border-grey">
                    <label>Evaluation:  
                        @for ($i = 0; $i < 5; $i++)
                          <span class="w3-text-orange w3-large"><i class="fa fa-star"></i></span>
                        @endfor
                    </label>
                </div>
                <div class="w3-margin-top w3-border-bottom w3-border-grey">
                    <label>Type:
                      @foreach ($meal->categories as $category)
                          <p class="w3-tag w3-teal w3-tiny">{{ $category->category }}</p>
                      @endforeach
                    </label>
                </div>
                <div class="w3-padding-12 w3-border-bottom w3-border-grey">
                    <label>Date/time:
                        <sapn class="w3-text-grey w3-large">{{ $datetimepeople->date }} / {{ $datetimepeople->time }}</span>
                    </label>
                </div>
                <div class="w3-row w3-padding-12 w3-border-bottom w3-border-grey">
                    <div class="w3-col l3 m3" style="margin-top:0.5em;">
                      <label>How Many:</label>
                    </div>
                    <div class="w3-col l3 m3">
                      <select class="w3-select w3-border w3-text-grey w3-medium" id="people_order" name="people_order" required="" > 
                          @for ($i = 0;$i < $datetimepeople->people_left;$i++)
                              <option value='{{ $i + 1 }}'>{{ $i+1 }} people</option>
                          @endfor
                      </select>
                    </div>
                    <div class="w3-col l3 m3 w3-center" style="margin-top:0.5em;">
                      <label>Method:</label>
                    </div>
                    <div class="w3-col l3 m3">
                      <select class="w3-select w3-border w3-text-grey w3-medium" id="method_way" name="method_way" required="" > 
                          @foreach ($methods as $method)
                              <option value='{{ $method->id }}'>{{ $method->method }}</option>
                          @endforeach
                      </select>
                    </div>
                </div>
                <div class="w3-row w3-padding-12">
                    {!! Form::submit('ADD TO CART', ['id' => 'add-to-cart', 'class' => 'btn w3-deep-orange w3-border w3-border-deep-orange btn-block w3-large zk-shrink-hover w3-hover-deep-orange']) !!}
                </div>
               {!! Form::close() !!}
            </div>

            <div class="w3-col s12 w3-padding-large">
                <label class="w3-text-grey w3-large" style="font-family: cursive">meal description</label>
                <p>{!! $meal->description !!}</p>
            </div>
        </div>
    </div>

@endsection