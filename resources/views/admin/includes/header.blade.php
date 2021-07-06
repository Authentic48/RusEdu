<!-- header start -->
<header class="ttr-header">
    <div class="ttr-header-wrapper">
        <!--sidebar menu toggler start -->
        <div class="ttr-toggle-sidebar ttr-material-button">
            <i class="ti-close ttr-open-icon"></i>
            <i class="ti-menu ttr-close-icon"></i>
        </div>
        <!--sidebar menu toggler end -->
        <!--logo start -->
        <div class="ttr-logo-box">
            <div>
                <a href="index.html" class="ttr-logo">
                    <img class="ttr-logo-mobile" alt="" src="{{ asset('assets/images/logo.png')}}" width="30" height="30">
                    <img class="ttr-logo-desktop" alt="" src="{{ asset('assets/images/logo.png')}}" width="160" height="27">
                </a>
            </div>
        </div>
        <!--logo end -->
        <div class="ttr-header-menu">
            <!-- header left menu start -->
            <ul class="ttr-header-navigation">
                <li>
                <a href="{{ url('/')}}" class="ttr-material-button ttr-submenu-toggle">Landing</a>
                </li>
                <li>
                    <a href="#" class="ttr-material-button ttr-submenu-toggle">MENU <i class="fa fa-angle-down"></i></a>
                    <div class="ttr-header-submenu">
                        <ul>
                            <li><a href="#">Teachers</a></li>
                            <li><a href="#">Schools</a></li>
                            <li><a href="#">Posts</a></li>
                            <li><a href="#">Jobs</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <!-- header left menu end -->
        </div>
        <div class="ttr-header-right ttr-with-seperator">
            <!-- header right menu start -->
            <ul class="ttr-header-navigation">
                <li>
                    <a href="#" class="ttr-material-button ttr-submenu-toggle"><span class="ttr-user-avatar"><img alt="" src="{{ Auth::user()->image ? Auth::user()->image: url('https://img.icons8.com/officel/16/000000/user-male-skin-type-5.png') }}" width="32" height="32"></span></a>
                    <div class="ttr-header-submenu">
                        <ul>
                        <li><a href="{{ route('profile.edit', Auth::user()->id)}}">Mon profile</a></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">se deconnecter</a></li>
                        </ul>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                        </form>
                    </div>
                </li>
            </ul>
            <!-- header right menu end -->
        </div>
        <!--header search panel start -->
        <div class="ttr-search-bar">
            <form class="ttr-search-form">
                <div class="ttr-search-input-wrapper">
                    <input type="text" name="qq" placeholder="search something..." class="ttr-search-input">
                    <button type="submit" name="search" class="ttr-search-submit"><i class="ti-arrow-right"></i></button>
                </div>
                <span class="ttr-search-close ttr-search-toggle">
                    <i class="ti-close"></i>
                </span>
            </form>
        </div>
        <!--header search panel end -->
    </div>
</header>
<!-- header end -->