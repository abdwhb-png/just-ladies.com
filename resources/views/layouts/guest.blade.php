<!DOCTYPE html>
<html lang="fr" class="m-0 p-0 h-full">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="S&#039;inscrire pour devenir une escort de luxe indépendante sur JustLadies">
	<meta name="keywords" content="escort, escort geneva, escort geneve">
	<meta name="robots" content="index" />
	<meta name="robots" content="follow" />
	<meta property="og:title" content="Casting escort indépendante en Suisse et en France" />
	<meta property="og:description"
		content="S&#039;inscrire pour devenir une escort de luxe indépendante sur JustLadies" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="https://www.bemygirl.ch/fr/casting-escort-independante-en-suisse" />
	<meta name="viewport" content="width=device-width, user-scalable=no" />

	<!-- Fonts -->
	<script src="https://kit.fontawesome.com/d1faa25a2e.js" crossorigin="anonymous"></script>

	<title>@yield('title')</title>

	<link rel="canonical" href="https://www.bemygirl.ch/fr/casting-escort-independante-en-suisse">

	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/griffe.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/griffe.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/griffe.png') }}">
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class=" m-0 p-0  ">
	<div id="mobile" class="block sm:hidden"></div>
	<div class="h-full">
		<nav id="main-navigation" class=" navbar-wrapper">
			<img id="header-bg" src="/storage/e3a06826faa11ac8264b138d1abe2d30/escort-zurich-geneve-05.jpg" alt="">
			<div class="w-full md:container md:mx-auto">

				<div id="desktop-logo">
					<div class="flex flex-col items-center justify-center mx-auto">
						<a href="/" title="JustLadies">
							<img id="logo-light" src="{{ asset('img/auth_logo.png') }}" alt="JustLadies Logo">
							<img id="logo-dark" src="{{ asset('img/auth_logo.png') }}" alt="JustLadies Logo">
						</a>
					</div>
				</div>
				<div id="nav-links" class="flex justify-between items-center w-full">
					<div class="hidden md:block w-1/3">
						<ul class="flex justify-start space-x-9 text-sm">
							<li class="">
								<a href="{{ route('/') }}">
									Les escorts </a>
							</li>

						</ul>
					</div>
					<div class="w-full md:w-1/3">
						<ul class="flex justify-between items-center md:justify-end md:space-x-8">
							<li class="md:hidden text-lg ">
								<a href="{{ route('/') }}">
									<i class="fak fa-c-search"></i>
								</a>
							</li>

							<li class="text-lg ">
								<a class="cursor-pointer"
									v-on:click="{{ route('chat') }}">
									<chat-counter>
										<i class="fak fa-c-chat"></i>
									</chat-counter>
								</a>
							</li>

							<li class="text-lg ">
								<a href="@if(!Auth::user())
											{{ route('login') }}
										@else
											@if(Auth::user()->role_id == 1)  {{ route('admin') }}
											@elseif(Auth::user()->role_id == 2) {{ route('admin') }}
											@elseif(Auth::user()->role_id == 3) {{ route('users.escort.index') }}
											@elseif(Auth::user()->role_id == 4) {{ route('users.member.index') }} @else {{ route('login') }}
											@endif
										@endif">
									<i class="fak fa-c-user"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>

			</div>
		</nav>

		<div id="sticky-title" class="w-full h-16 flex items-center bg-white -top-full z-50 shadow"
			style="display: none">
			<a href="https://www.bemygirl.ch/fr/blog"
				class="bg-tertiary rounded-lg px-4 h-10 ml-4 leading-10 inline-block cursor-pointer z-10">
				Retour </a>
			<div class="absolute w-full text-center font-semibold z-0">
				Casting escort indépendante chez JustLadies
			</div>
		</div>
		<div id="content_body" class="ck-content flex flex-col full-wrapper h-full pb-14 lg:py-0 lg:my-0">
			@yield('content')
			<footer id="footer" class="bg-dark bg-opacity-90 flex flex-col text-white mt-8">
				<div class="md:container mx-auto p-4 lg:p-0">

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
							<strong>JustLadies dans les medias</strong>
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
							<li class="lg:mr-6"><a
									href="#">Français</a>
							</li>
							<li class="lg:mr-6"><a
									href="#">Allemand</a>
							</li>
							<li class="lg:mr-6"><a
									href="#">Anglais</a>
							</li>
							<li><a
									href="#">Espagnol</a>
							</li>
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
						<a href=""
							class="btn-primary">S'inscrire gratuitement</a>
						<a :href="'https://www.bemygirl.ch/fr/login?redirectTo=' + encodeURIComponent(intended)"
							class="btn-secondary mt-2">Se connecter</a>
					</div>
				</div>
			</template>
		</modal>
	</div>
	<script src="https://www.bemygirl.ch/lib/jquery/jquery.min.js" type="text/javascript"></script>
	<script src="https://www.bemygirl.ch/build/js/app.js?id=fa4467cc272a080e6593" type="text/javascript"></script>

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

	<script>
		$('#content_body').scroll(async function (e) {
			const currentScroll = $('#content_body').scrollTop()

			const navigationPosition = $('#main-navigation').offset().top

			// apply on if on desktop navigation
			if (navigationPosition == 0) {
				if (currentScroll > 40) {
					$('#main-navigation').slideUp({
						duration: 50,
						complete: function () {
							$('#sticky-title').slideDown({
								complete: function () {
									$(this).addClass('sticky')
								}
							})
						}
					});
				} else {
					$('#sticky-title').slideUp({
						duration: 50,
						complete: function () {
							$(this).removeClass('sticky')
							$('#main-navigation').slideDown();
						}
					})
				}
			}

		})
	</script>
    <script>
$('.faq-question').click(function(e){
	const curr_answer = $(this).next('.faq-answer')
	$('.faq-answer:visible').not(curr_answer).slideUp(200);
	$('.faq-question').not($(this)).removeClass('open');
	
	$(this).toggleClass('open').next('.faq-answer').slideToggle(200);
});
</script>
</body>

</html>