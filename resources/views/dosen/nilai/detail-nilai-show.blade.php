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
                                                    <tr><th> Nama Kelas </th><td> {{ $daftarNilai->kelas->nama_kelas }} </td></tr>
													<tr><th> Nama Mata Kuliah </th><td> {{ $daftarNilai->mataKuliah->mataKuliah->nama_mata_kuliah }} </td></tr>
													<tr><th> Kategori </th><td> {{ $daftarNilai->kategori_tugas }} </td></tr>
                                                    <tr>
                                                        <td colspan="10" align="center">
                                                            <a href="{{ url('/dosen/nilai') }}"><button class="btn btn-sm btn-warning"><span class="lnr lnr-arrow-left">Back</span></button></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
											</table>
										</div>
									</div>

									<form action="/dosen/detail-nilai/{{$daftarNilai->id}}" method="post" class="table-back employee-office-table">
										@csrf
										<div class="table-responsive">
											<table class="table custom-table table-hover table-hover">
												<thead>
													<tr>
														<th>#</th>
														<th>Mahasiswa</th>
														<th>Nilai</th>
													</tr>
												</thead>
												<tbody>
                          						@foreach($mahasiswa as $i => $item)
													<tr>
														<td>{{ $i+1 }}</td>
                            							<td>{{ $item->mahasiswa->name }}</td>
														<td class="text-left" align="center">
															<div class="table-action">
																<input name="nilai[]" value='{{$item->nilai}}' />
															</div>
														</td>
													</tr>
													@endforeach
												</tbody>
											</table>
											<button type="submit" class="btn btn-primary" >Kirim</button>
										</div>
									</form>
									<!-- /Content Table -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/Content-->
@endsection
