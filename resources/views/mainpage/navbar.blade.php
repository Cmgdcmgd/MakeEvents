<div class="body-wrapper  float-menu gdlr-icon-light gdlr-header-solid" data-home="#">
    <header class="gdlr-header-wrapper">

        <!-- logo -->
        <div class="gdlr-header-inner">
            <div class="gdlr-header-container container">
                <!-- logo -->
                <div class="gdlr-logo">
                    <div class="gdlr-logo-inner">
                        <a href="/">
                            <img src="{{asset('mainpage/images/Brown Neutral Minimalist Monoline Simple Clean Photography Logo.png')}}" alt=""> </a>
                        <div class="gdlr-responsive-navigation dl-menuwrapper" id="gdlr-responsive-navigation">
                            <button class="dl-trigger">Open Menu</button>
                            <ul id="menu-main-menu" class="dl-menu gdlr-main-mobile-menu">
                                <li class="menu-item current-menu-item "><a href="/">Home</a></li>
                                <li class="menu-item"><a href="/allvenues">Vendors</a></li>
                                <li class="menu-item"><a href="/allcoordinators">Event Coordinators</a></li>
                                <li class="menu-item"><a href="/aboutus">About Us</a></li>
                                @if (session('logged') == true)
                                    <li class="menu-item"><a href="/dashboard">Chat</a></li>
                                @endif
                                @if (session('logged') == true)
                                    <li class="menu-item"><a href="/videocall">Virtual Meeting Room</a></li>
                                @endif
                                @if (session('logged') == true)
                                    <li class="menu-item"><a href="/myprofile">My Profile</a></li>
                                @endif
                                @if (session('logged') == true)
                                    <li class="menu-item"><a href="/customerlogout">Logout</a></li>
                                @else
                                    <li class="menu-item"><a href="/customerlogin">Login</a></li>
                                    <li class="menu-item"><a href="/register">Sign-Up</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- navigation -->
                <div class="gdlr-navigation-wrapper">
                    <nav class="gdlr-navigation" id="gdlr-main-navigation" role="navigation">
                        <ul id="menu-main-menu-1" class="sf-menu gdlr-main-menu">
                            <li class="menu-item current-menu-item gdlr-normal-menu"><a href="/">Home</a></li>
                            <li class="menu-item"><a href="/allvenues">Vendors</a></li>
                            <li class="menu-item "><a href="/allcoordinators">Event Coordinators</a></li>
                            <li class="menu-item"><a href="/aboutus">About Us</a></li>
                            @if (session('logged') == true)
                                    <li class="menu-item"><a href="/dashboard">Chat</a></li>
                            @endif
                            @if (session('logged') == true)
                                    <li class="menu-item"><a href="/videocall">Virtual Meeting Room</a></li>
                            @endif
                            @if (session('logged') == true)
                                    <li class="menu-item"><a href="/myprofile">My Profile</a></li>
                                @endif
                            @if (session('logged') == true)
                                <li class="menu-item"><a href="/customerlogout">Logout</a></li>
                            @else
                                <li class="menu-item"><a href="/customerlogin">Login</a></li>
                                <li class="menu-item"><a href="/register">Sign-Up</a></li>
                            @endif
                        </ul>
                    </nav>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </header>