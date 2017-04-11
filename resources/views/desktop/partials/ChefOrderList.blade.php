@inject('OrderPresenter', 'App\Presenters\OrderPresenter')
<div class="w3-row w3-padding-medium w3-border-grey w3-border-bottom" style="margin-top:7em;">
    <div class="w3-col l3 m3">
        <label class="w3-text-grey" style="font-family:cursive;">{{ $lang->desktop()['chef_order']['meal'] }}</label>
    </div>
    <div class="w3-col l3 m3" style="padding-left:1em;">
        <label class="w3-text-grey" style="font-family:cursive;">{{ $lang->desktop()['chef_order']['item'] }}</label>
    </div>
    <div class="w3-col l1 m1" style="">
        <label class="w3-text-grey" style="font-family:cursive;">{{ $lang->desktop()['chef_order']['total'] }}</label>
    </div>
    <div class="w3-col l4 m4" style="padding-left:2.5em;">
        <label class="w3-text-grey" style="font-family:cursive;">{{ $lang->desktop()['chef_order']['contact'] }}</label>
    </div>
    <div class="w3-col l1 m1" style="padding-left:1.5em;">
        <label class="w3-text-grey" style="font-family:cursive;">{{ $lang->desktop()['chef_order']['action'] }}</label>
    </div>
</div>

<div id="paginate">
    @foreach ($cheforders as $cheforder)
        @foreach($cheforder->carts()->withTrashed()->get() as $cart)
            <div class="w3-row w3-padding-24 w3-border-grey w3-border-bottom">
                <div class="w3-col l3 m3 w3-padding-right w3-margin-top">
                    <div class="w3-row">
                        <div class="w3-col s10 w3-right w3-margin-top">
                            <img src="{{ asset($cart->meals->cover_img) }}" alt="meal photo" style="width:100%;">
                        </div>
                        <div class="w3-col s2 w3-right" style="margin-top:2.5em;">
                            @if (!$cheforder->checked && !$cart->deleted_at && !$OrderPresenter->overTime($cart, $now))
                                <input id="od{{$cheforder->id}}" class="w3-check w3-text-green ckbox" value="{{$cheforder->id}}" type="checkbox">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="w3-col l3 m3 w3-padding-left">
                    <div class="">
                        <span class="w3-text-grey w3-large"><b>{{ str_limit($OrderPresenter->getMealName($cart), 24) }}</b></span>
                    </div>
                    <div class="">
                        <span class="w3-text-green w3-large">$<span id="{{ $cart->id }}united_price" class="w3-text-green w3-large">{{ $OrderPresenter->getMealPrice($cart) }}</span></span>
                    </div>
                    <div class="">
                        <span class="w3-text-grey w3-large">{{ $cart->people_order }} {{ $lang->desktop()['chef_order']['people_order'] }}</span>
                    </div>
                    <div class="">
                        <span class="w3-text-grey w3-large">{{ $cart->date }} / {{ $cart->time }}</span>
                    </div>
                    <div class="">
                        <p class="w3-tag w3-teal w3-tiny">{{ $cart->method }}</p>
                    </div>
                </div>
                <div class="w3-col l1 m1" style="padding-left: 0.5em;">
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
                                @if (!$cart->deleted_at && !$OrderPresenter->overTime($cart, $now))
                                    <div class="">
                                        <span class="w3-text-deep-orange w3-large">{{ $lang->desktop()['chef_order']['not_approve'] }}!</span>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="w3-col l1 m1">
                    @if ($cheforder->deleted_at)
                        @if ($cart->deleted_at)
                            <span class="w3-text-grey w3-large">{{ $lang->desktop()['chef_order']['rejected'] }}</span>
                        @endif
                    @else
                        @if ($cart->deleted_at)
                            <span class="w3-text-grey w3-large">{{ $lang->desktop()['chef_order']['canceled'] }}</span>
                        @else
                            @if ($cheforder->checked)
                                <span class="w3-text-grey w3-large">{{ $lang->desktop()['chef_order']['approved'] }}</span>
                                <div class="w3-margin-top">
                                    <span class="w3-text-grey w3-large">{{ $cheforder->paid ? $lang->desktop()['chef_profile']['order_pay'] : $lang->desktop()['chef_profile']['order_not_pay']}}</span>
                                </div>
                            @else
                                @if ($OrderPresenter->overTime($cart, $now))
                                    <span class="w3-text-grey w3-large">{{ $lang->desktop()['chef_order']['overdue'] }}</span>
                                @else
                                    <div class="">
                                        <a href="{!! route('order.accept.get', ['id' => $cheforder->id]) !!}" class="w3-btn w3-deep-orange w3-btn-block zk-shrink-hover">{{ $lang->desktop()['chef_order']['accept'] }}</a>
                                    </div>
                                    <div class="w3-padding-left" style="margin-top:6em;">
                                        <a href="{!! route('order.reject', ['id' => $cheforder->id]) !!}" id="warn{{$cheforder->id}}confirm" class="w3-test-grey" style="display:none;">{{ $lang->desktop()['chef_order']['reject'] }}</a>
                                        <a href="#" id="warn{{$cheforder->id}}" class="w3-test-grey warn">{{ $lang->desktop()['chef_order']['reject'] }}</a>
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
        <button id="group-accept" class="btn w3-large w3-white w3-text-deep-orange w3-border w3-border-deep-orange zk-shrink-hover" style="width:20%;">{{ $lang->desktop()['chef_order']['accept'] }}</button>
        <!--for approve link use, not shown-->
        <a id="approve-link" href="{{ url('/order/chef_order/' . Auth::user()->chef_id . '/?chefOrderType=approve') }}" style="display:none;">approve link</a>
    </div>
</div>  


<!--delete meal-->
<script>
    $(function () {
        $(".warn").click(function (event) {
            swal({
                title: "{{ $lang->desktop()['flash']['are_you_sure'] }}",
                text: "{{ $lang->desktop()['flash']['reject_order_warn'] }}",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "{{ $lang->desktop()['flash']['reject_confirm_btn'] }}",
                cancelButtonText: "{{ $lang->desktop()['flash']['cancel_btn'] }}",
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
            title: "{{ $lang->desktop()['flash']['error'] }}",
            text: "{{ $lang->desktop()['flash']['select_order'] }}",
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