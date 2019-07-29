@extends('Template.Template-admin')

@section('title') MyStore | Schedule {{ $type }} - Add @endsection

@section('header')
<!-- select2 -->
<link rel="stylesheet" href="{{asset('plugins/select2/select2.css')}}">
<!-- daterange picker -->
<link rel="stylesheet" href="{{asset('plugins/bootstrap-daterangepicker/daterangepicker.css')}}">
@endsection

@section('content')

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
                <li class="breadcrumb-item"><a href="#!">{{ $type }} Schedules</a>
                    <li class="breadcrumb-item"><a href="#!">Add</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="page-body">
            <div class="row">
                <div class="card col-12">
                    <div class="card-header">
                        <h5>Add {{ $type }} Schedule</h5>
                        <div class="card-header-right">
                            <i class="icofont icofont-rounded-down"></i>
                            <i class="icofont icofont-refresh"></i>
                        </div>
                    </div>
                    <div class="card-block">
                        <form class="col-12" onsubmit="return confirm('Are You Sure?')" action="{{ route('schedule-save',[$type]) }}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="col-12 mt-2 mb-2">
                                    <label>{{ $type }}</label>
                                    <select class="form-control select2" name="transport" required>
                                        <option {!! (empty(old('transport')))? "selected":"" !!} disabled>Choose {{ $type }}</option>
                                        @foreach($data_transport as $key)
                                        <option value="{{ $key->id_transport }}" {{ ($key->id_transport == old('transport'))? "selected":"" }}>{{ $key->name_transport." | Rp. ".number_format($key->class->price_ticket,0).",-" }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 mt-2 mb-2">
                                    <label>Route</label>
                                    <select class="form-control select2" name="route" required>
                                        <option {!! (empty(old('route')))? "selected":"" !!} disabled>Choose Route</option>
                                        @foreach($data_route as $key)
                                        <option value="{{ $key->id_route }}" {{ ($key->id_route == old('route'))? "selected":"" }}>{{ $key->initialRoute->name_region." - ".$key->finalRoute->name_region." | Rp. ".number_format($key->price_route,0).",-" }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mt-2 mb-2">
                                    <label>Departure &amp; Arrival Date</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="icofont icofont-calendar"></i></div>
                                        </div>
                                        <input type="text" class="form-control pull-right daterange" value="{{ old('date') }}" name="date">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-2 mb-2">
                                    <label>Departure Time</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="icofont icofont-wall-clock"></i></div>
                                        </div>
                                        <input type="time" class="form-control datepicker" name="d_time" value="{{ old('d_time') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-2 mb-2">
                                    <label>Arrival Time</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="icofont icofont-wall-clock"></i></div>
                                        </div>
                                        <input type="time" class="form-control"  name="a_time" value="{{ old('a_time') }}" required>
                                    </div>
                                </div>
                                <div class="col-12 mt-2 mb-2">
                                    <label>Description</label>
                                <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                                </div>
                                <div class="col-12 mt-2 mb-2">
                                    <button type="submit" class="btn btn-primary float-right">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('footer')
    <!-- Select2 -->
    <script src="{{asset('plugins/select2/select2.full.min.js')}}"></script><!-- date-range-picker -->
    <script src="{{asset('plugins/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script>
      $(document).ready(function() {
        $(".select2").select2();
        $(".daterange").daterangepicker();
    });
</script>
@endsection