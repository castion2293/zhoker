@extends('desktop.layout.master')

@section('title', '| Shopping Cart')

@section('styles')
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')

    <!--navbar-->
    <div class="fixed-circle-nav w3-transparent"style="right:2em;">
        <section class="section section--nav">
		    <nav class="nav nav--shamso">
				<a href="#top-pic" class="nav__item nav__item--current" aria-label="Item 1"><span class="nav__item-title">Top</span></a>
				<a href="#shoppingcart" class="nav__item " aria-label="Item 2"><span class="nav__item-title">Shopping Cart</span></a>
				<a href="#buynexttime" class="nav__item" aria-label="Item 3"><span class="nav__item-title">Buy Next Time</span></a>
				<a href="#reserve" class="nav__item" aria-label="Item 4"><span class="nav__item-title">Reserve Meal</span></a>
			</nav>
		</section>
    </div>

    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1114201602.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-64">
        <div class="w3-row">
            <div class="w3-rest"></div>
            <div class="w3-col l3 m3 w3-right w3-margin-top">
                <a href="{{ route('maplist.search.get')}}" class="btn w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover"><b>Keep Shopping</b></a>
            </div>
        </div>

        <div id="shoppingcart" class="w3-padding-128">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">In Shopping Cart<h1>

            @if ($carts->isEmpty())
                <div class="w3-center">
                    <h1 style="font-family:cursive;">Sorry! Please Add Your Items first!</h1>
                </div>
            @else
                <div class="w3-row w3-margin-top w3-padding-medium w3-border-grey w3-border-bottom">
                    <div class="w3-col l3 m3">
                        <label class="w3-text-grey w3-medium" style="font-family:cursive;">MEAL</label>
                    </div>
                    <div class="w3-col l5 m5" style="padding-left:0.5em;">
                        <label class="w3-text-grey w3-medium" style="font-family:cursive;">ITEM</label>
                    </div>
                    <div class="w3-col l3 m3" style="padding-left:0.7em;">
                        <label class="w3-text-grey w3-medium" style="font-family:cursive;">QUANTITY</label>
                    </div>
                    <div class="w3-col l1 m1" style="padding-left:0.2em;">
                        <label class="w3-text-grey w3-medium" style="font-family:cursive;">TOTAL</label>
                    </div>
                </div>

                @foreach ($carts as $cart)
                    @if (count($cart->meals))
                        <div class="w3-row w3-padding-24 w3-border-grey w3-border-bottom">
                            <div class="w3-col l3 m3 w3-padding-right">
                                @foreach ($cart->meals->images->take(1) as $image)
                                        <img src="{{ asset($image->image_path) }}" alt="meal photo" style="width:100%">
                                @endforeach
                            </div>
                            <div class="w3-col l5 m5 w3-padding-left">
                                <div class="w3-row">
                                    <div class="w3-col l5 m5">
                                        <div class="">
                                            <span class="w3-text-grey w3-large"><b>{{ $cart->meals->name }}</b></span>
                                        </div>
                                        <div class="">
                                            <span class="w3-text-green w3-large">$<span id="{{ $cart->id }}united_price" class="w3-text-green w3-large">{{ $cart->meals->price }}</span></span>
                                        </div>
                                        <div class="">
                                            <span class="w3-text-grey w3-large">{{ $cart->people_order }} people order</span>
                                        </div>
                                    </div>
                                    <div class="w3-col l7 m7">
                                        <div class="">
                                            <span class="w3-text-grey w3-large">{{ $cart->date }} / {{ $cart->time }}</span>
                                        </div>
                                        <div class="w3-margin-top">
                                            <p class="w3-tag w3-teal w3-tiny">{{ $cart->method }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w3-col l3 m3 form-input">
                                <div class="w3-row">
                                    <a href="#{{ $cart->id }}" id="sub{{ $cart->id }}" class="sub w3-btn w3-transparent w3-text-green w3-medium" style="text-decoration:none;margin-top:0.4em;">-</a>
                                    <input type="text" name="people_order" class="meal_qty w3-border-grey w3-border w3-medium" id="{{ $cart->id }}qty" required value="{{ $cart->people_order }}" style="width:37px;height:37px;text-align:center">
                                    <a href="#{{ $cart->id }}" id="add{{ $cart->id }}" class="add w3-btn w3-transparent w3-text-green w3-medium" style="text-decoration:none;margin-top:0.4em;">+</a>
                                    <!--for datetimepeople->people_left use, not shown-->
                                    <input type="text" id="{{ $cart->id }}people_left" style="display:none;" value="{{ $cart->datetimepeoples->people_left }}">
                                </div>
                            </div>
                            <div class="w3-col l1 m1">
                                <div class="">
                                    <span class="w3-text-green w3-large">$<span id="{{ $cart->id }}price" class="w3-text-green w3-large">{{ $cart->price }}</span></span>
                                </div>
                                <div class="" id="remove_part" style="margin-top:1.5em;">
                                    <p id="rmv{{ $cart->id }}" class="remove w3-text-grey w3-small" style="cursor:pointer;">Remove Item</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

                <div class="w3-row">
                    <div class="w3-rest"></div>
                    <div class="w3-col l3 m3 w3-right w3-margin-top">
                        <span class="w3-text-grey w3-large" style="padding-left:5em;">Subtotal: <span class="w3-text-green w3-large">$<span id="total_price">{{ $totalPrice }}</span></span></span>
                        <!--for totalPrice post use, not shown-->
                        <input type="text" name="totalPrice" id="totalPrice" style="display:none;" value="{{ $totalPrice }}">
                        
                        <a href="#" id="ckt" class="btn w3-deep-orange btn-block zk-shrink-hover"><i class="fa fa-credit-card"></i> Checkout</a>
                        <!--link for chectout, not shown-->
                        <a href="{!! route('product.cart.checkout', ['id' => Auth::user()->id]) !!}" id="ckt_link" style="display:none;"></a>
                        <!--link for refresh page after item remove, not shown-->
                        <a href="{{ url('/product/cart/show/' . Auth::user()->id) }}" id="remove-link" style="display:none;"></a>
                    </div>
                </div>
            @endif
        </div>

        <div id="buynexttime" class="w3-padding-128">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">Buy Next Time Items<h1>
        
            <div class="w3-content w3-container">
                @if ($buyNextTimeItems->isEmpty())
                    <div class="w3-center">
                        <h1 style="font-family:cursive;">Sorry! You don't have any buy next time items now!</h1>
                    </div>
                @else
                    <div class="w3-row w3-margin-top w3-padding-medium w3-border-grey w3-border-bottom">
                        <div class="w3-col l3 m3">
                            <label class="w3-text-grey w3-medium" style="font-family:cursive;">MEAL</label>
                        </div>
                        <div class="w3-col l7 m7" style="padding-left:0.5em;">
                            <label class="w3-text-grey w3-medium" style="font-family:cursive;">ITEM</label>
                        </div>
                        <div class="w3-col l2 m2 w3-center">
                            <label class="w3-text-grey w3-medium" style="font-family:cursive;">ACTION</label>
                        </div>
                    </div>

                    @foreach ($buyNextTimeItems as $datetimepeople)
                        <div class="w3-row w3-padding-24 w3-border-grey w3-border-bottom">
                            <div class="w3-col l3 m3 w3-padding-right">
                                @foreach ($datetimepeople->meals->images->take(1) as $image)
                                        <img src="{{ asset($image->image_path) }}" alt="meal photo" style="width:100%">
                                @endforeach
                            </div>
                            <div class="w3-col l7 m7 w3-padding-left">
                                <div class="w3-row">
                                    <div class="w3-col l5 m5">
                                        <div class="">
                                            <span class="w3-text-grey w3-large"><b>{{ $datetimepeople->meals->name }}</b></span>
                                        </div>
                                        <div class="">
                                            <span class="w3-text-green w3-large">${{ $datetimepeople->meals->price }}</span>
                                        </div>
                                        <div class="">
                                            @foreach ($datetimepeople->meals->methods as $method)
                                                <p class="w3-tag w3-teal w3-tiny">{{ $method->method }}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="w3-col l7 m7">
                                        <div class="">
                                            <span class="w3-text-grey w3-large">{{ $datetimepeople->date }} / {{ $datetimepeople->time }}</span>
                                        </div>
                                        <div class="">
                                            <span class="w3-text-grey w3-large">{{ $datetimepeople->people_left }} People Left</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w3-col l2 m2">
                                <div class="w3-margin-top">  
                                    <div id="bnt{{ $datetimepeople->id }}" class="btn btn-block w3-medium w3-white w3-border w3-border-green w3-text-green zk-shrink-hover bnt-btn"><i class="fa fa-heart"></i> Buy Next Time</div>
                                </div>
                                <div class="" style="margin-top:1em;">  
                                    <a href="{{ route('product.show', ['id' => $datetimepeople->meals->id, 'datetime_id' => $datetimepeople->id])}}" class="btn btn-block w3-medium w3-deep-orange zk-shrink-hover"><i class="fa fa-shopping-cart"></i> Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <div id="reserve" class="w3-padding-128">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">Reserve Items<h1>

            <div class="w3-content w3-container">
                @if ($reserveItems->isEmpty())
                    <div class="w3-center">
                        <h1 style="font-family:cursive;">Sorry! You don't have any reserve items now!</h1>
                    </div>
                @else
                    <div class="w3-row w3-margin-top w3-padding-medium w3-border-grey w3-border-bottom">
                        <div class="w3-col l4 m4">
                            <label class="w3-text-grey w3-medium" style="font-family:cursive;">MEAL</label>
                        </div>
                        <div class="w3-col l6 m6" style="padding-left:0.5em;">
                            <label class="w3-text-grey w3-medium" style="font-family:cursive;">ITEM</label>
                        </div>
                        <div class="w3-col l2 m2 w3-center">
                            <label class="w3-text-grey w3-medium" style="font-family:cursive;">ACTION</label>
                        </div>
                    </div>

                     @foreach ($reserveItems as $meal)
                        <div class="w3-row w3-padding-24 w3-border-grey w3-border-bottom">
                            <div class="w3-col l3 m3 w3-padding-right">
                                @foreach ($meal->images->take(1) as $image)
                                    <img src="{{ asset($image->image_path) }}" alt="meal photo" style="width:100%">
                                @endforeach
                            </div>
                            <div class="w3-col l7 m7" style="padding-left:2em;">
                                <div class="">
                                    <span class="w3-text-grey w3-large"><b>{{ $meal->name }}</b></span>
                                </div>
                                <div class="">
                                    <span class="w3-text-green w3-large">${{ $meal->price }}</span>
                                </div>
                                <div class="">
                                    @foreach ($meal->methods as $method)
                                        <p class="w3-tag w3-teal w3-tiny">{{ $method->method }}</p>
                                    @endforeach
                                </div>
                            </div>
                            <div class="w3-col l2 m2">
                                <div class="w3-margin-top">  
                                    <div id="btn{{ $meal->id }}" class="btn btn-block w3-medium w3-white w3-border w3-border-red w3-text-red zk-shrink-hover res-btn">Cancel</div>
                                    <!--link for going to shoppingcart page, not shown--> 
                                    <a href="{{ url('/product/cart/show/' . Auth::user()->id) }}" id="shopping-link" style="display:none;"></a>
                                </div>
                                <div class="" style="margin-top:1em;">  
                                    <a href="{{ route('product.cart.otherdays', ['meal_id' => $meal->id]) }}" class="btn btn-block w3-medium w3-deep-orange zk-shrink-hover">Other Days</a>
                                </div>
                            </div>
                        </div>
                     @endforeach

                @endif
            </div>
        </div>
        
    </div>

    <!--loader view-->
    @include('desktop.partials.loader')
@endsection

@section('scripts')
    <script src="{{ URL::to('js/animate_scroll.js') }}"></script>
    <script src="{{ URL::to('js/navbar.js') }}"></script>
    
<script>
    $(function () {
        var Qtys = {!! json_encode($Qtys) !!}; 
        var token = '{{ Session::token() }}';
       
        //people_order add or deduct
        $(".sub").click(function(){

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                var qty = this.hash.concat("qty");
                if ($(qty).val() > 1) {
                    $(qty).val( parseInt($(qty).val()) - 1 );
                    changePrice(this.hash);
                } else {
                    alert("Too small")
                }
            }
        });
        $(".add").click(function(){

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                var qty = this.hash.concat("qty");
                var people_left = this.hash.concat("people_left");
                
                if ($(qty).val() < $(people_left).val()) {
                    $(qty).val( parseInt($(qty).val()) + 1 );
                    changePrice(this.hash);
                } else {
                    alert("Too large")
                }
            }
        });

        //change quantity from enter in
        $(".meal_qty").on('input',function(event){
            var qty_id = "#".concat(event.target.id);
            var id = qty_id.substring(0, qty_id.length - 3); 
            var people_left = id.concat("people_left");

            var cur_value = $(qty_id).val();
            var people_left_val = parseInt($(people_left).val());

            if (cur_value < 1) {
                cur_value = 1;
                alert("Too small")
            } else if ( cur_value > people_left_val) {
                cur_value = people_left_val;
                alert("Too large")
            }

            $(qty_id).val(cur_value);
            
            changePrice(id);
        });

        //change price function
        function changePrice(id) {
            
            var meal_quantity = id.concat("qty");
            var united_price = id.concat("united_price");
            var price = id.concat("price");
            var meal_quantity_val = parseInt($(meal_quantity).val());
            var united_price_val = parseInt($(united_price).text());
            var price_val = parseInt($(price).text());

            price_val = united_price_val * meal_quantity_val;

            $(price).text(price_val.toString());

            //update Qty array date and change total price
            Qtys[id.substring(1)] = meal_quantity_val;

            var totalPrice = 0;
            for (var index in Qtys) {
               var unite_price_id = "#".concat(index.concat("united_price"));
               var unite_price_value = parseInt($(unite_price_id).text());

               totalPrice += (Qtys[index] * unite_price_value);
            }

            $("#total_price").text(totalPrice.toString());

        }

        // checkout the cart
        $("#ckt").click(function() {
            $("#LoadingModal").modal(); //loader

            var url = '{{ route('product.cart.store') }}';

            $.ajax({
                 method: 'POST',
                 url: url,
                 data: {qty: Qtys, _token: token},
                 success : function(data){
                     $("#ckt_link")[0].click();
                 },
                 error : function(data){
                     //alert('fail');
                 },
            });
            // .done(function (msg) {
            //     alert(msg['message']);
            // });
        });

        //remove item
        $(".remove").on('click',function(event){
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover the meal again!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, cancel it!",
                closeOnConfirm: false
            },
            function(){

                id = event.target.id.substring(3);
            
                //var token = '{{ Session::token() }}';
                var url = '{{ route('product.cart.remove') }}';
                
                $.ajax({
                    method: 'POST',
                    url: url,
                    data: {id: id, qty: Qtys, _token: token},
                    success : function(data){
                        $("#remove-link")[0].click();
                        //alert('success');
                    },
                    error : function(data){
                        //alert('fail');
                    },
                });
                // .done(function (msg) {
                //     alert(msg['message']);
                // });
            });
        });
    });
</script>

    <!--buy next time-->
    <script>
        $(function () {
          $(".bnt-btn").on('click',function(event){
            id =  "#".concat(event.target.id);
            datetimepeople_id = event.target.id.substring(3);
            
            @if (Auth::check())
              postBuyNextTime(datetimepeople_id);
            @else
              $("#myModal").modal();
            @endif

          });

          function postBuyNextTime(datetimepeople_id) {
            var user_id = {{ Auth::user()->id }};
            var token = '{{ Session::token() }}';

            var url = '{{ route('product.cart.buynexttime') }}';

            $.ajax({
                method: 'POST',
                url: url,
                data: {user_id: user_id, datetimepeople_id: datetimepeople_id, _token: token},
                success : function(data){
                    if ($(id).children().hasClass("fa fa-heart-o")) {
                        $(id).children().removeClass("fa fa-heart-o").addClass("fa fa-heart");
                    } else {
                        $(id).children().removeClass("fa fa-heart").addClass('fa fa-heart-o');
                    }
                },
                error : function(data){
                    //alert('fail');
                },
            });
          }
        });
    </script>

    <!--Remove reserve items-->
    <script>
        $(function () {
            $(".res-btn").on('click', function(event){
                var user_id = {{ Auth::user()->id }};
                meal_id = event.target.id.substring(3);
                var token = '{{ Session::token() }}';
                
                var url = '{{ route('product.cart.cancelreversemeal') }}';

                $.ajax({
                    method: 'POST',
                    url: url,
                    data: {user_id: user_id, meal_id: meal_id, _token: token},
                    success : function(data){
                        $("#shopping-link")[0].click();
                    },
                    error : function(data){
                        //alert('fail');
                    },
                });
            });
        });
    </script>

@endsection