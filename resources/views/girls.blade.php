@extends('layouts.public')

@section('title', $escort->name.' - Escort indépendante - JustLadies')
@section('content')
<div class="" id="app">
    <div id="body_content" class="full-wrapper mb-4 pb-8">
        <div class="md:container md:mx-auto ">
            <div id="profile-header" class="sticky top-0 md:px-6 px-2 pt-6 pb-4 bg-white z-10 transition-all block md:hidden">
                <div class="flex justify-between align-center"><a id="back-button" href="{{ url()->previous() }}"  title="Retour" class="focus:outline-none md:hidden mr-2 pt-1 mr-10"><button><i class="fak fa-c-arrow-left text-xl md:text-2xl"></i></button></a>
                    <span
                        class="hidden md:block"><a href="{{ url()->previous() }}"  title="Retour" class="btn-secondary mini">
                    Retour                
                </a></span>
                        <div class="flex flex-col justify-center flex-shrink overflow-x-hidden">
                            <h2 class="text-gray-700 text-sm text-center whitespace-nowrap overflow-ellipsis overflow-x-hidden transition duration-200 max-w-full">
                                @if($escort->active_status)
                                    <span class="text-green">En ligne</span>
                                @else
                                    <span>En ligne il y a {{ $escort->updated_at->diffForHumans() }}</span>
                                    @endif
        </h2>
                        </div>
                        <div id="profile-header-icons" class="flex-shrink-0 flex items-center overflow-hidden"><button title="Suivre" class="focus:outline-none"><i class="fak fa-c-mute text-xl md:text-2xl"></i></button> <button title="Contacte-moi" onclick="contact()" class="focus:outline-none text-primary"><i class="ml-4 fak fa-c-phone text-xl md:text-2xl"></i></button></div>
                </div>
            </div>
            <div class="relative px-4 md:px-0 flex items-center md:flex-col"><span class="hidden md:block absolute left-0"><a href="{{ url()->previous() }}" class="cursor-pointer text-2xl focus:outline-none"><i class="fak fa-c-arrow-left"></i></a></span>
                <a href="{{ route('gallery', ['name' => $escort->name, 'id' => $escort->id]) }}#gallery-item-0"
                    class="mr-4 md:mr-0 cursor-pointer">
                    <div class="bg-gray-600 rounded-full  mr-4 md:mr-0  relative inline-block "><img src="{{ asset('storage/'.$escort->avatar) }}" alt="{{ $escort->name }}" class="h-24 md:h-36 w-24 md:w-36 rounded-full object-cover">
                        <div>
                            @if($escort->active_status)
                            <span class="w-3 h-3 absolute bg-green border-2 border-white top-0 right-0 mt-2 md:mt-4 mr-2 md:mr-4 rounded-full"></span>
                            @endif
                        </div>
                        <div class="absolute bottom-0 w-full flex justify-center -mb-1"><span class="px-2 border-2 border-white bg-gray-100 text-primary text-xxs whitespace-nowrap rounded-full">
                    Appart. privé            </span></div>
                    </div>
                </a>
                <div class="grid grid-cols-3 md:absolute md:right-0 md:top-0 py-2">
                    <div class="flex flex-col md:flex-row text-sm"><span class="font-semibold">
                    {{ count($escort->photos) }}
                </span> <span class="text-gray-700 md:ml-2">
                    Photos            </span></div>
                    <div class="flex flex-col md:flex-row text-sm"><span id="girl-nb-followers" class="font-semibold">
                    {{ count($escort->abonnes) }}
                </span> <span class="text-gray-700 md:ml-2">
                    Abonnés            </span></div>
                </div>
            </div>
            <div class="flex flex-wrap md:flex-nowrap md:flex-col justify-between items-center p-4 md:mb-4">
                <div class="flex flex-col w-1/2 md:w-auto md:text-center">
                    <h1 class="font-semibold md:font-bold text-tiny md:text-2xl flex items-center md:justify-center">
                        <div class="truncate">{{ ucfirst(strtolower($escort->name)) }}</div>
                        <div class="ml-1 flex-shrink-0 flex items-center"><i data-tippy-theme="premium" data-tippy-max-width="135" data-tippy-content="Photos récentes par BemyGirl" class="fak fa-c-verified md:text-base text-sm text-primary"></i></div>
                    </h1> <span class="text-gray-700 text-sm leading-none">
                {{ $escort->escort->location }}
                                                , <a target="_blank" href="#">{{ $escort->escort->country }}</a></span></div>
                <div class="flex justify-end w-1/2 md:w-auto md:mt-6 md:order-last"><span class="mr-2"><button class=" btn-secondary  mini">
                        Suivre
                    </button></span> <button class="btn-primary mini" onclick="contact()">
                Contact
            </button></div>
                <div class="md:text-center mt-4 md:mt-6 md:max-w-prose ">
                    <p class="text-sm">
                        <span id="" class="font-semibold">Biographie 🤭: </span>
                        @if($escort->escort->biography == "")
                            {{ 'Hi! I\'m available 🔥 SEXY GIRL ('.$escort->escort->origin.') ❤️‍🔥🔥❤️‍🔥 Nothing is boring with me 🔥🥂💋💦🍑🍾🥳🔥😍 private apartment 💋🥂💋' }}
                        @else
                            {{ $escort->escort->biography }}
                        @endif
                    </p> <span class="text-xs text-gray-700">
                    Mis à jour il y a {{ $escort->escort->updated_at->diffForHumans() }}
                </span></div>
            </div>

            <girls-nav-grid-component escort-id="{{ $escort->id }}" escort-name="{{ $escort->name }}" escort-avatar="{{ $escort->avatar }}"></girls-nav-grid-component>

        </div>
    </div>
</div>

@endsection
