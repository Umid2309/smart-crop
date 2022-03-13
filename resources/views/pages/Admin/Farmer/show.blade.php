@extends('layouts.default')

@section('title', 'Фермеры')

@push('css')
	<link href="/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css" rel="stylesheet" />
@endpush

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Рабочий стол</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.farmer.index') }}">Фермеры</a></li>
    <li class="breadcrumb-item active">{{ $response->name }}</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">{{ $response->name }}</h1>
	<!-- end page-header -->
  <div class="row">
    <div class="col-xl-12">
      <h5>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"> Название: {{ $response->name }} </li>
          <li class="breadcrumb-item"> Площадь посева: {{ $response->crop_area }} </li>
          <li class="breadcrumb-item">Область: {{ $response->region->name }} </li>
          <li class="breadcrumb-item">Район: {{ $response->district->name }} </li>
        </ol>
      </h5>
    </div>
  </div>
	<!-- begin row -->
	<div class="row">
		<!-- begin col-12 -->
		<div class="col-xl-12">
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<!-- begin panel-heading -->
				<div class="panel-heading">
					<h4 class="panel-title">Контуры фермера</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					</div>
				</div>
				<!-- end panel-heading -->
				<!-- begin panel-body -->
				<div class="panel-body">
					<table id="data-table-scroller" class="table table-striped table-bordered  table-td-valign-middle" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>№</th>
								<th>Номер контура</th>
                <th>Площадь посева</th>
{{--                <th>Действия</th>--}}
							</tr>
						</thead>
            <tbody>
              @foreach($response->contours as $item)
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $item->contour_number }}</td>
                  <td>{{ $item->crop_area }}</td>
{{--                  <td class="text-center">--}}
{{--                    <a href="#" class="btn btn-icon btn-primary mr-1"><i class="fas fa-edit "></i></a>--}}
{{--                    <a--}}
{{--                      class="btn btn-icon btn-danger delete_button"--}}
{{--                      data-toggle="modal"--}}
{{--                      data-target="#deleteModal"--}}
{{--                    >--}}
{{--                      <i class="fas fa-trash  text-white"></i>--}}
{{--                    </a>--}}
{{--                  </td>--}}
                </tr>
              @endforeach
            </tbody>
					</table>
				</div>
				<!-- end panel-body -->
			</div>
			<!-- end panel -->
		</div>
		<!-- end col-10 -->
	</div>
  <a href="{{route('admin.farmer.index')}}" class="btn btn-danger float-right">
    <i class="fas fa-arrow-circle-left"></i>
    Назад
  </a>
	<!-- end row -->
@endsection

@push('scripts')
	<script src="/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
	<script src="/assets/plugins/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
	<script src="/assets/plugins/datatables.net-scroller-bs4/js/scroller.bootstrap4.min.js"></script>
	<script>
		if ($('#data-table-scroller').length !== 0) {
			$('#data-table-scroller').DataTable({
				// ajax:           "/assets/js/demo/json/scroller_demo.json",
				deferRender:    true,
				scrollY:        300,
				scrollCollapse: true,
				scroller:       true,
				responsive: true
			});
		}
	</script>
@endpush
