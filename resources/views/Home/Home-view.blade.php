<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<!-- META DATA -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other headcontent must come *after* these tags -->
	<!--font-family-->
	<link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
	<!-- TITLE OF SITE -->
	<title>My Ticket</title>
	<!-- favicon img -->
	<link rel="shortcut icon" type="image/icon" href="{{asset('assets-web/logo/favicon.png')}}"/>
	<!--font-awesome.min.css-->
	<link rel="stylesheet" href="{{asset('assets-web/css/font-awesome.min.css')}}" />
	<!--animate.css-->
	<link rel="stylesheet" href="{{asset('assets-web/css/animate.css')}}" />
	<!--hover.css-->
	<link rel="stylesheet" href="{{asset('assets-web/css/hover-min.css')}}">
	<!--datepicker.css-->
	<link rel="stylesheet"  href="{{asset('assets-web/css/datepicker.css')}}" >
	<!--owl.carousel.css-->
	<link rel="stylesheet" href="{{asset('assets-web/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets-web/css/owl.theme.default.min.css')}}"/>
	<!-- range css-->
	<link rel="stylesheet" href="{{asset('assets-web/css/jquery-ui.min.css')}}" />
	<!--bootstrap.min.css-->
	<link rel="stylesheet" href="{{asset('assets-web/css/bootstrap.min.css')}}" />
	<!-- bootsnav -->
	<link rel="stylesheet" href="{{asset('assets-web/css/bootsnav.css')}}"/>
	<!--style.css-->
	<link rel="stylesheet" href="{{asset('assets-web/css/style.css')}}" />
	<!--responsive.css-->
	<link rel="stylesheet" href="{{asset('assets-web/css/responsive.css')}}" />
	<!-- select2 -->
	<link rel="stylesheet" href="{{asset('plugins/select2/select2.css')}}">
	<!-- daterange picker -->
	<link rel="stylesheet" href="{{asset('plugins/bootstrap-daterangepicker/daterangepicker.css')}}">

</head>

<body>


	<!-- main-menu Start -->
	<header class="top-area">
		<div class="header-area">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="logo">
							<a href="index.html">
								My<span>Ticket</span>
							</a>
						</div><!-- /.logo-->
					</div><!-- /.col-->
					<div class="col-sm-10">
						<div class="main-menu">

							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
									<i class="fa fa-bars"></i>
								</button><!-- / button-->
							</div><!-- /.navbar-header-->
							<div class="collapse navbar-collapse">		  
								<ul class="nav navbar-nav navbar-right">
									<li class="smooth-menu"><a href="#home">home</a></li>
									<li class="smooth-menu"><a href="#gallery">Destinasi</a></li>
									<li class="smooth-menu"><a href="#pack">Paket</a></li>
									@if(Session::has("login_customer"))
									<li><a href="#">Hello, {{ Session::get("login_customer.username") }}</a></li>
									<li><a href="{{ route('customer-register') }}">Keluar</a></li>
									@else
									<li><a href="{{ route('customer-login') }}">Masuk</a></li>
									<li><a href="{{ route('customer-register') }}">Daftar</a></li>
									@endif
								</ul>
							</div><!-- /.navbar-collapse -->
						</div><!-- /.main-menu-->
					</div><!-- /.col-->
				</div><!-- /.row -->
				<div class="home-border"></div><!-- /.home-border-->
			</div><!-- /.container-->
		</div><!-- /.header-area -->

	</header><!-- /.top-area-->
	<!-- main-menu End -->

	<!--about-us start -->
	<section id="home" class="about-us" style="background-image: url('{{asset('assets-web/images/home/banner.jpg')}}');">
		<div class="container">
			<div class="about-us-content">
				<div class="row">
					<div class="col-sm-12">
						<div class="single-about-us">
							<div class="about-us-txt">
								<h2>
									Jelajahi Keindahan Dunia yang Indah 
								</h2>
								<div class="about-btn">
									<button  class="about-view" style="cursor: not-allowed;">
										Jelajahi Sekarang
									</button>
								</div><!--/.about-btn-->
							</div><!--/.about-us-txt-->
						</div><!--/.single-about-us-->
					</div><!--/.col-->
					<div class="col-sm-0">
						<div class="single-about-us">

						</div><!--/.single-about-us-->
					</div><!--/.col-->
				</div><!--/.row-->
			</div><!--/.about-us-content-->
		</div><!--/.container-->

	</section><!--/.about-us-->
	<!--about-us end -->

	<!--travel-box start-->
	<section  class="travel-box">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="single-travel-boxes">
						<div id="desc-tabs" class="desc-tabs">

							<ul class="nav nav-tabs" role="tablist">

								<li role="presentation" class="active">
									<a href="#kr" aria-controls="kr" role="tab" data-toggle="tab">
										<i class="fa fa-train"></i>
										Perapian
									</a>
								</li>

								<li role="presentation">
									<a href="#pt" aria-controls="pt" role="tab" data-toggle="tab">
										<i class="fa fa-plane"></i>
										Penerbangan
									</a>
								</li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">

								<div role="tabpanel" class="tab-pane fade in active" id="kr">
									<div class="tab-para">
										<div class="row">
											<form class="col-12">
												<div class="row">
													<!-- <div class="col-md-4">
														<label>Rute Awal</label>
														<select class="form-control select2">

															<option value="default">Pilih rute awal</option>

														</select>
													</div>
													<div class="col-md-4">
														<label>Rute Akhir</label>
														<select class="form-control select2">

															<option value="default">pilih rute akhir</option>

														</select>
													</div> -->
													<div class="col-xs-12">
														<label>Tanggal Keberangkatan &amp; kedatangan</label>
														<div class="input-group mb-2 mr-sm-2">
															<div class="input-group-prepend">
																<div class="input-group-text"><i class="icofont icofont-calendar"></i></div>
															</div>
															<input type="text" class="form-control daterange" value="{{ old('date') }}" style="z-index: 1;" name="date">
														</div>
													</div>
													<div class="col-xs-12" style="margin-top: 10px;">
														<button  class="about-view travel-btn pull-right">
															Cari	
														</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div><!--/.tabpannel-->

								<div role="tabpanel" class="tab-pane fade in" id="pt">
									<div class="tab-para">
										<div class="row">
											<form class="col-12">
												<div class="row">
													<!-- <div class="col-md-4">
														<label>Rute Awal</label>
														<select class="form-control select2">

															<option value="default">Pilih rute awal</option>

														</select>
													</div>
													<div class="col-md-4">
														<label>Rute Akhir</label>
														<select class="form-control select2">

															<option value="default">pilih rute akhir</option>

														</select>
													</div> -->
													<div class="col-xs-12">
														<label>Tanggal Keberangkatan &amp; kedatangan</label>
														<div class="input-group mb-2 mr-sm-2">
															<div class="input-group-prepend">
																<div class="input-group-text"><i class="icofont icofont-calendar"></i></div>
															</div>
															<input type="text" class="form-control daterange" value="{{ old('date') }}" style="z-index: 1;" name="date">
														</div>
													</div>
													<div class="col-xs-12" style="margin-top: 10px;">
														<button  class="about-view travel-btn pull-right">
															Cari	
														</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div><!--/.tabpannel-->

							</div><!--/.tab content-->
						</div><!--/.desc-tabs-->
					</div><!--/.single-travel-box-->
				</div><!--/.col-->
			</div><!--/.row-->
		</div><!--/.container-->

	</section><!--/.travel-box-->
	<!--travel-box end-->

	<!--service start-->
	<section id="service" class="service">
		<div class="container">

			<div class="service-counter text-center">

				<div class="col-md-4 col-sm-4">
					<div class="single-service-box">
						<div class="service-img">
							<img src="{{asset('assets-web/images/service/s1.png')}}" alt="service-icon" />
						</div><!--/.service-img-->
						<div class="service-content">
							<h2>
								<a href="#">
									Choose amazing tour packages
								</a>
							</h2>
							<p>Must use our tour Planner for breathtaking tour packages!</p>
						</div><!--/.service-content-->
					</div><!--/.single-service-box-->
				</div><!--/.col-->

				<div class="col-md-4 col-sm-4">
					<div class="single-service-box">
						<div class="service-img">
							<img src="{{asset('assets-web/images/service/s2.png')}}" alt="service-icon" />
						</div><!--/.service-img-->
						<div class="service-content">
							<h2>
								<a href="#">
									book top class hotel
								</a>
							</h2>
							<p>This amazing site helps you book the best hotels all around the world!</p>
						</div><!--/.service-content-->
					</div><!--/.single-service-box-->
				</div><!--/.col-->

				<div class="col-md-4 col-sm-4">
					<div class="single-service-box">
						<div class="statistics-img">
							<img src="{{asset('assets-web/images/service/s3.png')}}" alt="service-icon" />
						</div><!--/.service-img-->
						<div class="service-content">

							<h2>
								<a href="#">
									online flight booking
								</a>
							</h2>
							<p>Book your flight instantly using TourNest!</p>
						</div><!--/.service-content-->
					</div><!--/.single-service-box-->
				</div><!--/.col-->

			</div><!--/.statistics-counter-->	
		</div><!--/.container-->

	</section><!--/.service-->
	<!--service end-->

	<!--galley start-->
	<section id="gallery" class="gallery">
		<div class="container">
			<div class="gallery-details">
				<div class="gallary-header text-center">
					<h2>
						top destination
					</h2>
					<p>
						Where do you wanna go? How much you wanna explore?  
					</p>
				</div><!--/.gallery-header-->
				<div class="gallery-box">
					<div class="gallery-content">
						<div class="filtr-container">
							<div class="row">

								<div class="col-md-6">
									<div class="filtr-item">
										<img src="{{asset('assets-web/images/gallary/g1.jpg')}}" alt="portfolio image"/>
										<div class="item-title">
											<a href="#">
												china
											</a>
											<p><span>20 tours</span><span>15 places</span></p>
										</div><!-- /.item-title -->
									</div><!-- /.filtr-item -->
								</div><!-- /.col -->

								<div class="col-md-6">
									<div class="filtr-item">
										<img src="{{asset('assets-web/images/gallary/g2.jpg')}}" alt="portfolio image"/>
										<div class="item-title">
											<a href="#">
												venuzuala
											</a>
											<p><span>12 tours</span><span>9 places</span></p>
										</div> <!-- /.item-title-->
									</div><!-- /.filtr-item -->
								</div><!-- /.col -->

								<div class="col-md-4">
									<div class="filtr-item">
										<img src="{{asset('assets-web/images/gallary/g3.jpg')}}" alt="portfolio image"/>
										<div class="item-title">
											<a href="#">
												brazil
											</a>
											<p><span>25 tours</span><span>10 places</span></p>
										</div><!-- /.item-title -->
									</div><!-- /.filtr-item -->
								</div><!-- /.col -->

								<div class="col-md-4">
									<div class="filtr-item">
										<img src="{{asset('assets-web/images/gallary/g4.jpg')}}" alt="portfolio image"/>
										<div class="item-title">
											<a href="#">
												australia 
											</a>
											<p><span>18 tours</span><span>9 places</span></p>
										</div> <!-- /.item-title-->
									</div><!-- /.filtr-item -->
								</div><!-- /.col -->

								<div class="col-md-4">
									<div class="filtr-item">
										<img src="{{asset('assets-web/images/gallary/g5.jpg')}}" alt="portfolio image"/>
										<div class="item-title">
											<a href="#">
												netharlands
											</a>
											<p><span>14 tours</span><span>12 places</span></p>
										</div> <!-- /.item-title-->
									</div><!-- /.filtr-item -->
								</div><!-- /.col -->

								<div class="col-md-8">
									<div class="filtr-item">
										<img src="{{asset('assets-web/images/gallary/g6.jpg')}}" alt="portfolio image"/>
										<div class="item-title">
											<a href="#">
												turkey
											</a>
											<p><span>14 tours</span><span>6 places</span></p>
										</div> <!-- /.item-title-->
									</div><!-- /.filtr-item -->
								</div><!-- /.col -->

							</div><!-- /.row -->

						</div><!-- /.filtr-container-->
					</div><!-- /.gallery-content -->
				</div><!--/.galley-box-->
			</div><!--/.gallery-details-->
		</div><!--/.container-->

	</section><!--/.gallery-->
	<!--gallery end-->

	<!--packages start-->
	<section id="pack" class="packages">
		<div class="container">
			<div class="gallary-header text-center">
				<h2>
					paket khusus
				</h2>
				<p>
					Duis aute irure dolor in  velit esse cillum dolore eu fugiat nulla.  
				</p>
			</div><!--/.gallery-header-->
			<div class="packages-content">
				<div class="row">

					@if($schedule->count() == 0)
					<div class="col-xs-12">
						<div class="alert alert-danger text-center">
							<h4>Tidak ada jadwal</h4>
						</div>
					</div>
					@endif
					@foreach($schedule as $num_row => $key)
					@php
					$get_transport = $M_transport::find($key->transport_id);
					$get_route = $M_route::find($key->route_id);

					$interval = date_diff(new DateTime(date("Y-m-d h:i:s",strtotime($key->departure_date." ".$key->departure_time))),new DateTime(date("Y-m-d h:i:s",strtotime($key->arrival_date." ".$key->arrival_time))));
					$get_days = $interval->d;
					$get_hours = $interval->h;
					$get_minutes = $interval->i;
					@endphp
					<div class="col-md-4 col-sm-6">
						<div class="single-package-item">
							<div class="single-package-item-txt">
								<h3>{{ $get_transport->type_transport }}</h3>
							</div>
							<div class="single-package-item-txt">
								<h3>{{ $get_transport->name_transport }} <span class="pull-right">{{ "Rp. ".number_format(($get_transport->class->price_ticket+$get_route->price_route),0).",-" }}</span></h3>
								<div class="packages-para">
									<p>
										<i class="fa fa-angle-right"></i>
										Perkiraan tiba :
										<br>
										{{ $get_days }} hari {{ $get_hours }} jam {{ $get_minutes }} menit
									</p>
									<p>
										<i class="fa fa-angle-right"></i>
										Rute :
										<br>
										{{ $get_route->initialRoute->name_region." - ".$get_route->finalRoute->name_region }}
									</p>
									<p>
										<i class="fa fa-angle-right"></i>  Keberangkatan :
										<br> 
										{{ $key->departure_time." ".date("l, d F Y", strtotime($key->departure_date)) }}
									</p>
									<p>
										<i class="fa fa-angle-right"></i> Kedatangan :
										<br>
										{{ $key->arrival_time." ".date("l, d F Y", strtotime($key->arrival_date)) }}
									</p>
								</div><!--/.packages-para-->
								<div class="about-btn">
									@if(Session::has("login_customer"))
									<a href="{{ route('customer-reservasi',[$key->id_schedule]) }}" class="about-view packages-btn" style="width: 150px;cursor: pointer;">
										Pesan sekarang
									</a>
									@else
									<a href="{{ route('customer-login') }}"  class="about-view packages-btn" style="width: 150px;">
										Sign In first!
									</a>
									@endif
								</div><!--/.about-btn-->
							</div><!--/.single-package-item-txt-->
						</div><!--/.single-package-item-->
					</div>
					@endforeach
				</div><!--/.row-->
			</div><!--/.packages-content-->
		</div><!--/.container-->

	</section><!--/.packages-->
	<!--packages end-->



	<!-- footer-copyright start -->
	<footer  class="footer-copyright">
		<div class="container">
			<div class="footer-content">
				<div class="row">

					<div class="col-sm-3">
						<div class="single-footer-item">
							<div class="footer-logo">
								<a href="index.html">
									My<span>Ticket</span>
								</a>
								<p>
									agen tiket terbaik
								</p>
							</div>
						</div><!--/.single-footer-item-->
					</div><!--/.col-->

					<div class="col-sm-3">
						<div class="single-footer-item">
							<h2>link</h2>
							<div class="single-footer-txt">
								<p><a href="#">home</a></p>
								<p><a href="#">destination</a></p>
								<p><a href="#">spacial packages</a></p>
								<p><a href="#">special offers</a></p>
								<p><a href="#">blog</a></p>
								<p><a href="#">contacts</a></p>
							</div><!--/.single-footer-txt-->
						</div><!--/.single-footer-item-->

					</div><!--/.col-->

					<div class="col-sm-3">
						<div class="single-footer-item">
							<h2>popular destination</h2>
							<div class="single-footer-txt">
								<p><a href="#">china</a></p>
								<p><a href="#">venezuela</a></p>
								<p><a href="#">brazil</a></p>
								<p><a href="#">australia</a></p>
								<p><a href="#">london</a></p>
							</div><!--/.single-footer-txt-->
						</div><!--/.single-footer-item-->
					</div><!--/.col-->

					<div class="col-sm-3">
						<div class="single-footer-item text-center">
							<h2 class="text-left">contacts</h2>
							<div class="single-footer-txt text-left">
								<p>+1 (300) 1234 6543</p>
								<p class="foot-email"><a href="#">info@tnest.com</a></p>
								<p>North Warnner Park 336/A</p>
								<p>Newyork, USA</p>
							</div><!--/.single-footer-txt-->
						</div><!--/.single-footer-item-->
					</div><!--/.col-->

				</div><!--/.row-->

			</div><!--/.footer-content-->
			<hr>
			<div class="foot-icons ">
				<ul class="footer-social-links list-inline list-unstyled">
					<li><a href="#" target="_blank" class="foot-icon-bg-1"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#" target="_blank" class="foot-icon-bg-2"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#" target="_blank" class="foot-icon-bg-3"><i class="fa fa-instagram"></i></a></li>
				</ul>
				<p>&copy; 2017 <a href="https://www.themesine.com">ThemeSINE</a>. All Right Reserved</p>

			</div><!--/.foot-icons-->
			<div id="scroll-Top">
				<i class="fa fa-angle-double-up return-to-top" id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
			</div><!--/.scroll-Top-->
		</div><!-- /.container-->

	</footer><!-- /.footer-copyright-->
	<!-- footer-copyright end -->

	<div class="modal fade" id="exampleModal" tabindex="-1" style="z-index: 999999;" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					...
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>

	<script src="{{asset('assets-web/js/jquery.js')}}"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->

	<!--modernizr.min.js-->
	<script  src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>


	<!--bootstrap.min.js-->
	<script  src="{{asset('assets-web/js/bootstrap.min.js')}}"></script>

	<!-- bootsnav js -->
	<script src="{{asset('assets-web/js/bootsnav.js')}}"></script>

	<!-- jquery.filterizr.min.js -->
	<script src="{{asset('assets-web/js/jquery.filterizr.min.js')}}"></script>

	<script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

	<!--jquery-ui.min.js-->
	<script src="{{asset('assets-web/js/jquery-ui.min.js')}}"></script>

	<!-- counter js -->
	<script src="{{asset('assets-web/js/jquery.counterup.min.js')}}"></script>
	<script src="{{asset('assets-web/js/waypoints.min.js')}}"></script>

	<!--owl.carousel.js-->
	<script  src="{{asset('assets-web/js/owl.carousel.min.js')}}"></script>

	<!-- jquery.sticky.js -->
	<script src="{{asset('assets-web/js/jquery.sticky.js')}}"></script>

	<!--datepicker.js-->
	<script  src="{{asset('assets-web/js/datepicker.js')}}"></script>

	<!--Custom JS-->
	<script src="{{asset('assets-web/js/custom.js')}}"></script>
	<!-- Select2 -->
	<script src="{{asset('plugins/select2/select2.full.min.js')}}"></script>
	<!-- date-range-picker -->
	<script src="{{asset('plugins/moment/min/moment.min.js')}}"></script>
	<script src="{{asset('plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

	<script>
		$(document).ready(function() {
			$(".select2").select2();
			$(".daterange").daterangepicker();
		});
	</script>

</body>

</html>
