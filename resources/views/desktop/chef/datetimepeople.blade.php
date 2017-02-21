@extends('desktop.layout.master')

@section('title', '| Chef Edit Date Time People')

@section('styles')
    <script src="{{ URL::to('js/GoogleAnalytics.js') }}"></script><!--Google Analytics-->
@endsection

@section('content')
    <!--header picture-->
    <div class="" id="top-pic">
        <img src="https://s3-us-west-2.amazonaws.com/zhoker/images/1031201602.JPG" alt="profile" style="width:100%">
    </div>

    <!--content-->
    <div class="w3-content w3-container w3-padding-64">
        <div class="w3-padding-12">
            <h1 class="w3-text-green w3-border-green w3-border-bottom">Edit Date/Time/People<h1>
        </div>

        <div class="w3-margin-top" id='calendar'></div>

        <div class="w3-padding-8 w3-margin-top">
            {!! Form::model($meal, ['route' => ['chef.datetimepeople.post', $meal->id], 'method' => 'POST', 'files' => true]) !!}
                {{ Form::text('datetimepeople', null, ['class' => 'w3-input w3-border w3-border-grey w3-large w3-text-grey w3-white', 'id' => 'dtp-result', 'required' => '', 'style' => 'display:none;']) }}
                 <div class="w3-row w3-margin-top">
                    <div class="w3-rest"></div>
                    <div class="w3-col l2 m2 w3-right">
                        {!! Form::submit('Confirm', ['class' => 'btn w3-large w3-white w3-text-green w3-border w3-border-green btn-block zk-shrink-hover', 'id' => 'confirm-btn']) !!}
                    </div>
                </div>    
            {!! Form::close() !!}
        </div>
    </div>

    <!--loader modal-->
    @include('desktop.partials.loader');

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

                    var People = prompt('People');
                    var eventData;
                    if (People) {
                        var title = People.concat(" People");
                        eventData = {
                            title: title,
                            start: start,
                            end: end
                        };
                        $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
                    }
                    $('#calendar').fullCalendar('unselect');
                },
                eventClick: function(event){
                    // var People = prompt('People');

                    // event.title = People.concat(" People");

                    // $('#calendar').fullCalendar('updateEvent',event);
                    var r = confirm("Do you want to cancel?");

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
@endsection