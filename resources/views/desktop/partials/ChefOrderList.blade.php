@inject('OrderPresenter', 'App\Presenters\OrderPresenter')
<div class="w3-row w3-padding-medium w3-border-grey w3-border-bottom" style="margin-top:7em;">
    <div class="w3-col l3 m3">
        <label class="w3-text-grey" style="font-family:cursive;">MEAL</label>
    </div>
    <div class="w3-col l3 m3" style="padding-left:1em;">
        <label class="w3-text-grey" style="font-family:cursive;">ITEM</label>
    </div>
    <div class="w3-col l1 m1" style="">
        <label class="w3-text-grey" style="font-family:cursive;">TOTAL</label>
    </div>
    <div class="w3-col l4 m4" style="padding-left:2.5em;">
        <label class="w3-text-grey" style="font-family:cursive;">CONTACT</label>
    </div>
    <div class="w3-col l1 m1" style="padding-left:1.5em;">
        <label class="w3-text-grey" style="font-family:cursive;">ACTION</label>
    </div>
</div>

<div id="paginate">
    @foreach ($cheforders as $cheforder)
        @foreach($cheforder->carts()->withTrashed()->get() as $cart)
            <div class="w3-row w3-padding-24 w3-border-grey w3-border-bottom">
                <div class="w3-col l3 m3 w3-padding-right w3-margin-top">
                    @foreach ($cart->meals->images->take(1) as $image)
                        <div class="w3-row">
                            <div class="w3-col s10 w3-right w3-margin-top">
                                <img src="{{ asset($image->image_path) }}" alt="meal photo" style="width:100%;">
                            </div>
                            <div class="w3-col s2 w3-right" style="margin-top:2.5em;">
                                @if (!$cheforder->checked && !$cart->deleted_at && !$OrderPresenter->compareDateTime($cart, $now))
                                    <input id="od{{$cheforder->id}}" class="w3-check w3-text-green ckbox" value="{{$cheforder->id}}" type="checkbox">
                                @endif 
                            </div> 
                        </div>
                    @endforeach
                </div>
                <div class="w3-col l3 m3 w3-padding-left">
                    <div class="">
                        <span class="w3-text-grey w3-large"><b>{{ $cart->meals->name }}</b></span>
                    </div>
                    <div class="">
                        <span class="w3-text-green w3-large">$<span id="{{ $cart->id }}united_price" class="w3-text-green w3-large">{{ $cart->meals->price }}</span></span>
                    </div>
                    <div class="">
                        <span class="w3-text-grey w3-large">{{ $cart->people_order }} people order</span>
                    </div>
                    <div class="">
                        <span class="w3-text-grey w3-large">{{ $cart->date }} / {{ $cart->time }}</span>
                    </div>
                    <div class="">
                        <p class="w3-tag w3-teal w3-tiny">{{ $cart->method }}</p>
                    </div>
                </div>
                <div class="w3-col l1 m1">
                    <div class="">
                        <span class="w3-text-green w3-large">${{ $cart->price }}</span></span>
                    </div>
                </div>
                <div class="w3-col l4 m4">
                    <div style="padding-left:2em;">
                        @foreach ($cart->userorders()->get() as $userorder)
                            <div class="">
                                <span class="w3-text-grey w3-large">{{ $userorder->contact_first_name }} {{ $userorder->contact_last_name }}</span>
                            </div>
                            @if ($cheforder->checked)
                                <div class="">
                                    <span class="w3-text-grey w3-large">{{ $userorder->contact_phone_number }}</span>
                                </div>
                                <div class="">
                                    <span class="w3-text-grey w3-large">{{ $userorder->contact_email }}</span>
                                </div>
                                <div class="">
                                    <span class="w3-text-grey w3-large">{{ $userorder->contact_address }}</span>
                                </div>
                            @else
                                @if (!$cart->deleted_at && !$OrderPresenter->compareDateTime($cart, $now))
                                    <div class="">
                                        <span class="w3-text-deep-orange w3-large">Not Approve Yet!</span>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="w3-col l1 m1">
                    @if ($cheforder->deleted_at)
                        @if ($cart->deleted_at)
                            <span class="w3-text-grey w3-large">Rejected</span>
                        @endif
                    @else
                        @if ($cart->deleted_at)
                            <span class="w3-text-grey w3-large">Canceled</span>
                        @else
                            @if ($cheforder->checked)
                                <span class="w3-text-grey w3-large">Approved</span>
                                <div class="w3-margin-top">
                                    <span class="w3-text-grey w3-large">{{ $OrderPresenter->paidCheck($cheforder->paid) }}</span>
                                </div>
                            @else
                                @if ($OrderPresenter->compareDateTime($cart, $now))
                                    <span class="w3-text-grey w3-large">Overdue</span>
                                @else
                                    <div class="">
                                        <a href="{!! route('order.accept', ['id' => $cheforder->id]) !!}" class="w3-btn w3-deep-orange w3-btn-block zk-shrink-hover">Accept</a>
                                    </div>
                                    <div class="w3-padding-left" style="margin-top:6em;">
                                        <a href="{!! route('order.reject', ['id' => $cheforder->id]) !!}" id="warn{{$cheforder->id}}confirm" class="w3-test-grey" style="display:none;">Reject</a>
                                        <a href="#" id="warn{{$cheforder->id}}" class="w3-test-grey warn">Reject</a>
                                    </div>
                                @endif
                            @endif
                        @endif
                    @endif

                </div>
            </div>
        @endforeach
    @endforeach
</div>

<div class="w3-row" style="margin-top:4em;">
    <div class="w3-center">
        <button id="group-accept" class="btn w3-large w3-white w3-text-deep-orange w3-border w3-border-deep-orange zk-shrink-hover" style="width:20%;">Accept</button>
        <!--for approve link use, not shown-->
        <a id="approve-link" href="{{ url('/order/chef_order/' . Auth::user()->chef_id . '/?chefOrderType=approve') }}" style="display:none;">approve link</a>
    </div>
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
        perPage: 5,
    });
</script>

<!--group accept-->
<script>
    var list = [];

    $(".ckbox").change(function(event) {
        id = "#".concat(event.target.id);

        if( $(id).is(':checked') ) {
            list[event.target.value] = event.target.value;
        } else {
            delete list[event.target.value]; 
        }
    });

    $("#group-accept").click(function() {
        let chef_order_id = clear(list);

        if (chef_order_id == "")
            errorAlert();
        else {
            $("#LoadingModal").modal();
            postChefOrderId(chef_order_id);
        }
        
    });

    function postChefOrderId(chef_order_id)
    {
        var token = '{{ Session::token() }}';
        var url = '{{ route('order.accept') }}';

        $.ajax({
            method: 'POST',
            url: url,
            data: {chef_order_id: chef_order_id, _token: token},
            success : function(data){
                $("#approve-link")[0].click();
            },
            error : function(data){
                alert('fail');
            },
        });
    }

    function errorAlert()
    {
        swal({
            title: "Error",
            text: "Please select the order",
            type: "error",
            timer: 2000,
        });
    }

    function clear (arr){
        var stripped = [];
        for (i = 0; i < arr.length; i++){
            if (arr[i])
                stripped.push(arr[i]);
        }
        return stripped;
    }
</script>