<!DOCTYPE html>
<html lang="fr" class="m-0 p-0 h-full">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="description"
		content="Une escort, une masseuse ou une petite amie d&#039;un soir? ❤️ JustLadies™ sélectionne et photographie les modèles indépendantes de Genève jusqu&#039;à Zurich">
	<meta name="keywords" content="">
	<meta name="robots" content="index" />
	<meta name="robots" content="follow" />
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffe6ce">
	<meta name="viewport" content="width=device-width, user-scalable=no" />

	<!-- Fonts -->
	<script src="https://kit.fontawesome.com/d1faa25a2e.js" crossorigin="anonymous"></script>

	<title>@yield('title')</title>

	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/griffe.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/griffe.png') }}">

	@vite(['resources/css/app.css', 'resources/js/app.js'])

	<link rel="stylesheet" href="https://www.bemygirl.ch/lib/vue-multiselect/vue-multiselect.min.css">
	
</head>

<body class="m-0 p-0 h-full">

	<div id="mobile" class="block sm:hidden"></div>
	<div class="min-h-full">

		<nav id="main-navigation" class=" has-header  navbar-wrapper">
			<img id="header-bg"
				src="{{ asset('img/escort-geneve-zurich.jpg') }}"
				alt="">
			<div class="w-full md:container md:mx-auto">

				<div id="desktop-logo">
					<div class="flex flex-col items-center justify-center mx-auto">
						<a href="/" title="JustLadies">
							<img id="logo-light" src="{{ asset('img/jl-logo.png') }}" alt="JustLadies Logo" width="200"
								height="200">
							<img id="logo-dark" src="{{ asset('img/jl-logo.png') }}" alt="JustLadies Logo">
						</a>
						<h1 class="mt-4 text-sm text-center text-white">LES ESCORTS INDÉPENDANTES EN SUISSE ET
							EN FRANCE</h1>
					</div>
				</div>
				
				<div id="nav-links" class="flex justify-between items-center w-full">
					<div class="hidden md:block w-1/3">
						<ul class="flex justify-start space-x-9 text-sm">
							<li class=" active "><a href="{{ route('/') }}">
											Les escorts						</a></li>
						</ul>
					</div>
					<div class="w-full md:w-1/3">
						<ul class="flex justify-between items-center md:justify-end md:space-x-8">
							<li class="md:hidden text-lg  active "><a href="{{ route('/') }}"><i class="fak fa-c-search"></i></a></li>
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
															@endif"><i class="fak fa-c-user"></i></a></li>
						</ul>
					</div>
				</div>

			</div>
		</nav>

		<div id="body_content" class="flex flex-col full-wrapper pt-20 pb-14 md:py-0 md:my-0 h-full flex-grow">
			@yield('content')
			<footer id="footer" class="bg-dark bg-opacity-90 flex flex-col text-white mt-8">
				<div class="md:container mx-auto p-4 lg:p-0">
					<div class="mt-10 w-48 mb-10">
						<img src="{{ asset('img/jl-logo.png') }}" class="w-full" alt="JustLadies Logo">
					</div>
					<div class="flex flex-col lg:flex-row lg:mb-10">
						<div class="w-full lg:max-w-xs xl:max-w-md lg:mr-16 lg:mb-4 lg:mb-0 text-xs">
							<p class="text-base">
								Toutes les escorts sont exclusivement photographiées par JustLadies ™ </p>
							<p class="mt-4">L'équipe de JustLadies sélectionne et photographie chaque escort entre Genève,
								Lausanne, Zurich et Paris, afin de garantir l'ensemble des profils.</p>
							<p class="mt-4"></p>
							<p class="mt-4"></p>
						</div>
						<div
							class="sitelinks flex w-full grid grid-cols-2 lg:grid-cols-4 gap-y-8 gap-8 md:gap-2 lg:w-full text-sm mb-6 mt-8 lg:mt-0">
							<div>
								<strong>A propos</strong>
								<ul class="flex flex-col mt-4 text-gray-100 w-full pr-2">
									<li class="mr-4"><a
											href="{{ route('fonctionnement') }}">Fonctionnement</a>
									</li>
									<li class="mr-4"><a href="{{ route('faq') }}">Questions fréquentes</a>
									</li>
									<li class="mr-4"><a href="{{ route('our-values') }}">Nos valeurs</a>
									</li>
									<li class="mr-4"><a href="{{ route('who-are-we') }}">Qui
											sommes-nous ?</a></li>
								</ul>
							</div>
							<div>
								<strong>Escorts</strong>

								<ul class="flex flex-col mt-4 text-gray-100 w-full pr-2">
									<li class="mr-4"><a
											href="{{ route('escorts-casting') }}">Casting</a>
									</li>
									<li class="mr-4"><a
											href="{{ route('become-escort') }}">Devenir
											escort</a></li>
									<li class="mr-4"><a
											href="{{ route('testimonials') }}">Témoignages</a>
									</li>
									<li class="mr-4"><a
											href="{{ route('escort-glossary') }}">Glossaire des
											escorts</a></li>
								</ul>
							</div>
							<div>
								<strong>Communauté</strong>
								<ul class="flex flex-col mt-4 text-gray-100 w-full pr-2">
									<li class="mr-4"><a
											href="{{ route('community/member') }}">Membres</a></li>
									<li class="mr-4"><a href="{{ route('blog') }}">Blog</a></li>
								</ul>
							</div>
							<div>
								<strong>Régions</strong>
								<ul class="flex flex-col mt-4 text-gray-100 w-full pr-2">
									<li class="mr-4"><a href="#" onclick="event.preventDefault(); showtowns('fr');">France <i class="fa fa-plus" aria-hidden="true"></i> <i class="fa fa-minus" style="display: none" aria-hidden="true"></i></a>
										<div id="fr-towns" style="display: none">
											@foreach($actuals_fr_towns as $town)
												<p class="text-sm">- {{ $town->location }}</p>
											@endforeach
										</div>
									</li>
									<li class="mr-4"><a href="#" onclick="event.preventDefault(); showtowns('ch');">Suisse <i class="fa fa-plus" aria-hidden="true"></i> <i class="fa fa-minus" style="display: none" aria-hidden="true"></i></a>
										<div id="ch-towns" style="display: none">
											@foreach($actuals_ch_towns as $town)
											<p class="text-sm">- {{ $town->location }}</p>
											@endforeach
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="border-t border-gray-200 border-opacity-10 py-4">
						<div class="flex justify-between sm:justify-start space-x-6 w-full">
							<div class="flex items-center justify-center">
								<img src="https://www.bemygirl.ch/images/payment/pci-dss.svg" alt="PCI DSS">
							</div>
							<div class="flex items-center justify-center">
								<img src="https://www.bemygirl.ch/images/payment/mastercard-idcheck.svg"
									alt="Mastercard">
							</div>
							<div class="flex items-center justify-center">
								<img src="https://www.bemygirl.ch/images/payment/visa.svg" alt="Visa">
							</div>
							<div class="flex items-center justify-center">
								<img src="https://www.bemygirl.ch/images/payment/postfinance.svg" alt="PostFinance">
							</div>
							<div class="flex items-center justify-center">
								<img src="https://www.bemygirl.ch/images/payment/twint.svg" alt="Twint">
							</div>
						</div>
					</div>
					<div class="press-links flex flex-col border-t border-gray-200 border-opacity-10 py-4 text-sm">
						<div class="mb-4">
							<strong>JustLadies™ dans les medias</strong>
						</div>
						<div class="grid grid-cols-5 md:grid-cols-10 gap-2 w-full">
							<img src="https://www.bemygirl.ch/images/press-logo/LeTemps.png" alt="Le Temps">
							<img src="https://www.bemygirl.ch/images/press-logo/TDG.png" alt="Tribune de Genève">
							<img src="https://www.bemygirl.ch/images/press-logo/LeMatin.png" alt="LeMatin.ch">
							<img src="https://www.bemygirl.ch/images/press-logo/20minutes.png" alt="20 minutes">
							<img src="https://www.bemygirl.ch/images/press-logo/LemanBleu.png" alt="Léman Bleu TV">
							<img src="https://www.bemygirl.ch/images/press-logo/Playboy.png" alt="Playboy">
							<img src="https://www.bemygirl.ch/images/press-logo/CNEWS.png" alt="C-News">
							<img src="https://www.bemygirl.ch/images/press-logo/Blick.png" alt="Blick">
							<img src="https://www.bemygirl.ch/images/press-logo/RadioLac.png" alt="Raido Lac">
							<img src="https://www.bemygirl.ch/images/press-logo/24heure.png" alt="24 heures">
						</div>
					</div>
					<div
						class="extra-links lg:flex grid grid-cols-2 gap-8 lg:grid-cols-none lg:justify-between lg:flex-row border-t border-gray-200 border-opacity-10 py-4 text-sm">
						<ul class="flex flex-col lg:flex-row">
							<li class="lg:mr-6"><a href="{{ route('contact') }}">Contact</a></li>
							<li class="lg:mr-6"><a href="{{ route('confidentialite') }}">Confidentialité</a>
							</li>
							<li class="lg:mr-6"><a href="{{ route('conditions-generales') }}">Conditions
									générales</a></li>
							<li><a href="{{ route('tarifs') }}">Tarifs</a></li>
						</ul>
						<ul class="flex flex-col lg:flex-row">
							<li class="lg:mr-6"><a href="#">Français</a></li>
							<li class="lg:mr-6"><a href="#">Allemand</a></li>
							<li class="lg:mr-6"><a href="#">Anglais</a></li>
							<li><a href="#">Espagnol</a></li>
						</ul>
					</div>
				</div>
				<div class="container-fluid flex flex-row py-2 text-sm bg-dark px-4 lg:justify-center justify-start">
					© Copyright 2012 - 2022 JustLadies™ </div>
			</footer>
		</div>
		<modal id="become-member-advantages" ref="becomeMemberAdvantages" role="dialog" aria-labelledby="modalTitle"
			aria-describedby="modalDescription" tabindex="-1" :no-body-padding="true">
			<template v-slot:body="{ intended }">
				<div id="step1"
					class="flex flex-col justify-between items-center py-16 px-4 min-h-screen md:min-h-full w-full overflow-y-auto">
					<div>
						<img src="https://www.bemygirl.ch/images/B-logo.svg" alt="BeMyGirl Logo">
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
							<span><i class="fak fa-c-check text-2xl text-primary mr-2"></i></span> <span>Suivre vos
								escorts préférées</span>
						</li>
						<li class="flex mb-5">
							<span><i class="fak fa-c-check text-2xl text-primary mr-2"></i></span> <span>Voir la date
								des shootings</span>
						</li>
						<li class="flex mb-5">
							<span><i class="fak fa-c-check text-2xl text-primary mr-2"></i></span> <span>Accéder aux
								contenus privés exclusifs</span>
						</li>
					</ul>
					<div class="flex flex-col w-full sm:max-w-98">
						<a href="{{ route('members-registration') }}" class="btn-primary">S'inscrire gratuitement</a>
						<a href="{{ route('login') }}"
							class="btn-secondary mt-2">Se connecter</a>
					</div>
				</div>
			</template>
		</modal>
	</div>

	<script src="https://www.bemygirl.ch/lib/jquery/jquery.min.js" type="text/javascript"></script>
	<script src="https://www.bemygirl.ch/build/js/app.js?id=fa4467cc272a080e6593" type="text/javascript"></script>
    <script src="{{ asset('src/jquery-cookie-master/jquery-cookie-master/src/jquery.cookie.js')}} "></script>

    <script type="text/javascript">
		$(document).ready(function () {
			$('.image-wrapper:not(.girl-back-soon)').GirlCarousel();

            // if($.cookie('is_adult') != "true"){
            //     $('body').addClass('overflow-hidden');
            //     $('body').prepend('<div id="cgu" class="z-50 fixed min-h-full w-screen inset-0 flex justify-center items-center overflow-y-auto bg-gray-900 md:py-8 bg-dark-100 bg-opacity-95"> <div class="text-center flex flex-col w-full md:max-w-102 min-h-full md:min-h-0 md:h-auto bg-white overflow-hidden  md:rounded-2xl m-auto"> <div class="flex justify-center flex-0px min-h-0 md:flex-auto md:min-h-full"> <img src="https://www.bemygirl.ch/images/legal-img.jpg" srcset="https://www.bemygirl.ch/images/legal-img.jpg 1x, https://www.bemygirl.ch/images/legal-img@2x.jpg 2x" alt="BeMyGirl Logo" class="w-full object-cover"> </div> <div> <div class="flex flex-col justify-center items-center md:justify-center p-8 pb-0"> <span class="text-center text-lg font-bold mb-6">Réservé aux adultes</span> <p class="text-gray-800 text-center mb-4 text-sm">En cliquant sur "J\'ai plus de 18 ans", vous confirmez être majeur et acceptez les conditions générales d\'utilisation (notamment que le contenu est privé et que vous vous exposez à des poursuites pénales en cas de diffusion en dehors de la plateforme)</p> <div class="text-center"> <a class="text-primary text-sm" href="https://www.bemygirl.ch/fr/conditions-generales?bypassWarningModal=1" target="_blank">Conditions générales d\'utilisation</a> </div> </div> <div class="flex flex-col p-8"> <button id="accept-cgu" class="bg-primary text-white rounded-xl focus:outline-none mx-auto mb-2 w-full h-14">J\'ai plus de 18 ans</button> <a class="flex flex-col justify-center bg-tertiary text-black rounded-xl focus:outline-none mx-auto w-full h-14" href="https://www.google.com/">Quitter le site</a> </div> </div> </div> </div>');
            // }

            $('#accept-cgu').click(async function () {
                $('body').removeClass('overflow-hidden');
                $('#cgu').remove();
                $.cookie('is_adult', 'true' , { expires: 7 });
		    })
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

	<script type="text/javascript">

		updateFilterCount()

		function updateFilterCount() {
			let count = $('.filter-toggle.active').length
			$('.filter-select').each(function () {
				if ($(this).val() != 'all') {
					count++
				}
			});
			$('#filter-count').text((count ? '+' : '') + count)
		}

		function showtowns(t) {
				$('.fa.fa-plus').toggle();
				$('.fa.fa-minus').toggle();
			if(t == 'fr')
				$('#fr-towns').toggle();
			if(t == 'ch')
				$('#ch-towns').toggle();
		}

		$(document).ready(function () {
			$('#tabs-nav span[data-tab]').click(function () {
				const tab = $(this).data('tab')
				$(this).addClass('font-bold')
				$('#tabs-nav span[data-tab]').not(this).removeClass('font-bold')
				$('#tabs >div:first-child').css({
					marginLeft: tab * -100 + '%'
				}, 300)
			})
			$('#tabs select').change(function () {
				const { key } = helpers.getDataKeyValue(this)
				const value = $(this).val()
				$(this).data({ [key]: value })
				updateFilterCount()
				if ($(this).val() != 'all') {
					$(this).addClass('active')
				} else {
					$(this).removeClass('active')
				}
			})
			$('.filter-toggle').click(function () {
				$(this).toggleClass('active')
				updateFilterCount()
			})
			$('#clear-filters').click(function () {
				$('#tabs li.active').removeClass('active')
				$('#select-languages').val('all').data('language', 'all').removeClass('active')
				$('#select-nationalities').val('all').data('nationality', 'all').removeClass('active')
				const refs = app.$refs
				_.each(refs, (component, compName) => {
					if (compName.indexOf('slider') > -1) {
						component.reinit()
					}
				})
				$('#filter-count').text(0)
			})
			$('.regions-checkbox').change(function () {
				const data = {}
			});
			$('#validate-filters').click(function () {
				const url = 'https://www.bemygirl.ch/fr'
				const token = '1mvzl4QCMGEmQiemCaHllNt3IfH2797WpgN1b9lg'
				const response = helpers.search(url, token)
				$('#search-filters').toggleClass('-top-full top-0')
			});
		})
	</script>

	<script type="text/javascript">

		


		$(document).ready(function () {
			$('#girls-input-search').focus(function () {
				$('#search-wrapper').removeClass('hidden');
				$('#girls-input-search').removeClass('md:w-1/3');
				$('#girls-input-search').addClass('md:w-full');
			}).blur(function (e) {
				$('#search-wrapper').addClass('hidden');
				if (e.target.value.trim() == '') {
					$('#girls-input-search').addClass('md:w-1/3');
					$('#girls-input-search').removeClass('md:w-full');
				}
			});

			$('#girls-input-search').keyup(function (e) {
				if (e.target.value.trim() !== '') {
					$('#girls-input-search').removeClass('md:w-1/3');
					$('#girls-input-search').addClass('md:w-full');
					$('#search-close-btn').removeClass('hidden')
				} else {
					$('#girls-input-search').addClass('md:w-1/3');
					$('#girls-input-search').removeClass('md:w-full');
					$('#search-close-btn').addClass('hidden')
				}
			});

			$('#search-close-btn').click(function () {
				$('#girls-input-search').val('');
				$('#girls-input-search').addClass('md:w-1/3');
				$('#girls-input-search').removeClass('md:w-full');
				$('#search-close-btn').addClass('hidden')
			})

			$('#profile-filters select').change(function (e) {
				$(this).addClass('active')
			})

			
			$('#localize_me').click(function () {
				$('#regions_selector').find('input[type="checkbox"]').prop('checked', false);
				getGeolocation().then(coords => {
					if (coords.length > 0) {
						$('input[name="latitude"]').val(coords[0])
						$('input[name="longitude"]').val(coords[1])
					}
				});
			});
		})
	</script>
</body>

</html>