<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>iGameShop - Tienda en línea</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">


   <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    @livewireStyles
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{ asset('img/logo.png') }}" alt=""></a>
        </div>
        <div class="humberger__menu__widget">
            <!-- <div class="header__top__right__language">
                <img src="{{ asset('img/language.png') }}" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div> -->
            <div class="header__top__right__auth">
            @if(Route::has('login'))
                                    @auth
                                        @if(Auth::user()->role === 'adm')
                                        <div><a href="{{ route('admin.dashboard') }}"><i class="fa fa-user"></i> {{ Auth::user()->name }}</a></div>
                                            <span class="arrow_carrot-down"></span>
                                            <ul>
                                                <li><a href="{{ route('admin.dashboard') }}">Escritorio</a></li>
                                                <li><a href="#" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Salir</a></li>
                                                
                                            </ul>
                                        @else
                                        <div><a href="{{ route('user.dashboard') }}"><i class="fa fa-user"></i> {{ Auth::user()->name }}</a></div>
                                            <span class="arrow_carrot-down"></span>
                                            <ul>
                                            <li><a href="{{ route('user.dashboard') }}">Cuenta</a></li>
                                                <li><a href="#"  onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Salir</a></li>
                                            </ul>
                                        @endif
                                        <form id="form-logout" method="POST" action="{{ route('logout') }}">
                                            @csrf
                                        </form>
                                    @else
                                        <a href="/login"><i class="fa fa-user"></i> Iniciar sesión</a>
                                    @endif
                                @endif
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="/">Inicio</a></li>
                <li><a href="/contact">Contacto</a></li>
                <li><a href="#"  style="color: #f00000;" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Salir</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> support@email.com</li>
                <li>Envío gratis a todo el país</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> support@email.com</li>
                                <li>Envío gratis a todo el país</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <!-- <div class="header__top__right__language">
                                <img src="{{ asset('img/language.png') }}" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div> -->
                            <div class="header__top__right__auth">
                                @if(Route::has('login'))
                                    @auth
                                        @if(Auth::user()->role === 'adm')
                                        <div><a href="{{ route('admin.dashboard') }}"><i class="fa fa-user"></i> {{ Auth::user()->name }}</a></div>
                                            <span class="arrow_carrot-down"></span>
                                            <ul>
                                                <li><a href="{{ route('admin.dashboard') }}">Escritorio</a></li>
                                                <li><a href="#" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Salir</a></li>
                                                
                                            </ul>
                                        @else
                                        <div><a href="{{ route('user.dashboard') }}"><i class="fa fa-user"></i> {{ Auth::user()->name }}</a></div>
                                            <span class="arrow_carrot-down"></span>
                                            <ul>
                                            <li><a href="{{ route('user.dashboard') }}">Escritorio</a></li>
                                                <li><a href="#"  onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Salir</a></li>
                                            </ul>
                                        @endif
                                        <form id="form-logout" method="POST" action="{{ route('logout') }}">
                                            @csrf
                                        </form>
                                    @else
                                        <a href="/login"><i class="fa fa-user"></i> Iniciar sesión</a>
                                    @endif
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="/"><img src="{{ asset('img/logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li @if(Route::currentRouteName() === 'all.products') class="active" @else class="class-name" @endif><a href="/">Inicio</a></li>
                    
                            <li @if(Route::currentRouteName() === 'contact') class="active" @else class="class-name" @endif><a href="/contact">Contacto</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    @livewire('cart-counter')
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{ route('search.products') }}" >
                                
                                <input name="search" type="text" placeholder="Buscar">
                                <button type="submit" class="site-btn">BUSCAR</button>
                            </form>
                        </div>
                        <!-- <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div> -->
                    </div>
                    <!-- <div class="hero__item set-bg" data-setbg="{{ asset('img/hero/banner.jpg') }}">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    {{ $slot }}

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos lode derechos reservados.</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="{{ asset('img/payment-item.png') }}" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script> -->
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @livewireScripts

</body>

</html>