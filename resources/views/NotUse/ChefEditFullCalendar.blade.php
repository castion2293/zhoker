<!--Data Time People Modal -->
  <div class="modal" id="DatetimePeopleModal" role="dialog">
    <div class="modal-dialog" style="width:90%;">

      <!-- Modal content-->
      <div class="modal-content">
        <div>
          <span class="glyphicon glyphicon-remove pull-right w3-large" data-dismiss="modal" style="cursor:pointer;margin-right:20px;margin-top:10px"></span>
        </div>
        <div class="modal-body" style="padding:10px 50px;margin-top:3em;">
            <div id='calendar'></div>
            <div class="w3-center w3-margin-top">
                <a href="#modal-picker" class="btn btn-success" id="confirm-btn" data-dismiss="modal" style="width:20%;">Confirm</a>
            </div>
        </div>
      </div>

    </div>
  </div>  

<!--datatimepeople modal-->
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
                            start: '{{ $datetimepeople->date }} {{ $datetimepeople->time }}',
                            end: '{{ $datetimepeople->end_date }} {{ $datetimepeople->end_time }}',
                        },
                    @endforeach
                ],
                eventColor: '#4CAF50',
            });

            //confirm button
            $("#confirm-btn").click(function() {

                var eventsFromCalendar = $('#calendar').fullCalendar('clientEvents');

                var list = "";
                eventsFromCalendar.forEach(function(element) {
                    console.log(element.start.toISOString().slice(0,10));
                    var date = element.start.toISOString().slice(0,10);
                    var time = element.start.toISOString().slice(11,16);
                    var end_date = element.end.toISOString().slice(0,10);
                    var end_time = element.end.toISOString().slice(11,16);
                    var people = element.title.toString().split(" ");
                    list += date + "," + time + "," + end_date + "," + end_time + "," + people[0] + ";";
                });
                
                $("#dtp-result").val(list);
            });

            //link to image-from
            $('#DatetimePeopleModal').on('hidden.bs.modal', function (e) {
                $('html, body').animate({
                    scrollTop: $("#chef-create").offset().top
                }, 100);
            });
        });
    </script>