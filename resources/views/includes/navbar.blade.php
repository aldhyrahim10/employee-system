<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                    class="ficon feather icon-menu"></i></a></li>
                    </ul>


                </div>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                            href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span><span class="user-status">Available</span></div><span><img class="round"
                                    src="{{ asset('app-assets/images/portrait/small/avatar-s-11.jpg') }}" alt="avatar"
                                    height="40" width="40"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{route ('account')}}"><i class="feather icon-user"></i> Edit Profile</a>
                            <div class="dropdown-divider"></div>

                            <form action="{{ route('logout-action') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="feather icon-power"></i> Logout
                                </button>
                            </form>
                            
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
