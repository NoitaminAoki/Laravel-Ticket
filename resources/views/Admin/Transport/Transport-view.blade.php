@extends('Template.Template-admin')

@section('title') MyTicket | Transportation - {{ $type }} @endsection

@section('header')
<!-- light-box css -->
<link rel="stylesheet" type="text/css" href="{{asset('assets-admin/plugins/ekko-lightbox/dist/ekko-lightbox.css')}}">
<!-- Notification.css -->
<link rel="stylesheet" type="text/css" href="{{asset('assets-admin/pages/notification/notification.css')}}">

@endsection

@section('content')

@if (Session::has('messages'))
{!! Session::get('messages') !!}
@endif

<div class="page-wrapper">
    <div class="page-header">
        <div class="page-header-title">
            <h4>Transportation</h4>
        </div>
        <div class="page-header-breadcrumb">
            <ul class="breadcrumb-title row">
                <li class="breadcrumb-item">
                    <a href="#!">
                        <i class="icofont icofont-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#!">Transportation</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="page-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>List {{ str_plural($type) }}</h5>
                        <div class="card-header-right">
                            <i class="icofont icofont-rounded-down"></i>
                            <i class="icofont icofont-refresh"></i>
                            <i class="icofont icofont-close-circled"></i>
                        </div>
                    </div>
                    <div class="card-block mt-3 mb-3">
                        @if($status == "nonactive")
                        <a href="{{ route('transport-view',[$type]) }}" class="btn btn-success f-right mb-3"><b>Enabled {{ $type }} <i class="fa  fa-arrow-right"></i></b></a>
                        @elseif($status == "active")
                        <a href="{{ route('transport-view',[$type,'nonactive']) }}" class="btn btn-danger f-right mb-3"><b>Disabled {{ $type }} <i class="fa  fa-arrow-right"></i></b></a>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover datatablesclass" cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                    <th class="all">No</th>
                                    <th class="all">Name</th>
                                    <th>Class</th>
                                    <th>Capacity</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                               @foreach($transport as $num_row => $key)
                                <tr>
                                    <td>{{ $num_row+1 }}</td>
                                    <td>{{ $key->name_transport }}</td>
                                    <td>{{ $key->class->name_class }}</td>
                                    <td>{{ $key->capacity_transport }}</td>
                                    <td style="width: 250px;">

                                        <div style="width: 250px;">
                                            <button class="btn btn-primary btn-sm btn-view" data-id="{{ $key->id_transport }}"><b><i class="fa fa-eye"></i>View</b></button>
                                            <a href="{{ route('transport-edit',[$type,$key->id_transport]) }}" class="btn btn-warning btn-sm"><b><i class="fa fa-pencil"></i>Edit</b>
                                            </a>
                                            @if($status == "active")
                                            <a href="{{ route('transport-change-stat',[$type,'id='.$key->id_transport.'&stat=nonactive']) }}" class="btn btn-danger btn-sm"><b><i class="fa fa-ban"></i> Disable</b></a>
                                            @elseif($status == "nonactive")
                                            <a href="{{ route('transport-change-stat',[$type,'id='.$key->id_transport.'&stat=active']) }}" class="btn btn-success btn-sm"><b><i class="fa fa-check-circle-o"></i> Enable</b></a>
                                            @endif
                                        </div>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="viewUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    ...
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

<script>

    $(document).ready(function() {
        $('.datatablesclass').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "responsive":true,
            "autoWidth": true
        });
    });

    $(document).on('click','.btn-view', function() {
        var id = $(this).data("id");
        $.ajax({
            url : "{{ route('user-view-ajax') }}/"+id,
            type: "GET",
            success: function(data)
            {
                $("#viewUser .modal-body").html(data);
                $("#viewUser").modal();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    });

</script>
@endsection