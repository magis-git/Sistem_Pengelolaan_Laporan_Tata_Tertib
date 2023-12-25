<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#"
                data-toggle="sidebar"
                class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
        
        <a class="navbar-brand" href="#">SISTEM INFORMASI PENGELOLAAN LAPORAN TATA TERTIB</a>
    
        

    </form>

    <ul class="navbar-nav navbar-right">
        
        <li class="dropdown"><a href="#"
                data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img src="{{ asset('assets/avatar-1.png') }}"
                    class="rounded-circle mr-1">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <form action="{{route("logout")}}" method="GET">
                    @csrf
                    <button class="btn has-icon text-danger" style="cursor:pointer">
                        <i class="fas fa-door-open"></i>Sign Out</button>
                </form>
            </div>
        </li>
    </ul>
</nav>
