<ul
        class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion"
        id="accordionSidebar"
>
    <!-- Sidebar - Brand -->
     <a
            class="sidebar-brand d-flex align-items-center justify-content-center"
            {{-- href="{{ url('/login') }}" --}}
    >
        <div class="sidebar-brand-icon" style="margin-top: 20px">
           {{-- <i class="fas fa-layer-group"></i> --}}
           <img class="img-fluid img-profile rounded" style="height:70px; width: 100px; background-color: white;" src="{{asset('/')}}logo.png"/>
        </div>
    </a>
    <!-- Divider -->
    
    <!-- Nav Item - Dashboard -->
   <br>
   <hr class="sidebar-divider my-0"/>
    @if(auth()->user()->type=='Host')
    @elseif(auth()->user()->type=='Passenger')
        @include('admin.partial.left-menu-passenger')
    @elseif(auth()->user()->type=='Leader')
        @include('admin.partial.left-menu-leader')
    @elseif(auth()->user()->type=='ATP')
        @include('admin.partial.left-menu-supplier')
    @elseif(auth()->user()->type=='Hotel')
        @include('admin.partial.left-menu-hotel')
    @elseif(auth()->user()->type=='BC')
        @include('admin.partial.left-menu-transport')
    @else
        @include('admin.partial.left-menu_superadmin')
    @endif

    <li class="nav-item {{ request()->is('admin/user*')?'active':'' }}">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider"/>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
