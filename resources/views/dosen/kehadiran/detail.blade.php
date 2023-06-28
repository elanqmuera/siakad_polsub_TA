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
														<h4 class="text-dark">Jadwal</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card">
									<div class="card-body">
										<ul class="list-group">
											<li class="list-group-item text-center active button-5"><a href="{{ url('/dosen/jadwal') }}" class="text-white">All</a></li>
										</ul>
									</div>
								</div>
							</aside>
						</div>

						<form class="col-xl-9 col-lg-8  col-md-12" method="post" action="/dosen/kehadiran-detail/{{ $kehadiranDetail[0]->id_kehadiran }}" style="width:100%">
                            @csrf
                            <div class="">
                                <div class="card shadow-sm ctm-border-radius">
                                    <div class="card-body align-center">
                                        <h4 class="card-title float-left mb-0 mt-2">List Mahasiswa</h4>
                                    </div>
                                </div>
                                <div class="ctm-border-radius shadow-sm card">
                                    <div class="card-body">
                                        <!--Content table-->
                                        <div class="table-back employee-office-table">
                                            <div class="table-responsive">
                                                <table id="" class="table custom-table table-hover table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Mahasiswa</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($kehadiranDetail as $i => $item)
                                                        <tr>
                                                            <td>{{ $i+1 }}</td>
                                                            <td>
                                                                {{ $item->mahasiswa->name }}
                                                            </td>
                                                            <td class="text-left" align="center">
                                                                <div class="table-action">
                                                                    <select class="form-control" name="status[{{ $i }}]">
                                                                        <option {{ $item->status == 'Hadir' ? 'selected' : ''  }} value="Hadir">Hadir</option>
                                                                        <option {{ $item->status == 'Tidak Hadir' ? 'selected' : ''  }} value="Tidak Hadir">Tidak Hadir</option>
                                                                        <option {{ $item->status == 'Sakit' ? 'selected' : ''  }} value="Sakit">Sakit</option>
                                                                        <option {{ $item->status == 'Izin' ? 'selected' : ''  }} value="Izin">Izin</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <!-- /Content Table -->
                                    </div>

                                </div>
                            </div>
                        </form>
					</div>
				</div>
			</div>
			<!--/Content-->
@endsection
