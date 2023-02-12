<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="9TaupVWP12R37TZrBvCoMiULdApbnnRNrJSzqh3P">
    <meta name="description"
        content="Une escort, une masseuse ou une petite amie d&#039;un soir? ❤️ Justladies™ sélectionne et photographie les modèles indépendantes de Suisse jusqu&#039;en France">
    <meta name="keywords" content="">
    <meta name="robots" content="index" />
    <meta name="robots" content="follow" />

    <meta name="viewport" content="width=device-width, user-scalable=no" />

    <!-- Fonts -->
    <script src="https://kit.fontawesome.com/06e28f27a4.js" crossorigin="anonymous"></script>

    <title>Mon compte JustLadies</title>

    <link rel="canonical" href="https://www.bemygirl.ch/fr/member">
    <link rel="alternate" hreflang="x-default" href="https://www.bemygirl.ch/fr/member" />
    <link rel="alternate" hreflang="fr" href="https://www.bemygirl.ch/fr/member" />
    <link rel="alternate" hreflang="en" href="https://www.bemygirl.ch/en/member" />
    <link rel="alternate" hreflang="es" href="https://www.bemygirl.ch/es/member" />
    <link rel="alternate" hreflang="de" href="https://www.bemygirl.ch/de/member" />

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/griffe.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/griffe.png') }}">
    <link rel="manifest" href="https://www.bemygirl.ch/images/favicons/site.webmanifest"> 
    <meta name="theme-color" content="#ffe6ce">

    <link rel="stylesheet" href="https://www.bemygirl.ch/lib/vue-multiselect/vue-multiselect.min.css">
    </style>
    <link rel="stylesheet" href="https://www.bemygirl.ch/build/css/app.css?id=5f3368e3ec55c498901c">

    <link rel="stylesheet" href="https://www.bemygirl.ch/lib/fancybox/jquery.fancybox.min.css">
</head>

<body class=" overflow-y-scroll  ">
    <div id="app" class="h-screen">

        <stories-viewer ref="storiesViewer" :stories='[]' locale="fr"></stories-viewer>
        <nav id="main-navigation" class=" shadow shrink  navbar-wrapper"><img id="header-bg" src="/storage/bafd652d2e9032fa048c677f7387ee81/escort-zurich-geneve-12.jpg" alt="">
        <div class="w-full md:container md:mx-auto">
            <div id="desktop-logo">
                <div class="flex flex-col items-center justify-center mx-auto"><a href="https://www.bemygirl.ch/fr" title="BeMyGirl"><img id="logo-light" src="hhttp://127.0.0.1:8000/img/auth_logo.png" alt="BeMyGirl Logo"> <img id="logo-dark" src="http://127.0.0.1:8000/img/auth_logo.png" alt="BeMyGirl Logo"></a></div>
            </div>
            <div id="nav-links" class="flex justify-between items-center w-full">
                <div class="hidden md:block w-1/3">
                    <ul class="flex justify-start space-x-9 text-sm">
                        <li><a href="/">
                                Les escorts </a></li>
                    </ul>
                </div>
                <div class="w-full md:w-1/3">
                    <ul class="flex justify-between items-center md:justify-end md:space-x-8">
                        <li class="md:hidden text-lg "><a href="{{ route('/') }}"><i aria-hidden="true" class="fak fa-c-search"></i></a></li>
                        <li class="text-lg  active "><a href="{{ route('chat') }}" class="cursor-pointer">
                                <div class="relative"><i aria-hidden="true" class="fak fa-c-chat"></i>
                                    <!---->
                                </div>
                            </a></li>
                        <li class="text-lg "><a href="@if(!Auth::user())
																{{ route('login') }}
															@else
																@if(Auth::user()->role_id == 1)  {{ route('admin') }}
																@elseif(Auth::user()->role_id == 2) {{ route('admin') }}
																@elseif(Auth::user()->role_id == 3) {{ route('users.escort.index') }}
																@elseif(Auth::user()->role_id == 4) {{ route('users.member.index') }} @else {{ route('login') }}
																@endif
															@endif"><i aria-hidden="true" class="fak fa-c-user"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

        <div class="flex flex-1 pb-20 md:mb-0 md:container md:mx-auto">
            <div class="w-full h-full">
                <!-- LOAD -->
                <div id="load" class="w-full h-full flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="animate-spin h-5 w-5 flex justify-center items-center">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" class="opacity-25">
                        </circle>
                        <path fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                            class="opacity-75"></path>
                    </svg>
                </div>

                <!-- DASH -->
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://www.bemygirl.ch/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="https://www.bemygirl.ch/build/js/app.js?id=fa4467cc272a080e6593" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            function closeAllModal(){
                $('#dash_options_dropdown').hide();
                $('#wallet_modal').hide();
                $('#parameters_modal').hide();
                $('#user_modify_password_alert').hide();
            }

            setTimeout(
                function load() {
                    $('#load').hide();
                    $('#dash').fadeIn(500);
                },
                500);

			$('#dash_options_button').click(function(){
				$('#dash_options_dropdown').show();
			});
            $('#wallet_modalBtn').click(function() {
                $('#wallet_modal').show();
            });
			$('#parametersButton').click(function(){
				$('#parameters_modal').show();
			});
			$('#user_modify_password_button').click(function(){
				$('#user_modify_password_alert').show();
			});
            $('.modal__close').click(function(){
                closeAllModal();
            });
        })
    </script>

    <script>
        const navHeight = $('#main-navigation').outerHeight()
        $(window).scroll(function (e) {
            const scrollYPosition = $(window).scrollTop()
            const isDesktop = $('#desktop-logo').is(":visible");
            if (isDesktop) {
                if (scrollYPosition > navHeight) {
                    $('#main-navigation').addClass('shrink').css('margin-bottom', navHeight + 'px')
                    // $('footer').removeClass('md:pb-28').addClass('md:pb-16')
                } else {
                    $('#main-navigation').removeClass('shrink').css('margin-bottom', '0px')
                    // $('footer').removeClass('md:pb-16').addClass('md:pb-28')
                }
            } else {
                $('#main-navigation').removeClass('shrink').css('margin-bottom', '0px')
            }
        });
    </script>

</body>

</html>