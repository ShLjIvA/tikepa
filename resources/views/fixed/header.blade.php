<!-- Start Header Area -->
<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{route('home')}}"><img src="{{asset('img/logo.png')}}" alt="Logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        @foreach ($links as $link)
                            @if(!$link->admin)
                                <li class="nav-item @if(request()->routeIs($link->name)) active @endif"><a class="nav-link" href="{{ route($link->name) }}">{{$link->title}}</a></li>
                            @else
                                @if(Session::has('user') && Session::get('user')->admin)
                                    <li class="nav-item @if(request()->routeIs($link->name)) active @endif"><a class="nav-link" href="{{ route($link->name) }}">{{$link->title}}</a></li>
                                @endif
                            @endif
                        @endforeach
                            @if(session()->has('user'))
                                <li class="nav-item"><a class="nav-link" href="{{ route('doLogout') }}">Logout</a></li>
                            @else
                                <li class="nav-item @if(request()->routeIs('login')) active @endif"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            @endif
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item @if(request()->routeIs('cart')) active @endif"><a href="{{ route('cart') }}" class="cart"><span class="ti-bag"></span></a></li>
                        <li class="nav-item">
                            <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container">
            <form class="d-flex justify-content-between">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
<!-- End Header Area -->
