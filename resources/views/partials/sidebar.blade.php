            <!-- Slide Nav -->
            <div class="header-wrapper d-none d-sm-none d-md-none d-lg-block">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="header-menu-list d-flex bg-white rt_nav_header horizontal-layout nav-bottom">
                                <div class="append mr-auto my-0 my-md-0 mr-auto">
                                    <ul class="list-group list-group-horizontal-md mr-auto">
                                        <li class="mr-1 <?php if(request()->is('admin') || request()->is('dosen') || request()->is('mahasiswa') ){echo('active');} ?>"><a href="{{url('/login')}}" class="btn-ctm-space text-dark header_class"><span class="lnr lnr-home pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Dashboard</span></a></li>
                                    @if (auth()->user()->id_role == 1)
                                        <li class="mr-1 {{ request()->is('admin/jurusan') ? 'active' : '' }}"><a href="{{url('admin/jurusan')}}" class="btn-ctm-space text-dark header_class"><span class="fa fa-building pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Jurusan</span></a></li>
                                        <li class="mr-1"><a href="{{url('admin/program-studi')}}" class="btn-ctm-space text-dark header_class"><span class="fa fa-building pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Program Studi</span></a></li>
                                        <li class="mr-1"><a href="{{url('admin/tahun-ajaran')}}" class="btn-ctm-space text-dark header_class"><span class="fa fa-calendar pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Tahun Ajaran</span></a></li>
                                        <li class="mr-1"><a href="{{url('admin/kelas')}}" class="btn-ctm-space text-dark header_class"><span class="fa fa-list pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Kelas</span></a></li>
                                        <li class="mr-1"><a href="{{url('admin/mata-kuliah')}}" class="btn-ctm-space text-dark header_class"><span class="fa fa-book pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Mata Kuliah</span></a></li>
                                        <li class="mr-1"><a href="{{url('admin/jadwal')}}" class="btn-ctm-space text-dark header_class"><span class="fa fa-calendar pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Jadwal</span></a></li>
                                        <li class="mr-1"><a href="{{url('admin/users')}}" class="btn-ctm-space text-dark header_class"><span class="fa fa-user pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Users</span></a></li>

                                        @elseif (auth()->user()->id_role == 2)
                                        <li class="mr-1 {{ request()->is('dosen/perwalian*') ? 'active' : '' }}"><a href="{{url('dosen/perwalian')}}" class="btn-ctm-space text-dark header_class"><span class="fa fa-user pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Perwalian</span></a></li>
                                        <li class="mr-1 {{ request()->is('dosen/mata-kuliah*') ? 'active' : '' }}"><a href="{{url('dosen/mata-kuliah')}}" class="btn-ctm-space text-dark header_class"><span class="fa fa-user pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Mata Kuliah</span></a></li>
                                        <li class="mr-1 {{ request()->is('dosen/nilai*') ? 'active' : '' }}"><a href="{{url('dosen/nilai')}}" class="btn-ctm-space text-dark header_class"><span class="fa fa-user pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Nilai</span></a></li>

                                        @elseif (auth()->user()->id_role == 3)
                                        @if (session()->get('is_wali') == null)
                                        <li class="mr-1 {{ request()->is('mahasiswa/perwalian*') ? 'active' : '' }}"><a href="{{url('mahasiswa/perwalian')}}" class="btn-ctm-space text-dark header_class"><span class="fa fa-user pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Perwalian</span></a></li>
                                        <li class="mr-1 {{ request()->is('mahasiswa/kelas*') ? 'active' : '' }}"><a href="{{url('mahasiswa/kelas')}}" class="btn-ctm-space text-dark header_class"><span class="fa fa-user pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Kelas</span></a></li>
                                        @endif
                                        <li class="mr-1 {{ request()->is('mahasiswa/mata-kuliah*') ? 'active' : '' }}"><a href="{{url('mahasiswa/mata-kuliah')}}" class="btn-ctm-space text-dark header_class"><span class="fa fa-user pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Mata Kuliah</span></a></li>
                                        <li class="mr-1 {{ request()->is('mahasiswa/nilai*') ? 'active' : '' }}"><a href="{{url('mahasiswa/nilai')}}" class="btn-ctm-space text-dark header_class"><span class="fa fa-user pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Nilai</span></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Slide Nav -->
