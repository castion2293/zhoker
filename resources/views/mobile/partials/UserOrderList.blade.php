@inject('OrderPresenter', 'App\Presenters\OrderPresenter')
<div id="paginate" class="" style="margin-top:7em;">
    @foreach ($userorders as $userorder)
        
            <div class="w3-margin-top w3-margin-bottom w3-border w3-border-green" style="border-radius:20px;">
                <a class="w3-btn-block w3-left-align w3-green" style="border-radius:18px 18px 0 0;">
                    <div class="w3-row">
                        <div class="w3-col s12 w3-medium">
                            <label>{{ $lang->desktop()['user_order']['order_number'] }} #{{ $userorder->id }}</label>
                        </div>
                        <div class="w3-col s5 w3-medium">
                            <label>{{ $lang->desktop()['user_order']['total_price'] }}:</label>
                        </div>
                        <div class="w3-col s7 w3-medium">
                            <span>${{ $userorder->total_price }}TWD</span>
                        </div>
                        <div class="w3-col s12 w3-medium">
                            <label>{{ $lang->desktop()['user_order']['pay_way'] }}:</label>
                        </div>
                        <div class="w3-col s5 w3-medium">
                            <label>{{ $lang->desktop()['user_order']['order_date'] }}:</label>
                        </div>
                        <div class="w3-col s7 w3-medium">
                            <span>{{ date('M j, Y - g:iA', strtotime($userorder->created_at)) }}</span>
                        </div>
                        <div class="w3-col s12 w3-medium">
                            <label>{{ $lang->desktop()['user_order']['order_detail'] }}</label>
                        </div>
                    </div>
                </a>
                <div class="">
                    @foreach ($userorder->carts()->withTrashed()->get() as $cart)
                        <div class="w3-row w3-padding-tiny w3-margin-top">
                            <div class="w3-col s8" style="padding-left:0.5em;">
                                <span class="w3-text-grey w3-large"><b>{{ str_limit($OrderPresenter->getMealName($cart), 24) }}</b></span>
                            </div>
                                <div class="w3-col s4">
                                <span class="w3-text-green w3-large">$<span id="{{ $cart->id }}united_price" class="w3-text-green w3-large">{{ $OrderPresenter->getMealPrice($cart) }}</span>TWD</span>
                            </div>
                            <div class="w3-col s12">
                                <img src="{{ asset($cart->meals->cover_img) }}" alt="meal photo" style="width:100%">
                            </div>
                            <div class="w3-col s9 w3-margin-top" style="padding-left:0.5em;">
                                <span class="w3-text-grey w3-large">{{ $cart->date }} / {{ $cart->time }}</span>
                            </div>
                            <div class="w3-col s3 w3-margin-top" style="margin-top:0.2em;">
                                <p class="w3-tag w3-teal w3-tiny">{{ $cart->method }}</p>
                            </div>
                            <div class="w3-col s12 w3-center">
                                <span class="w3-text-grey w3-large">{{ $cart->people_order }} {{ $lang->desktop()['user_order']['people_order'] }}</span>
                            </div>
                                <div class="w3-row">
                                <div class="w3-rest"></div>
                                <div class="w3-col s5 w3-right">
                                    <span class="w3-text-green w3-large">$<span id="{{ $cart->id }}price" class="w3-text-green w3-large">{{ $cart->price }}</span></span>
                                </div>
                                <div class="w3-col s3 w3-right">
                                    <span class="w3-text-grey w3-large">{{ $lang->desktop()['user_order']['total'] }}:</span>
                                </div>
                            </div>

                            <div class="w3-col s12 w3-center w3-margin-bottom w3-padding-bottom">
                                @if ($cart->deleted_at)
                                    @if ($OrderPresenter->chefDeleteCheck($cart))
                                        <div class="w3-green">
                                            <span class="w3-text-whtie w3-large">{{ $lang->desktop()['user_order']['rejected'] }}</span>
                                        </div>
                                    @else
                                        <div class="w3-green">
                                            <span class="w3-text-whtie w3-large">{{ $lang->desktop()['user_order']['canceled'] }}</span>
                                        </div>
                                    @endif
                                @else
                                    @if ($OrderPresenter->overTime($cart, $now))
                                        @if ($OrderPresenter->chefOrderCheck($cart))
                                            <div class="w3-deep-orange">
                                                <span class="w3-text-whtie w3-large">{{ $lang->desktop()['user_order']['approved'] }}</span>
                                            </div>
                                            <div class="w3-col s12 w3-center w3-margin-top">
                                                @if ($cart->evaluated)
                                                    <span class="w3-text-whtie w3-large">{{ $lang->desktop()['user_order']['evaluated'] }}</span>
                                                @else
                                                    <a href="{{ route('evaluation.create', ['id' => $cart->id])}}" class="w3-text-deep-orange w3-large">{{ $lang->desktop()['user_order']['evaluate'] }}</a>
                                                @endif
                                            </div>
                                        @else
                                            <div class="w3-green">
                                                <span class="w3-text-whtie w3-large">{{ $lang->desktop()['user_order']['overdue'] }}</span>
                                            </div>
                                        @endif
                                    @else
                                        @if ($OrderPresenter->chefOrderCheck($cart))
                                            <div class="w3-deep-orange">
                                                <span class="w3-text-whtie w3-large">{{ $lang->desktop()['user_order']['approved'] }}</span>
                                            </div>
                                        @else
                                            <div class="w3-green">
                                                <span class="w3-text-whtie w3-large">{{ $lang->desktop()['user_order']['pending'] }}</span>
                                            </div>
                                        @endif
                                        <div class="w3-col s12 w3-center w3-margin-top">
                                            <a href="{{ route('order.cancel', ['id' => $cart->id]) }}" id="warn{{$cart->id}}confirm" style="display:none;">{{ $lang->desktop()['user_order']['cancel'] }}</a>
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
                title: "{{ $lang->desktop()['flash']['are_you_sure'] }}",
                text: "{{ $lang->desktop()['flash']['cancel_order_warn'] }}",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "{{ $lang->desktop()['flash']['cancel_confirm_btn'] }}",
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
        perPage: 2,
    });
</script>