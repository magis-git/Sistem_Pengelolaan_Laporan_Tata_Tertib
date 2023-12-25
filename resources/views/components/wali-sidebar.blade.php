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
                <a href="{{route('wali.dashboard')}}"
                    class="nav-link">
                    <i class="fas fa-home"></i><span>Dashboard</span></a>
            </li>
            
            <li class="menu-header">Siswa</li>
            <li class="nav-item dropdown">
                <a href="{{route('reports.index')}}"
                    class="nav-link has-dropdown"
                    data-toggle="dropdown"><i class="fas fa-user"></i> <span>Manage Siswa</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('reports.index') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{route('reports.index')}}">Lapor Siswa</a>
                    </li>   
                    {{-- <li class="{{ Request::is('reports.wali-index') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{route('reports.wali-index')}}">Siswa List</a>
                    </li>             --}}
                </ul>
            </li>
        </ul>

        
    </aside>
</div>
