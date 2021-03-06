@inject('OrderPresenter', 'App\Presenters\OrderPresenter')
<div id='calendar' style="margin-top:7em;"></div>

<!--Infomation Modal -->
<div class="modal fade" id="info-modal" role="dialog">
    <div class="modal-dialog" style="width:80%;">

    <div class="modal-content">
        <div>
            <span class="glyphicon glyphicon-remove pull-right w3-large" data-dismiss="modal" style="cursor:pointer;margin-right:20px;margin-top:10px"></span>
        </div>
        <div>
            <h3 class="text-center w3-padding-8 w3-text-white">Schedule</h3>
        </div>
        <div class="modal-body" style="padding:10px 50px;">
            @foreach ($userorders as $userorder)

                <div id="item{{$userorder->id}}" class="w3-margin-top w3-margin-bottom w3-border w3-border-green items" style="border-radius:20px;display:none;">
                    <a class="w3-btn-block w3-left-align w3-green" style="border-radius:18px 18px 0 0;">
                        <div class="w3-row">
                            <div class="w3-col l3 m3">
                                <label>{{ $lang->desktop()['user_order']['order_number'] }} #{{ $userorder->id }}</label>
                            </div>
                            <div class="w3-col l2 m2">
                                <label>{{ $lang->desktop()['user_order']['total_price'] }}</label>
                            </div>
                            <div class="w3-col l2 m2">
                                <label>{{ $lang->desktop()['user_order']['pay_way'] }}</label>
                            </div>
                            <div class="w3-col l3 m3">
                                <label>{{ $lang->desktop()['user_order']['order_date'] }}</label>
                            </div>
                            <div class="w3-col l2 m2" style="padding-right:4em;">
                                <label>{{ $lang->desktop()['user_order']['order_detail'] }}</label>
                            </div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col l6 m6" style="padding-left: 19em;">
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
                                <label class="w3-text-grey" style="font-family:cursive;">{{ $lang->desktop()['user_order']['meal'] }}</label>
                            </div>
                            <div class="w3-col l6 m6" style="padding-left:1em;">
                                <label class="w3-text-grey" style="font-family:cursive;">{{ $lang->desktop()['user_order']['item'] }}</label>
                            </div>
                            <div class="w3-col l1 m1" style="padding-left:0.5em;">
                                <label class="w3-text-grey" style="font-family:cursive;">{{ $lang->desktop()['user_order']['total'] }}</label>
                            </div>
                            <div class="w3-col l1 m1" style="padding-left:1em;">
                                <label class="w3-text-grey" style="font-family:cursive;">{{ $lang->desktop()['user_order']['status'] }}</label>
                            </div>
                        </div>

                        @foreach ($userorder->carts()->withTrashed()->get() as $cart)
                            <div class="w3-row w3-padding-24">
                                <div class="w3-col l4 m4 w3-padding-right">
                                    <img src="{{ asset($cart->meals->cover_img) }}" alt="meal photo" style="width:100%">
                                </div>
                                <div class="w3-col l6 m6 w3-padding-left">
                                    <div class="w3-row">
                                        <div class="w3-col l5 m5">
                                            <div class="">
                                                <span class="w3-text-grey w3-large"><b>{{ str_limit($OrderPresenter->getMealName($cart), 24) }}</b></span>
                                            </div>
                                            <div class="">
                                                <span class="w3-text-green w3-large">$<span id="{{ $cart->id }}united_price" class="w3-text-green w3-large">{{ $OrderPresenter->getMealPrice($cart) }}</span></span>
                                            </div>
                                            <div class="">
                                                <span class="w3-text-grey w3-large">{{ $cart->people_order }} {{ $lang->desktop()['user_order']['people_order'] }}</span>
                                            </div>
                                        </div>
                                        <div class="w3-col l6 m6 w3-right">
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
                                    <div class="">
                                        @if ($cart->deleted_at)
                                            @if ($OrderPresenter->chefDeleteCheck($cart))
                                                <span class="w3-text-grey w3-large">{{ $lang->desktop()['user_order']['rejected'] }}</span>
                                            @else
                                                <span class="w3-text-grey w3-large">{{ $lang->desktop()['user_order']['canceled'] }}</span>
                                            @endif
                                        @else
                                            @if ($OrderPresenter->overTime($cart, $now))
                                                @if ($OrderPresenter->chefOrderCheck($cart))
                                                    <span class="w3-text-grey w3-large">{{ $lang->desktop()['user_order']['approved'] }}</span>
                                                    <div class="" style="margin-top:2em;">                                           
                                                        @if ($cart->evaluated)
                                                            <span class="w3-text-grey w3-large">{{ $lang->desktop()['user_order']['evaluated'] }}</span>
                                                        @else
                                                            <a href="{{ route('evaluation.create', ['id' => $cart->id])}}" class="w3-text-deep-orange w3-large">{{ $lang->desktop()['user_order']['evaluate'] }}</a>
                                                        @endif
                                                    </div>
                                                @else
                                                    <span class="w3-text-grey w3-large">{{ $lang->desktop()['user_order']['overdue'] }}</span>
                                                @endif
                                            @else
                                                @if ($OrderPresenter->chefOrderCheck($cart))
                                                    <span class="w3-text-grey w3-large">{{ $lang->desktop()['user_order']['approved'] }}</span>
                                                @else
                                                    <span class="w3-text-grey w3-large">{{ $lang->desktop()['user_order']['pending'] }}</span>
                                                @endif
                                                <div style="margin-top:2em;">
                                                    <a href="{{ route('order.cancel', ['id' => $cart->id]) }}" id="warn{{$cart->id}}confirm" style="display:none;">{{ $lang->desktop()['user_order']['cancel'] }}</a>
                                                    <a href="#" id="warn{{$cart->id}}" class="w3-text-blue w3-medium warn">{{ $lang->desktop()['user_order']['cancel'] }}</a>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach

                    </div>
                </div>

            @endforeach
        </div>
    </div>

    </div>
</div>

<!--datatimepeople modal-->

<script>
    $(function () {

        //delay show render calendar
        $("#calendar-link").click(function() {
            setTimeout(function(){ 
                $("#calendar").fullCalendar('render'); 
            }, 10);
        });

        //FullCalendar
        $('#calendar').fullCalendar({
            locale: '{{ $lang->desktop()['language'] }}',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultView: 'month',
            defaultDate: '{{ $now }}',
            editable: true,
            eventLimit: true, // allow "more" link when too many events,
            eventColor: '#ff5722',
            eventClick: function(event){
                showInforModal(event);
            },
            events: [
                @foreach($userorders as $userorder)
                    @foreach($userorder->carts()->withTrashed()->get() as $cart)
                        {
                            title: '{{ $OrderPresenter->getMealName($cart) }} / {{ $cart->people_order }} people',
                            start: '{{ $cart->date }} {{ $cart->time }}',
                            item_id: '{{ $cart->userorders->id }}',
                        },
                    @endforeach
                @endforeach
            ]
        });

        function showInforModal(event) {
            $("#item" + event.item_id).show();

            $("#info-modal").modal();
        } 

        //link to calendar
        $('#info-modal').on('hidden.bs.modal', function (e) {
            $('html, body').animate({
                scrollTop: $("#tab-1").offset().top
            }, 100);

            $(".items").hide();
        });
    });
</script>