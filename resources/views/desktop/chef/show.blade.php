@extends('desktop.layout.master')

@section('title', '| Chef show')

@section('styles')
  <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://d4kfrsvmp3cgg.cloudfront.net/2018051605.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    @inject('ProductPresenter', 'App\Presenters\ProductPresenter')
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
              <div class="w3-col l7 m7 w3-padding-large w3-display-container">

                  <div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
                        <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                            <a id="image_link" href="{{ $meal->cover_img }}" itemprop="contentUrl" data-size="1024x575">
                                <img src="{{ asset($meal->cover_img) }}" alt="this is a photo" style="width:100%;">
                            </a>
                        </figure>
                        @foreach ($meal->images as $image)
                            <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                <a id="image_link" href="{{ $image->image_path }}" itemprop="contentUrl" data-size="1024x575">
                                    <img src="{{ asset($image->image_path) }}" alt="this is a photo" style="width:100%;display:none;">
                                </a>                                   
                            </figure>
                        @endforeach
                    </div>
                    @include('desktop.partials.photoswipe')
                    <div class="w3-display-bottomright" style="padding-right:5em;padding-bottom:2em;">
                      <div id="image_btn" class="w3-btn-floating w3-text-white w3-transparent" style="border: 2px solid;"><i class="fa fa-instagram"></i></div>
                    </div>
              </div>
              <div class="w3-col l5 m5 w3-padding-large">
                  <div class="w3-margin-top w3-border-bottom w3-border-grey"> 
                    <label>{{ $lang->desktop()['chef_show']['method'] }}:
                      @foreach ($meal->methods as $method)
                          <p class="w3-tag w3-teal w3-tiny">{{ $method->method }}</p>
                      @endforeach
                    </label>
                  </div>
                  <div class="w3-margin-top w3-border-bottom w3-border-grey">
                    <label>{{ $lang->desktop()['chef_show']['time'] }}:
                      @foreach ($meal->shifts as $shift)
                          <p class="w3-tag w3-teal w3-tiny">{{ $shift->shift }}</p>
                      @endforeach
                    </label>
                  </div>
                  <div class="w3-margin-top w3-border-bottom w3-border-grey">
                    <label>{{ $lang->desktop()['chef_show']['type'] }}:
                      @foreach ($meal->categories as $category)
                          <p class="w3-tag w3-teal w3-tiny">{{ $category->category }}</p>
                      @endforeach
                    </label>
                  </div>
                  <div class="w3-margin-top w3-border-bottom w3-border-grey">
                    <label>{{ $lang->desktop()['chef_show']['evaluation'] }}:
                        @if ($meal->people_eva > 0)
                            @for ($i = 0; $i < $ProductPresenter->getEvaluateScore($meal->evaluation, $meal->people_eva); $i++)
                                <span class="w3-text-orange w3-large"><i class="fa fa-star"></i></span>
                            @endfor
                        @else
                            <span class="w3-text-orange w3-large">{{ $lang->desktop()['chef_show']['new_meal'] }}</span>
                        @endif
                    </label>
                  </div>
                  <div class="w3-border-bottom w3-border-grey w3-padding-12">
                    <table class="w3-table w3-small">
                        <thead>
                          <th style="padding-left:0;">{{ $lang->desktop()['chef_show']['date'] }}</th>
                          <th>{{ $lang->desktop()['chef_show']['time'] }}</th>
                          <th>{{ $lang->desktop()['chef_show']['people_left'] }}</th>
                          <th>{{ $lang->desktop()['chef_show']['people_order'] }}</th>
                        </thead>
                        <tbody>
                          @foreach ($meal->datetimepeoples()->latest('updated_at')->take(5)->get() as $datetimepeople)
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
                  <div class="w3-right w3-margin-top">
                      <a href="{{ route('chef.datetimepeople.get', ['id' => $meal->id]) }}" class="btn w3-white w3-text-blue w3-border w3-border-blue btn-block zk-shrink-hover">{{ $lang->desktop()['chef_show']['date_time'] }}</a>
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
                 <button id="delete-warn" class="btn w3-large w3-white w3-text-red w3-border w3-border-red btn-block w3-margin-top zk-shrink-hover">{{ $lang->desktop()['chef_show']['delete'] }}</button>
              </div>
              <div class="w3-col l2 m2 w3-right w3-margin-top w3-padding-small">
                {!! Html::linkRoute('chef.edit', $lang->desktop()['chef_show']['edit'] , [$meal->id], ['class' => 'btn w3-white w3-large w3-text-green w3-border w3-border-green btn-block zk-shrink-hover']) !!}
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
                title: "{{ $lang->desktop()['flash']['are_you_sure'] }}",
                text: "{{ $lang->desktop()['flash']['meal_remove_warn'] }}",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "{{ $lang->desktop()['flash']['delete_confirm_btn'] }}",
                cancelButtonText: "{{ $lang->desktop()['flash']['cancel_btn'] }}",
                closeOnConfirm: false
              },
              function(){
                $("#delete-confirm").click();
              });
            });
        });
    </script>

    <!--swipe image btn-->
    <script>
      $(function () {
        $("#image_btn").click(function() {
          $("#image_link")[0].click();
        });
      });
    </script>
@endsection