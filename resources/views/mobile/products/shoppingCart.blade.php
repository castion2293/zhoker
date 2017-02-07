@extends('mobile.layout.master')

@section('title', '| Shopping Cart')

@section('styles')
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1114201602.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    <div id="shoppingcart" class="w3-content w3-container w3-padding-64">
        @if ($carts->isEmpty())
            <div class="w3-center">
                <h1 style="font-family:cursive;">Sorry! Please Add Your Items first!</h1>
            </div>
        @else
            @foreach ($carts as $cart)
                <div class="w3-row w3-border w3-border-green w3-round-large w3-padding-tiny w3-margin-top">
                    <div class="w3-col s8" style="margin-top:0.5em;padding-left:0.5em;">
                        <span class="w3-text-grey w3-large"><b>{{ $cart->meals->name }}</b></span>
                    </div>
                    <div class="w3-col s4" style="margin-top:0.5em;">
                        <span class="w3-text-green w3-large">$<span id="{{ $cart->id }}united_price" class="w3-text-green w3-large">{{ $cart->meals->price }}TWD</span></span>
                         <!--span class="w3-text-grey w3-large">{{ $cart->people_order }} people order</span-->
                    </div>
                    <div class="w3-col s12">
                        @foreach ($cart->meals->images->take(1) as $image)
                                <img src="{{ asset($image->image_path) }}" alt="meal photo" style="width:100%">
                        @endforeach
                    </div>
                    <div class="w3-col s9" style="margin-top:1em;padding-left:0.5em;">
                        <span class="w3-text-grey w3-large">{{ $cart->date }} / {{ $cart->time }}</span>
                    </div>
                    <div class="w3-col s3" style="margin-top:1em;">
                        <p class="w3-tag w3-teal w3-tiny">{{ $cart->method }}</p>
                    </div>

                    <div class="w3-row">
                        <div class="w3-rest"></div>
                        <div class="w3-col s6 form-input w3-right" style="margin-top:1em;">
                            <div class="w3-row">
                                <a href="#{{ $cart->id }}" id="sub{{ $cart->id }}" class="sub w3-btn w3-transparent w3-text-green" style="text-decoration:none;">-</a>
                                <input type="text" name="people_order" class="meal_qty w3-border-grey w3-border w3-large" id="{{ $cart->id }}qty" required value="{{ $cart->people_order }}" style="width:37px;height:37px;text-align:center">
                                <a href="#{{ $cart->id }}" id="add{{ $cart->id }}" class="add w3-btn w3-transparent w3-text-green" style="text-decoration:none;">+</a>
                                <!--for datetimepeople->people_left use, not shown-->
                                <input type="text" id="{{ $cart->id }}people_left" style="display:none;" value="{{ $cart->datetimepeoples->people_left }}">
                            </div>
                        </div>
                        <div class="w3-col s4 w3-center w3-right" style="margin-top:1.3em;">
                            <span class="w3-text-grey w3-large">QUANTITY:</span>
                        </div>
                    </div>

                    <div class="w3-row">
                        <div class="w3-rest"></div>
                        <div class="w3-col s5 w3-right" style="padding-left:1em;margin-top:1em;">
                            <span class="w3-text-green w3-large">$<span id="{{ $cart->id }}price" class="w3-text-green w3-large">{{ $cart->price }}</span></span>
                        </div>
                        <div class="w3-col s4 w3-center w3-right" style="margin-top:1em;">
                            <span class="w3-text-grey w3-large">TOTAL:</span>
                        </div>
                    </div>

                    <div class="w3-row">
                        <div class="w3-rest"></div>
                        <div id="remove_part" class="w3-col s4 w3-right">
                            <p id="rmv{{ $cart->id }}" class="remove w3-text-grey w3-small" style="cursor:pointer;">Remove Item</p>
                        </div>
                    </div>

                </div>
            @endforeach

            <div class="w3-col s12 w3-center w3-margin-top">
                <span class="w3-text-grey w3-xlarge">Subtotal: <span class="w3-text-green w3-xlarge">$<span id="total_price">{{ $totalPrice }}</span></span></span>
                <!--for totalPrice post use, not shown-->
                <input type="text" name="totalPrice" id="totalPrice" style="display:none;" value="{{ $totalPrice }}">
            </div>
           
            <div class="w3-col s12 w3-margin-top">
                <!--button id="test">checkout</button-->
                <a href="{!! route('product.cart.checkout', ['id' => encrypt(Auth::user()->id)]) !!}" id="ckt" class="btn w3-deep-orange w3-large btn-block zk-shrink-hover">Checkout</a>
                <!--link for refresh page after item remove, not shown-->
                <a href="{!! route('product.cart.show', ['id' => encrypt(Auth::user()->id)]) !!}" id="remove-link" style="display:none;"></a>
            </div>
            
            <div class="w3-col s12 w3-margin-top">
                <a href="{{ route('maplist.search.get')}}" class="btn w3-white w3-text-green w3-border w3-border-green w3-large btn-block zk-shrink-hover">Keep Shopping</a>
            </div>
        @endif
    </div>

    <div id="buynexttime" class="w3-content w3-container w3-padding-64">
        <h3 class="w3-text-green w3-border-green w3-border-bottom">Buy Next Time Items<h3>

        @if ($buyNextTimeItems->isEmpty())
            <div class="w3-center">
                <h3 style="font-family:cursive;">Sorry! You don't have any buy next time items now!</h3>
            </div>
        @else
            @foreach ($buyNextTimeItems as $datetimepeople)
                <div class="w3-row w3-border w3-border-green w3-round-large w3-padding-tiny w3-margin-top">
                    <div class="w3-col s8" style="margin-top:0.5em;padding-left:0.5em;">
                        <span class="w3-text-grey w3-large"><b>{{ $datetimepeople->meals->name }}</b></span>
                    </div>
                    <div class="w3-col s4" style="margin-top:0.5em;">
                        <span class="w3-text-green w3-large">${{ $datetimepeople->meals->price }}TWD</span>
                    </div>
                    <div class="w3-col s12">
                        @foreach ($datetimepeople->meals->images->take(1) as $image)
                                <img src="{{ asset($image->image_path) }}" alt="meal photo" style="width:100%">
                        @endforeach
                    </div>
                    <div class="w3-col s12" style="padding-left:0.5em;">
                        @foreach ($datetimepeople->meals->methods as $method)
                            <p class="w3-tag w3-teal w3-tiny">{{ $method->method }}</p>
                        @endforeach
                    </div>
                    <div class="w3-col s12" style="padding-left:0.5em;">
                        <span class="w3-text-grey w3-large">{{ $datetimepeople->date }} / {{ $datetimepeople->time }}</span>
                    </div>
                    <div class="w3-col s12" style="padding-left:0.5em;">
                        <span class="w3-text-grey w3-large">{{ $datetimepeople->people_left }} People Left</span>
                    </div>
                    <div class="w3-col s6 w3-padding-12" style="padding-right:0.1em;">
                        <div id="bnt{{ $datetimepeople->id }}" class="btn btn-block w3-medium w3-white w3-border w3-border-green w3-text-green zk-shrink-hover bnt-btn"><i class="fa fa-heart"></i> Buy Next Time</div>
                    </div>
                    <div class="w3-col s6 w3-padding-12" style="padding-left:0.1em;">
                        <a href="{{ route('product.show', ['id' => encrypt($datetimepeople->meals->id), 'datetime_id' => encrypt($datetimepeople->id)])}}" class="btn btn-block w3-medium w3-deep-orange zk-shrink-hover"><i class="fa fa-shopping-cart"></i> Add To Cart</a>
                    </div>
                </div>
            @endforeach
        @endif

    </div>

    <div id="reserve" class="w3-content w3-container w3-padding-64">
        <h3 class="w3-text-green w3-border-green w3-border-bottom">Reserve Items<h3>

         @if ($reserveItems->isEmpty())
            <div class="w3-center">
                <h3 style="font-family:cursive;">Sorry! You don't have any reserve items now!</h3>
            </div>
        @else
            @foreach ($reserveItems as $meal)
                <div class="w3-row w3-border w3-border-green w3-round-large w3-padding-tiny w3-margin-top">
                    <div class="w3-col s8" style="margin-top:0.5em;padding-left:0.5em;">
                        <span class="w3-text-grey w3-large"><b>{{ $meal->name }}</b></span>
                    </div>
                    <div class="w3-col s4" style="margin-top:0.5em;">
                        <span class="w3-text-green w3-large">${{ $meal->price }}TWD</span>
                    </div>
                    <div class="w3-col s12">
                        @foreach ($meal->images->take(1) as $image)
                            <img src="{{ asset($image->image_path) }}" alt="meal photo" style="width:100%">
                        @endforeach
                    </div>
                    <div class="w3-col s12" style="padding-left:0.5em;">
                        @foreach ($meal->methods as $method)
                            <p class="w3-tag w3-teal w3-tiny">{{ $method->method }}</p>
                        @endforeach
                    </div>
                    <div class="w3-col s6 w3-padding-12" style="padding-right:0.1em;">
                        <div id="btn{{ $meal->id }}" class="btn btn-block w3-medium w3-white w3-border w3-border-red w3-text-red zk-shrink-hover res-btn">Cancel</div>
                        <!--link for going to shoppingcart page, not shown--> 
                        <a href="{{ url('/product/cart/show/' . encrypt(Auth::user()->id) . '#reserve') }}" id="shopping-link" style="display:none;"></a>
                    </div>
                    <div class="w3-col s6 w3-padding-12" style="padding-left:0.1em;">
                        <a href="{{ route('product.cart.otherdays', ['meal_id' => encrypt($meal->id)]) }}" class="btn btn-block w3-medium w3-deep-orange zk-shrink-hover">Other Days</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

@endsection

@section('scripts')
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

        //remove item
        $(".remove").on('click',function(event){
            id = event.target.id.substring(3);

            //var token = '{{ Session::token() }}';
            var url = '{{ route('product.cart.remove') }}';
            
            $.ajax({
                method: 'POST',
                url: url,
                data: {id: id, qty: Qtys, _token: token},
                success : function(data){
                    $("#remove-link")[0].click();
                },
                error : function(data){
                    // alert('fail');
                },
            });
            // .done(function (msg) {
            //     alert(msg['message']);
            // });
        });

        $("#ckt").click(function() {
            var url = '{{ route('product.cart.remove') }}';

            $.ajax({
                 method: 'POST',
                 url: url,
                 data: {qty: Qtys, _token: token},
                //  success : function(data){
                //      alert('success');
                //  },
                //  error : function(data){
                //      alert('fail');
                //  },
            });
            // .done(function (msg) {
            //     alert(msg['message']);
            // });
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