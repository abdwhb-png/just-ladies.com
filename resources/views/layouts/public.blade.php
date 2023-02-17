<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="Une escort, une masseuse ou une petite amie d&#039;un soir? ❤️ Justladies™ sélectionne et photographie les modèles indépendantes de Suisse jusqu&#039;en France">
    <meta name="keywords" content="">
    <meta name="robots" content="index" />
    <meta name="robots" content="follow" />

    <meta name="viewport" content="width=device-width, user-scalable=no" />

    <!-- Fonts -->
    <script src="https://kit.fontawesome.com/d1faa25a2e.js" crossorigin="anonymous"></script>

    <title>@yield('title')</title>

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/griffe.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/griffe.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class=" md:overflow-y-scroll  ">
    <div id="mobile" class="block sm:hidden"></div>
    <div>
        <!---->
        <nav id="main-navigation" class="navbar-wrapper" style="margin-bottom: 0px;">
            <div class="w-full md:container md:mx-auto">
                <div id="desktop-logo">
                    <div class="flex flex-col items-center justify-center mx-auto">
                        <a href="{{ route('/') }}" title="JustLadies"><img id="logo-light" src="{{ asset('img/jl-logo.png') }}" alt="JustLadies Logo"> <img id="logo-dark" src="{{ asset('img/jl-logo.png') }}" alt="JustLadies Logo"></a>
                    </div>
                </div>
                <div id="nav-links" class="flex justify-between items-center w-full">
                    <div class="hidden md:block w-1/3">
                        <ul class="flex justify-start space-x-9 text-sm">
                            <li><a href="{{ route('/') }}">
							Les escorts						</a></li>
                        </ul>
                    </div>
                    <div class="w-full md:w-1/3">
                        <ul class="flex justify-between items-center md:justify-end md:space-x-8">
                            <li class="md:hidden text-lg "><a href="{{ route('/') }}"><i class="fak fa-c-search"></i></a></li>
                            <li class="text-lg ">
                                <a class="cursor-pointer" href="{{ route('chat') }}">
                                    <div class="relative"><i class="fak fa-c-chat"></i>
                                        <!---->
                                    </div>
                                </a>
                            </li>
                            <li class="text-lg "><a href="@if(!Auth::user())
																{{ route('login') }}
															@else
																@if(Auth::user()->role_id == 1)  {{ route('admin') }}
																@elseif(Auth::user()->role_id == 2) {{ route('admin') }}
																@elseif(Auth::user()->role_id == 3) {{ route('users.escort.index') }}
																@elseif(Auth::user()->role_id == 4) {{ route('users.member.index') }} @else {{ route('login') }}
																@endif
															@endif"><i class="fak fa-c-user"></i></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        @yield('content')


    </div>

    <script src="https://www.bemygirl.ch/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="https://www.bemygirl.ch/build/js/app.js?id=9365b1004fcce5d65380" type="text/javascript"></script>

    <script type="text/javascript">
        function contact() {
            $('.contactModal').trigger('click');
        }
    </script>
    <script type="text/javascript">
        // Used on profile.header (top-bar, stats), profile-gallery (top-bar), paid-content-gallery (top-bar)
        function goBack(linkBack) {
            const referrerIsFromBmg = document.referrer.includes(document.location.origin)
            if (referrerIsFromBmg) {
                window.history.back()
            } else {
                window.location.href = linkBack
            }
        }
    </script>


    <script>
        $(window).scroll(function(e) {
            const nav = $('#profile-gallery');
            const scrollYPosition = $(window).scrollTop()
            if (nav.offset() && nav.offset().top !== 0) {
                if (scrollYPosition > 10) {
                    $('#profile-gallery').addClass('md:shadow')
                } else {
                    $('#profile-gallery').removeClass('md:shadow')
                }
            }
        });
    </script>

</body>

</html>