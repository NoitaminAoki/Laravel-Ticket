@extends('Template.Template-auth')

@section('title') MyTicket | Reservasi @endsection

@section('bootstrap')
<link rel="stylesheet" type="text/css" href="{{asset('assets-admin/plugins/bootstrap/css/bootstrap.min.css')}}">
@endsection



@section('content')
<div class="col-12 d-flex justify-content-center">
  <!-- Authentication card start -->
  <div class="login-card card-block auth-body col-12">
    <form class="md-float-material" method="post" action="{{ route('customer-reservasi-save') }}">
      {!! csrf_field() !!}
      <input type="hidden" name="id_customer" value="{{ Session::get('login_customer.id') }}">
      <input type="hidden" name="id_schedule" value="{{ $schedule->id_schedule }}">
      <div class="text-center auth-box z-depth-5">
        <img src="{{asset('assets-admin/images/logo2.png')}}" alt="IMG-LOGO">
      </div>
      <div class="auth-box z-depth-5">
        <div class="row">
          <div class="col-md-6">
            <div class="row m-b-20">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Informasi 
                      @if($transport->type_transport == "airplane")
                      Pesawat Terbang
                      @elseif($transport->type_transport == "train")
                      Kereta Api
                      @endif
                    </h5>
                  </div>
                  <div class="card-block mt-3 mb-3">
                    <div class="text-dark">
                      <div class="col-12 p-2">
                        <table class="table table-hover table-bordered">
                          <tbody>
                            <tr>
                              <th scope="row">Name {{ $transport->type_transport }}</th>
                              <td>{{ $transport->name_transport }}</td>
                            </tr>
                            <tr>
                              <th scope="row">Available Capacity / Number of seat</th>
                              <td>{{ (($transport->capacity_transport)-($reservasi))."/".$transport->capacity_transport }}</td>
                            </tr>
                            <tr>
                              <th scope="row">Class</th>
                              <td>{{ $transport->class->name_class }}</td>
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
                              <td>{{ $route->initialRoute->name_region }}</td>
                            </tr>
                            <tr>
                              <th scope="row">Final Route</th>
                              <td>{{ $route->finalRoute->name_region }}</td>
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
                              <td>{{ "Rp. ".number_format(($transport->class->price_ticket+$route->price_route),0).",-" }}</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5>Reservasi 
                  @if($transport->type_transport == "airplane")
                  Pesawat Terbang
                  @elseif($transport->type_transport == "train")
                  Kereta Api
                  @endif
                </h5>
              </div>
              <div class="card-block mt-3 mb-3 text-left text-dark">
                <table class="table">
                  <tr>
                    <td><h4>Harga Tiket</h4></td>
                  </tr>
                  <tr>
                    <td>
                      <h6>{{ "Rp. ".number_format(($transport->class->price_ticket+$route->price_route),0).",-/tiket" }}</h6>
                    </td>
                  </tr>
                  <tr>
                    <td><h4>Kuantitas Tiket</h4></td>
                  </tr>
                  <tr>
                    <td>
                      <div class="input-group">
                        <input type="number" class="form-control" placeholder="jumlah tiket yang dipesan" name="tiket" required>
                        <span class="md-line"></span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      @if((($transport->capacity_transport)-($reservasi)) > 0)
                      <button onclick="return confirm('Anda yakin?')" class="btn btn-primary f-right" style="width: 150px;">Pesan</button>
                      @else
                      <div class="btn btn-danger f-right">Tidak ada kursi tersedia!</div>
                      @endif
                    </td>
                  </tr>
                </table>  
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- end of form -->
  </div>
  <!-- Authentication card end -->
</div>
<!-- end of col-sm-12 -->
@endsection