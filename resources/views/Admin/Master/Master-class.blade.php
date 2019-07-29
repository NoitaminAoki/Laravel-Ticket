@extends('Template.Template-admin')

@section('title') MyStore | Master Data - Class Transportation @endsection

@section('header')
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
            <h4>Master Data</h4>
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
                        <h5>List Class</h5>
                        <div class="card-header-right">
                            <i class="icofont icofont-rounded-down"></i>
                            <i class="icofont icofont-refresh"></i>
                            <i class="icofont icofont-close-circled"></i>
                        </div>
                    </div>
                    <div class="card-block mt-3 mb-3">
                        @if($status == "nonactive")
                        <a href="{{ route('class-view') }}" class="btn btn-success f-right mb-3"><b>Enabled Class <i class="fa  fa-arrow-right"></i></b></a>
                        @elseif($status == "active")
                        <a href="{{ route('class-view',['nonactive']) }}" class="btn btn-danger f-right mb-3"><b>Disabled Class <i class="fa  fa-arrow-right"></i></b></a>
                        @endif
                        <button class="btn btn-primary" data-target="#addClass" data-toggle="modal"><i class="ti ti-plus"></i> Add Class</button>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover datatablesclass" cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                    <th class="all">No</th>
                                    <th class="all">Class</th>
                                    <th>Price Ticket</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th class="all">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($class as $num_row => $key)
                                <tr>
                                    <td>{{ $num_row+1 }}</td>
                                    <td>{{ $key->name_class }}</td>
                                    <td>{{ $key->price_ticket }}</td>
                                    <td>{{ $key->type_class }}</td>
                                    <td>{{ $key->desc_class }}</td>
                                    <td>
                                        <div style="width: 200px;">
                                            <button class="btn btn-warning btn-sm edit-class" data-id="{{ $key->id_class }}"><b><i class="icofont icofont-pencil-alt-5"></i> Edit</b></button>
                                            @if($status == "active")
                                            <a href="{{ route('class-change-stat',['id='.$key->id_class.'&stat=nonactive']) }}" class="btn btn-danger btn-sm"><b><i class="fa fa-ban"></i> Disable</b></a>
                                            @elseif($status == "nonactive")
                                            <a href="{{ route('class-change-stat',['id='.$key->id_class.'&stat=active']) }}" class="btn btn-success btn-sm"><b><i class="fa fa-check-circle-o"></i> Enable</b></a>
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
<div class="modal fade" id="addClass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <form method="post" onsubmit="return confirm('Are you sure?')" action="{{ route('class-save') }}">
      <div class="modal-body">
        <div class="row">
            {!! csrf_field() !!}
            <div class="col-12 mb-2">
                <label>Name Class</label>
                <input type="text" class="form-control" value="{{ old('name') }}" name="name" required>
            </div>
            <div class="col-12 mb-2">
                <label>Price Ticket</label>
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Rp.</div>
                    </div>
                    <input type="text" class="form-control" name="price" value="{{ old('price') }}" required>
                </div>
            </div>
            <div class="col-12 mb-2">
                <label>Type</label>
                <select class="form-control custom-select" name="type" required>
                    <option {{ (empty(old('type')))? "selected":"" }} disabled>Choose Type</option>
                    <option value="airplane">Airplane</option>
                    <option value="train">Train</option>
                </select>
            </div>
            <div class="col-12 mb-2">
                <label>Information</label>
                <textarea type="text" class="form-control" name="desc" required>{{ old('desc') }}</textarea>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="editClass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <form method="post" onsubmit="return confirm('Are you sure?')" action="{{ route('class-update') }}">
      <div class="modal-body">
        ...
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
</div>
</div>
</div>

@endsection

@section('footer')
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

        $(document).on('click','.edit-class',function() {
            var id = $(this).data("id");
            $.ajax({
                url : "{{ route('class-edit') }}/"+id,
                type: "GET",
                success: function(data)
                {
                    $("#editClass .modal-body").html(data);
                    $("#editClass").modal();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                  alert('Error get data from ajax');
              }
          });
        });

    });
</script>
@endsection