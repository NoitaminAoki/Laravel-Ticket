@extends('Template.Template-admin')

@section('title') MyStore | Schedule {{ $type }} - Detail @endsection

@section('header')
<style type="text/css">
    div#detail td {
        width: 50%;
    }
</style>
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
                    <li class="breadcrumb-item"><a href="#!">Detail</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="page-body">
            <div class="row" id="detail">
                <div class="card col-12">
                    <div class="card-header">
                        <h5>Detail {{ $type }} Schedule</h5>
                        <div class="card-header-right">
                            <i class="icofont icofont-rounded-down"></i>
                            <i class="icofont icofont-refresh"></i>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="col-12 p-2">
                            <table class="table table-hover table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row">Name {{ $type }}</th>
                                        <td>{{ $data_transport->name_transport }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Capacity / Number of seat</th>
                                        <td>{{ $data_transport->capacity_transport }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Class</th>
                                        <td>{{ $data_transport->class->name_class }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12 p-2">
                            <table class="table table-hover table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row">Departure</th>
                                        <td>{{ $schedule->departure_time." -- ".date("l, d F Y", strtotime($schedule->departure_date)) }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Arrival</th>
                                        <td>{{ $schedule->arrival_time." -- ".date("l, d F Y", strtotime($schedule->arrival_date)) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12 p-2">
                            <table class="table table-hover table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row">Initial Route</th>
                                        <td>{{ $data_route->initialRoute->name_region }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Final Route</th>
                                        <td>{{ $data_route->finalRoute->name_region }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12 p-2">
                            <table class="table table-hover table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row">Description</th>
                                        <td>{{ $schedule->description_schedule }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Price</th>
                                        <td>{{ "Rp. ".number_format(($data_transport->class->price_ticket+$data_route->price_route),0).",-" }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('footer')
    @endsection