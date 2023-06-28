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
															<li class="breadcrumb-item d-inline-block active">Nilai</li>
														</ol>
														<h4 class="text-dark">Nilai Detail</h4>
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
									<h4 class="card-title float-left mb-0 mt-2">Nilai Detail</h4>
									<ul class="nav nav-tabs float-right border-0 tab-list-emp">
									</ul>
								</div>
							</div>
							<div class="ctm-border-radius shadow-sm card">
								<div class="card-body">

									<!--Content table-->
									<div class="table-back employee-office-table">
										<div class="table-responsive">
											<table class="table custom-table table-hover table-hover">
                                                <tbody>
                                                    <tr><th> Nama Kelas </th><td> {{ $mataKuliah->kelas->nama_kelas }} </td></tr>
													<tr><th> Nama Mata Kuliah </th><td> {{ $mataKuliah->mataKuliah->nama_mata_kuliah }} </td></tr>
                                                    <tr>
                                                        <td colspan="10" align="center">
                                                            <a href="{{ url('/dosen/nilai') }}"><button class="btn btn-sm btn-warning"><span class="lnr lnr-arrow-left">Back</span></button></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
											</table>
										</div>
									</div>

									<div class="table-back employee-office-table">
										<ul class="nav nav-tabs float-right border-0 tab-list-emp">
											<li class="nav-item pl-3" style="margin-bottom:10px">
												<button class="btn btn-theme text-white ctm-border-radius button-1" data-toggle="modal" data-target="#add-nilai">Nilai Baru</button>
											</li>
										</ul>
										<div class="table-responsive">
											<table id="data-table" class="table custom-table table-hover table-hover">
												<thead>
													<tr>
														<th>#</th>
														<th>Kategori Tugas</th>
														<th>Kelas</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody>
                          						@foreach($daftarNilai as $i => $item)
													<tr>
														<td>{{ $i+1 }}</td>
														<td>{{ $item->kategori_tugas }}</td>
                            							<td>{{ $item->kelas->nama_kelas }}</td>
														<td class="text-left" align="center">
															<div class="table-action">
															<a href="{{ url('/dosen/detail-nilai/' . $item->id) }}" title="View Jadwal"><button class="btn btn-sm btn-info"><span class="lnr lnr-eye"></span>View</button></a>
														</div>
														</td>
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

			<div class="modal fade" id="add-nilai" role="document">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<!-- Modal body -->
						<div class="modal-body style-add-modal">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title mb-3">Tambahkan nilai</h4>
							@if ($errors->any())
							<div class="alert alert-danger alert-dismissible fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
										aria-hidden="true">x</span></button>
								@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</div>
							@endif

							{!! Form::open(['method' => 'POST','url' => ['dosen/daftar-nilai', $mataKuliah->id], 'class' => '', 'enctype' => 'multipart/form-data']) !!}

							@include ('dosen.nilai.daftar-nilai-form', ['formMode' => 'create'])

							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
@endsection
