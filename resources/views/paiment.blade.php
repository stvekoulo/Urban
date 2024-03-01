<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'UrbanHaul') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('urbanhaul/assets/img/favicons/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('urbanhaul/assets/img/favicons/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72"
        href="{{ asset('urbanhaul/assets/img/favicons/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76"
        href="{{ asset('urbanhaul/assets/img/favicons/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assetassets/img/favicons/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120"
        href="{{ asset('urbanhaul/assets/img/favicons/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144"
        href="{{ asset('urbanhaul/assets/img/favicons/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152"
        href="{{ asset('urbanhaul/assets/img/favicons/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('urbanhaul/assets/img/favicons/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('urbanhaul/assets/img/favicons/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('urbanhaul/assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96"
        href="{{ asset('urbanhaul/assets/img/favicons/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('urbanhaul/assets/img/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('urbanhaul/assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('urbanhaul/assets/img/favicons/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
 Google Fonts
 ============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Radio+Canada:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!--==============================
 All CSS File
 ============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('urbanhaul/assets/css/bootstrap.min.css') }}">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="{{ asset('urbanhaul/assets/css/fontawesome.min.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('urbanhaul/assets/css/magnific-popup.min.css') }}">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{ asset('urbanhaul/assets/css/slick.min.css') }}">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{ asset('urbanhaul/assets/css/jquery.datetimepicker.min.css') }}">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('urbanhaul/assets/css/style.css') }}">

    <style>
        button {
            padding: 0;
            margin: 0;
            border: none;
            background: none;
            cursor: pointer;
        }

        button {
            --primary-color: #111;
            --hovered-color: #c84747;
            position: relative;
            display: flex;
            font-weight: 600;
            font-size: 20px;
            gap: 0.5rem;
            align-items: center;
        }

        button p {
            margin: 0;
            position: relative;
            font-size: 20px;
            color: var(--primary-color);
        }

        button::after {
            position: absolute;
            content: "";
            width: 0;
            left: 0;
            bottom: -7px;
            background: var(--hovered-color);
            height: 2px;
            transition: 0.3s ease-out;
        }

        button p::before {
            position: absolute;
            /*   box-sizing: border-box; */
            content: "Subscribe";
            width: 0%;
            inset: 0;
            color: var(--hovered-color);
            overflow: hidden;
            transition: 0.3s ease-out;
        }

        button:hover::after {
            width: 100%;
        }

        button:hover p::before {
            width: 100%;
        }

        button:hover svg {
            transform: translateX(4px);
            color: var(--hovered-color);
        }

        button svg {
            color: var(--primary-color);
            transition: 0.2s;
            position: relative;
            width: 15px;
            transition-delay: 0.2s;
        }
    </style>

</head>

<body class="">

    <!--==============================
    preloader
  ============================== -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="loading-window">
                <div class="car">
                    <div class="strike"></div>
                    <div class="strike strike2"></div>
                    <div class="strike strike3"></div>
                    <div class="strike strike4"></div>
                    <div class="strike strike5"></div>
                    <div class="car-detail spoiler"></div>
                    <div class="car-detail back"></div>
                    <div class="car-detail center"></div>
                    <div class="car-detail center1"></div>
                    <div class="car-detail front"></div>
                    <div class="car-detail wheel"></div>
                    <div class="car-detail wheel wheel2"></div>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
Mobile Menu
============================== -->
    <div class="th-menu-wrapper">
        <div class="th-menu-area text-center">
            <button class="th-menu-toggle "><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="{{ route('welcome') }}"><img src="{{ asset('urbanhaul/assets/img/logo.svg') }}"
                        alt="UrbanHaul"></a>
            </div>
            <div class="th-mobile-menu">
                <ul>
                    <li class="menu-item-has-children">
                        <a href="{{ route('welcome') }}">Acceuil</a>
                    </li>
                    <li>
                        <a href="{{ route('aboutus') }}">A propos</a>
                    </li>
                    <li>
                        <a href="{{ route('contactus') }}">Contact</a>
                    </li>
                    <li>
                        <a href="{{ route('paiement') }}">Paiement</a>
                    </li>
                </ul>
                @if (Route::has('login'))
                    @auth
                        {{ Auth::user()->name }}
                        <ul>
                            <li><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Se
                                    déconnecter</a></li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <button>
                            <a href="{{ route('login') }}">Se connecter</a>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>
                        @if (Route::has('register'))
                            <button>
                                <a href="{{ route('register') }}">S'inscrire</a>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3">
                                    </path>
                                </svg>
                            </button>
                        @endif
                    @endauth
                @endif

            </div>
        </div>

    </div>

    <!--==============================
Sidemenu
============================== -->
    <div class="sidemenu-wrapper d-none d-lg-block  ">
        <div class="sidemenu-content bg-title">
            <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
            <div class="widget footer-widget">
                <h3 class="widget_title">À propos de l'entreprise</h3>
                <div class="th-widget-about">
                    <p class="footer-text">UrbanHaul vous offre une solution de transport fiable et rapide pour vos
                        déplacements en ville, connectant les passagers à une communauté de chauffeurs qualifiés à
                        proximité.</p>
                    <a href="{{ route('contactus') }}" class="th-btn style3"><span
                            class="btn-text">Contactez-nous</span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="popup-search-box d-none d-lg-block">
        <button class="searchClose"><i class="fal fa-times"></i></button>
        <form action="#">
            <input type="text" placeholder="What are you looking for">
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div>

    <!--==============================
Header Area
==============================-->
    <header class="th-header header-layout7">
        <div class="top-area" data-bg-src="{{ asset('urbanhaul/assets/img/bg/header_bg_1.png') }}">
            <div class="header-top">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-between align-items-center">
                        <div class="col-auto">
                        </div>
                        <div class="col-auto d-none d-md-block">
                            @if (Route::has('login'))
                                <div class="header-links">
                                    <ul>
                                        @auth
                                            <li><i class="far fa-user"></i>{{ Auth::user()->name }}
                                                <ul>
                                                    <li><a href="{{ route('logout') }}"
                                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Se
                                                            déconnecter</a></li>
                                                </ul>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        @else
                                            <li><i class="far fa-user"></i><a href="{{ route('login') }}">Se
                                                    connecter</a></li>
                                            @if (Route::has('register'))
                                                <li><i class="far fa-user"></i><a
                                                        href="{{ route('register') }}">S'inscrire</a></li>
                                            @endif
                                        @endauth
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Menu -->
        <div class="sticky-wrapper">
            <div class="menu-area">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <div class="header-logo">
                                <a href="{{ route('welcome') }}"><img
                                        src="{{ asset('urbanhaul/assets/img/logo3.svg') }}" alt="UrbanHaul"></a>
                            </div>
                        </div>
                        <div class="col-auto me-xl-auto">
                            <nav class="main-menu d-none d-lg-block">
                                <ul>
                                    <li>
                                        <a href="{{ route('welcome') }}">Acceuil</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('aboutus') }}">A propos</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contactus') }}">Contact</a>
                                    </li>
                                    @auth
                                        <li>
                                            <a href="{{ route('paiement') }}">Paiements</a>
                                        </li>
                                    @endauth
                                </ul>
                            </nav>
                            <button class="th-menu-toggle  d-inline-block d-lg-none"><i
                                    class="far fa-bars"></i></button>
                        </div>
                        <div class="col-auto d-none d-xl-block">
                            <div class="header-button">
                                @auth
                                    <button type="button" class="icon-btn searchBoxToggler"><i
                                            class="far fa-search"></i></button>
                                @endauth
                                <a href="#" class="icon-btn sideMenuToggler"><i class="far fa-bars"></i></a>
                                @auth
                                    <a href="#" class="th-btn" id="findAgentButton">Trouver Un agent<i
                                            class="fa-regular fa-arrow-right ms-2"></i></a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="logo-shape"><img src="{{ asset('urbanhaul/assets/img/logo-shape.svg') }}" alt=""></div>
        <!-- Modal pour la sélection du service -->
        <div class="modal fade" id="agentServiceModal" tabindex="-1" aria-labelledby="agentServiceModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="agentServiceModalLabel">Sélectionner le service requis</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="agentServiceForm" action="{{ route('searchagent') }}" method="GET">
                            @csrf
                            <div class="mb-3">
                                <label for="serviceType" class="form-label">Choisissez le type de service :</label>
                                <select class="form-select" id="serviceType" name="serviceType">
                                    <option value="livreur">Livreur</option>
                                    <option value="transporteur">Transporteur</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Rechercher un agent</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="space">
        @if(session()->has('messageTransaction'))
            <div class="alert alert-success">
                {{ session('messageTransaction') }}
            </div>
        @endif

        <div class="container">
            <div class="tinv-wishlist woocommerce tinv-wishlist-clear">
                <div class="tinv-header">
                    <h2 class="mb-30">Mes Services</h2>
                </div>
                <form action="#" method="post" autocomplete="off">
                    <table class="tinvwl-table-manage-list">
                        <thead>
                            <tr>
                                <th class="product-name">Nom du Service</th>
                                <th class="product-price">Prix</th>
                                <th class="product-agent">Agent</th>
                                {{-- <th class="product-agent">Payé</th> --}}
                                <th class="product-action">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                                <tr class="wishlist_item">
                                    <td class="product-name">
                                        {{ $service->notification->service_type }}
                                    </td>
                                    <td class="product-price">
                                        CFA {{ $service->prix }}
                                    </td>
                                    <td class="product-agent">
                                        {{ $service->notification->agent_id}}
                                    </td>
                                    {{-- <td class="product-agent">
                                        {{ $service->paye }}
                                    </td> --}}
                                    <td class="product-action">
                                        <a href="{{ route('payMyFeda', ['id' => $service->id]) }}"
                                            class="button th-btn" name="pay-now" value="{{ $service->id }}"
                                            title="Payez maintenant">
                                            <i class="fal fa-money-bill-wave"></i><span class="tinvwl-txt">Payez
                                                maintenant</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>

                </table>
                </form>
            </div>
        </div>
    </div>
    <!--==============================
   Footer Area
 ==============================-->
    <footer class="footer-wrapper footer-layout7"
        data-bg-src="{{ asset('urbanhaul/assets/img/bg/footer_bg_1.jpg') }}">
        <div class="widget-area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <div class="th-widget-about">
                                <div class="about-logo">
                                    <a href="index.html"><img
                                            src="{{ asset('urbanhaul/assets/img/logo-white3.svg') }}"
                                            alt="Taxiar"></a>
                                </div>
                                <p class="about-text">Centric applications productize front end portals visualize front
                                    end is results and value added</p>
                                <div class="working-time">
                                    <span class="title">WE ARE AVAILABLE</span>
                                    <p class="desc">Mon-Sat: 09.00 am to 6.30 pm</p>
                                </div>
                                <div class="th-social  footer-social">
                                    <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                                    {{-- <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="https://www.behance.net/"><i class="fa-brands fa-behance"></i></a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-2">
                        <div class="widget widget_nav_menu  footer-widget">
                            <h3 class="widget_title">Quick link</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li><a href="/">Acceuil</a></li>
                                    <li><a href="#AboutSection">A propos</a></li>
                                    <li><a href="#ContactSection">Contact</a></li>
                                    {{-- <li><a href="#ServiceSection">Nos services</a></li>
                                    <li><a href="#MembersSection">Membres</a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">Contact Details</h3>
                            <div class="th-widget-about">
                                <h4 class="footer-info-title">Phone Number</h4>
                                <p class="footer-info"><i class="fa-sharp fa-solid fa-phone"></i><a class="text-inherit"
                                        href="tel:+468254762443">+468 254 762 443</a></p>
                                <h4 class="footer-info-title">Email Address</h4>
                                <p class="footer-info"><i class="fas fa-envelope"></i><a class="text-inherit"
                                        href="mailto:info@Taxiar@email.com">Taxiarinfo@taxiar.com</a></p>
                                <h4 class="footer-info-title">Office Location</h4>
                                <p class="footer-info"><i class="fas fa-map-marker-alt"></i>25 Street, 145 City Road New
                                    Town DD14, USA</p>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="col-md-6 col-xl-3">
                        <div class="widget footer-widget">
                            <h4 class="widget_title">Newsletter</h4>
                            <div class="newsletter-widget">
                                <p class="md-20">Sign Up to get updates & news about us . Get Latest Deals from Walker's
                                    Inbox to our mail address.</p>
                                <div class="footer-search-contact mt-25">
                                    <form>
                                        <input class="form-control" type="email" placeholder="Enter your email">
                                    </form>
                                    <div class="footer-btn mt-10">
                                        <button type="submit" class="th-btn style3 fw-btn">Subscribe Now <i
                                                class="fa-regular fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="copyright-wrap">
            <div class="container">
                <p class="copyright-text">© 2023 <a href="https://themeforest.net/user/themeholy">Taxiar</a>. All
                    Rights
                    Reserved.</p>
            </div>
        </div>
        <div class="footer-shape"><img src="{{ asset('urbanhaul/assets/img/shape/footer_shape.png') }}"
                alt="shape">
        </div>
    </footer>


    <!--********************************
   Code End  Here
 ******************************** -->

    <!-- Scroll To Top -->
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
            </path>
        </svg>
    </div>

    <!--==============================
    All Js File
============================== -->
    <!-- Jquery -->
    <script src="{{ asset('urbanhaul/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('urbanhaul/assets/js/slick.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('urbanhaul/assets/js/bootstrap.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('urbanhaul/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Counter Up -->
    <script src="{{ asset('urbanhaul/assets/js/jquery.counterup.min.js') }}"></script>
    <!-- Isotope Filter -->
    <script src="{{ asset('urbanhaul/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('urbanhaul/assets/js/isotope.pkgd.min.js') }}"></script>
    <!-- Nice Select -->
    <script src="{{ asset('urbanhaul/assets/js/nice-select.min.js') }}"></script>
    <!-- Date Time Picker -->
    <script src="{{ asset('urbanhaul/assets/js/jquery.datetimepicker.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- Wow -->
    <script src="{{ asset('urbanhaul/assets/js/wow.min.js') }}"></script>
    <!-- Main Js File -->
    <script src="{{ asset('urbanhaul/assets/js/main.js') }}"></script>

    <script src="{{ asset('/sw.js') }}"></script>

    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function(reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>

    <script>
        document.getElementById('findAgentButton').addEventListener('click', function() {
            $('#agentServiceModal').modal('show');
        });
    </script>

</body>

</html>
