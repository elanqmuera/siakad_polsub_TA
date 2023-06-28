@extends('layouts.backend')

@section('content')
    <div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
							<aside class="sidebar sidebar-user">
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-body py-4">
										<div class="row">
											<div class="col-md-12 mr-auto text-left">
												<div class="custom-search input-group">
													<div class="custom-breadcrumb">
														<ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
															<li class="breadcrumb-item d-inline-block"><a href="{{url('/mahasiswa')}}" class="text-dark">Home</a></li>
															<li class="breadcrumb-item d-inline-block active">Bimbingan</li>
														</ol>
														<h4 class="text-dark">Bimbingan Detail</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</aside>
						</div>

						<div class="col-xl-9 col-lg-8  col-md-12">
							<div class="card shadow-sm ctm-border-radius">
								<div class="card-body align-center">
									<h4 class="card-title float-left mb-0 mt-2">Bimbingan Detail</h4>
									<ul class="nav nav-tabs float-right border-0 tab-list-emp">
										<li class="nav-item pl-3">
											<button class="btn btn-theme text-white ctm-border-radius button-1" data-toggle="modal" data-target="#add-perwalian">Add New</button>
										</li>
									</ul>
								</div>
							</div>
							<div class="ctm-border-radius shadow-sm card">
								<div class="card-body">

									<!--Content table-->
									<div style="text-align:center;font-size:19px;font-weight:bold;margin:30px 0 20px 0;">
										Daftar Bimbingan
									</div>
									<hr>

									<div class="table-back employee-office-table">
										<div class="table-responsive">
											<table id="data-table" class="table custom-table table-hover table-hover">
												<thead>
													<tr>
														<th>#</th>
														<th>Keluhan</th><th>Balasan</th>
													</tr>
												</thead>
												<tbody>
                          						@foreach($keluhan as $i => $item)
													<tr>
														<td>{{ $i+1 }}</td>
                            							<td>{{ $item->keluhan }}</td><td>{{ $item->balasan }}</td>

													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
									<!-- /Content Table -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/Content-->

			<div class="modal fade" id="add-perwalian" role="document">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<!-- Modal body -->
						<div class="modal-body style-add-modal">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title mb-3">Isi Keluhan</h4>
							@if ($errors->any())
							<div class="alert alert-danger alert-dismissible fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
										aria-hidden="true">×</span></button>
								@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</div>
							@endif

							{!! Form::open(['url' => '/mahasiswa/perwalian', 'method' => 'post', 'class' => '', 'enctype' => 'multipart/form-data']) !!}

							@include ('mahasiswa.perwalian.form', ['formMode' => 'create'])

							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
@endsection
