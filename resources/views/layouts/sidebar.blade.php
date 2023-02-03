<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item active ">
            <a href="{{ url('dashboard') }}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        {{-- <li class="sidebar-item active ">
            <a href="{{ route('AdminUser.index') }}" class='sidebar-link'>
                <i class="bi bi-people-fill"></i>
                <span>User</span>
            </a>
        </li> --}}
        <li class="sidebar-item  has-sub active">
            <a href="#" class='sidebar-link'>
                <i class="bi bi bi-people-fill"></i>
                <span>User</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item active">
                    <a href="{{ route('user.index') }}">Data User</a>
                </li>
                <li class="submenu-item active">
                    <a href="{{ route('roles.index') }}">Hak Akses</a>
                </li>
            </ul>
        </li>


        <li class="sidebar-item active ">
            <a href="{{ route('siswa.index') }}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Siswa</span>
            </a>
        </li>

        <li class="sidebar-item active ">
            <a href="{{ route('logout') }}" class='sidebar-link'>
                <i class="bi bi-box-arrow-left"></i>
                <span>LOGOUT</span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </a>
        </li>
    </ul>
</div>
