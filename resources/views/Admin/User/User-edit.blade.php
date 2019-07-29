@extends('Template.Template-admin')

@section('title') MyStore | User - Create @endsection

@section('header')
<!-- select2 -->
<link rel="stylesheet" href="{{asset('plugins/select2/select2.css')}}">
@endsection

@section('content')

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
                <li class="breadcrumb-item"><a href="#!">User</a>
                </li>
                <li class="breadcrumb-item"><a href="#!">Edit</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="page-body">
        <div class="row">
            <div class="card col-12">
                <div class="card-header">
                    <h5>Edit User</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                    </div>
                </div>
                <div class="card-block">
                    <form class="col-12" onsubmit="return confirm('Are You Sure?')" action="{{ route('user-update') }}" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-12 mt-2 mb-2">
                                <label>Username</label>
                                <input type="hidden" class="form-control" name="id_user" value="{{ $user->id_user }}">
                                <input type="text" class="form-control" name="username" value="{{ empty(old('username'))? $user->username : old('username') }}" required>
                            </div>
                            <div class="col-12 mt-2 mb-2">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" value="{{ empty(old('password'))? $user->password : old('password') }}" required>
                            </div>
                            <div class="col-12 mt-2 mb-2">
                                <label>Level</label>
                                <select class="form-control select2" name="level" required>
                                    <option {{ (empty(old('level')))? "selected":"" }} disabled>Choose Level</option>
                                    <option value="Super Admin" {{ ($user->level == "Super Admin")? "selected" : "" }}>Super Admin</option>
                                    @if((Session::get("login_admin.id")) != $user->id_user)
                                    <option value="Transport Officer" {{ ($user->level == "Transport Officer")? "selected" : "" }}>Transport Officer</option>
                                    <option value="Scheduling Officer" {{ ($user->level == "Scheduling Officer")? "selected" : "" }}>Scheduling Officer</option>
                                    <option value="Service Officer" {{ ($user->level == "Service Officer")? "selected" : "" }}>Service Officer</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-12 mt-2 mb-2">
                                <label>New Photo Profile </label><small class="text-danger"> *Do not choose image if you dont want change it</small>
                                <input type="file" class="form-control" accept="image/*" name="photo">
                                @if ($errors->has('photo'))
                                <span class="text-danger">Only formatted image file allowed and max size is 2 MB</span>
                                @endif
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
<!-- DataTables -->
<script type="text/javascript" src="{{asset('assets-admin/plugins/DataTables/datatables.min.js')}}"></script>

<script>
  $(document).ready(function() {
    $(".select2").select2();
});
</script>
@endsection