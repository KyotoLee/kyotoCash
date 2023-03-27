<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="javascript:void(0)" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)">
                <i class="far fa-user"></i>
                <span>{{Auth::user()->name ?? ''}}</span>
{{--                <span class="badge badge-warning navbar-badge"></span>--}}
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="javascript:void(0)" class="dropdown-item">
                     Thông tin tài khoản
                </a>
                <div class="dropdown-divider"></div>
{{--                <div class="dropdown-divider"></div>--}}
                <a href="{{route('logout')}}" class="dropdown-item">
                    <i class="far fa-right-from-bracket"></i> Đăng xuất
                </a>
            </div>
        </li>
    </ul>
</nav>
