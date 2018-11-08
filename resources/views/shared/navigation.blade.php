<nav class="navbar navbar-expand-lg navbar-light navbar-fixed-top">
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
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/shop">SHOP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">CONTACT</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropbtn">
                        MANAGE
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-content">
                        <li>
                            <a class="dropdown-a" href="/souvenirs">Souvenir</a>
                        </li>
                        <li>
                            <a class="dropdown-a" href="/suppliers">Supplier</a>
                        </li>
                        <li>
                            <a class="dropdown-a" href="/categories">Category</a>
                        </li>
                    </ul>
                </li>

            </ul>

        </div>
        <!-- </div> -->
    </div>
</nav>