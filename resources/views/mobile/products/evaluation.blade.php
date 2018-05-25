@extends('mobile.layout.master')

@section('title', '| User Order')
    
@section('styles')
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://d4kfrsvmp3cgg.cloudfront.net/2018051805.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-32">
        <div class="w3-padding-4">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['evaluation']['title'] }}</h1>
        </div>

        <div class="w3-border-grey w3-border-bottom">
            <h1 class="w3-text-grey w3-large w3-margin-left" style="font-family: cursive">{{ $cart->meals->name }}</h1>
        </div>


        <div class="w3-padding-12 w3-display-container">

            <div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
                @foreach ($cart->meals->images as $image)
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

        <div class="w3-border-grey w3-border-bottom" style="margin-top:4em;">
            <h1 class="w3-text-grey w3-large w3-margin-left" style="font-family: cursive">{{ $lang->desktop()['evaluation']['chef'] }}</h1>
        </div>
        <div class="w3-padding-left">
            <div class="w3-padding-12 w3-border-bottom w3-border-ligth-grey">
                <img src="{{ $cart->meals->chefs->profile_img }}" class="w3-circle w3-margin-right" style="width:50px;height:50px;">
                <label class="w3-xlarge" style="line-height:3em;">{{ $cart->meals->chefs->users->last_name }}  {{ $cart->meals->chefs->users->first_name }}</label>
            </div>
            <div class="w3-padding-12 w3-border-bottom w3-border-ligth-grey">
                <label class="w3-xlarge" style="line-height:3em;">{{ $cart->meals->chefs->store_name }}</label>
            </div>
        </div>

        <div class="w3-margin-top">
            {!! Form::open(['route' => ['evaluation.store', $cart->id], 'data-parsley-validate' => '', 'files' => true, 'method' => 'POST']) !!}
                <div class="w3-padding-12">
                    <label class="w3-text-gery w3-large" style="font-family:cursive">{{ $lang->desktop()['evaluation']['give_score'] }}:</label>
                    <input id="score" name="score" value="3" type="number" class="rating" min=0 max=5 step=1 data-size="xs">
                </div>
                <div class="w3-padding-12">
                    <label class="w3-text-gery w3-large" style="font-family:cursive">{{ $lang->desktop()['evaluation']['comment'] }}</label>
                    {{ Form::textarea('content', null, ['class' => 'form-control', 'id' => 'evalue-content', 'rows' => '10', 'required' => '']) }}
                </div>
                <div class="w3-row w3-margin-top w3-border-green w3-border-top" style="padding-top:1em;">
                    <div class="w3-rest"></div>
                    <div class="w3-col l3 m3 w3-right">
                        {!! Form::submit($lang->desktop()['evaluation']['submit'], ['class' => 'btn w3-large w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
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