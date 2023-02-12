<!DOCTYPE html>
<html lang="fr">

<!-- Mirrored from www.bemygirl.ch/fr/login by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Aug 2022 13:53:28 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="2Zcu7P4IfYTwOZyusK17iczmeNLhQp0LSehliKyu">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="noindex" />
    <meta name="robots" content="nofollow" />

    <meta name="viewport" content="width=device-width, user-scalable=no" />

    <!-- Fonts -->
    <script src="https://kit.fontawesome.com/d1faa25a2e.js" crossorigin="anonymous"></script>

    <title>@yield('title')</title>

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/griffe.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/griffe.png') }}">
    

    <link rel="stylesheet" href="https://www.bemygirl.ch/lib/vue-multiselect/vue-multiselect.min.css">
    </style>
    <link rel="stylesheet" href="https://www.bemygirl.ch/build/css/app.css?id=5f3368e3ec55c498901c">
</head>

<body class=" m-0 p-0 login-wrapper flex items-center justify-center min-h-screen">

    <div id="mobile" class="block sm:hidden"></div>
    <div id="app" class="flex items-center justify-center w-full h-full overflow-y-auto">

        <stories-viewer ref="storiesViewer" :stories='[]' locale="fr"></stories-viewer>

        <a href="/"
            class="btn-secondary transparent mini absolute hidden md:block top-8 left-8"><span
                class="inline-flex h-full justify-center items-center font-semibold text-white">Retour à
                l'accueil</span></a>
       @yield('content')
    </div>
    <modal id="become-member-advantages" ref="becomeMemberAdvantages" role="dialog" aria-labelledby="modalTitle"
        aria-describedby="modalDescription" tabindex="-1" :no-body-padding="true">
        <template v-slot:body="{ intended }">
            <div id="step1"
                class="flex flex-col justify-between items-center py-16 px-4 min-h-screen md:min-h-full w-full overflow-y-auto">
                <div>
                    <img src="https://www.bemygirl.ch/images/B-logo.svg" alt="JustLadies Logo">
                </div>
                <span class="strong text-center w-2/3 max-w-50 my-6 text-xl">Devenir membre</span>
                <ul class="p-0 m-0 w-full sm:max-w-98">
                    <li class="flex mb-5 md:text-center">
                        <span><i class="fak fa-c-check text-2xl text-primary mr-2"></i></span> <span>Données 100%
                            confidentielles</span>
                    </li>
                    <li class="flex mb-5">
                        <span><i class="fak fa-c-check text-2xl text-primary mr-2"></i></span> <span>Voir toutes les
                            stories</span>
                    </li>
                    <li class="flex mb-5">
                        <span><i class="fak fa-c-check text-2xl text-primary mr-2"></i></span> <span>Envoyer des
                            messages privés</span>
                    </li>
                    <li class="flex mb-5">
                        <span><i class="fak fa-c-check text-2xl text-primary mr-2"></i></span> <span>Suivre vos escorts
                            préférées</span>
                    </li>
                    <li class="flex mb-5">
                        <span><i class="fak fa-c-check text-2xl text-primary mr-2"></i></span> <span>Voir la date des
                            shootings</span>
                    </li>
                    <li class="flex mb-5">
                        <span><i class="fak fa-c-check text-2xl text-primary mr-2"></i></span> <span>Accéder aux
                            contenus privés exclusifs</span>
                    </li>
                </ul>
                <div class="flex flex-col w-full sm:max-w-98">
                    <a href="members/register/"
                        class="btn-primary">S'inscrire gratuitement</a>
                    <a href="login"
                        class="btn-secondary mt-2">Se connecter</a>
                </div>
            </div>
        </template>
    </modal>
    </div>
    <script src="https://www.bemygirl.ch/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="https://www.bemygirl.ch/build/js/app.js?id=fa4467cc272a080e6593" type="text/javascript"></script>

    <script type="text/javascript">
        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }
        $('#accept-cgu').click(async function () {
            $('body').removeClass('overflow-hidden');
            $('#cgu').remove();
        })
    </script>
</body>

<!-- Mirrored from www.bemygirl.ch/fr/login by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Aug 2022 13:53:28 GMT -->

</html>