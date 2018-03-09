@extends('school.layouts.main')
@section('style')
    <link rel="stylesheet" href={{ asset( 'vendor/fullcalendar/fullcalendar.min.css') }}>
    <link rel="stylesheet" href={{ asset( 'vendor/fullcalendar/fullcalendar.print.css') }} rel='stylesheet'
          media='print'>
@endsection
@section('content')
    @include('school.calendar.edit_event_table')
    <div class="box box-solid box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Calendario</h3>
        </div>
        <div id='calendar'></div>
    </div>

@endsection
@section('scripts')
    <script src={{ asset( '/vendor/fullcalendar/lib/moment.min.js') }}></script>
    <script src={{ asset( '/vendor/fullcalendar/fullcalendar.min.js') }}></script>
    <script src={{ asset( '/vendor/fullcalendar/locale-all.js') }}></script>
    <script>
        $(document).ready(function () {

            $('#calendar').fullCalendar({
                locale: 'es',
                themeSystem: 'bootstrap4',
                aspectRatio: 2.1,
                timeFormat: 'H:mm',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                navLinks: false, // can click day/week names to navigate views
                editable: false,
                eventLimit: false, // allow "more" link when too many events
                eventRender: function (eventObj, $el) {
                    $el.popover({
                        title: eventObj.title,
                        content: eventObj.description,
                        trigger: 'hover',
                        placement: 'top',
                        container: 'body'
                    });
                },
                events: [
                        @foreach($calendars as $calendar)
                    {
                        title: '{{$calendar->activity}}',
                        description: '{{$calendar->description}}',
                        start: '{{$calendar->date_start}}',
                        end: '{{$calendar->date_end}}'
                    },
                    @endforeach
                ]
            });

        });
    </script>

@endsection