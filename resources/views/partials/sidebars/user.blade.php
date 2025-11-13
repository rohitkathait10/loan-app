<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header">
            <a href="{{ route('user.dashboard') }}" class="logo">
                <img src="{{ asset('admin/assets/img/logo-new.png') }}" alt="navbar brand" class="navbar-brand" height="10" />
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
                <li class="nav-item {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('user.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>DASHBOARD</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('user.profile') ? 'active' : '' }}">
                    <a href="{{ route('user.profile') }}">
                        <i class="fas fa-user"></i>
                        <p>MY PROFILE</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('user.kyc') ? 'active' : '' }}">
                    <a href="{{ route('user.kyc') }}">
                        <i class="fas fa-id-card"></i>
                        <p>KYC DOCUMENTS</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('user.membership') ? 'active' : '' }}">
                    <a href="{{ route('user.membership') }}">
                        <i class="fas fa-id-badge"></i>
                        <p>MEMBERSHIP CARD</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('user.offers') ? 'active' : '' }}">
                    <a href="{{ route('user.offers') }}">
                        <i class="fas fa-gift"></i>
                        <p>MY OFFERS</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('user.loan.history') ? 'active' : '' }}">
                    <a href="{{ route('user.loan.history') }}">
                        <i class="fas fa-history"></i>
                        <p>MY LOAN HISTORY</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('user.referal') ? 'active' : '' }}">
                    <a href="{{ route('user.referal') }}">
                        <i class="fas fa-user-friends"></i>
                        <p>My Referral</p>
                    </a>
                </li>


                <li class="nav-item {{ request()->routeIs('user.support') ? 'active' : '' }}">
                    <a href="{{ route('user.support') }}">
                        <i class="fas fa-headset"></i>
                        <p>SUPPORT</p>
                    </a>
                </li>

                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link" style="color: inherit; text-align: left;">
                            <i class="fas fa-sign-out-alt"></i>
                            <p>LOGOUT</p>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
