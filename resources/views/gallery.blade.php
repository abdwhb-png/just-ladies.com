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


    <title>{{ ucfirst(strtolower($escort->name)) }} - escort indépendante {{ $escort->escort->origin }} - Photographiée par JustLadies</title>


    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/griffe.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/griffe.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://www.bemygirl.ch/lib/fancybox/jquery.fancybox.min.css">
</head>

<body class=" ">
    <div id="mobile" class="block sm:hidden"></div>
    <div id="app" class="">

        <div class="full-wrapper">
            <div id=profile-gallery class="sticky top-0 md:px-6 px-2 pt-6 pb-4 bg-white z-10 transition-all -mb-20">
                <div class="flex justify-between align-center">
                    <a id="back-button" href="{{ url()->previous() }}" title="Retour" class="focus:outline-none md:hidden mr-2 pt-1">
                        <button>
                <i class="fak fa-c-arrow-left text-xl md:text-2xl"></i>
            </button>
                    </a>
                    <span class="hidden md:block">
            <a class="btn-secondary mini" href="{{ url()->previous() }}"  title="Retour">
                Retour                
            </a>
        </span>
                    <div class="flex flex-col justify-center flex-shrink overflow-x-hidden">
                        <h2 class="text-xs font-semibold text-center whitespace-nowrap overflow-ellipsis overflow-x-hidden transition duration-200">
                            {{ ucfirst(strtolower($escort->name)) }}
                        </h2>
                        <span class="text-xxs text-gray-700 text-center">
                    {{ $escort->escort->location }}, {{ $escort->escort->country }}
                </span>
                    </div>
                    <button class="md:hidden" v-on:click="$refs.modalContactGirl.openModal()">
                        <i class="fak fa-c-phone text-2xl text-primary"></i>
                    </button>
                    <span class="hidden md:block">
                        <button
            class="btn-primary mini"
                            v-on:click.prevent="$refs.modalContactGirl.openModal()"
                    >
            Contact
        </button>
                        </span>
                </div>
            </div>
           
            <div class="max-w-120 mx-auto mb-20 md:mb-0"> 
                <div id="gallery-item-0" class="pt-20 -mb-20">
                    <a class="fancybox" data-fancybox="gallery"
                        data-caption="© Copyright 2022 JustLadies - Toutes les photos sont réalisées par JustLadies ™"
                        href="{{ asset('storage/'.$escort->avatar) }}">
                        <div class="relative h-0 bg-gray-100" style="padding-bottom: 148.15%" v-lazyload>
                            <img class="absolute inset-0 object-cover w-full max-w-full max-h-full"
                                src="{{ asset('storage/'.$escort->avatar) }}"
                                data-url="{{ asset('storage/'.$escort->avatar) }}"
                                alt="{{ strtolower($escort->name).'-escort-'.strtolower($escort->escort->country).'-'.$escort->id }}">
                            <div class="absolute inset-0"></div>
                        </div>
                    </a>
                    <div class="p-4">
                        <div class="pb-4 flex justify-between">
                            <div>
                
                            </div>
                            <div>
                
                                <share-link ref="share_gallery_item_0" :networks="[
                                            {
                                                name: 'facebook',
                                                label: __('blog.share_facebook'),
                                                icon: 'fab fa-facebook-f'
                                            },
                                            {
                                                name: 'sms',
                                                label: __('blog.share_sms'),
                                                icon: 'far fa-sms'
                                            },
                                            {
                                                name: 'whatsapp',
                                                label: __('blog.share_whatsapp'),
                                                icon: 'fab fa-whatsapp'
                                            },
                                            {
                                                name: 'telegram',
                                                label: __('blog.share_telegram'),
                                                icon: 'fab fa-telegram-plane'
                                            },
                                            {
                                                name: 'twitter',
                                                label: __('blog.share_twitter'),
                                                icon: 'fab fa-twitter'
                                            },
                                            {
                                                name: 'email',
                                                label: __('blog.share_email'),
                                                icon: 'far fa-at'
                                            }
                                        ]" url="{{ route('gallery', ['name' => $escort->name, 'id' => $escort->id]) }}#gallery-item-0"
                                    title="{{ ucfirst(strtolower($escort->name)) }} - escort indépendante {{ $escort->escort->origin }} - Photographiée par JustLadies"
                                    description=""></share-link>
                                <div v-on:click="$refs.share_gallery_item_0.$refs.share_link_alert.openAlert('{{ route('gallery', ['name' => $escort->name, 'id' => $escort->id]) }}#gallery-item-0')"
                                    class="cursor-pointer">
                                    <i class="fak fa-c-share"></i>
                                </div>
                            </div>
                        </div>
                
                    </div>
                </div>
                @foreach ($escort->photos as $photo)
                <div id="gallery-item-{{ $photo->id }}" class="pt-20 -mb-20">
                    <a class="fancybox" data-fancybox="gallery" data-caption="© Copyright 2022 JustLadies - Toutes les photos sont réalisées par JustLadies ™" href="{{ asset('storage/'.$photo->image_path) }}">
                        <div class="relative h-0 bg-gray-100" style="padding-bottom: 148.15%" v-lazyload>
                            <img class="absolute inset-0 object-cover w-full max-w-full max-h-full" src="{{ asset('storage/'.$escort->avatar) }}" data-url="{{ asset('storage/'.$photo->image_path) }}" alt="{{ strtolower($escort->name).'-escort-'.strtolower($escort->escort->country).'-'.$photo->image_name }}">
                            <div class="absolute inset-0"></div>
                        </div>
                    </a>
                    <div class="p-4">
                        <div class="pb-4 flex justify-between">
                            <div>

                            </div>
                            <div>

                                <share-link ref="share_gallery_item_0" :networks="[
                            {
                                name: 'facebook',
                                label: __('blog.share_facebook'),
                                icon: 'fab fa-facebook-f'
                            },
                            {
                                name: 'sms',
                                label: __('blog.share_sms'),
                                icon: 'far fa-sms'
                            },
                            {
                                name: 'whatsapp',
                                label: __('blog.share_whatsapp'),
                                icon: 'fab fa-whatsapp'
                            },
                            {
                                name: 'telegram',
                                label: __('blog.share_telegram'),
                                icon: 'fab fa-telegram-plane'
                            },
                            {
                                name: 'twitter',
                                label: __('blog.share_twitter'),
                                icon: 'fab fa-twitter'
                            },
                            {
                                name: 'email',
                                label: __('blog.share_email'),
                                icon: 'far fa-at'
                            }
                        ]" url="{{ route('gallery', ['name' => $escort->name, 'id' => $escort->id]) }}#gallery-item-{{ $photo->id }}" title="{{ ucfirst(strtolower($escort->name)) }} - escort indépendante {{ $escort->escort->origin }} - Photographiée par JustLadies" description=""></share-link>
                                <div v-on:click="$refs.share_gallery_item_0.$refs.share_link_alert.openAlert('{{ route('gallery', ['name' => $escort->name, 'id' => $escort->id]) }}#gallery-item-{{ $photo->id }}')" class="cursor-pointer">
                                    <i class="fak fa-c-share"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- modals -->
        <modal id="contact-modal" ref="modalContactGirl" role="dialog" aria-labelledby="modalTitle" aria-describedby="modalDescription" tabindex="-1">
            <template v-slot:body>
        <div class="justify-center mt-8 xs:mt-10">
            <div class="flex flex-col justify-center items-center">
                <div
    class="bg-gray-600 rounded-full  relative inline-block "
>
                        <img
                class="h-28 w-28 xs:h-36 xs:w-36 rounded-full object-cover"
                src="{{ asset('storage/'.$escort->avatar) }}"
                alt="{{ ucfirst(strtolower($escort->name)) }}"
            />
                <profile-online-indicator :girl-stamp="'ExoITiFNM5umii1N'" :is-online="false">
            <span class="w-3 h-3 absolute bg-green border-2 border-white top-0 right-0 mt-4 mr-4 rounded-full"></span>
        </profile-online-indicator>
            </div>
                <h2 class="font-bold text-2xl xs:text-2xl mt-4">
                    {{ ucfirst(strtolower($escort->name)) }}
                </h2>
                <span class="text-gray-700 text-sm leading-tight">
                    {{ $escort->escort->location.', '.$escort->escort->country }}
                                    </span>
            </div>

            <div class="mt-8 pb-28">
                <ul class="grid md:flex md:justify-center md:items-center grid-cols-2 gap-0 w-40 xs:w-48 gap-y-6 mx-auto">
                    <li onclick="logContactAttempt('call')" class="flex flex-col items-center justify-center w-20 h-20 xs:w-24 xs:h-24 md:hidden">
    <a
    								    							href="tel:{{ $escort->escort->contact }}"
					target="_blank"
							    	    >
        <div class="flex justify-center items-center w-12 h-12 xs:w-16 xs:h-16 rounded-full bg-tertiary text-primary hover:bg-primary hover:text-tertiary text-xs">
            <i class="fak fa-c-phone fa-2x"></i>
        </div>
    </a>
    <a  target="_blank"  href="tel:{{ $escort->escort->contact }}" >
        <div class="py-2 text-xs text-gray-700">Appel</div>
    </a>    
</li>                    <li onclick="logContactAttempt('sms')" class="flex flex-col items-center justify-center w-20 h-20 xs:w-24 xs:h-24 md:hidden">
    <a
    	    >
        <div class="flex justify-center items-center w-12 h-12 xs:w-16 xs:h-16 rounded-full bg-tertiary text-primary text-xs opacity-40">
            <i class="fak fa-c-sms fa-2x"></i>
        </div>
    </a>
    <a >
        <div class="py-2 text-xs text-gray-700">SMS</div>
    </a>    
</li>                    <li onclick="logContactAttempt('chat')" class="flex flex-col items-center justify-center w-20 h-20 xs:w-24 xs:h-24 ">
    <a
    								    							v-on:click="$refs.becomeMemberAdvantages.openModal('https://www.bemygirl.ch/fr/chat/ExoITiFNM5umii1N/Vika')"
							    	    >
        <div class="flex justify-center items-center w-12 h-12 xs:w-16 xs:h-16 rounded-full bg-tertiary text-primary hover:bg-primary hover:text-tertiary text-xs">
            <i class="fak fa-c-chat fa-2x"></i>
        </div>
    </a>
    <a   href="#" >
        <div class="py-2 text-xs text-gray-700">JL Messenger</div>
    </a>    
</li>                    <li onclick="logContactAttempt('whatsapp')" class="flex flex-col items-center justify-center w-20 h-20 xs:w-24 xs:h-24 md:hidden">
    <a
    								    							href="whatsapp://send?phone={{ $escort->escort->contact }}&amp;text=Hello+{{ ucfirst(strtolower($escort->name)) }}%2C+j%27ai+vu+ton+magnifique+profil+sur+JustLadies+%E2%9D%A4%EF%B8%8F"
					target="_blank"
							    	    >
        <div class="flex justify-center items-center w-12 h-12 xs:w-16 xs:h-16 rounded-full bg-tertiary text-primary hover:bg-primary hover:text-tertiary text-xs">
            <i class="fak fa-c-whatsapp fa-2x"></i>
        </div>
    </a>
    <a  target="_blank"  href="whatsapp://send?phone={{ $escort->escort->contact }}&amp;text=Hello+{{ ucfirst(strtolower($escort->name)) }}%2C+j%27ai+vu+ton+magnifique+profil+sur+JustLadies+%E2%9D%A4%EF%B8%8F" >
        <div class="py-2 text-xs text-gray-700">WhatsApp</div>
    </a>    
</li>                </ul>
            </div>
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 px-8 w-full max-w-120">
                                    <div class="text-center text-xs xs:text-sm text-gray-700 mb-4">Ne répond pas aux appels masqués</div>
                                <div class="flex">
                                        <div class="rounded-full bg-gray-100 w-full mr-2 hidden md:flex h-8 justify-center items-center text-sm text-gray-700 font-semibold px-4">
                        <i class="fak fa-c-phone mr-2"></i> <span class="truncate">{{ $escort->escort->contact }}</span>
                    </div>
                                        <div class="flex rounded-full bg-gray-100 w-full md:max-w-60 ml-2 md:ml-0 h-8 text-center justify-center items-center text-sm text-gray-700 font-semibold px-4">
                        <a class="flex justify-center items-center w-full" href="http://maps.google.com/?q={{ $escort->escort->location }}, {{ $escort->escort->country }}" target="_blank" title="{{ $escort->escort->location }}, {{ $escort->escort->country }}">
                            <i class="fak fa-c-location mr-2"></i> <span class="truncate">{{ $escort->escort->location }}, {{ $escort->escort->country }}</span>                     
                        </a>                    
                    </div>                    
                </div>
            </div>
        </div>  
    </template>
        </modal>

        <modal id="become-member-advantages" ref="becomeMemberAdvantages" role="dialog" aria-labelledby="modalTitle" aria-describedby="modalDescription" tabindex="-1" :no-body-padding="true">
            <template v-slot:body="{ intended }">
        <div id="step1" class="flex flex-col justify-between items-center py-16 px-4 min-h-screen md:min-h-full w-full overflow-y-auto">
        	<div>
        		<img src="{{ asset('img/griffe.png') }}" class="h-20 w-20" alt="JustLadies Logo">
        	</div>
        	<span class="strong text-center w-2/3 max-w-50 my-6 text-xl">Devenir membre</span>
        	<ul class="p-0 m-0 w-full sm:max-w-98">
        		<li class="flex mb-5 md:text-center">
        			<span><i class="fak fa-c-check text-2xl text-primary mr-2"></i></span> <span>Données 100% confidentielles</span>
        		</li>
        		<li class="flex mb-5">
        			<span><i class="fak fa-c-check text-2xl text-primary mr-2"></i></span> <span>Voir toutes les stories</span>
        		</li>
        		<li class="flex mb-5">
        			<span><i class="fak fa-c-check text-2xl text-primary mr-2"></i></span> <span>Envoyer des messages privés</span>
        		</li>
        		<li class="flex mb-5">
        			<span><i class="fak fa-c-check text-2xl text-primary mr-2"></i></span> <span>Suivre vos escorts préférées</span>
        		</li>
        		<li class="flex mb-5">
        			<span><i class="fak fa-c-check text-2xl text-primary mr-2"></i></span> <span>Voir la date des shootings</span>
        		</li>
        		<li class="flex mb-5">
        			<span><i class="fak fa-c-check text-2xl text-primary mr-2"></i></span> <span>Accéder aux contenus privés exclusifs</span>
        		</li>
        	</ul>
        	<div class="flex flex-col w-full sm:max-w-98">
                        		<a href="{{ route('members-registration') }}" class="btn-primary">S'inscrire gratuitement</a>		            
                <a href="{{ route('login') }}" class="btn-secondary mt-2">Se connecter</a>
        	</div>
        </div>
    </template>
        </modal>
    </div>

    <script type="text/javascript">
        function setDocHeight() {
            const vh = window.innerHeight * 0.01;
            document.documentElement.style.setProperty('--vh', `${vh}px`)
        }
        window.addEventListener('resize', setDocHeight)
        window.addEventListener('orientationchange', setDocHeight)
        setDocHeight()
    </script>
    <script src="https://www.bemygirl.ch/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="https://www.bemygirl.ch/build/js/app.js?id=9365b1004fcce5d65380" type="text/javascript"></script>

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

    <script src="{{ asset('fancybox.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            //disable fancy box on mobile
            $('.fancybox').click(function() {
                if ($('#mobile').is(':visible')) {
                    return false;
                }
            });
            $(".fancybox").fancybox({
                loop: true,
                buttons: [
                    "close"
                ]
            });
        });
    </script>
</body>

</html>