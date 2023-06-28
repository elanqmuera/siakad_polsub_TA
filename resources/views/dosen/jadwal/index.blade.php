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

						<div class="col-xl-9 col-lg-8  col-md-12">
							<div class="card shadow-sm ctm-border-radius">
								<div class="card-body align-center">
									<h4 class="card-title float-left mb-0 mt-2">List Jadwal</h4>
								</div>
							</div>
							<div class="ctm-border-radius shadow-sm card">
								<div class="card-body">
									<!--Content table-->
									<div class="table-back employee-office-table">
										<div class="table-responsive">
											<table id="data-table" class="table custom-table table-hover table-hover">
												<thead>
													<tr>
														<th>No</th>
														<th>Mata Kuliah</th><th>Kode</th><th>Hari</th><th>Jam Mulai</th><th>Jam Selesai</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody>
                          						@foreach($jadwal as $i => $item)
													<tr>
														<td>{{ $i+1 }}</td>
                            							<td>{{ $item->mataKuliahEnroll->mataKuliah->nama_mata_kuliah }}</td><td>{{ $item->mataKuliahEnroll->mataKuliah->kode_mata_kuliah }}</td><td>{{ $item->hari }}</td><td>{{ $item->jam_mulai }}</td><td>{{ $item->jam_selesai }}</td>
														<td class="text-left" align="center">
															<div class="table-action">
															<a href="{{ url('/admin/jadwal/' . $item->id) }}" title="View Jadwal"><button class="btn btn-sm btn-info"><span class="lnr lnr-eye"></span>View</button></a>
															<a href="{{ url('/admin/jadwal/' . $item->id . '/edit') }}" title="Edit Jadwal"><button class="btn btn-sm btn-primary"><span class="lnr lnr-eye"></span>Edit</button></a>
															<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteConfirm{{$item->id}}"><span class="lnr lnr-trash">Delete</span></button>
															<div class="modal fade" id="deleteConfirm{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																<div class="modal-dialog modal-sm">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
																		</div>
																		<div class="modal-body">
																			Are you sure want to delete  this record?
																		</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																			{!! Form::open([
																			'method' => 'DELETE',
																			'url' => ['/admin/jadwal', $item->id],
																			'style' => 'display:inline'
																			]) !!}
																			{!! Form::button('Delete', array(
																					'type' => 'submit',
																					'class' => 'btn btn-danger btn-sm',
																					'title' => 'Confirm Delete'
																			)) !!}
																			{!! Form::close() !!}
																		</div>
																	</div>
																</div>
															</div>
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
        <div class="modal fade" id="add-Jadwal" role="document">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal body -->
                    <div class="modal-body style-add-modal">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title mb-3">Add New Jadwal</h4>
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </div>
                        @endif

                        {!! Form::open(['url' => '/admin/jadwal', 'class' => '', 'enctype' => 'multipart/form-data']) !!}

                        @include ('admin.jadwal.form', ['formMode' => 'create'])

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection
