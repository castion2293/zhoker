@extends('desktop.layout.master')

@section('title', '| Product meal show' . $meal->name)

@section('styles')
    @foreach ($meal->images as $image)
      <meta property="og:image" content="{{ asset($image->image_path) }}">
    @endforeach
    <link rel="stylesheet" href="{{ URL::to('css/cs-select.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/cs-skin-elastic.css') }}">
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="w3-row" id="top-pic">
        @foreach ($meal->images()->skip(1)->take(3)->get() as $image)  
            <div class="w3-col l4 m4">
                <img src="{{ asset($image->image_path) }}" alt="profile" style="width:100%">
            </div>
        @endforeach
    </div>

    <!--content-->
    @inject('ProductPresenter', 'App\Presenters\ProductPresenter')
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
                <div class="w3-right" style="padding-right:3em;">
                    @if (Auth::check())
                      <div id="bnt-btn" class="btn w3-medium w3-white w3-border w3-border-green w3-text-green zk-shrink-hover"><i class="{{ $ProductPresenter->checkUserBuyNextTimeItem(Auth::user(), $datetimepeople->id) ? 'fa fa-heart' : 'fa fa-heart-o' }}"></i> Buy Next Time</div>
                    @else
                      <div id="bnt-btn" class="btn w3-medium w3-white w3-border w3-border-green w3-text-green zk-shrink-hover"><i class="fa fa-heart-o"></i> Buy Next Time</div>
                    @endif  
                </div>
            </div>
            <div class="w3-col l5 m5 w3-padding-large">
              {!! Form::open(['route' => ['product.cart', $meal->id, $datetimepeople->id], 'data-parsley-validate' => '', 'files' => true, 'method' => 'POST']) !!}
                <div class="w3-margin-top w3-border-bottom w3-border-grey">
                    <label>Evaluation:  
                        @if ($meal->people_eva > 0)
                            @for ($i = 0; $i < $ProductPresenter->getEvaluateScore($meal->evaluation, $meal->people_eva); $i++)
                              <span class="w3-text-orange w3-large"><i class="fa fa-star"></i></span>
                            @endfor
                        @else
                              <span class="w3-text-orange w3-large">New Meal</span>
                        @endif
                    </label>
                </div>
                <div class="w3-margin-top w3-border-bottom w3-border-grey">
                    <label>Eaten:
                        <span class="w3-text-grey w3-large">{{ $meal->people_eaten }} {{str_plural('person', $meal->people_eaten)}}</span>
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
                    @if ($datetimepeople->people_left != 0)
                      {!! Form::submit('ADD TO CART', ['id' => 'add-to-cart', 'class' => 'btn w3-deep-orange w3-border w3-border-deep-orange btn-block w3-large zk-shrink-hover w3-hover-deep-orange']) !!}
                    @else
                      <div class="w3-row">
                          <div class="w3-col l6 m6" style="padding-right:0.5em;">
                              <div id="reserve" class="btn w3-deep-orange w3-border w3-border-deep-orange btn-block w3-large zk-shrink-hover w3-hover-deep-orange">Reserve Meal</div>
                              <!--link for going to shoppingcart page, not shown--> 
                              <a href="{{ url('/product/cart/show/' . Auth::user() ? Auth::user()->id : 0 . '#reserve') }}" id="shopping-link" style="display:none;"></a>
                          </div>
                          <div class="w3-col l6 m6" style="padding-left:0.5em;">
                              <a href="{{ route('product.cart.otherdays', ['meal_id' => $meal->id]) }}" class="btn w3-white w3-text-blue w3-border w3-border-blue btn-block w3-large zk-shrink-hover">Other Days</a>
                          </div>
                      </div>
                    @endif
                </div>
               {!! Form::close() !!}
            </div>

            <div class="w3-col l12 m12 w3-padding-large">
                 <div>
                    <label class="w3-text-grey w3-large" style="font-family: cursive">meal description</label>
                    <p id="shareBtn" class="w3-small w3-tag w3-center w3-round-medium" style="padding-top:2px;background-color:#3b5998;cursor:pointer;"><i class="fa fa-facebook-square w3-medium w3--text-indigo" style=""></i>   Share</p>
                 </div>
                 <div class="w3-padding-small">
                    <p>{!! $meal->description !!}</p>
                 </div>
            </div>

            <div class="w3-col l12 m12 w3-padding-large">
                 <label class="w3-text-grey w3-large" style="font-family: cursive">Comments</label>
                 <div id="comment-content" class="w3-padding-small">
                    @foreach ($meal->comments()->latest('created_at')->get() as $comment)             
                        <div id="comment{{ $loop->iteration }}" class="w3-padding-12 w3-border-bottom w3-border-light-grey" style="display:none;">
                            <div class="w3-row">
                                <div class="w3-col l1 m1" style="padding-top:0.8em;">
                                    <img src="{{ $comment->users->user_profile_img }}" class="w3-circle w3-margin-right" style="width:35px;height:35px;">
                                </div>
                                <div class="w3-col l11 m11">
                                    @for ($i = 0; $i < $comment->score; $i++)
                                        <span class="w3-text-orange w3-medium"><i class="fa fa-star"></i></span>
                                    @endfor
                                    <p class="w3-text-grey">
                                        <span class="w3-medium">{{ $comment->users->first_name }} /<span>
                                        <span class="w3-medium">{{ $comment->created_at->diffForHumans() }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="w3-margin-top">
                                <p>{!! str_limit($comment->content, 100) !!}</p>
                            </div>
                        </div>                       
                    @endforeach
                 </div>
                 <div id="more-comments" class="w3-center w3-margin-top">
                    <button class="btn w3-large w3-white w3-border w3-border-green w3-text-green zk-shrink-hover" style="width:15%">More...</button>
                </div>
             </div>

        </div>
    </div>

    <!--Login Modal -->
    @include('desktop.partials.LoginModal')

@endsection

@section('scripts')
    <!-- Animated Select Option -->
    <script src="{{ URL::to('js/classie.js') }}"></script>
    <script src="{{ URL::to('js/selectFx.js') }}"></script>

   <!--Facebook Share Link-->
   <script src="https://connect.facebook.net/en_US/all.js"></script>
   <script>
      FB.init({
          appId  : {{ env('FACEBOOK_ID') }},
      });
        
      document.getElementById('shareBtn').onclick = function() {
          FB.ui({
              method: 'share',
              display: 'popup',
              href: '{{ url()->current() }}',
          }, function(response){});
      }
   </script>

    <!--buy next time-->
    <script>
        $(function () {
          $("#bnt-btn").click(function() {

            @if (Auth::check())
                postBuyNextTime();
            @else
              $("#myModal").modal();
            @endif

          });

          function postBuyNextTime() {
            var user_id = {{ Auth::check() ? Auth::user()->id : 0 }};
            var datetimepeople_id = {{ $datetimepeople->id }};
            var token = '{{ Session::token() }}';

            var url = '{{ route('product.cart.buynexttime') }}';

            $.ajax({
                method: 'POST',
                url: url,
                data: {user_id: user_id, datetimepeople_id: datetimepeople_id, _token: token},
                success : function(data){
                    if ($("#bnt-btn").children().hasClass("fa fa-heart-o")) {
                        $("#bnt-btn").children().removeClass("fa fa-heart-o").addClass("fa fa-heart");
                    } else {
                        $("#bnt-btn").children().removeClass("fa fa-heart").addClass('fa fa-heart-o');
                    }
                },
                error : function(data){
                    //alert('failure');
                },
            });
          }
        });
    </script>

    <!--reserve meal-->
    <script>
      $(function () {
        $("#reserve").click(function() {

          @if (Auth::check())
            postReserveMeal();
          @else
            $("#myModal").modal();
          @endif

        });

        function postReserveMeal() {
          var user_id = {{ Auth::check() ? Auth::user()->id : 0 }};
          var meal_id = {{ $meal->id }};
          var token = '{{ Session::token() }}';

          var url = '{{ route('product.cart.addreversemeal') }}';

          $.ajax({
                method: 'POST',
                url: url,
                data: {user_id: user_id, meal_id: meal_id, _token: token},
                success : function(data){
                    $("#shopping-link")[0].click();
                },
                error : function(data){
                    //alert('failure');
                },
            });
        }
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

    <!--Commments loading-->
    <script>
        $(function () {
            let base = 10;
            let num_comment = base;
            let count = 1;

            for (i = 1; i < 1 + base; i++) {
                $("#comment" + i).show();
            }

            $("#more-comments").click(function() {
                if (count >= {{ count($meal->comments) }} / num_comment)
                    $("#more-comments").hide();

                for(i = 1 + num_comment; i < 1 + base + num_comment; i++) {
                    $("#comment" + i).show();
                }

                num_comment += base;
                count++;
            });
        });
    </script>
@endsection