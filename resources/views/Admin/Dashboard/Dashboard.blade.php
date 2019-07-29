@extends('Template.Template-admin')

@section('title') MyTicket | Dashboard @endsection

@section('header')

@endsection

@section('content')

@if (Session::has('messages'))
{!! Session::get('messages') !!}
@endif
<div class="page-wrapper">
    <div class="page-header">
        <div class="page-header-title">
            <h4>User</h4>
        </div>
        <div class="page-header-breadcrumb">
            <ul class="breadcrumb-title row">
                <li class="breadcrumb-item">
                    <a href="#!">
                        <i class="icofont icofont-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="page-body">
        <div class="row">
            <div class="col-md-4">
               <div class="card table-card widget-primary-card">
                <div class="">
                    <div class="row-table">
                        <a href="{{ route('user-view') }}" class="col-sm-3 card-block-big text-light">
                            <i class="fa fa-users"></i>
                        </a>
                        <div class="col-sm-9">
                            <h4>{{ $total_user }} +</h4>
                            <h6>Total users</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@section('footer')

@endsection