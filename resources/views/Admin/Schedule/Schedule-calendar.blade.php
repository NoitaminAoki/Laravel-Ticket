@extends('Template.Template-admin')

@section('title') MyTicket | Schedule - {{ $type }} @endsection

@section('header')
<!-- light-box css -->
<link rel="stylesheet" type="text/css" href="{{asset('assets-admin/plugins/ekko-lightbox/dist/ekko-lightbox.css')}}">
<!-- Notification.css -->
<link rel="stylesheet" type="text/css" href="{{asset('assets-admin/pages/notification/notification.css')}}">
<!-- fullCalendar -->
<link rel="stylesheet" href="{{asset('plugins/fullcalendar/dist/fullcalendar.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/fullcalendar/dist/fullcalendar.print.min.css')}}" media="print">

@endsection

@section('content')

@if (Session::has('messages'))
{!! Session::get('messages') !!}
@endif

<div class="page-wrapper">
  <div class="page-header">
    <div class="page-header-title">
      <h4>Schedule</h4>
    </div>
    <div class="page-header-breadcrumb">
      <ul class="breadcrumb-title row">
        <li class="breadcrumb-item">
          <a href="#!">
            <i class="icofont icofont-home"></i>
          </a>
        </li>
        <li class="breadcrumb-item"><a href="#!">Schedule</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="page-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5>Calendar {{ $type }} Schedules</h5>
            <div class="card-header-right">
              <i class="icofont icofont-rounded-down"></i>
              <i class="icofont icofont-refresh"></i>
              <i class="icofont icofont-close-circled"></i>
            </div>
          </div>
          <div class="card-block mt-3 mb-3">
            <div id="calendar" class="p-3"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('footer')

<!-- light-box js -->
<script type="text/javascript" src="{{asset('assets-admin/plugins/ekko-lightbox/dist/ekko-lightbox.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-admin/plugins/lightbox2/dist/js/lightbox.js')}}"></script>
<!-- notification js -->
<script type="text/javascript" src="{{asset('assets-admin/js/bootstrap-growl.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-admin/pages/notification/notification.js')}}"></script>
@if (Session::has('messages'))
<script type="text/javascript" src="{{asset('assets-admin/pages/notification/notification-sh.js')}}"></script>
@endif
<!-- fullCalendar -->
<script src="{{asset('plugins/moment/moment.js')}}"></script>
<script src="{{asset('plugins/fullcalendar/dist/fullcalendar.min.js')}}"></script>
<script>
  var dataCalendar = @json($schedule);
</script>
<script>

  $(document).ready(function() {
    var date = new Date()
    var d    = date.getDate(),
    m    = date.getMonth(),
    y    = date.getFullYear();
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      // Random default events
      events    :  dataCalendar,
      // editable  : true,    
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)
      }
    });
  });

</script>
@endsection