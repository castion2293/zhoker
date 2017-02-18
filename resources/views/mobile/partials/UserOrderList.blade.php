@inject('OrderPresenter', 'App\Presenters\OrderPresenter')
<div id="paginate" class="" style="margin-top:7em;">
    @foreach ($userorders as $userorder)
        
            <div class="w3-margin-top w3-margin-bottom w3-border w3-border-green" style="border-radius:20px;">
                <a class="w3-btn-block w3-left-align w3-green" style="border-radius:18px 18px 0 0;">
                    <div class="w3-row">
                        <div class="w3-col s12 w3-medium">
                            <label>Order Number #{{ $userorder->id }}</label>
                        </div>
                        <div class="w3-col s5 w3-medium">
                            <label>Total Price:</label>
                        </div>
                        <div class="w3-col s7 w3-medium">
                            <span>${{ $userorder->total_price }}TWD</span>
                        </div>
                        <div class="w3-col s12 w3-medium">
                            <label>Pay Way:</label>
                        </div>
                        <div class="w3-col s5 w3-medium">
                            <label>Order Date:</label>
                        </div>
                        <div class="w3-col s7 w3-medium">
                            <span>{{ date('M j, Y - g:iA', strtotime($userorder->created_at)) }}</span>
                        </div>
                        <div class="w3-col s12 w3-medium">
                            <label>Order Details</label>
                        </div>
                    </div>
                </a>
                <div class="">
                    @foreach ($userorder->carts()->withTrashed()->get() as $cart)
                        <div class="w3-row w3-padding-tiny w3-margin-top">
                            <div class="w3-col s8" style="padding-left:0.5em;">
                                <span class="w3-text-grey w3-large"><b>{{ $OrderPresenter->getMealName($cart) }}</b></span>
                            </div>
                                <div class="w3-col s4">
                                <span class="w3-text-green w3-large">$<span id="{{ $cart->id }}united_price" class="w3-text-green w3-large">{{ $OrderPresenter->getMealPrice($cart) }}</span>TWD</span>
                            </div>
                            <div class="w3-col s12">
                                @foreach ($OrderPresenter->getMealImage($cart) as $image)
                                        <img src="{{ asset($image->image_path) }}" alt="meal photo" style="width:100%">
                                @endforeach
                            </div>
                            <div class="w3-col s9 w3-margin-top" style="padding-left:0.5em;">
                                <span class="w3-text-grey w3-large">{{ $cart->date }} / {{ $cart->time }}</span>
                            </div>
                            <div class="w3-col s3 w3-margin-top" style="margin-top:0.2em;">
                                <p class="w3-tag w3-teal w3-tiny">{{ $cart->method }}</p>
                            </div>
                            <div class="w3-col s12 w3-center">
                                <span class="w3-text-grey w3-large">{{ $cart->people_order }} people order</span>
                            </div>
                                <div class="w3-row">
                                <div class="w3-rest"></div>
                                <div class="w3-col s5 w3-right">
                                    <span class="w3-text-green w3-large">$<span id="{{ $cart->id }}price" class="w3-text-green w3-large">{{ $cart->price }}</span></span>
                                </div>
                                <div class="w3-col s3 w3-right">
                                    <span class="w3-text-grey w3-large">TOTAL:</span>
                                </div>
                            </div>

                            <div class="w3-col s12 w3-center w3-margin-bottom w3-padding-bottom">
                                @if ($cart->deleted_at)
                                    @if ($OrderPresenter->chefDeleteCheck($cart))
                                        <div class="w3-green">
                                            <span class="w3-text-whtie w3-large">Reject</span>
                                        </div>
                                    @else
                                        <div class="w3-green">
                                            <span class="w3-text-whtie w3-large">Canceled</span>
                                        </div>
                                    @endif
                                @else
                                    @if ($OrderPresenter->overTime($cart, $now))
                                        @if ($OrderPresenter->chefOrderCheck($cart))
                                            <div class="w3-deep-orange">
                                                <span class="w3-text-whtie w3-large">Approved</span>
                                            </div>
                                            <div class="w3-col s12 w3-center w3-margin-top">
                                                @if ($cart->evaluated)
                                                    <span class="w3-text-whtie w3-large">Evaluated</span>
                                                @else
                                                    <a href="{{ route('evaluation.create', ['id' => $cart->id])}}" class="w3-text-deep-orange w3-large">Evaluate</a>
                                                @endif
                                            </div>
                                        @else
                                            <div class="w3-green">
                                                <span class="w3-text-whtie w3-large">Overdue</span>
                                            </div>
                                        @endif
                                    @else
                                        @if ($OrderPresenter->chefOrderCheck($cart))
                                            <div class="w3-deep-orange">
                                                <span class="w3-text-whtie w3-large">Approved</span>
                                            </div>
                                        @else
                                            <div class="w3-green">
                                                <span class="w3-text-whtie w3-large">Pending</span>
                                            </div>
                                        @endif
                                        <div class="w3-col s12 w3-center w3-margin-top">
                                            <a href="{{ route('order.cancel', ['id' => $cart->id]) }}" id="warn{{$cart->id}}confirm" style="display:none;">Cancel</a>
                                            <a href="#" id="warn{{$cart->id}}" class="w3-text-blue w3-large warn">Cancel</a>
                                        </div>
                                    @endif
                                @endif
                            </div>

                        </div>
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
        perPage: 2,
    });
</script>