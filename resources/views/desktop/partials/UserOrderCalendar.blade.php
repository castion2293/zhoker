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
                                    <div class="">
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
                            title: '{{ $cart->meals->name }} / {{ $cart->people_order }} people',
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