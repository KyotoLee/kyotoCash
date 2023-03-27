<aside class="main-sidebar elevation-4">
    <div class="d-flex justify-content-center">
        <div style="width: 200px;height: 165px">
            <img src="{{asset('images/logo.png')}}" alt="kyoto Logo" class="brand-image img-circle" style="width: 100%;height: 100%">
        </div>
    </div>

    <div class="sidebar">
{{--        <div class="user-panel mt-3 pb-3 mb-3 d-flex">--}}
{{--            <div class="image">--}}
{{--                <img src="{{asset('images/user.png')}}" class="img-circle" alt="User Image">--}}
{{--            </div>--}}
{{--            <div class="info">--}}
{{--                <a href="javascript:void(0)" class="d-block">Alexander Pierce</a>--}}
{{--            </div>--}}
{{--        </div>--}}

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="{{route('dashboard')}}" class="nav-link {{$_SERVER['REQUEST_URI'] == '/dashboard' ? 'active' : ''}}">
                        <i class="fa fa-tachometer"></i>
                        <p>Trang chủ</p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="{{route('pawn')}}" class="nav-link {{$_SERVER['REQUEST_URI'] == '/pawn' ? 'active' : ''}}">
                        <i class="fa fa-tachometer"></i>
                        <p>Cầm đồ</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
