<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header">
            <a href="{{ route('user.dashboard') }}" class="logo">
                <img src="{{ asset('asset/img/logo-kyc.png') }}" alt="navbar brand" class="navbar-brand" height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>

    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                    <a href="{{ route('admin.profile') }}">
                        <i class="fas fa-user-circle"></i>
                        <p>My Profile</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                    <a href="{{ route('admin.users') }}">
                        <i class="fas fa-users"></i>
                        <p>Customers</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('admin.leads') ? 'active' : '' }}">
                    <a href="{{ route('admin.leads') }}">
                        <i class="fas fa-user-plus"></i>
                        <p>Leads</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('admin.support') ? 'active' : '' }}">
                    <a href="{{ route('admin.support') }}">
                        <i class="fas fa-life-ring"></i>
                        <p>Support</p>
                    </a>
                </li>

                <li class="nav-item">
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link" style="color: inherit; text-align: left;">
                            <i class="fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
