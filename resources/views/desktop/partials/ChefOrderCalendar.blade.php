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
            <div class="w3-row w3-padding-medium w3-border-grey w3-border-bottom">
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

            @foreach ($cheforders as $cheforder)
                @foreach($cheforder->carts()->withTrashed()->get() as $cart)
                    <div id="item{{$cart->id}}" class="w3-row w3-padding-24 w3-border-grey w3-border-bottom items" style="display:none;">
                        <div class="w3-col l3 m3 w3-padding-right w3-margin-top">
                            <img src="{{ asset($cart->meals->cover_img) }}" alt="meal photo" style="width:100%">
                        </div>
                        <div class="w3-col l3 m3 w3-padding-left">
                            <div class="">
                                <span class="w3-text-grey w3-large"><b>{{ $OrderPresenter->getMealName($cart) }}</b></span>
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
                @foreach($cheforders as $cheforder)
                    @foreach($cheforder->carts()->withTrashed()->get() as $cart)
                        {
                            title: '{{ $OrderPresenter->getMealName($cart) }} / {{ $cart->people_order }} people',
                            start: '{{ $cart->date }} {{ $cart->time }}',
                            item_id: '{{ $cart->id }}',
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