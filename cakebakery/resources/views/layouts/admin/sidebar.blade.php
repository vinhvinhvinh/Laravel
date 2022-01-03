@section('sidebar')
     <!-- MENU SIDEBAR-->
     <aside class="menu-sidebar2">
        <div class="logo">
            <a href="#">
                <img src="{{asset('admin/images/icon/logo-white.png')}}" alt="Cool Admin" />
            </a>
        </div>
        <div class="menu-sidebar2__content js-scrollbar1">
            <div class="account2">
                <div class="image img-cir img-120">
                    <img src="{{asset('admin/images/'.Session::get('imgOfUser'))}}" alt="John Doe" />
                </div>
                {{-- <h4 class="name">{{$nameOfUser}}</h4> --}}
                <h4 class="name">{{Session::get('nameOfUser');}}</h4>

                <a href="{{route('logout')}}">Sign out</a>
            </div>
            <nav class="navbar-sidebar2">
                <ul class="list-unstyled navbar__list">
                    
                    <li class="active">
                        <a href="{{route('admin.products.index')}}">
                            <i class="fas fa-birthday-cake"></i>Bánh</a>
                    
                    </li>
                    <li>
                        <a href="{{route('admin.employees.index')}}">
                            <i class="fas fa-users"></i>Nhân viên</a>
                    
                    </li>
                    <li>
                        <a href="{{route('admin.invoices.index')}}">
                            <i class="fas fa-file-alt"></i>Hóa đơn</a>
                    
                    </li>
                    
                    
                    
                </ul>
            </nav>
        </div>
    </aside>
    <!-- END MENU SIDEBAR-->
@show
