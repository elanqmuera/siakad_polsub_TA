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
                                                    <li class="breadcrumb-item d-inline-block"><a href="{{ url('/dosen') }}"
                                                            class="text-dark">Home</a></li>
                                                    <li class="breadcrumb-item d-inline-block active">Perwalian</li>
                                                </ol>
                                                <h4 class="text-dark">Perwalian</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card">
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item text-center active button-5"><a
                                            href="{{ url('/dosen/perwalian') }}" class="text-white">All</a></li>
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>

                <div class="col-xl-9 col-lg-8  col-md-12">
                    <div class="card shadow-sm ctm-border-radius">
                        <div class="card-body align-center">
                            <h4 class="card-title float-left mb-0 mt-2">List Kelas</h4>
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
                                                <th>Kelas</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($kelas as $i => $item)
                                                <tr>
                                                    <td>{{ $i + 1 }}</td>
                                                    <td>{{ $item->nama_kelas }}</td>
                                                    <td class="text-left" align="center">
                                                        <div class="table-action">
                                                            <a href="{{ url('/dosen/perwalian/' . $item->id) }}"
                                                                title="Lihat mata kuliah"><button
                                                                    class="btn btn-sm btn-info"><span
                                                                        class="lnr lnr-eye"></span>View</button></a>
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
                </div>
            </div>
        </div>
    </div>
@endsection
