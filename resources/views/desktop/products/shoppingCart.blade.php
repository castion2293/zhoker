@extends('desktop.layout.master')

@section('title', '| Shopping Cart')

@section('styles')

@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1114201602.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-64">
        @if ($carts->isEmpty())
            <div class="w3-center">
                <h1 style="font-family:cursive;">Sorry! Please Add Your Items first!</h1>
            </div>
        @else
            <div class="w3-row">
                <div class="w3-rest"></div>
                <div class="w3-col l3 m3 w3-right w3-margin-top">
                    <a href="#" class="btn w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover"><b>Keep Shopping</b></a>
                </div>
            </div>

            <div class="w3-row w3-margin-top w3-padding-medium w3-border-grey w3-border-bottom">
                <div class="w3-col l3 m3">
                    <label class="w3-text-grey" style="font-family:cursive;">MEAL</label>
                </div>
                <div class="w3-col l5 m5" style="padding-left:0.5em;">
                    <label class="w3-text-grey" style="font-family:cursive;">ITEM</label>
                </div>
                <div class="w3-col l3 m3" style="padding-left:1.5em;">
                    <label class="w3-text-grey" style="font-family:cursive;">QUANTITY</label>
                </div>
                <div class="w3-col l1 m1" style="padding-left:0.5em;">
                    <label class="w3-text-grey" style="font-family:cursive;">TOTAL</label>
                </div>
            </div>

            @foreach ($carts as $cart)
                <div class="w3-row w3-padding-24 w3-border-grey w3-border-bottom">
                    <div class="w3-col l3 m3 w3-padding-right">
                        <img src="{{ asset($cart->meals->img_path) }}" alt="meal photo" style="width:100%">
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
                            <a href="#{{ $cart->id }}" id="sub{{ $cart->id }}" class="sub w3-btn w3-transparent w3-text-green" style="text-decoration:none;">-</a>
                            <input type="text" name="people_order" class="meal_qty w3-border-grey w3-border w3-large" id="{{ $cart->id }}qty" required value="{{ $cart->people_order }}" style="width:37px;height:37px;text-align:center">
                            <a href="#{{ $cart->id }}" id="add{{ $cart->id }}" class="add w3-btn w3-transparent w3-text-green" style="text-decoration:none;">+</a>
                            <!--for datetimepeople->people_left use, not shown-->
                            <input type="text" id="{{ $cart->id }}people_left" style="display:none;" value="{{ $cart->datetimepeoples->people_left }}">
                        </div>
                    </div>
                    <div class="w3-col l1 m1">
                        <div class="">
                            <span class="w3-text-green w3-large">$<span id="{{ $cart->id }}price" class="w3-text-green w3-large">{{ $cart->price }}</span></span>
                        </div>
                        <div class="" style="margin-top:3em;">
                            <a href="{!! route('product.cart.show', ['id' => Auth::user()->id]) !!}" id="rmv{{ $cart->id }}" class="remove w3-text-grey w3-small" style="cursor:pointer;">Remove Item</a>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="w3-row">
                <div class="w3-rest"></div>
                <div class="w3-col l3 m3 w3-right w3-margin-top">
                    <span class="w3-text-grey w3-large" style="padding-left:5em;">Subtotal: <span class="w3-text-green w3-large">$<span id="total_price">{{ $totalPrice }}</span></span></span>
                    <!--for totalPrice post use, not shown-->
                    <input type="text" name="totalPrice" id="totalPrice" style="display:none;" value="{{ $totalPrice }}">
                    <!--button id="test">checkout</button-->
                    <a href="{!! route('product.cart.checkout', ['id' => Auth::user()->id]) !!}" id="ckt" class="btn w3-deep-orange btn-block zk-shrink-hover">Checkout</a>
                </div>
            </div>
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
                // success : function(data){
                //     alert('success');
                // },
                // error : function(data){
                //     alert('fail');
                // },
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
@endsection