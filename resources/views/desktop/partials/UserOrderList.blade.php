@inject('OrderPresenter', 'App\Presenters\OrderPresenter')
<div id="paginate" class="" style="margin-top:7em;">
    @foreach ($userorders as $userorder)
        
            <div class="w3-margin-top w3-margin-bottom w3-border w3-border-green" style="border-radius:20px;">
                <a class="w3-btn-block w3-left-align w3-green" style="border-radius:18px 18px 0 0;">
                    <div class="w3-row">
                        <div class="w3-col l3 m3">
                            <label>Order Number #{{ $userorder->id }}</label>
                        </div>
                        <div class="w3-col l2 m2">
                            <label>Total Price</label>
                        </div>
                        <div class="w3-col l2 m2">
                            <label>Pay Way</label>
                        </div>
                        <div class="w3-col l3 m3">
                            <label>Order Date</label>
                        </div>
                        <div class="w3-col l2 m2" style="padding-right:4em;">
                            <label>Order Details</label>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col l6 m6" style="padding-left:16em;">
                            <span style="font-family:cursive;">${{ $userorder->total_price }}</span>
                        </div>
                        <div class="w3-col l5 m5" style="padding-left:5.5em;">
                            <span style="font-family:cursive;">{{ date('F j, Y - g:iA', strtotime($userorder->created_at)) }}</span>
                        </div>
                    </div>
                </a>
                <div class="w3-container w3-display-container">
                    <div class="w3-row w3-margin-top w3-padding-medium w3-border-grey w3-border-bottom">
                        <div class="w3-col l4 m4">
                            <label class="w3-text-grey" style="font-family:cursive;">MEAL</label>
                        </div>
                        <div class="w3-col l6 m6" style="padding-left:1em;">
                            <label class="w3-text-grey" style="font-family:cursive;">ITEM</label>
                        </div>
                        <div class="w3-col l1 m1" style="padding-left:0.5em;">
                            <label class="w3-text-grey" style="font-family:cursive;">TOTAL</label>
                        </div>
                        <div class="w3-col l1 m1" style="padding-left:1em;">
                            <label class="w3-text-grey" style="font-family:cursive;">STATUS</label>
                        </div>
                    </div>

                    @foreach ($userorder->carts()->withTrashed()->get() as $cart)
                        <div class="w3-row w3-padding-24">
                            <div class="w3-col l4 m4 w3-padding-right">
                                @foreach ($cart->meals->images->take(1) as $image)
                                        <img src="{{ asset($image->image_path) }}" alt="meal photo" style="width:100%">
                                @endforeach
                            </div>
                            <div class="w3-col l6 m6 w3-padding-left">
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
                            <div class="w3-col l1 m1">
                                <div class="">
                                    <span class="w3-text-green w3-large">${{ $cart->price }}</span></span>
                                </div>
                            </div>
                            <div class="w3-col l1 m1">
                                @if ($cart->deleted_at)
                                    @if ($OrderPresenter->chefDeleteCheck($cart))
                                        <span class="w3-text-grey w3-large">Rejected</span>
                                    @else
                                        <span class="w3-text-grey w3-large">Canceled</span>
                                    @endif
                                @else
                                    @if ($OrderPresenter->compareDateTime($cart, $now))
                                        @if ($OrderPresenter->chefOrderCheck($cart))
                                            <span class="w3-text-grey w3-large">Approved</span>
                                            <div class="" style="margin-top:2em;">                                           
                                                @if ($cart->evaluated)
                                                    <span class="w3-text-grey w3-large">Evaluated</span>
                                                @else
                                                    <a href="{{ route('evaluation.create', ['id' => encrypt($cart->id)])}}" class="w3-text-deep-orange w3-large">Evaluate</a>
                                                @endif
                                            </div>
                                        @else
                                            <span class="w3-text-grey w3-large">Overdue</span>
                                        @endif
                                    @else
                                        @if ($OrderPresenter->chefOrderCheck($cart))
                                            <span class="w3-text-grey w3-large">Approved</span>
                                        @else
                                            <span class="w3-text-grey w3-large">Pending</span>
                                        @endif
                                        <div style="margin-top:2em;">
                                            <a href="{{ route('order.cancel', ['id' => encrypt($cart->id)]) }}" id="warn{{$cart->id}}confirm" style="display:none;">Cancel</a>
                                            <a href="#" id="warn{{$cart->id}}" class="w3-text-blue w3-medium warn">Cancel</a>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <hr>
                    @endforeach

                </div>
            </div>
        
    @endforeach
</div>

<!--delete meal-->
<script>
    $(function () {
        $(".warn").click(function (event) {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover the order again!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, cancel it!",
                closeOnConfirm: false
            },
            function(){
                let id = "#" + event.target.id + "confirm";
                $(id)[0].click();
            });
        });
    });
</script>

<!--JQuery Pagination-->
<script>
    jQuery('#paginate').mbPagination({
        showFirstLast: true,
        perPage: 5,
    });
</script>