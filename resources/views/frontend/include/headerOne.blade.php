<header class="header black_nav clearfix element_to_stick">
    <div class="container">
        <div id="logo">
            <a href="index.html">
                <img src="{{asset('assets/frontend/')}}/img/logo_sticky.svg" width="162" height="35" alt="">
            </a>
        </div>
        <div class="layer"></div><!-- Opacity Mask Menu Mobile -->
        <ul id="top_menu">

        </ul>
        <!-- /top_menu -->
        <a href="#0" class="open_close">
            <i class="icon_menu"></i><span>Menu</span>
        </a>
        <nav class="main-menu">
            <div id="header_menu">
                <a href="#0" class="open_close">
                    <i class="icon_close"></i><span>Menu</span>
                </a>
                <a href="index.html"><img src="{{asset('assets/frontend/')}}/img/logo.svg" width="162" height="35"
                                          alt=""></a>
            </div>
            <ul>
                <li><a href="{{route('front')}}">Home</a></li>
                <li><a href="{{route('front.all.restaurant')}}">Restaurants</a></li>
                <li><a href="#0">Categories</a></li>
                <li class="submenu">
                    <a href="#0" class="show-submenu">Account</a>
                    @guest
                        <ul>
                            <li><a href="{{route('login')}}" target="_blank">User Login</a></li>
                            <li><a href="{{route('restaurant.login')}}" target="_blank">Store Login</a></li>
                        </ul>
                    @else
                        <ul>
                            <li><a href="{{route('login')}}" target="_blank">Dashboard</a></li>
                            <li><a href="{{route('restaurant.login')}}" target="_blank">My Orders</a></li>
                            <li><a href="{{route('restaurant.login')}}" target="_blank">Profile</a></li>
                            <li><a href="{{route('restaurant.login')}}" target="_blank">Change Password</a></li>
                            <li><a href="{{route('restaurant.login')}}" target="_blank">Logout</a></li>
                        </ul>
                    @endif
                </li>
            </ul>
        </nav>
    </div>
</header>
