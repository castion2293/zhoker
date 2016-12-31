@extends('desktop.layout.master')

@section('title', '| Chef show')

@section('styles')
  <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1031201603.JPG" alt="profile" style="width:100%">
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

                  <div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
                        @foreach ($meal->images as $image)
                            @if ($loop->first)
                              <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                <a href="{{ $image->image_path }}" itemprop="contentUrl" data-size="1024x575">
                                    <img src="{{ asset($image->image_path) }}" alt="this is a photo" style="width:100%">
                                </a>                                   
                              </figure>
                            @else
                              <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                <a href="{{ $image->image_path }}" itemprop="contentUrl" data-size="1024x575">
                                    <img src="{{ asset($image->image_path) }}" alt="this is a photo" style="width:100%;display:none;">
                                </a>                                   
                              </figure>
                            @endif
                        @endforeach
                    </div>
                    @include('desktop.partials.photoswipe')
                    
              </div>
              <div class="w3-col l5 m5 w3-padding-large">
                  <div class="w3-border-bottom w3-border-grey w3-padding-12">
                    <table class="w3-table w3-small">
                        <thead>
                          <th>Date</th>
                          <th>Time</th>
                          <th>People Left</th>
                          <th>People Orders</th>
                        </thead>
                        <tbody>
                          @foreach ($meal->datetimepeoples as $datetimepeople)
                            <tr>
                              <td>{{ $datetimepeople->date }}</td>
                              <td>{{ date("g:i a", strtotime($datetimepeople->time)) }}</td>
                              <td class="w3-center">{{ $datetimepeople->people_left }}</td>
                              <td class="w3-center"><span class="w3-badge w3-red">{{ $datetimepeople->people_order }}</span></td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                  </div>
                  <div class="w3-margin-top w3-border-bottom w3-border-grey"> 
                    <label>Mathod:   
                      @foreach ($meal->methods as $method)
                          <p class="w3-tag w3-teal w3-tiny">{{ $method->method }}</p>
                      @endforeach
                    </label>
                  </div>
                  <div class="w3-margin-top w3-border-bottom w3-border-grey">
                    <label>Time:
                      @foreach ($meal->shifts as $shift)
                          <p class="w3-tag w3-teal w3-tiny">{{ $shift->shift }}</p>
                      @endforeach
                    </label>
                  </div>
                  <div class="w3-margin-top w3-border-bottom w3-border-grey">
                    <label>Type:
                      @foreach ($meal->categories as $category)
                          <p class="w3-tag w3-teal w3-tiny">{{ $category->category }}</p>
                      @endforeach
                    </label>
                  </div>
                  <div class="w3-margin-top w3-border-bottom w3-border-grey">
                    <label>Evaluation:  
                        @for ($i = 0; $i < 5; $i++)
                          <span class="w3-text-orange w3-large"><i class="fa fa-star"></i></span>
                        @endfor
                    </label>
                  </div>
              </div>  
            </div>

            <div class="w3-col l12 m12 w3-border-green w3-border-bottom w3-padding-bottom">
              <p>{!! $meal->description !!}</p>
            </div>

            <div class="w3-row">
              <div class="w3-rest"></div> 
              <div class="w3-col l2 m2 w3-right w3-padding-small">
                 {!! Form::open(['route' => ['chef.destroy', $meal->id], 'method' => 'DELETE']) !!}

                    {!! Form::submit('Delete', ['class' => 'btn w3-large w3-white w3-text-red w3-border w3-border-red btn-block w3-margin-top zk-shrink-hover', 'id' => 'delete-confirm', 'style' => 'display:none;']) !!}

                 {!! Form::close() !!}
                 <button id="delete-warn" class="btn w3-large w3-white w3-text-red w3-border w3-border-red btn-block w3-margin-top zk-shrink-hover">Delete</button>
              </div>
              <div class="w3-col l2 m2 w3-right w3-margin-top w3-padding-small">
                {!! Html::linkRoute('chef.edit', 'Edit', [encrypt($meal->id)], ['class' => 'btn w3-white w3-large w3-text-green w3-border w3-border-green btn-block zk-shrink-hover']) !!}
              </div>
            </div>
    </div>
@endsection

@section('scripts')
    <!--delete meal-->
    <script>
        $(function () {
            $("#delete-warn").click(function () {
              swal({
                title: "Are you sure?",
                text: "You will not be able to recover the meal!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
              },
              function(){
                $("#delete-confirm").click();
              });
            });
        });
    </script>
@endsection