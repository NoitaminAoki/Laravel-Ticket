@extends('Template.Template-auth')

@section('title') MyTicket | Admin Login @endsection

@section('bootstrap')
<link rel="stylesheet" type="text/css" href="{{asset('assets-admin/plugins/bootstrap/css/bootstrap.min.css')}}">
@endsection

@push('class')
login
@endpush

@section('content')
<div class="col-12 d-flex justify-content-center">
  <!-- Authentication card start -->
  <div class="login-card card-block auth-body">
    <form class="md-float-material" method="post" action="{{ route('admin-set-login') }}">
      {!! csrf_field() !!}
      <div class="text-center auth-box z-depth-5">
        <!-- <h4 style="color: #666666;"><strong>My Store</strong></h4> -->
        <img src="{{asset('assets-admin/images/logo2.png')}}" alt="IMG-LOGO">
      </div>
      <div class="auth-box z-depth-5">
        <div class="row m-b-20">
          <div class="col-12">
            <h3 class="text-center txt-primary">Sign In</h3>
          </div>
        </div>
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Username" name="username" value="{{old('username')}}" required>
          <span class="md-line"></span>
        </div>
        <div class="input-group">
          <input type="password" class="form-control" placeholder="password" name="password" required>
          <span class="md-line"></span>
        </div>
        <div class="row m-t-30">
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
          </div>
          @if ($errors->has('error'))
          <div id="alert-failed" style="display: none;" class="col-12">
            <div class="alert bg-danger">{{ $errors->first('error') }}</div>
          </div>
          @endif
        </div>
      </div>
    </form>
    <!-- end of form -->
  </div>
  <!-- Authentication card end -->
</div>
<!-- end of col-sm-12 -->
@endsection