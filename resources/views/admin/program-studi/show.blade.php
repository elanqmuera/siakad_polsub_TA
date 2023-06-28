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
															<li class="breadcrumb-item d-inline-block"><a href="{{url('/admin')}}" class="text-dark">Home</a></li>
															<li class="breadcrumb-item d-inline-block active">Program Studi</li>
														</ol>
														<h4 class="text-dark">Program Studi Detail</h4>
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
									<h4 class="card-title float-left mb-0 mt-2">Program Studi Detail</h4>
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
                                                    <tr><th> Jurusan </th><td> {{ $programstudi->jurusan->nama_jurusan }} </td></tr><tr><th> Nama Prodi </th><td> {{ $programstudi->nama_prodi }} </td></tr>
                                                    <tr>
                                                        <td colspan="10" align="center">
                                                            <a href="{{ url('/admin/program-studi') }}"><button class="btn btn-sm btn-warning"><span class="lnr lnr-arrow-left">Back</span></button></a>
                                                            <a href="{{ url('/admin/program-studi/' . $programstudi->id . '/edit') }}"><button class="btn btn-sm btn-primary" title="Edit ProgramStudi"><span class="lnr lnr-pencil">Edit</span></button></a>
                                                            {!! Form::open([
                                                                'method' => 'DELETE',
                                                                'url' => ['admin/programstudi', $programstudi->id],
                                                                'style' => 'display:inline'
                                                            ]) !!}
                                                                {!! Form::button('<span class="lnr lnr-trash">Delete</span>', array(
                                                                        'type' => 'submit',
                                                                        'class' => 'btn btn-sm btn-danger',
                                                                        'title' => 'Delete ProgramStudi',
                                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                                )) !!}
                                                            {!! Form::close() !!}
                                                        </td>
                                                    </tr>
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
