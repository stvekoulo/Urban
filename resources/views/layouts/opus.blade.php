<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'UrbanHaul') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('urbanhaul/assets/img/favicons/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('urbanhaul/assets/img/favicons/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('urbanhaul/assets/img/favicons/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('urbanhaul/assets/img/favicons/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('assetassets/img/favicons/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('urbanhaul/assets/img/favicons/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('urbanhaul/assets/img/favicons/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('urbanhaul/assets/img/favicons/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('urbanhaul/assets/img/favicons/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('urbanhaul/assets/img/favicons/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('urbanhaul/assets/img/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('urbanhaul/assets/img/favicons/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('urbanhaul/assets/img/favicons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('urbanhaul/assets/img/favicons/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('urbanhaul/assets/img/favicons/ms-icon-144x144.png')}}">
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
    <link rel="stylesheet" href="{{asset('urbanhaul/assets/css/bootstrap.min.css')}}">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="{{asset('urbanhaul/assets/css/fontawesome.min.css')}}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{asset('urbanhaul/assets/css/magnific-popup.min.css')}}">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{asset('urbanhaul/assets/css/slick.min.css')}}">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{asset('urbanhaul/assets/css/jquery.datetimepicker.min.css')}}">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{asset('urbanhaul/assets/css/style.css')}}">

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

    @include('layouts.partials.header')

    @yield('content')

    @include('layouts.partials.footer')


    <!--==============================
    All Js File
============================== -->
    <!-- Jquery -->
    <script src="{{asset('urbanhaul/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <!-- Slick Slider -->
    <script src="{{asset('urbanhaul/assets/js/slick.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('urbanhaul/assets/js/bootstrap.min.js')}}"></script>
    <!-- Magnific Popup -->
    <script src="{{asset('urbanhaul/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- Counter Up -->
    <script src="{{asset('urbanhaul/assets/js/jquery.counterup.min.js')}}"></script>
    <!-- Isotope Filter -->
    <script src="{{asset('urbanhaul/assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('urbanhaul/assets/js/isotope.pkgd.min.js')}}"></script>
    <!-- Nice Select -->
    <script src="{{asset('urbanhaul/assets/js/nice-select.min.js')}}"></script>
    <!-- Date Time Picker -->
    <script src="{{asset('urbanhaul/assets/js/jquery.datetimepicker.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>




    <!-- Wow -->
    <script src="{{asset('urbanhaul/assets/js/wow.min.js')}}"></script>
    <!-- Main Js File -->
    <script src="{{asset('urbanhaul/assets/js/main.js')}}"></script>

    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function (reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>

    <script>
        document.getElementById('findAgentButton').addEventListener('click', function() {
            $('#agentServiceModal').modal('show');
        });
    </script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sendRequestLinks = document.querySelectorAll('.send-request-btn');

        sendRequestLinks.forEach(link => {
            link.addEventListener('click', function (event) {
                event.preventDefault();

                const agentId = link.getAttribute('data-agent-id');
                const userId = {{ Auth::id() }};

                sendRequestToAgent(agentId, userId);
            });
        });

        function sendRequestToAgent(agentId, userId) {

            axios.post('/envoyer-demande/' + agentId, { user_id: userId })
                .then(response => {
                    if (response.data.success) {
                        alert(response.data.message);
                    } else {
                        alert(response.data.message);
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        }
    });
</script>

</body>

</html>
