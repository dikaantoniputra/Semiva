<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                @if (auth()->user()->role == 'admin')
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="{{ route('admin.dashboard') }}" id="topnav-dashboard" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard me-1"></i> Dashboard
                        </a>
            
                    </li>

                   

                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" id="topnav-dashboard" role="button"
                        aria-haspopup="true" aria-expanded="false" href="{{ route('user.index') }}">
                            <i class="mdi mdi-calendar-blank-outline"></i>
                            <span> Manajemen Karyawan Unit </span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-card-bulleted-settings-outline me-1"></i>Manajemen Absensi<div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-layout">
                            <a href="{{ route('absenmasuk.index') }}" class="dropdown-item">Absen Masuk</a>
                            <a href="{{ route('absenpulang.index') }}" class="dropdown-item">Absen Pulang</a>
                            
                        </div>
                    </li>

                    
                  
                    

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-card-bulleted-settings-outline me-1"></i> Absen Harian Masuk<div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-layout">
                            <a href="{{ route('admin.tk.harian') }}" class="dropdown-item">Unit TK</a>
                            <a href="{{ route('admin.sd.harian') }}" class="dropdown-item">Unit SD</a>
                            <a href="{{ route('admin.smp.harian') }}" class="dropdown-item">Unit SMP</a>
                            <a href="{{ route('admin.sma.harian') }}" class="dropdown-item">Unit SMA</a>
                        </div>
                    </li>
                        
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-card-bulleted-settings-outline me-1"></i> Laporan All<div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-layout">
                            <a href="{{ route('laporan.tk.admin') }}" class="dropdown-item">Unit TK</a>
                            <a href="{{ route('laporan.sd.admin') }}" class="dropdown-item">Unit SD</a>
                            <a href="{{ route('laporan.smp.admin') }}" class="dropdown-item">Unit SMP</a>
                            <a href="{{ route('laporan.sma.admin') }}" class="dropdown-item">Unit SMA</a>
                        </div>
                    </li> --}}

                    
                </ul> <!-- end navbar-->
                @endif
                @if (auth()->user()->role == 'yayasan')
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="{{ route('yayasan.dashboard') }}" id="topnav-dashboard" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard me-1"></i> Dashboard
                        </a>
            
                    </li>

                   

                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" id="topnav-dashboard" role="button"
                        aria-haspopup="true" aria-expanded="false" href="{{ route('laporan.karyawan.yayasan') }}">
                            <i class="mdi mdi-calendar-blank-outline"></i>
                            <span> Data Karyawan Unit </span>
                        </a>
                    </li>

                    

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-card-bulleted-settings-outline me-1"></i> Absen Harian Masuk<div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-layout">
                            <a href="{{ route('data.tk.harian') }}" class="dropdown-item">Unit TK</a>
                            <a href="{{ route('data.sd.harian') }}" class="dropdown-item">Unit SD</a>
                            <a href="{{ route('data.smp.harian') }}" class="dropdown-item">Unit SMP</a>
                            <a href="{{ route('data.sma.harian') }}" class="dropdown-item">Unit SMA</a>
                        </div>
                    </li>
                        
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-card-bulleted-settings-outline me-1"></i> Laporan All<div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-layout">
                            <a href="{{ route('laporan.tk.yayasan') }}" class="dropdown-item">Unit TK</a>
                            <a href="{{ route('laporan.sd.yayasan') }}" class="dropdown-item">Unit SD</a>
                            <a href="{{ route('laporan.smp.yayasan') }}" class="dropdown-item">Unit SMP</a>
                            <a href="{{ route('laporan.sma.yayasan') }}" class="dropdown-item">Unit SMA</a>
                        </div>
                    </li>


                </ul> <!-- end navbar-->
                @endif
                @if (auth()->user()->role == 'kepala-sekolah')
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="{{ route('kepala.unit') }}" id="topnav-dashboard" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard me-1"></i> Dashboard
                        </a>
            
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="{{ route('absen.kepsek') }}" id="topnav-dashboard" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard me-1"></i> Lakukan Absen
                        </a>
            
                    </li>

                   

                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" id="topnav-dashboard" role="button"
                        aria-haspopup="true" aria-expanded="false" href="{{ route('data.karyawan.unit') }}">
                            <i class="mdi mdi-calendar-blank-outline"></i>
                            <span> Data Karyawan Unit </span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-card-bulleted-settings-outline me-1"></i> Absen Kepala Sekolah <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-layout">
                            <a href="{{ route('masuk.kepsek') }}" class="dropdown-item">Absen Masuk </a>
                            <a href="{{ route('pulang.kepsek') }}" class="dropdown-item">Absen Pulang</a>
                           
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-card-bulleted-settings-outline me-1"></i> Absen Karyawan Unit <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-layout">
                            <a href="{{ route('masuk.karyawan') }}" class="dropdown-item">Absen Masuk Karyawan</a>
                            <a href="{{ route('pulang.karyawan') }}" class="dropdown-item">Absen Pulang Karyawan</a>
                           
                        </div>
                    </li>


                    @if (auth()->user()->kategori == 'tk')
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="{{ route('laporan.tk.kepala') }}" id="topnav-dashboard" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard me-1"></i> Laporan Absen
                        </a>
            
                    </li>
                    @endif
                    @if (auth()->user()->kategori == 'sd')
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="{{ route('laporan.sd.kepala') }}" id="topnav-dashboard" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard me-1"></i> Laporan Absen
                        </a>
                    </li>
                    @endif
                    @if (auth()->user()->kategori == 'smp')
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="{{ route('laporan.smp.kepala') }}" id="topnav-dashboard" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard me-1"></i> Laporan Absen
                        </a>
                    </li>
                    @endif
                    @if (auth()->user()->kategori == 'sma')
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="{{ route('laporan.sma.kepala') }}" id="topnav-dashboard" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard me-1"></i> Laporan Absen
                        </a>
                    </li>
                    @endif
                    
                   

                   


                </ul> <!-- end navbar-->
                @endif
                @if (auth()->user()->role == 'guru')
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="{{ route('guru.dashboard') }}" id="topnav-dashboard" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard me-1"></i> Dashboard
                        </a>
            
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" id="topnav-dashboard" role="button"
                        aria-haspopup="true" aria-expanded="false" href="{{ route('karyawan.masuk') }}">
                            <i class="mdi mdi-calendar-blank-outline"></i>
                            <span> Absen Masuk </span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" id="topnav-dashboard" role="button"
                        aria-haspopup="true" aria-expanded="false" href="{{ route('karyawan.pulang') }}">
                            <i class="mdi mdi-calendar-blank-outline"></i>
                            <span> Absen Pulang </span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" id="topnav-dashboard" role="button"
                        aria-haspopup="true" aria-expanded="false" href="{{ route('absen.guru') }}">
                            <i class="mdi mdi-calendar-blank-outline"></i>
                            <span> Lakukan Absen </span>
                        </a>
                    </li>
                        
                    
                </ul> <!-- end navbar-->
                @endif
            </div> <!-- end .collapsed-->
        </nav>
    </div> <!-- end container-fluid -->
</div> <!-- end topnav-->