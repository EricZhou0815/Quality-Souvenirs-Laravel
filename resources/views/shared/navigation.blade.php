<nav
    class="nav navbar navbar-expand-md navbar-light navbar-fixed-top navbar-right">
    <div class="container-fluid">
        <!--<div class="container">-->
        <div class="myLogo navbar-brand">
            <a href="/">
                <div class="logoContainer">
                    <img class="myLogoImage" src="{{url('/favicon.png')}}" alt="Pono"/>
                    <div class="logoText">Quality Souvenirs</div>
                </div>
            </a>
        </div>
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#myNavbarDropdown"
            aria-controls="myNavbarDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="myNavbarDropdown">
            <ul class="navbar-nav ml-auto nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/shop">SHOP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">CONTACT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/souvenirs/getCart"><i class="fas fa-shopping-cart"></i> <span class="badge" id="cartItemCount">{{Session::has('cart')?Session::get('cart')->totalQuantity:''}}</span></a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                @endif 

                @if (Auth::check() && Auth::user()->type == "admin")
                <li class="nav-item dropdown">
                    <a class="nav-link dropbtn">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-content">
                        <li >
                            <a class="dropdown-a" href="/souvenirs">Souvenir</a>
                        </li>
                        <li>
                            <a class="dropdown-a" href="/suppliers">Supplier</a>
                        </li>
                        <li>
                            <a class="dropdown-a" href="/categories">Category</a>
                        </li>
                        <li>
                            <a class="dropdown-a" href="/users">Member</a>
                        </li>
                        <li>
                            <a class="dropdown-a" href="/orders">Order</a>
                        </li>
                    </ul>
                </li>
                @endif

                @if (Auth::check())
                @if (Auth::user()->type == "default")
                <li class="nav-item dropdown">
                        <a class="nav-link dropbtn">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                        <ul class="dropdown-content">
                            <li >
                                <a class="dropdown-a" href="/users/{{Auth::user()->id}}">Account</a>
                            </li>
                            <li>
                                <a class="dropdown-a" href="/orders">Order</a>
                            </li>
                        </ul>
                </li>
                @endif
                
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form
                        id="logout-form"
                        action="{{ route('logout') }}"
                        method="POST"
                        style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                @endif
            </ul>

        </div>

    </div>
</nav>