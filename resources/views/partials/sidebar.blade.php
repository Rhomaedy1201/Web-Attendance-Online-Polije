<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a href="{{ url('/') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Master</h4>
                </li>
                <li class="nav-item {{ Request::is('master-data/*') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#masterData">
                        <i class="fas fa-database"></i>
                        <p>Master Data</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ Request::is('master-data/*') ? 'show' : '' }}" id="masterData">
                        <ul class="nav nav-collapse">
                            <li class="{{ Request::is('master-data/jurusan') || Request::is('master-data/jurusan/*') ? 'active' : '' }}">
                                <a href="{{ route('master-data.jurusan') }}">
                                    <span class="sub-item">Jurusan</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('master-data/prodi') ? 'active' : '' }}">
                                <a href="{{ route('master-data.prodi') }}">
                                    <span class="sub-item">Prodi</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('master-data/mata-kuliah') ? 'active' : '' }}">
                                <a href="{{ route('master-data.mata_kuliah') }}">
                                    <span class="sub-item">Mata Kuliah</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('master-data/jadwal') ? 'active' : '' }}">
                                <a href="{{ route('master-data.jadwal') }}">
                                    <span class="sub-item">Jadwal</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('master-data/user') ? 'active' : '' }}">
                                <a href="{{ route('master-data.user') }}">
                                    <span class="sub-item">User</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ Request::is('history-presensi') ? 'active' : '' }}">
                    <a href="{{ route('history-presensi') }}">
                        <i class="fas fa-history"></i>
                        <p>History Presensi</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->