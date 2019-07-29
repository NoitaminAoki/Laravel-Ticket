@extends('Template.Template-admin')

@section('title') MyStore | Master Data - Route Transportation @endsection

@section('header')
<!-- select2 -->
<link rel="stylesheet" href="{{asset('plugins/select2/select2.css')}}">
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
                        <h5>List Route</h5>
                        <div class="card-header-right">
                            <i class="icofont icofont-rounded-down"></i>
                            <i class="icofont icofont-refresh"></i>
                            <i class="icofont icofont-close-circled"></i>
                        </div>
                    </div>
                    <div class="card-block mt-3 mb-3">
                        <button class="btn btn-primary mb-3" data-target="#addRoute" data-toggle="modal"><i class="ti ti-plus"></i> Add Route</button>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover datatablesclass" cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                    <th class="all">No</th>
                                    <th class="all">Initial Route</th>
                                    <th class="all">Final Route</th>
                                    <th>Price</th>
                                    <th>Information</th>
                                    <th class="all">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($route as $num_row => $key)
                                <tr>
                                    <td>{{ $num_row+1 }}</td>
                                    <td>{{ $key->initialRoute->name_region }}</td>
                                    <td>{{ $key->finalRoute->name_region }}</td>
                                    <td>{{ $key->price_route }}</td>
                                    <td>{{ $key->information_route }}</td>
                                    <td>
                                        <div style="width: 200px;">
                                            <button class="btn btn-warning btn-sm edit-route" data-id="{{ $key->id_route }}"><b><i class="icofont icofont-pencil-alt-5"></i> Edit</b></button>
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
<div class="modal fade" id="addRoute" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Route</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <form method="post" onsubmit="return confirm('Are you sure?')" action="{{ route('route-save') }}">
      <div class="modal-body">
        <div class="row">
            {!! csrf_field() !!}
            <div class="col-12 mt-2 mb-2">
                <label>Initial Route</label>
                <select class="form-control select2" name="initial" required>
                    <option {!! (empty(old('initial')))? "selected":"" !!} disabled>Choose Initial Route</option>
                    @foreach($region as $key)
                    <option value="{{ $key->id_region }}" {!! ($key->id_region == old('initial'))? "selected":"" !!}>{{ $key->name_region }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 mt-2 mb-2">
                <label>Final Route</label>
                <select class="form-control select2" name="final" required>
                    <option {!! empty(old('final'))? "selected":"" !!} disabled>Choose Final Route</option>
                    @foreach($region as $key)
                    <option value="{{ $key->id_region }}" {!! ($key->id_region == old('final'))? "selected":"" !!}>{{ $key->name_region }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 mb-2">
                <label>Price Route</label>
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Rp.</div>
                    </div>
                    <input type="text" class="form-control" name="price" value="{{ old('price') }}" required>
                </div>
            </div>
            <div class="col-12 mb-2">
                <label>Information</label>
                <textarea type="text" class="form-control" name="information" required>{{ old('information') }}</textarea>
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
<div class="modal fade" id="editRoute" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Route</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <form method="post" onsubmit="return confirm('Are you sure?')" action="{{ route('route-update') }}">
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
<!-- Select2 -->
<script src="{{asset('plugins/select2/select2.full.min.js')}}"></script>
<!-- notification js -->
<script type="text/javascript" src="{{asset('assets-admin/js/bootstrap-growl.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-admin/pages/notification/notification.js')}}"></script>
@if (Session::has('messages'))
<script type="text/javascript" src="{{asset('assets-admin/pages/notification/notification-sh.js')}}"></script>
@endif

<script>
    $(document).ready(function() {

        $(".select2").select2({ dropdownParent: "#addRoute" });

        $('.datatablesclass').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "responsive":true,
            "autoWidth": true
        });

        $(document).on('click','.edit-route',function() {
            var id = $(this).data("id");
            $.ajax({
                url : "{{ route('route-edit') }}/"+id,
                type: "GET",
                success: function(data)
                {
                    $("#editRoute .modal-body").html(data);
                    $(".select2-edit").select2({ dropdownParent: "#editRoute" });
                    $("#editRoute").modal();
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