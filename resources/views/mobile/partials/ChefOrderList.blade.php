@inject('OrderPresenter', 'App\Presenters\OrderPresenter')
<div class="" id="paginate" style="margin-top:5em;">
    @foreach ($cheforders as $cheforder)
        @foreach($cheforder->carts()->withTrashed()->get() as $cart)
            <div class="w3-row w3-border w3-border-green w3-round-large w3-padding-tiny w3-margin-top">
                <div class="w3-col s8" style="margin-top:0.2em;">
                    <div class="">
                        <span class="w3-text-grey w3-large"><b>{{ $cart->meals->name }}</b></span>
                    </div>
                    <div class="">
                        <span class="w3-text-green w3-medium"><b>${{ $cart->meals->price }}TWD</b></span>
                    </div>
                    <div class="">
                        <span class="w3-text-grey w3-medium">{{ $cart->people_order }} people order</span>
                    </div>
                    <div class="">
                        <span class="w3-text-grey w3-medium">{{ $cart->date }} / {{ $cart->time }}</span>
                    </div>
                </div>
                <div class="w3-col s4" style="margin-top:0.2em;">
                    <div class="">
                        <p class="w3-tag w3-teal w3-tiny">{{ $cart->method }}</p>
                    </div>
                    <div class="" style="margin-top:1em;">
                        <label class="w3-text-grey w3-medium">Subtotal:</label>
                        <span class="w3-text-green w3-medium"><b>${{ $cart->price }}TWD</b></span>
                    </div>
                </div>
                <div class="w3-col s12">
                    @foreach ($cart->meals->images->take(1) as $image)
                            <img src="{{ asset($image->image_path) }}" alt="meal photo" style="width:100%">
                    @endforeach
                </div>
                <div class="w3-col s12 w3-margin-top">
                    <div>
                        @foreach ($cart->userorders()->get() as $userorder)
                            <div class="">
                                <span class="w3-text-grey w3-medium">{{ $userorder->contact_first_name }} {{ $userorder->contact_last_name }}</span>
                            </div>
                            @if ($cheforder->checked)
                                <div class="">
                                    <span class="w3-text-grey w3-medium">{{ $userorder->contact_phone_number }}</span>
                                </div>
                                <div class="">
                                    <span class="w3-text-grey w3-medium">{{ $userorder->contact_email }}</span>
                                </div>
                                <div class="">
                                    <span class="w3-text-grey w3-medium">{{ $userorder->contact_address }}</span>
                                </div>
                            @else
                                @if (!$cart->deleted_at && !$OrderPresenter->compareDateTime($cart, $now))
                                    <div class="">
                                        <span class="w3-text-deep-orange w3-medium">Not Approve Yet!</span>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>

                @if ($cheforder->deleted_at)
                    @if ($cart->deleted_at)
                        <div class="w3-col s12 w3-center">
                            <span class="w3-text-grey w3-large">Rejected</span>
                        </div>
                    @endif
                @else
                    @if ($cart->deleted_at)
                        <div class="w3-col s12 w3-center">
                            <span class="w3-text-grey w3-large">Canceled</span>
                        </div>
                    @else
                        @if ($cheforder->checked)
                            <div class="w3-col s6 w3-center">
                                <span class="w3-text-grey w3-large">Approved</span>
                            </div>
                            <div class="w3-col s6 w3-center">
                                <span class="w3-text-grey w3-large">{{ $OrderPresenter->paidCheck($cheforder->paid) }}</span>
                            </div>
                        @else
                            @if ($OrderPresenter->compareDateTime($cart, $now))
                                <div class="w3-col s12 w3-center">
                                    <span class="w3-text-grey w3-large">Overdue</span>
                                </div>
                            @else
                                <div class="w3-rest"></div>
                                <div class="w3-col s2 w3-right">
                                    <a href="{!! route('order.reject', ['id' => $cheforder->id]) !!}" id="warn{{$cheforder->id}}confirm" class="w3-test-grey" style="display:none;">Reject</a>
                                    <a href="#" id="warn{{$cheforder->id}}" class="w3-test-grey warn">Reject</a>
                                </div>
                                <div class="w3-col s12 w3-padding-8">
                                    <a href="{!! route('order.accept', ['id' => $cheforder->id]) !!}" class="w3-btn w3-deep-orange w3-btn-block w3-round-medium zk-shrink-hover">Accept</a>
                                </div>
                            @endif
                        @endif
                    @endif
                @endif
                
            </div>
        @endforeach
    @endforeach
</div>


<!--delete meal-->
<script>
    $(function () {
        $(".warn").click(function (event) {
            swal({
                title: "Are you sure?",
                text: "You will not be able to accept the order again!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, reject it!",
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