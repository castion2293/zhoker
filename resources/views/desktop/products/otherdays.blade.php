@extends('desktop.layout.master')

@section('title', '| Product meal other days' . $meal->name)

@section('styles')
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="w3-row" id="top-pic">
        @foreach ($meal->images->take(4) as $image)
            @if ($loop->iteration > 1)
              <div class="w3-col l4 m4">
                  <img src="{{ asset($image->image_path) }}" alt="profile" style="width:100%">
              </div>
            @endif
        @endforeach
    </div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-64">
        <div class="w3-row w3-margin-top w3-border-green w3-border-bottom">
            <div class="w3-col l10 m10">
                <h1 class="w3-text-grey w3-xxlarge w3-margin-left" style="font-family: cursive">{{ $meal->name }}</h1>
            </div>
            <div class="w3-col l2 m2">
                <b class="w3-text-green w3-xlarge w3-right w3-margin-right" style="margin-top:2em;">${{ $meal->price }}TWD</b>
            </div>
        </div>
        <div class="w3-row w3-padding-12">
            <div class="w3-col l7 m7 w3-padding-large">
                <div class="w3-padding-12 w3-display-container">
            
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
                    <div class="w3-display-bottomright" style="padding-right:4em;padding-bottom:2em;">
                      <div id="image_btn" class="w3-btn-floating w3-text-white w3-transparent" style="border: 2px solid;"><i class="fa fa-instagram"></i></div>
                    </div>
                </div>

            </div>
            <div class="w3-col l5 m5 w3-padding-large">
                <div class="w3-border-bottom w3-border-grey" style="margin-top:1.5em;">
                    <label>{{ $lang->desktop()['other_day']['evaluation'] }}:
                        @if ($meal->people_eva > 0)
                            @for ($i = 0; $i < $ProductPresenter->getEvaluateScore($meal->evaluation, $meal->people_eva); $i++)
                                <span class="w3-text-orange w3-large"><i class="fa fa-star"></i></span>
                            @endfor
                        @else
                            <span class="w3-text-orange w3-large">{{ $lang->desktop()['product']['new_meal'] }}</span>
                        @endif
                    </label>
                </div>
                <div class="w3-border-bottom w3-border-grey" style="margin-top:1.5em;">
                    <label>{{ $lang->desktop()['other_day']['type'] }}:
                      @foreach ($meal->categories as $category)
                          <p class="w3-tag w3-teal w3-tiny">{{ $category->category }}</p>
                      @endforeach
                    </label>
                </div>
                <div class="w3-border-bottom w3-border-grey" style="margin-top:1.5em;">
                    <label>{{ $lang->desktop()['other_day']['method'] }}:
                      @foreach ($meal->methods as $method)
                          <p class="w3-tag w3-teal w3-tiny">{{ $method->method }}</p>
                      @endforeach
                    </label>
                </div>
                <div class="w3-border-bottom w3-border-grey" style="margin-top:1.5em;">
                    <label>{{ $lang->desktop()['other_day']['time'] }}:
                      @foreach ($meal->shifts as $shift)
                          <p class="w3-tag w3-teal w3-tiny">{{ $shift->shift }}</p>
                      @endforeach
                    </label>
                </div>
            </div>
        </div>

        <div class="w3-padding-xlarge">
            <table class="w3-table w3-bordered w3-large">
                <tr>
                    <th>{{ $lang->desktop()['other_day']['date'] }}</th>
                    <th>{{ $lang->desktop()['other_day']['time'] }}</th>
                    <th class="w3-center">{{ $lang->desktop()['other_day']['people_left'] }}</th>
                    <th class="w3-right" style="padding-right:1.5em;">{{ $lang->desktop()['other_day']['action'] }}</th>
                </tr>
                @foreach ($datetimepeoples as $datetimepeople)
                    <tr>
                        <td>{{ $datetimepeople->date }}</td>
                        <td>{{ $datetimepeople->time }}</td>
                        <td class="w3-center">{{ $datetimepeople->people_left }}</td>
                        <td class="w3-right"><a href="{{ route('product.show', ['id' => $meal->id, 'datetime_id' => $datetimepeople->id])}}" class="btn w3-deep-orange zk-shrink-hover">{{ $lang->desktop()['other_day']['add_to_cart'] }}</a></td>
                    </tr>
                @endforeach
            </table>
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