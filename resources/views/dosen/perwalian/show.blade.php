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
															<li class="breadcrumb-item d-inline-block"><a href="{{url('/dosen')}}" class="text-dark">Home</a></li>
															<li class="breadcrumb-item d-inline-block active">Jadwal</li>
														</ol>
														<h4 class="text-dark">Jadwal Detail</h4>
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
									<h4 class="card-title float-left mb-0 mt-2">Jadwal Detail</h4>
									<ul class="nav nav-tabs float-right border-0 tab-list-emp">
									</ul>
								</div>
							</div>
							<div class="ctm-border-radius shadow-sm card">
								<div class="card-body">

									<!--Content table-->
									<div style="text-align:center;font-size:19px;font-weight:bold;margin:30px 0 20px 0;">
										Daftar Mahasiswa
									</div>
									<hr>
									<div class="table-back employee-office-table">
										<div class="table-responsive">
											<table id="data-table" class="table custom-table table-hover table-hover">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama Mahasiswa</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody>
                          						@foreach($mahasiswa as $i => $item)
													<tr>
														<td>{{ $i+1 }}</td>
                            							<td>{{ $item->mahasiswa->name }}</td>
														<td class="text-left" align="center">
															<div class="table-action">
															<a href="/dosen/perwalian/{{ $idKelas }}/mahasiswa/{{ $item->id_mahasiswa }}" class="btn btn-sm btn-info text-white ctm-border-radius button-1">View</a>
														</div>
														</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div>

									<div style="text-align:center;font-size:19px;font-weight:bold;margin:30px 0 20px 0;">
										Daftar Keluhan
									</div>
									<hr>

									<div class="table-back employee-office-table">
										<div class="table-responsive">
											<table id="data-table" class="table custom-table table-hover table-hover">
												<thead>
													<tr>
														<th>No</th>
														<th>Mahasiswa</th><th>Keluhan</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody>
                          						@foreach($keluhan as $i => $item)
													<tr>
														<td>{{ $i+1 }}</td>
                            							<td>{{ $item->mahasiswa->name }}</td><td>{{ $item->keluhan }}</td>
														<td class="text-left" align="center">
															<div class="table-action">
															<button class="btn btn-theme text-white ctm-border-radius button-1" data-toggle="modal" data-target="#balas-{{$item->id}}">Balas</button>
														</div>
														</td>
													</tr>

													<div class="modal fade" id="balas-{{ $item->id }}" role="document">
														<div class="modal-dialog modal-dialog-centered">
															<div class="modal-content">
																<!-- Modal body -->
																<div class="modal-body style-add-modal">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	<h4 class="modal-title mb-3">Balas keluhan</h4>
																	@if ($errors->any())
																	<div class="alert alert-danger alert-dismissible fade in" role="alert">
																		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
																				aria-hidden="true">×</span></button>
																		@foreach ($errors->all() as $error)
																		<li>{{ $error }}</li>
																		@endforeach
																	</div>
																	@endif

																	{!! Form::open(['url' => ['/dosen/perwalian', $item->id], 'method' => 'put', 'class' => '', 'enctype' => 'multipart/form-data']) !!}

																	@include ('dosen.perwalian.form', ['formMode' => 'update'])

																	{!! Form::close() !!}
																</div>
															</div>
														</div>
													</div>
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
@endsection
