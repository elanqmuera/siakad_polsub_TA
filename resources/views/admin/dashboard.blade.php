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
                                                    <li class="breadcrumb-item d-inline-block"><a href="index.html"
                                                            class="text-dark">Home</a></li>
                                                    <li class="breadcrumb-item d-inline-block active">Dashboard</li>
                                                </ol>
                                                <h4 class="text-dark">Admin Dashboard</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-card card shadow-sm bg-white text-center ctm-border-radius">
                            <div class="user-info card-body">
                                <div class="user-avatar mb-4">
                                    <img src="{{ asset('vendor/lakers') }}/img/profiles/profile.png" alt="User Avatar"
                                        class="img-fluid rounded-circle" width="100">
                                </div>
                                <div class="user-details">
                                    <h4><b>Welcome {{ Auth::user()->name }}</b></h4>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>

                <div class="col-xl-9 col-lg-8 col-md-12">

                    <!-- Widget -->
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="card dash-widget ctm-border-radius shadow-sm">
                                <div class="card-body">
                                    <div class="card-icon bg-primary">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                    </div>
                                    <div class="card-right">
                                        <h4 class="card-title">Total Jurusan</h4>
                                        <p class="card-text">{{ $jurusan }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-sm-4 col-12">
                            <div class="card dash-widget ctm-border-radius shadow-sm">
                                <div class="card-body">
                                    <div class="card-icon bg-warning">
                                        <span class="fa fa-building pr-0 "></span>
                                    </div>
                                    <div class="card-right">
                                        <h4 class="card-title">Total Program Studi</h4>
                                        <p class="card-text">{{ $prodi }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-sm-4 col-12">
                            <div class="card dash-widget ctm-border-radius shadow-sm">
                                <div class="card-body">
                                    <div class="card-icon bg-info">
                                        <i class="fa fa-list"></i>
                                    </div>
                                    <div class="card-right">
                                        <h4 class="card-title">Total Kelas</h4>
                                        <p class="card-text">{{ $kelas }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Widget -->
                </div>
            </div>
        </div>
    </div>
    <!--/Content-->
@endsection
