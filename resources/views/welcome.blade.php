@extends('layouts.app')

@section('title', 'JustLadies : Les escorts indépendantes en privé de Genève à Zurich et en France')
@section('content')
<div class="" id="app">
	<section id="girls-list" class="relative md:container md:mx-auto my-6">
		

		<girls-results-component></girls-results-component>


		<div id="search-wrapper" class="absolute inset-0 hidden">
			<div id="results-overlay" class="absolute inset-0 bg-white bg-opacity-90 transition duration-200">
			</div>
		</div>
		<user-dialog id="home_search_filters" ref="home_search_filters" role="user-dialog"
			aria-labelledby="homeSearchFilter" aria-describedby="homeSearchFilter" tabindex="-1">
			<template v-slot:body="{closeDialog}">
				<div id="search-filters" class="h-full w-full">
					<tabs :tabs="['general','profile','services']" main-content-class="h-full pb-44">
						<template v-slot:nav="{ tab, selectTab }">
							<div class="">
								<div class="flex flex-row h-16 items-end justify-between text-sm">
									<span
										class="flex justify-center items-center h-10 ml-4 mt-4 text-center text-2xl font-bold">Filtres</span>
									<span v-on:click="closeDialog()" id="validate-filters"
										class="flex justify-center items-center w-10 h-10 mr-4 mt-4 text-right text-primary text-2xl cursor-pointer"><i
											class="fak fa-c-check"></i></span>
								</div>
								<nav id="tabs-nav"
									class="flex h-12 flex-row border-b border-gray-600 px-4 w-full">
									<span v-on:click.prevent="selectTab('general')" title="Général"
										:class="{'font-semibold text-gray-900' : tab === 'general'}"
										class="text-sm md:text-tiny text-gray-700 cursor-pointer py-4 mr-8">
										Général </span>

									<span v-on:click.prevent="selectTab('profile')" title="Profil"
										:class="{'font-semibold text-gray-900' : tab === 'profile'}"
										class="text-sm md:text-tiny text-gray-700 cursor-pointer py-4 mr-8">
										Profil </span>
									<span v-on:click.prevent="selectTab('services')" title="Services"
										:class="{'font-semibold text-gray-900' : tab === 'services'}"
										class="text-sm md:text-tiny text-gray-700 cursor-pointer py-4">
										Services </span>
								</nav>
							</div>
						</template>
						<template v-slot:tabs="{ tab }">
							<section v-show="tab === 'general'" id="general-filters" key="general"
								class="p-4 w-full flex-shrink-0 h-full min-h-0 overflow-y-scroll pb-16">
								<div class="category text-xxs font-semibold text-gray-800 mb-0">Statut</div>
								<ul class="flex flex-row flex-wrap p-0 mb-4">
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-status="online">En ligne</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-status="exclusive">Photos récentes</li>
								</ul>
								<div class="category text-xxs font-semibold text-gray-800 mb-0">Contenu</div>
								<ul class="flex flex-row flex-wrap p-0 mb-4">
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-content="videos">Vidéos</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-content="private">Contenu privé</li>
								</ul>
								<div class="category text-xxs font-semibold text-gray-800 mb-0">Lieu</div>
								<ul class="flex flex-row flex-wrap p-0 mb-4">
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-place="deplacement">Déplacements</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-place="parlour">Salons et clubs</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-place="private">Appartement privé</li>
								</ul>
								<div class="category text-xxs font-semibold text-gray-800 mb-0">Catégorie</div>
								<ul class="flex flex-row flex-wrap p-0 mb-4">
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-main_category="escort">Escorts</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-main_category="massage">Masseuses</li>
								</ul>
							</section>

							<section v-show="tab === 'profile'" id="profile-filters" key="profile"
								class="p-4 w-full flex-shrink-0 h-full min-h-0 overflow-y-scroll pb-16">
								<div class="category text-xxs font-semibold text-gray-800 mb-0 mb-2">Langues
								</div>
								<div class="mb-4">
									<select name="languages" data-language="all" id="select-languages"
										class="filter-select bg-gray-100 text-gray-900 text-tiny h-10 focus:ring-primary border-none rounded-lg w-full cursor-pointer ">
										<option value="all" selected>Toutes</option>
										<option value="ab">Arabe</option>
										<option value="cz">Tchèque</option>
										<option value="de">Allemand</option>
										<option value="en">Anglais</option>
										<option value="es">Espagnol</option>
										<option value="fr">Français</option>
										<option value="hu">Hongrois</option>
										<option value="it">Italien</option>
										<option value="pt">Portugais</option>
										<option value="ru">Russe</option>
									</select>
								</div>
								<div class="category text-xxs font-semibold text-gray-800 mb-0 mb-2">Nationalité
								</div>
								<div class="mb-4">

									<select name="nationalities" data-nationality="all"
										id="select-nationalities"
										class="filter-select bg-gray-100 text-gray-900 text-tiny h-10 focus:ring-primary border-none rounded-lg w-full cursor-pointer ">
										<option value="all" selected>Toutes</option>
										<option value="GB">britannique</option>
										<option value="FR">française</option>
										<option value="DE">allemande</option>
										<option value="AT">autrichienne</option>
										<option value="BR">brésilienne</option>
										<option value="CO">colombienne</option>
										<option value="CZ">tchèque</option>
										<option value="DM">dominicaine</option>
										<option value="HU">hongroise</option>
										<option value="IT">italienne</option>
										<option value="KG">Kyrgyzstani</option>
										<option value="LT">lituanienne</option>
										<option value="MX">mexicaine</option>
										<option value="MD">moldovan</option>
										<option value="PL">polonaise</option>
										<option value="PT">portugaise</option>
										<option value="RO">roumaine</option>
										<option value="SI">slovène</option>
										<option value="ES">espagnole</option>
										<option value="CH">suisse</option>
									</select>
								</div>
								<div class="category text-xxs font-semibold text-gray-800 mb-0">Type</div>
								<ul class="flex flex-row flex-wrap p-0 mb-4">
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-ethnicity="black">Afro</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-ethnicity="caucassian">Caucasienne</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-ethnicity="latin">Latine</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-ethnicity="mixed">Métisse</li>
								</ul>
								<div class="category text-xxs font-semibold text-gray-800 mb-0">Cheveux</div>
								<ul class="flex flex-row flex-wrap p-0 mb-4">
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-hair="black">Noir</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-hair="blonde">Blonds</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-hair="brown">Châtains</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-hair="light brown">Châtains clairs</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle " data-hair="red">
										Roux</li>
								</ul>
								<div class="category text-xxs font-semibold text-gray-800 mb-0">Yeux</div>
								<ul class="flex flex-row flex-wrap p-0 mb-4">
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle " data-eyes="blue">
										Bleu</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-eyes="brown">Bruns clairs</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-eyes="dark brown">Bruns</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-eyes="green">Verts</li>
								</ul>
								<div class="category text-xxs font-semibold text-gray-800 mb-0">Poitrine</div>
								<ul class="flex flex-row flex-wrap p-0 mb-4">
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-breast="extralarge">XXL</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-breast="large">Grosse</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-breast="medium">Moyenne</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-breast="small">Petite</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-breast="natural_breast">Naturelle</li>
								</ul>
								<div class="category text-xxs font-semibold text-gray-800 mb-0">Maillot</div>
								<ul class="flex flex-row flex-wrap p-0 mb-4">
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-pubic_hair="hairy">Poilu</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-pubic_hair="shaved">Épilé</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-pubic_hair="trimmed">Taillé</li>
								</ul>
								<div class="category text-xxs font-semibold text-gray-800 mb-8">Taille (cm)
								</div>
								<div data-height="[140, 200]" class="mx-5 mb-6">
									<slider id="height-slider" ref="height-slider" :min="140" :max="200"
										:value="[140, 200]"></slider>
								</div>
								<div class="category text-xxs font-semibold text-gray-800 mb-8">Poids (kg)</div>
								<div data-weight="[50, 80]" class="mx-5 mb-6">
									<slider id="weight-slider" ref="weight-slider" :min="50" :max="80"
										:value="[50, 80]"></slider>
								</div>
								<div class="category text-xxs font-semibold text-gray-800 mb-8">Âge</div>
								<div data-age="[18, 50]" class="mx-5">
									<slider id="age-slider" ref="age-slider" :min="18" :max="50"
										:value="[18, 50]"></slider>
								</div>
							</section>
							<section v-show="tab === 'services'" id="services-filters" key="services"
								class="p-4 w-full flex-shrink-0 h-full min-h-0 overflow-y-scroll pb-16">
								<div class="category text-xxs font-semibold text-gray-800 mb-0">Services pour
								</div>
								<ul class="flex flex-row flex-wrap p-0 mb-4">
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services_for="men">Hommes</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services_for="women">Femmes</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services_for="couples">Couples</li>
								</ul>
								<div class="category text-xxs font-semibold text-gray-800 mb-0">Services</div>
								<ul class="flex flex-row flex-wrap p-0 mb-4">
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services="1">69</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services="2">Cunnilingus</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services="22">Fellation protégée</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services="12">Fellation naturelle</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services="7">Anal</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services="17">Éjaculation corporelle</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services="18">Lesbo show</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services="8">Embrasse</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services="13">GFE</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services="3">Massage érotique</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services="23">Massage sur table</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services="24">Massage tantrique</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services="9">Massage prostatique</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services="14">Sex toys</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services="19">Striptease</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services="4">Voyage</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services="10">Restaurant</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services="25">Massage 4 mains</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services="15">BDSM</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services="26">Massage aux huiles</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services="27">Massage naturiste</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services="6">Gode ceinture</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services="20">Fétichisme</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services="28">+ 2 hommes</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services="11">Douche dorée</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services="16">Jeu de rôles</li>
									<li class="btn-secondary mt-2 mr-2 text-sm filter-toggle "
										data-services="5">Soumission (légère)</li>
								</ul>
							</section>
						</template>
						<template v-slot:footer>
							<div id="footer"
								class="bg-white absolute w-full bottom-0 z-10 py-4.25 text-center flex justify-center items-center shadow border-t border-gray-400">
								<div class="cursor-pointer" id="clear-filters">Effacer les filtres</div>
								<div
									class="cursor-pointer w-6 h-6 ml-2 text-xs flex justify-center items-center rounded-full bg-primary bg-opacity-10 ">
									<span id="filter-count">0</span></div>
							</div>
						</template>
					</tabs>
				</div>

			</template>
		</user-dialog>
	</section>
</div>
@endsection
