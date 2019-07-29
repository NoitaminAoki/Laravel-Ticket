@extends('Template.Template-admin')

@section('title') MyStore | {{ $type }} - Add @endsection

@section('header')
<!-- select2 -->
<link rel="stylesheet" href="{{asset('plugins/select2/select2.css')}}">
@endsection

@section('content')

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
                <li class="breadcrumb-item"><a href="#!">{{ str_plural($type) }}</a>
                <li class="breadcrumb-item"><a href="#!">Add</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="page-body">
        <div class="row">
            <div class="card col-12">
                <div class="card-header">
                    <h5>Edit {{ $type }}</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                    </div>
                </div>
                <div class="card-block">
                    <form class="col-12" onsubmit="return confirm('Are You Sure?')" action="{{ route('transport-update',[$type]) }}" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-12 mt-2 mb-2">
                                <label>Name</label>
                                <input type="hidden" class="form-control" name="id_transport" value="{{ $transport->id_transport }}">
                                <input type="text" class="form-control" name="name" value="{{ empty(old('name'))? $transport->name_transport : old('name') }}" required>
                            </div>
                            <div class="col-12 mt-2 mb-2">
                                <label>Class</label>
                                <select class="form-control select2" name="class" required>
                                <option disabled>Choose Class</option>
                                @foreach($data_class as $key)
                                <option value="{{ $key->id_class }}" {!! ($key->id_class == $transport->id_class_transport)? "selected":"" !!}>{{ $key->name_class." | Rp. ".number_format($key->price_ticket,0).",-" }}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="col-12 mt-2 mb-2">
                                <label>Capacity</label>
                                <input type="number" class="form-control" name="capacity" value="{{ empty(old('capacity'))? $transport->capacity_transport : old('capacity') }}" required>
                            </div>
                            <div class="col-12 mt-2 mb-2">
                                <label>Description</label>
                                <textarea class="form-control" name="description">{{ empty(old('description'))? $transport->desc_transport : old('description') }}</textarea>
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
<script src="{{asset('plugins/select2/select2.full.min.js')}}"></script>

<script>
  $(document).ready(function() {
    $(".select2").select2();
});
</script>
@endsection