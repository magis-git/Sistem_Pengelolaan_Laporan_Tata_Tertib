<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img src="{{ URL::to('/assets/img/Logo-Bina-Amal.png') }}"
                alt="logo"
                width="50"
                class="shadow-light rounded-circle">
        </div>
       
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="{{route('admin.dashboard')}}"
                    class="nav-link">
                    <i class="fas fa-home"></i><span>Dashboard</span></a>
            </li>
                
            <li class="menu-header">User</li>
            <li class="nav-item dropdown">
                <a href="{{route('users.index')}}"
                    class="nav-link has-dropdown"
                    data-toggle="dropdown"><i class="fas fa-user"></i> <span>Manage Users</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('users.create') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ route('users.create') }}">Create User</a>
                    </li>
                    <li class="{{ Request::is('users.index') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{route('users.index')}}">Users List</a>
                    </li>            
                </ul>
            </li>

            <li class="menu-header">Pelanggaran</li>
            <li class="nav-item dropdown">
                <a href="{{route('violation.index')}}"
                    class="nav-link has-dropdown"
                    data-toggle="dropdown"><i class="fas fa-file-alt"></i> <span>Manage Pelanggaran</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('violation.create') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ route('violation.create') }}">Create Pelanggaran</a>
                    </li>
                    <li class="{{ Request::is('violation.index') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{route('violation.index')}}">Pelanggaran List</a>
                    </li>            
                </ul>
            </li>

            <li class="menu-header">Kelas</li>
            <li class="nav-item dropdown">
                <a href="{{route('kelas.index')}}"
                    class="nav-link has-dropdown"
                    data-toggle="dropdown"><i class="fas fa-cube"></i> <span>Manage Kelas</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('kelas.create') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ route('kelas.create') }}">Create Kelas</a>
                    </li>
                    <li class="{{ Request::is('kelas.index') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{route('kelas.index')}}">Kelas List</a>
                    </li>            
                </ul>
            </li>
            
            <li class="menu-header">Siswa</li>
            <li class="nav-item dropdown">
                <a href="{{route('reports.index')}}"
                    class="nav-link has-dropdown"
                    data-toggle="dropdown"><i class="fas fa-user"></i> <span>Manage Siswa</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('reports.create') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ route('reports.create') }}">Create Siswa</a>
                    </li>
                    <li class="{{ Request::is('reports.index') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{route('reports.index')}}">Input Siswa Report</a>
                    </li>   
                    <li class="{{ Request::is('reports.admin-index') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{route('reports.admin-index')}}">Siswa List</a>
                    </li>            
                </ul>
            </li>

            <li class="menu-header">Surat Peringatan</li>
            <li class="nav-item dropdown">
                <a href="{{route('suratPeringatan.index')}}"
                    class="nav-link has-dropdown"
                    data-toggle="dropdown"><i class="fas fa-envelope"></i> <span>Manage SP</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('suratPeringatan.create') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ route('suratPeringatan.create') }}">Create SP</a>
                    </li>
                    <li class="{{ Request::is('suratPeringatan.index') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{route('suratPeringatan.index')}}">SP List</a>
                    </li>            
                </ul>
            </li>


        </ul>

        

        
    </aside>
</div>
