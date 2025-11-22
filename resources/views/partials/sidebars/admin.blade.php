<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header">
            <a href="{{ route('admin.dashboard') }}" class="logo">
                <img src="{{ asset('admin/assets/img/logo-new.png') }}" alt="navbar brand" class="navbar-brand" height="20" />
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
                        <i class="fas fa-chart-line"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                    <a href="{{ route('admin.profile') }}">
                        <i class="fas fa-user"></i>
                        <p>My Profile</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('admin.membership-card') ? 'active' : '' }}">
                    <a href="{{ route('admin.membership-card') }}">
                        <i class="fas fa-id-card-alt"></i>
                        <p>Membership Card</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                    <a href="{{ route('admin.users') }}">
                        <i class="fas fa-users"></i>
                        <p>Customers</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('admin.loan-applications') ? 'active' : '' }}">
                    <a href="{{ route('admin.loan-applications') }}">
                        <i class="fas fa-file-signature"></i>
                        <p>Loan Applications</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('admin.leads') ? 'active' : '' }}">
                    <a href="{{ route('admin.leads') }}">
                        <i class="fas fa-bullhorn"></i>
                        <p>Leads</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('admin.orders') ? 'active' : '' }}">
                    <a href="{{ route('admin.orders') }}">
                        <i class="fas fa-clipboard-list"></i>
                        <p>Orders</p>
                    </a>
                </li>

                {{-- <li class="nav-item {{ request()->routeIs('admin.agents') ? 'active' : '' }}">
                <a href="{{ route('admin.agents') }}">
                    <i class="fas fa-user-tie"></i>
                    <p>Agents</p>
                </a>
            </li> --}}

                <li class="nav-item {{ request()->routeIs('admin.enquiries') ? 'active' : '' }}">
                    <a href="{{ route('admin.enquiries') }}">
                        <i class="fas fa-question-circle"></i>
                        <p>Enquiry</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('admin.ads.show') ? 'active' : '' }}">
                    <a href="{{ route('admin.ads.show') }}">
                        <i class="fas fa-bullseye"></i>
                        <p>Advertisement</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('admin.support') ? 'active' : '' }}">
                    <a href="{{ route('admin.support') }}">
                        <i class="fas fa-headset"></i>
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
