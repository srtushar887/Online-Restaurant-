<header class="header_in clearfix">
    <div class="container">
        <div id="logo">
            <a href="index.html">
                <img src="{{asset('assets/frontend/')}}/img/logo_sticky.svg" width="140" height="35" alt="">
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
                <a href="index.html"><img src="img/logo.svg" width="162" height="35" alt=""></a>
            </div>
            <ul>
                <li><a href="{{route('front')}}">Home</a></li>
                <li><a href="#0">Restaurants</a></li>
                <li><a href="#0">categories</a></li>
                <li><a href="#0">categories</a></li>
                <li class="submenu">
                    <a href="#0" class="show-submenu">Account</a>
                    <ul>
                        <li><a href="admin_section/index.html" target="_blank">User Login</a></li>
                        <li><a href="admin_section/index.html" target="_blank">Vendor Login</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</header>
