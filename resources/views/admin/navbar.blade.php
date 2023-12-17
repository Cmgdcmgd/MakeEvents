<!-- Begin page -->
<div id="layout-wrapper">
    <header id="page-topbar">
        <div class="layout-width">
            <div class="navbar-header">
                <div class="d-flex">
                    <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                        <span class="hamburger-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>
                </div>
                <div class="d-flex align-items-center">
                    <div class="ms-1 header-item d-none d-sm-flex">
                        
                    </div>  
                    <div class="dropdown ms-sm-3 header-item topbar-user">
                        <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="d-flex align-items-center">
                                @if(!empty(session('profpic')))
                                    <img class="rounded-circle header-profile-user" src="{{asset('admin/images/users/'.session('profpic'))}}" alt="Header Avatar">
                                @else
                                    <img class="rounded-circle header-profile-user" src="{{asset('admin/images/users/avatar-1.jpg')}}" alt="Header Avatar">
                                @endif
                                
                                <span class="text-start ms-xl-2">
                                    <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{session('name')}}</span>
                                </span>
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <h6 class="dropdown-header">Welcome {{session('name')}}!</h6>
                                <a class="dropdown-item" href="/useredit/{{session('userid')}}"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Edit Profile</span></a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ========== App Menu ========== -->
    <div class="app-menu navbar-menu">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <!-- Light Logo-->
            <a href="index.html" class="logo logo-light">
                <span class="logo-sm">
                    
                </span>
                <span class="logo-lg">
                    
                </span>
            </a>
            <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                <i class="ri-record-circle-line"></i>
            </button>
        </div>
        <!-- END LOGO -->
        <div id="scrollbar">
            <div class="container-fluid">
                <div id="two-column-menu"></div>
                <ul class="navbar-nav" id="navbar-nav">
                    <li class="menu-title"><span data-key="t-menu">Menu</span></li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/dashboard">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboard</span>
                        </a>
                    </li>
                    @if(session('user_type') == "Administrator")
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                            <i class="ri-user-settings-fill"></i> <span data-key="t-multi-level">User Management</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarMultilevel">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="/newuser" class="nav-link"> New User </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/userslist" class="nav-link"> Users list </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    @if(session('user_type') == "Vendor" || session('user_type') == "Administrator")
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                            <i class="ri-hotel-line"></i> <span data-key="t-multi-level">Venue Management</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarApps">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="/newvenue" class="nav-link"> Create Vendor Profile </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/venueslist" class="nav-link"> Vendor listing </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="/pendingpayments" class="nav-link"> Pending Payments </a>
                                </li> -->
                                <li class="nav-item">
                                    <a href="/eventscalendar" class="nav-link"> Clients Events Calendar </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/chatify" class="nav-link"> Chat Room</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/videocall" class="nav-link"> Virtual Meeting Room</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    @if(session('user_type') == "Event Coordinator" || session('user_type') == "Administrator")
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#eventcoordinator" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="eventcoordinator">
                            <i class="ri-account-pin-box-line"></i> <span data-key="t-multi-level">Event Coordinator Management</span>
                        </a>
                        <div class="collapse menu-dropdown" id="eventcoordinator">
                            <ul class="nav nav-sm flex-column">
                                <!-- <li class="nav-item">
                                    <a href="/pendingpaymentscoordinator" class="nav-link"> Pending Payments </a>
                                </li> -->
                                <li class="nav-item">
                                    <a href="/coordinatorcalendar" class="nav-link"> Clients Events Calendar </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/coordinatorslist" class="nav-link"> Event Coordinator list </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/chatify" class="nav-link"> Chat Room </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/videocall" class="nav-link"> Virtual Meeting Room</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
            <!-- Sidebar -->
        </div>

        <div class="sidebar-background"></div>
    </div>
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>
