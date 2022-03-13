@extends('layouts.default')

@section('title', 'Dashboard')

@push('css')
	<link href="/assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
	<link href="/assets/plugins/nvd3/build/nv.d3.css" rel="stylesheet" />
	<link href="/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />

  <!-- ================== BEGIN BASE CSS STYLE ================== -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="../assets/css/default/app.min.css" rel="stylesheet" />
  <!-- ================== END BASE CSS STYLE ================== -->

  <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
  <link href="../assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
  <link href="../assets/plugins/datatables.net-fixedcolumns-bs4/css/fixedcolumns.bootstrap4.min.css" rel="stylesheet" />
  <!-- ================== END PAGE LEVEL STYLE ================== -->
  {{--  @yield('custom-styles')--}}
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin=""/>

  <style>
    #mapid {
      height: 600px;
    }
    .legend {
      line-height: 18px;
      color: #555;
    }
    .legend i {
      width: 18px;
      height: 18px;
      float: left;
      margin-right: 8px;
      opacity: 0.7;
    }
    .labelstyle {
      box-shadow:none;
      border:none;
      background-color:transparent;
    }
    .leaflet-tooltip-top:before,
    .leaflet-tooltip-bottom:before,
    .leaflet-tooltip-left:before,
    .leaflet-tooltip-right:before {
      border: none !important;
    }
  </style>
@endpush

@section('content')
	<!-- begin breadcrumb -->

	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header mb-3">Рабочий стол</h1>
	<!-- end page-header -->
	<!-- begin daterange-filter -->
	<div class="d-sm-flex align-items-center mb-3">
		<a href="#" class="btn btn-inverse mr-2 text-truncate" id="daterange-filter">
			<i class="fa fa-calendar fa-fw text-white-transparent-5 ml-n1"></i>
			<span>1 Jun 2020 - 7 Jun 2020</span>
			<b class="caret"></b>
		</a>
		<div class="text-muted f-w-600 mt-2 mt-sm-0">compared to <span id="daterange-prev-date">24 Mar-30 Apr 2020</span></div>
	</div>
	<!-- end daterange-filter -->
	<!-- begin row -->
	<div class="row">
		<!-- begin col-6 -->
		<div class="col-xl-6">
			<!-- begin card -->
			<div class="card border-0 bg-dark text-white mb-3 overflow-hidden">
				<!-- begin card-body -->
				<div class="card-body">
					<!-- begin row -->
					<div class="row">
						<!-- begin col-7 -->
						<div class="col-xl-7 col-lg-8">
							<!-- begin title -->
							<div class="mb-3 text-grey">
								<b>TOTAL SALES</b>
								<span class="ml-2">
									<i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Total sales" data-placement="top" data-content="Net sales (gross sales minus discounts and returns) plus taxes and shipping. Includes orders from all sales channels."></i>
								</span>
							</div>
							<!-- end title -->
							<!-- begin total-sales -->
							<div class="d-flex mb-1">
								<h2 class="mb-0">$<span data-animation="number" data-value="64559.25">0.00</span></h2>
								<div class="ml-auto mt-n1 mb-n1"><div id="total-sales-sparkline"></div></div>
							</div>
							<!-- end total-sales -->
							<!-- begin percentage -->
							<div class="mb-3 text-grey">
								<i class="fa fa-caret-up"></i> <span data-animation="number" data-value="33.21">0.00</span>% compare to last week
							</div>
							<!-- end percentage -->
							<hr class="bg-white-transparent-2" />
							<!-- begin row -->
							<div class="row text-truncate">
								<!-- begin col-6 -->
								<div class="col-6">
									<div class="f-s-12 text-grey">Total sales order</div>
									<div class="f-s-18 m-b-5 f-w-600 p-b-1" data-animation="number" data-value="1568">0</div>
									<div class="progress progress-xs rounded-lg bg-dark-darker m-b-5">
										<div class="progress-bar progress-bar-striped rounded-right bg-teal" data-animation="width" data-value="55%" style="width: 0%"></div>
									</div>
								</div>
								<!-- end col-6 -->
								<!-- begin col-6 -->
								<div class="col-6">
									<div class="f-s-12 text-grey">Avg. sales per order</div>
									<div class="f-s-18 m-b-5 f-w-600 p-b-1">$<span data-animation="number" data-value="41.20">0.00</span></div>
									<div class="progress progress-xs rounded-lg bg-dark-darker m-b-5">
										<div class="progress-bar progress-bar-striped rounded-right" data-animation="width" data-value="55%" style="width: 0%"></div>
									</div>
								</div>
								<!-- end col-6 -->
							</div>
							<!-- end row -->
						</div>
						<!-- end col-7 -->
						<!-- begin col-5 -->
						<div class="col-xl-5 col-lg-4 align-items-center d-flex justify-content-center">
							<img src="/assets/img/svg/img-1.svg" height="150px" class="d-none d-lg-block" />
						</div>
						<!-- end col-5 -->
					</div>
					<!-- end row -->
				</div>
				<!-- end card-body -->
			</div>
			<!-- end card -->
		</div>
		<!-- end col-6 -->
		<!-- begin col-6 -->
		<div class="col-xl-6">
			<!-- begin row -->
			<div class="row">
				<!-- begin col-6 -->
				<div class="col-sm-6">
					<!-- begin card -->
					<div class="card border-0 bg-dark text-white text-truncate mb-3">
						<!-- begin card-body -->
						<div class="card-body">
							<!-- begin title -->
							<div class="mb-3 text-grey">
								<b class="mb-3">CONVERSION RATE</b>
								<span class="ml-2"><i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Conversion Rate" data-placement="top" data-content="Percentage of sessions that resulted in orders from total number of sessions." data-original-title="" title=""></i></span>
							</div>
							<!-- end title -->
							<!-- begin conversion-rate -->
							<div class="d-flex align-items-center mb-1">
								<h2 class="text-white mb-0"><span data-animation="number" data-value="2.19">0.00</span>%</h2>
								<div class="ml-auto">
									<div id="conversion-rate-sparkline"></div>
								</div>
							</div>
							<!-- end conversion-rate -->
							<!-- begin percentage -->
							<div class="mb-4 text-grey">
								<i class="fa fa-caret-down"></i> <span data-animation="number" data-value="0.50">0.00</span>% compare to last week
							</div>
							<!-- end percentage -->
							<!-- begin info-row -->
							<div class="d-flex mb-2">
								<div class="d-flex align-items-center">
									<i class="fa fa-circle text-red f-s-8 mr-2"></i>
									Added to cart
								</div>
								<div class="d-flex align-items-center ml-auto">
									<div class="text-grey f-s-11"><i class="fa fa-caret-up"></i> <span data-animation="number" data-value="262">0</span>%</div>
									<div class="width-50 text-right pl-2 f-w-600"><span data-animation="number" data-value="3.79">0.00</span>%</div>
								</div>
							</div>
							<!-- end info-row -->
							<!-- begin info-row -->
							<div class="d-flex mb-2">
								<div class="d-flex align-items-center">
									<i class="fa fa-circle text-warning f-s-8 mr-2"></i>
									Reached checkout
								</div>
								<div class="d-flex align-items-center ml-auto">
									<div class="text-grey f-s-11"><i class="fa fa-caret-up"></i> <span data-animation="number" data-value="11">0</span>%</div>
									<div class="width-50 text-right pl-2 f-w-600"><span data-animation="number" data-value="3.85">0.00</span>%</div>
								</div>
							</div>
							<!-- end info-row -->
							<!-- begin info-row -->
							<div class="d-flex">
								<div class="d-flex align-items-center">
									<i class="fa fa-circle text-lime f-s-8 mr-2"></i>
									Sessions converted
								</div>
								<div class="d-flex align-items-center ml-auto">
									<div class="text-grey f-s-11"><i class="fa fa-caret-up"></i> <span data-animation="number" data-value="57">0</span>%</div>
									<div class="width-50 text-right pl-2 f-w-600"><span data-animation="number" data-value="2.19">0.00</span>%</div>
								</div>
							</div>
							<!-- end info-row -->
						</div>
						<!-- end card-body -->
					</div>
					<!-- end card -->
				</div>
				<!-- end col-6 -->
				<!-- begin col-6 -->
				<div class="col-sm-6">
					<!-- begin card -->
					<div class="card border-0 bg-dark text-white text-truncate mb-3">
						<!-- begin card-body -->
						<div class="card-body">
							<!-- begin title -->
							<div class="mb-3 text-grey">
								<b class="mb-3">STORE SESSIONS</b>
								<span class="ml-2"><i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Store Sessions" data-placement="top" data-content="Number of sessions on your online store. A session is a period of continuous activity from a visitor." data-original-title="" title=""></i></span>
							</div>
							<!-- end title -->
							<!-- begin store-session -->
							<div class="d-flex align-items-center mb-1">
								<h2 class="text-white mb-0"><span data-animation="number" data-value="70719">0</span></h2>
								<div class="ml-auto">
									<div id="store-session-sparkline"></div>
								</div>
							</div>
							<!-- end store-session -->
							<!-- begin percentage -->
							<div class="mb-4 text-grey">
								<i class="fa fa-caret-up"></i> <span data-animation="number" data-value="9.5">0.00</span>% compare to last week
							</div>
							<!-- end percentage -->
							<!-- begin info-row -->
							<div class="d-flex mb-2">
								<div class="d-flex align-items-center">
									<i class="fa fa-circle text-teal f-s-8 mr-2"></i>
									Mobile
								</div>
								<div class="d-flex align-items-center ml-auto">
									<div class="text-grey f-s-11"><i class="fa fa-caret-up"></i> <span data-animation="number" data-value="25.7">0.00</span>%</div>
									<div class="width-50 text-right pl-2 f-w-600"><span data-animation="number" data-value="53210">0</span></div>
								</div>
							</div>
							<!-- end info-row -->
							<!-- begin info-row -->
							<div class="d-flex mb-2">
								<div class="d-flex align-items-center">
									<i class="fa fa-circle text-blue f-s-8 mr-2"></i>
									Desktop
								</div>
								<div class="d-flex align-items-center ml-auto">
									<div class="text-grey f-s-11"><i class="fa fa-caret-up"></i> <span data-animation="number" data-value="16.0">0.00</span>%</div>
									<div class="width-50 text-right pl-2 f-w-600"><span data-animation="number" data-value="11959">0</span></div>
								</div>
							</div>
							<!-- end info-row -->
							<!-- begin info-row -->
							<div class="d-flex">
								<div class="d-flex align-items-center">
									<i class="fa fa-circle text-aqua f-s-8 mr-2"></i>
									Tablet
								</div>
								<div class="d-flex align-items-center ml-auto">
									<div class="text-grey f-s-11"><i class="fa fa-caret-up"></i> <span data-animation="number" data-value="7.9">0.00</span>%</div>
									<div class="width-50 text-right pl-2 f-w-600"><span data-animation="number" data-value="5545">0</span></div>
								</div>
							</div>
							<!-- end info-row -->
						</div>
						<!-- end card-body -->
					</div>
					<!-- end card -->
				</div>
				<!-- end col-6 -->
			</div>
			<!-- end row -->
		</div>
		<!-- end col-6 -->
	</div>
	<!-- end row -->
@endsection


@push('scripts')
	<script src="/assets/plugins/d3/d3.min.js"></script>
	<script src="/assets/plugins/nvd3/build/nv.d3.js"></script>
	<script src="/assets/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
	<script src="/assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js"></script>
	<script src="/assets/plugins/apexcharts/dist/apexcharts.min.js"></script>
	<script src="/assets/plugins/moment/moment.js"></script>
	<script src="/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script src="/assets/js/demo/dashboard-v3.js"></script>
@endpush
