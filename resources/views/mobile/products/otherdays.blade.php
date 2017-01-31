@extends('mobile.layout.master')

@section('title', '| Product meal show')

@section('styles')
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="w3-row" id="top-pic">
        @foreach ($meal->images->take(2) as $image)
            @if ($loop->iteration == 2)
              <div class="w3-col s12">
                  <img src="{{ asset($image->image_path) }}" alt="profile" style="width:100%">
              </div>
            @endif
        @endforeach
    </div>

    <!--content-->
    <div class="w3-padding-32">
        <div class="w3-row w3-border-green w3-border-bottom">
            <div class="w3-col s12 w3-center">
                <h1 class="w3-text-grey w3-xxlarge w3-margin-left" style="font-family: cursive">{{ $meal->name }}<h1>
            </div>
            <div class="w3-rest"></div>
            <div class="w3-col s4 w3-right">
                <b class="w3-text-green w3-large w3-right w3-margin-right" style="margin-top:1em;">${{ $meal->price }}TWD</b>
            </div>
        </div>
    </div>
    <div class="w3-row w3-padding-12">
            <div class="w3-col s12 w3-padding-small">
                <div class="w3-padding-4 w3-display-container">

                    <div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
                        @foreach ($meal->images as $image)
                            @if ($loop->first)
                              <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                <a id="image_link" href="{{ $image->image_path }}" itemprop="contentUrl" data-size="1024x575">
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
                    <div class="w3-display-bottomright" style="padding-right:3em;padding-bottom:1em;">
                      <div id="image_btn" class="w3-btn-floating w3-text-white w3-transparent" style="border: 2px solid;"><i class="fa fa-instagram"></i></div>
                    </div>
                    
                </div>
                <div class="w3-margin-top w3-border-grey w3-border-top w3-border-bottom w3-padding-12">
                    <div class="w3-row w3-padding-small">
                        <div class="w3-col s12 w3-border-bottom w3-border-grey">
                            <label>Evaluation:  
                                @for ($i = 0; $i < 5; $i++)
                                    <span class="w3-text-orange w3-large"><i class="fa fa-star"></i></span>
                                @endfor
                            </label>
                        </div>
                        <div class="w3-col s12 w3-margin-top w3-border-bottom w3-border-grey">
                            <label>Type:
                                @foreach ($meal->categories as $category)
                                    <p class="w3-tag w3-teal w3-tiny">{{ $category->category }}</p>
                                @endforeach
                            </label>
                        </div>
                        <div class="w3-col s12 w3-margin-top w3-border-bottom w3-border-grey">
                            <label>Method:
                                @foreach ($meal->methods as $method)
                                    <p class="w3-tag w3-teal w3-tiny">{{ $method->method }}</p>
                                @endforeach
                            </label>
                        </div>
                        <div class="w3-col s12 w3-margin-top w3-border-bottom w3-border-grey">
                            <label>Time:
                                @foreach ($meal->shifts as $shift)
                                    <p class="w3-tag w3-teal w3-tiny">{{ $shift->shift }}</p>
                                @endforeach
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="w3-margin-top w3-padding-12">
                    <table class="w3-table w3-bordered w3-medium">
                         <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th class="w3-center">people left</th>
                            <th class="w3-right" style="padding-right:2em;">Action</th>
                        </tr>
                        @foreach ($datetimepeoples as $datetimepeople)
                            <tr>
                                <td>{{ $datetimepeople->date }}</td>
                                <td>{{ $datetimepeople->time }}</td>
                                <td class="w3-center">{{ $datetimepeople->people_left }}</td>
                                <td class="w3-right"><a href="{{ route('product.show', ['id' => encrypt($meal->id), 'datetime_id' => encrypt($datetimepeople->id)])}}" class="btn w3-deep-orange zk-shrink-hover w3-small">Add to Cart</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
    </div>
    
@endsection

@section('scripts')
    <!--swipe image btn-->
    <script>
      $(function () {
        $("#image_btn").click(function() {
          $("#image_link")[0].click();
        });
      });
    </script>
@endsection