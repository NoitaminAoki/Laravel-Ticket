@extends('Template.Template-admin')

@section('title') MyTicket | Reservation - View @endsection

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
                        <h5>List Customer Reservation</h5>
                        <div class="card-header-right">
                            <i class="icofont icofont-rounded-down"></i>
                            <i class="icofont icofont-refresh"></i>
                            <i class="icofont icofont-close-circled"></i>
                        </div>
                    </div>
                    <div class="card-block mt-3 mb-3">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover datatablesclass" cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                    <th class="all">No</th>
                                    <th class="all">Name Customer</th>
                                    <th>Code Reservation</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservasi as $num_row => $key)
                                @php
                                $get_customer = $M_customer::find($key->customer_id);
                                @endphp
                                <tr>
                                    <td>{{ $num_row+1 }}</td>
                                    <td>{{ $get_customer->name_customer }}</td>
                                    <td>{{ $key->code_reservation }}</td>
                                    <td style="width: 250px;">

                                        <div style="width: 250px;">
                                            <a href="{{ route('reservasi-terima',[$key->id_reservation]) }}" class="btn btn-success btn-sm"><b>Accept</b>
                                            </a>
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


</script>
@endsection