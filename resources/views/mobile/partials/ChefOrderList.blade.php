@inject('OrderPresenter', 'App\Presenters\OrderPresenter')
<div class="" id="paginate" style="margin-top:5em;">
    @foreach ($cheforders as $cheforder)
        @foreach($cheforder->carts()->withTrashed()->get() as $cart)
            <div class="w3-row w3-border w3-border-green w3-round-large w3-padding-tiny w3-margin-top">
                <div class="w3-col s12 w3-center">
                    @if (!$cheforder->checked && !$cart->deleted_at && !$OrderPresenter->overTime($cart, $now))
                        <input id="od{{$cheforder->id}}" class="w3-check w3-text-green ckbox" value="{{$cheforder->id}}" type="checkbox">
                    @endif 
                </div>
                <div class="w3-col s8" style="margin-top:0.2em;">
                    <div class="">
                        <span class="w3-text-grey w3-large"><b>{{ $OrderPresenter->getMealName($cart) }}</b></span>
                    </div>
                    <div class="">
                        <span class="w3-text-green w3-medium"><b>${{ $OrderPresenter->getMealPrice($cart) }}TWD</b></span>
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
                    <img src="{{ asset($cart->meals->cover_img) }}" alt="meal photo" style="width:100%">
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
                                @if (!$cart->deleted_at && !$OrderPresenter->overTime($cart, $now))
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
                            @if ($OrderPresenter->overTime($cart, $now))
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
                                    <a href="{!! route('order.accept.get', ['id' => $cheforder->id]) !!}" class="w3-btn w3-deep-orange w3-btn-block w3-round-medium zk-shrink-hover">Accept</a>
                                </div>
                            @endif
                        @endif
                    @endif
                @endif
                
            </div>
        @endforeach
    @endforeach
</div>

<div class="w3-row" style="margin-top:4em;">
    <div class="w3-center">
        <button id="group-accept" class="btn w3-large w3-white w3-text-deep-orange w3-border w3-border-deep-orange zk-shrink-hover" style="width:100%;">Accept</button>
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
        perPage: 2,
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
        var url = '{{ route('order.accept.post') }}';

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