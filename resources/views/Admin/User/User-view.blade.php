@extends('Template.Template-admin')

@section('title') MyTicket | User - View @endsection

@section('header')
<!-- light-box css -->
<link rel="stylesheet" type="text/css" href="{{asset('assets-admin/plugins/ekko-lightbox/dist/ekko-lightbox.css')}}">
<!-- Notification.css -->
<link rel="stylesheet" type="text/css" href="{{asset('assets-admin/pages/notification/notification.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">

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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>List User</h5>
                        <div class="card-header-right">
                            <i class="icofont icofont-rounded-down"></i>
                            <i class="icofont icofont-refresh"></i>
                            <i class="icofont icofont-close-circled"></i>
                        </div>
                    </div>
                    <div class="card-block mt-3 mb-3">
                        @if($status == "nonactive")
                        <a href="{{ route('user-view') }}" class="btn btn-success f-right mb-3"><b>Enabled User <i class="fa  fa-arrow-right"></i></b></a>
                        @elseif($status == "active")
                        <a href="{{ route('user-view',['nonactive']) }}" class="btn btn-danger f-right mb-3"><b>Disabled User <i class="fa  fa-arrow-right"></i></b></a>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover datatablesclass" cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                    <th class="all">No</th>
                                    <th class="all">Username</th>
                                    <th>Level</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $num_row => $key)
                                <tr>
                                    <td>{{ $num_row+1 }}</td>
                                    <td>{{ $key->username }}</td>
                                    <td>{{ $key->level }}</td>
                                    <td style="width: 250px;">

                                        <div style="width: 250px;">
                                            <button class="btn btn-primary btn-sm btn-view" data-id="{{ $key->id_user }}"><b><i class="fa fa-eye"></i>View</b></button>
                                            <a href="{{ route('user-edit',[$key->id_user]) }}" class="btn btn-warning btn-sm"><b><i class="fa fa-pencil"></i>Edit</b>
                                            </a>
                                            @if($status == "active")
                                            <a href="{{ route('user-change-stat',['id='.$key->id_user.'&stat=nonactive']) }}" onclick="return confirm('Are you sure want to disable this user ?')" class="btn btn-danger btn-sm"><b><i class="fa fa-ban"></i> Disable</b></a>
                                            @elseif($status == "nonactive")
                                            <a href="{{ route('user-change-stat',['id='.$key->id_user.'&stat=active']) }}" onclick="return confirm('Are you sure want to enable this user ?')" class="btn btn-success btn-sm"><b><i class="fa fa-check-circle-o"></i> Enable</b></a>
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

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
@if (Session::has('messages'))
<script type="text/javascript" src="{{asset('assets-admin/pages/notification/notification-sh.js')}}"></script>
@endif

<script>

    $(document).ready(function() {
        $('.datatablesclass').DataTable({
            dom: 'Bfrtip',
            buttons: [
            {
                extend: 'excel',
                filename: 'Data User MyTicket'
            },
            {
                extend: 'pdf',
                filename: 'Data User MyTicket'
            } 
            ],
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