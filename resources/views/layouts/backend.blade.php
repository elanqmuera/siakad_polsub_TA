<!DOCTYPE html>
<html lang="en">

<head>
    <!DOCTYPE html>
    <html lang="en">
    @include('partials.head')

<body>
    <!-- Inner wrapper -->
    <div class="inner-wrapper">
        <!-- Loader -->
        <div id="loader-wrapper">
            <div class="loader">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div>
        <!-- Header -->
        <header class="header">
            <!-- Top Header Section -->
            <div class="top-header-section">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                            <div class="logo my-3 my-sm-0">
                                <a href="index.html">
                                    <img src="{{ asset('vendor/lakers') }}/img/logo.png" alt="logo image"
                                        class="img-fluid" style="width:300px !important;">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-6 text-right">
                            <div class="user-block d-none d-lg-block">
                                <div class="row align-items-center">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <!-- user info-->
                                        <div class="user-info align-right dropdown d-inline-block header-dropdown">
                                            <a href="javascript:void(0)" data-toggle="dropdown"
                                                class=" menu-style dropdown-toggle">
                                                <div class="user-avatar d-inline-block">
                                                    <img src="{{ asset('vendor/lakers') }}/img/profiles/profile.png"
                                                        alt="user avatar" class="rounded-circle img-fluid"
                                                        width="55">
                                                </div>
                                            </a>
                                            <!-- Notifications -->
                                            <div
                                                class="dropdown-menu notification-dropdown-menu shadow-lg border-0 p-3 m-0 dropdown-menu-right">
                                                <a class="dropdown-item p-2" href="{{ route('sign-out') }}">
                                                    <span class="media align-items-center">
                                                        <span class="lnr lnr-power-switch mr-3"></span>
                                                        <span class="media-body text-truncate">
                                                            <span class="text-truncate">Logout</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </div>
                                            <!-- Notifications -->
                                        </div>
                                        <!-- /User info-->
                                    </div>
                                </div>
                            </div>
                            <div class="d-block d-lg-none">
                                <a href="javascript:void(0)">
                                    <span class="lnr lnr-user d-block display-5 text-white" id="open_navSidebar"></span>
                                </a>
                                <!-- Offcanvas menu -->
                                <div class="offcanvas-menu" id="offcanvas_menu">
                                    <span
                                        class="lnr lnr-cross float-left display-6 position-absolute t-1 l-1 text-white"
                                        id="close_navSidebar"></span>
                                    <div class="user-info align-center bg-theme text-center">
                                        <a href="javascript:void(0)" class="d-block menu-style text-white">
                                            <div class="user-avatar d-inline-block mr-3">
                                                <img src="{{ asset('vendor/lakers') }}/img/profiles/profile.png"
                                                    alt="user avatar" class="rounded-circle" width="50">
                                            </div>
                                        </a>
                                    </div>
                                    <hr>
                                    <div class="user-menu-items px-3 m-0">
                                        <a class="px-0 pb-2 pt-0" href="{{ url('/login') }}">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-home mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Dashboard</span>
                                                </span>
                                            </span>
                                        </a>
                                        @if (auth()->user()->id_role == 1)
                                            <a class="px-0 pb-2 pt-0" href="{{ url('/admin/jurusan') }}">
                                                <span class="media align-items-center">
                                                    <span class="lnr lnr-home mr-3"></span>
                                                    <span class="media-body text-truncate text-left">
                                                        <span class="text-truncate text-left">Jurusan</span>
                                                    </span>
                                                </span>
                                            </a>
                                            <a class="px-0 pb-2 pt-0" href="{{ url('/admin/program-studi') }}">
                                                <span class="media align-items-center">
                                                    <span class="lnr lnr-home mr-3"></span>
                                                    <span class="media-body text-truncate text-left">
                                                        <span class="text-truncate text-left">Program Studi</span>
                                                    </span>
                                                </span>
                                            </a>
                                            <a class="px-0 pb-2 pt-0" href="{{ url('/admin/tahun-ajaran') }}">
                                                <span class="media align-items-center">
                                                    <span class="lnr lnr-home mr-3"></span>
                                                    <span class="media-body text-truncate text-left">
                                                        <span class="text-truncate text-left">Tahun Ajaran</span>
                                                    </span>
                                                </span>
                                            </a>
                                            <a class="px-0 pb-2 pt-0" href="{{ url('/admin/kelas') }}">
                                                <span class="media align-items-center">
                                                    <span class="lnr lnr-home mr-3"></span>
                                                    <span class="media-body text-truncate text-left">
                                                        <span class="text-truncate text-left">Kelas</span>
                                                    </span>
                                                </span>
                                            </a>
                                            <a class="px-0 pb-2 pt-0" href="{{ url('/admin/mata-kuliah') }}">
                                                <span class="media align-items-center">
                                                    <span class="lnr lnr-home mr-3"></span>
                                                    <span class="media-body text-truncate text-left">
                                                        <span class="text-truncate text-left">Mata Kuliah</span>
                                                    </span>
                                                </span>
                                            </a>
                                            <a class="px-0 pb-2 pt-0" href="{{ url('/admin/jadwal') }}">
                                                <span class="media align-items-center">
                                                    <span class="lnr lnr-home mr-3"></span>
                                                    <span class="media-body text-truncate text-left">
                                                        <span class="text-truncate text-left">Jadwal</span>
                                                    </span>
                                                </span>
                                            </a>
                                            <a class="px-0 pb-2 pt-0" href="{{ url('/admin/users') }}">
                                                <span class="media align-items-center">
                                                    <span class="lnr lnr-home mr-3"></span>
                                                    <span class="media-body text-truncate text-left">
                                                        <span class="text-truncate text-left">Users</span>
                                                    </span>
                                                </span>
                                            </a>
                                        @elseif (auth()->user()->id_role == 2)
                                            <a class="px-0 pb-2 pt-0" href="{{ url('/dosen/perwalian') }}">
                                                <span class="media align-items-center">
                                                    <span class="lnr lnr-home mr-3"></span>
                                                    <span class="media-body text-truncate text-left">
                                                        <span class="text-truncate text-left">Perwalian</span>
                                                    </span>
                                                </span>
                                            </a>
                                            <a class="px-0 pb-2 pt-0" href="{{ url('/dosen/mata-kuliah') }}">
                                                <span class="media align-items-center">
                                                    <span class="lnr lnr-home mr-3"></span>
                                                    <span class="media-body text-truncate text-left">
                                                        <span class="text-truncate text-left">Mata Kuliah</span>
                                                    </span>
                                                </span>
                                            </a>
                                            <a class="px-0 pb-2 pt-0" href="{{ url('/dosen/nilai') }}">
                                                <span class="media align-items-center">
                                                    <span class="lnr lnr-home mr-3"></span>
                                                    <span class="media-body text-truncate text-left">
                                                        <span class="text-truncate text-left">Nilai</span>
                                                    </span>
                                                </span>
                                            </a>
                                        @elseif (auth()->user()->id_role == 3)
                                            @if (session()->get('is_wali') == null)
                                                <a class="px-0 pb-2 pt-0" href="{{ url('/mahasiswa/perwalian') }}">
                                                    <span class="media align-items-center">
                                                        <span class="lnr lnr-home mr-3"></span>
                                                        <span class="media-body text-truncate text-left">
                                                            <span class="text-truncate text-left">Perwalian</span>
                                                        </span>
                                                    </span>
                                                </a>
                                                <a class="px-0 pb-2 pt-0" href="{{ url('/mahasiswa/kelas') }}">
                                                    <span class="media align-items-center">
                                                        <span class="lnr lnr-home mr-3"></span>
                                                        <span class="media-body text-truncate text-left">
                                                            <span class="text-truncate text-left">Kelas</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            @endif
                                            <a class="px-0 pb-2 pt-0" href="{{ url('/mahasiswa/mata-kuliah') }}">
                                                <span class="media align-items-center">
                                                    <span class="lnr lnr-home mr-3"></span>
                                                    <span class="media-body text-truncate text-left">
                                                        <span class="text-truncate text-left">Mata Kuliah</span>
                                                    </span>
                                                </span>
                                            </a>
                                            <a class="px-0 pb-2 pt-0" href="{{ url('/mahasiswa/nilai') }}">
                                                <span class="media align-items-center">
                                                    <span class="lnr lnr-home mr-3"></span>
                                                    <span class="media-body text-truncate text-left">
                                                        <span class="text-truncate text-left">Nilai</span>
                                                    </span>
                                                </span>
                                            </a>
                                        @endif
                                        <a class="p-2" href="{{ route('logout') }}">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-power-switch mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Logout</span>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <!-- /Offcanvas menu -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Top Header Section -->
            <!-- Slide Nav -->
            @include('partials.sidebar')
        </header>
        <!-- /Header -->
        <!-- Page Wrapper -->
        @yield('content')
        <!--/Content-->
    </div>
    <!-- Inner Wrapper -->

    <div class="sidebar-overlay" id="sidebar_overlay"></div>
    @include('partials.scripts')
</body>

</html>
