@extends('desktop.layout.master')

@section('title', '| Chef Edit Date Time People')

@section('styles')
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://d4kfrsvmp3cgg.cloudfront.net/2018051606.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-64">
        <div class="w3-padding-12">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">{{ $lang->desktop()['chef_datetimepeople']['title'] }}</h1>
        </div>

        <div class="w3-row w3-margin-top w3-padding-medium">
            <div class="w3-col l5 m5">
                <img src="{{ asset($meal->cover_img) }}" alt="this is a photo" style="width:100%;">
            </div>
            <div class="w3-col l7 m7" style="padding-left:2em;">
                <div class=>
                    <label class="w3-large">{{ $meal->name }}</label>
                </div>
                <div class=>
                    <label class="w3-large w3-text-green">${{ $meal->price }}</label>
                </div>
                <div class="">
                    <label class="w3-large">{{ $lang->desktop()['chef_datetimepeople']['method'] }}:
                        @foreach ($meal->methods as $method)
                            <p class="w3-tag w3-teal w3-tiny">{{ $method->method }}</p>
                        @endforeach
                    </label>
                </div>
                <div class="">
                    <label class="w3-large">{{ $lang->desktop()['chef_datetimepeople']['time'] }}:
                        @foreach ($meal->shifts as $shift)
                            <p class="w3-tag w3-teal w3-tiny">{{ $shift->shift }}</p>
                        @endforeach
                    </label>
                </div>
                <div class="">
                    <label class="w3-large">{{ $lang->desktop()['chef_datetimepeople']['type'] }}:
                        @foreach ($meal->categories as $category)
                            <p class="w3-tag w3-teal w3-tiny">{{ $category->category }}</p>
                        @endforeach
                    </label>
                </div>
            </div>
        </div>

        <div class="" id='calendar' style="margin-top:7em;"></div>

        <div class="w3-padding-8 w3-margin-top">
            {!! Form::model($meal, ['route' => ['chef.datetimepeople.post', $meal->id], 'method' => 'POST', 'files' => true]) !!}
                {{ Form::text('datetimepeople', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey w3-white', 'id' => 'dtp-result', 'required' => '', 'style' => 'display:none;']) }}
                 <div class="w3-row w3-padding-top w3-border-top w3-border-green">
                    <div class="w3-rest"></div>
                    <div class="w3-col l2 m2 w3-right">
                        {!! Form::submit( $lang->desktop()['chef_datetimepeople']['confirm'] , ['class' => 'btn w3-large w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover', 'id' => 'confirm-btn']) !!}
                    </div>
                </div>    
            {!! Form::close() !!}
        </div>
    </div>

    <!--loader modal-->
    @include('desktop.partials.loader')

@endsection

@section('scripts')

    <script>
        $(function () {
            //import default datetimepeople into dtp-result form
            var old_datetimepeople = '';

            @foreach ($datetimepeoples as $datetimepeople) 
                old_datetimepeople += "{{ $datetimepeople->date }}" + "," + "{{ $datetimepeople->time }}" + "," + "{{ $datetimepeople->end_date }}" + ","
                                       + "{{ $datetimepeople->end_time }}" + "," + "{{ $datetimepeople->people_left }}" + ";";
            @endforeach

            $("#dtp-result").val(old_datetimepeople);

            //Open Date Time People Modal
            $("#modal-picker").click(function(){
                $("#DatetimePeopleModal").modal();
                $("#calendar").fullCalendar('render');
            });

            //FullCalendar
            $('#calendar').fullCalendar({
                locale: '{{ $lang->desktop()['language'] }}',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    //right: 'month,agendaWeek,agendaDay'
                },
                height: 480,
                defaultView: 'agendaWeek',
                defaultDate: '{{ $now }}',
                navLinks: true, // can click day/week names to navigate views
                selectable: true,
                selectHelper: true,
                eventStartEditable : true,
                select: function(start, end) {

                    //disable previous days
                    if(start.isBefore(moment())) {
                        $('#calendar').fullCalendar('unselect');
                        return false;
                    }

//                  // prompt window for people order
                    promptUp(start, end)
                },
                eventClick: function(event){
                    // var People = prompt('People');

                    // event.title = People.concat(" People");

                    // $('#calendar').fullCalendar('updateEvent',event);
                    var r = confirm("{{ $lang->desktop()['chef_datetimepeople']['cancel_meal'] }}");

                    if (r) {
                        $('#calendar').fullCalendar('removeEvents',event._id);
                    }
                },
                eventDragStart: function(event) {
                        pre_start = event.start;
                        pre_end = event.end;
                },
                eventDrop: function(event) {
                    eventData = {
                        title: event.title,
                        start: pre_start,
                        end: pre_end
                    };
                    $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
                },
                eventOverlap: function() {
                    //alert('here');
                },
                eventLimit: true, // allow "more" link when too many events
                events: [
                    @foreach($datetimepeoples as $datetimepeople)
                        {
                            title: '{{ $datetimepeople->people_left }} people',
                            id: '{{ $datetimepeople->id }}',
                            start: '{{ $datetimepeople->date }} {{ $datetimepeople->time }}',
                            end: '{{ $datetimepeople->end_date }} {{ $datetimepeople->end_time }}',
                        },
                    @endforeach
                ],
                eventColor: '#4CAF50',
            });

            function promptUp(start, end){
                dialog.prompt({
                    title: "{{ $lang->desktop()['chef_datetimepeople']['prop_title'] }}",
                    message: "{{ $lang->desktop()['chef_datetimepeople']['prop_message'] }}",
                    button: "{{ $lang->desktop()['chef_datetimepeople']['prop_confirm'] }}",
                    required: true,
                    position: "absolute",
                    animation: "slide",
                    input: {
                        type: "text",
                        placeholder: ""
                    },
                    validate: function(value){
                        if( $.trim(value) === "" ){
                            return false;
                        }
                    },
                    callback: function(value){
                        var People = value;

                        var eventData;
                        if (People) {

                            var title = People.concat(" {{ $lang->desktop()['chef_datetimepeople']['people'] }}");
                            eventData = {
                                title: title,
                                start: start,
                                end: end
                            };
                            $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
                        }

                        $('#calendar').fullCalendar('unselect');
                    }
                });
            }
        });

        //confirm button
        $("#confirm-btn").click(function() {

            $("#LoadingModal").modal(); //loader

            var eventsFromCalendar = $('#calendar').fullCalendar('clientEvents');

            var list = "";
            eventsFromCalendar.forEach(function(element) {
                console.log(element.start.toISOString().slice(0,10));
                var id = element.id;
                var date = element.start.toISOString().slice(0,10);
                var time = element.start.toISOString().slice(11,16);
                var end_date = element.end.toISOString().slice(0,10);
                var end_time = element.end.toISOString().slice(11,16);
                var people = element.title.toString().split(" ");
                list += id + "," + date + "," + time + "," + end_date + "," + end_time + "," + people[0] + ";";
            });
            
            $("#dtp-result").val(list);
        });

    </script>

    <!--prompt up window-->
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
@endsection