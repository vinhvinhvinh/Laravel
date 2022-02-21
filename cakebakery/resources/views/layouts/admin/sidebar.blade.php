@section('sidebar')
    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar2">
        <div class="logo">
            <a href="#">
                <img src="{{ asset('admin/images/icon/logo-white.png') }}" alt="Cool Admin" />
            </a>
        </div>
        <div class="menu-sidebar2__content js-scrollbar1">
            <div class="account2">
                <div class="image img-cir img-120">
                    <a href="{{ route('profileAdmin') }}"><img src="{{ asset('admin/images/' . Session::get('userAvatar')) }}"
                            alt="" /></a>
                </div>
                {{-- <h4 class="name">{{$nameOfUser}}</h4> --}}
                <h4 class="name">{{ Session::get('userFullname') }}</h4>

                <a href="{{ route('logout') }}">Sign out</a>
            </div>
            <nav class="navbar-sidebar2">

                @if (Session::get('loaitk') == -1)
                    <ul class="list-unstyled navbar__list">
                        <li class="active">
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-birthday-cake"></i>Dashboard</a>

                        </li>
                        <li class="">
                            <a href="{{ route('admin.products.index') }}">
                                <i class="fas fa-birthday-cake"></i>Bánh</a>

                        </li>
                        <li>
                            <a href="{{ route('admin.accounts.index') }}">
                                <i class="fas fa-file-alt"></i>Tài khoản</a>

                        </li>
                        <li>
                            <a href="{{ route('admin.employees.index') }}">
                                <i class="fas fa-users"></i>Nhân viên</a>

                        </li>
                        <li>
                            <a href="{{ route('admin.invoices.index') }}">
                                <i class="fas fa-file-alt"></i>Hóa đơn</a>

                        </li>
                        <li>
                            <a href="{{ route('admin.menus.index') }}">
                                <i class="fas fa-file-alt"></i>Thực đơn</a>

                        </li>
                    </ul>
                @else
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="{{ route('admin.invoices.index') }}">
                                <i class="fas fa-file-alt"></i>Hóa đơn</a>

                        </li>
                        <li>
                            <a href="{{ route('admin.menus.index') }}">
                                <i class="fas fa-file-alt"></i>Thực đơn</a>

                        </li>
                    </ul>
                @endif





            </nav>
        </div>
    </aside>
    <!-- END MENU SIDEBAR-->
@show
