 <div class="main-header">
     <div class="main-header-logo">
         <!-- Logo Header -->
         <div class="logo-header">
             <a href="{{ route('user.dashboard') }}" class="logo">
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
     <!-- Navbar Header -->
     <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
         <div class="container-fluid">
             <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">

             </nav>

             <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                 <li class="nav-item topbar-user dropdown hidden-caret">
                     <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                         aria-expanded="false">
                         <div class="avatar-sm d-flex align-items-center justify-content-center bg-primary rounded-circle"
                             style="width: 36px; height: 36px;">
                             <i class="fas fa-user text-white"></i>
                         </div>

                         <span class="profile-username">
                             <span class="op-7">Hi,</span>
                             <span class="fw-bold">{{ auth()->user()?->name }}</span>
                         </span>
                     </a>

                 </li>
             </ul>
         </div>
     </nav>
     <!-- End Navbar -->
 </div>
