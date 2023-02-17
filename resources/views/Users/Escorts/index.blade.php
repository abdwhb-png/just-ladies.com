@extends('layouts.users.app')

@section('content')
    <div id="app">
        <div id="dash" style="display: none;">
            <div id="body_content" class="full-wrapper">
                <div class="md:container md:mx-auto ">
                    <div id="profile-header" class="sticky top-0 md:px-6 px-2 pt-6 pb-4 bg-white z-10 transition-all block md:hidden">
                        <div class="flex justify-between align-center"><a id="back-button" href="{{ url()->previous() }}" title="Retour" class="focus:outline-none md:hidden mr-2 pt-1 mr-10"><i aria-hidden="true" class="fak fa-c-arrow-left text-xl md:text-2xl"></i></a> <span class="hidden md:block"><a href="{{ url()->previous() }}" title="Retour" class="btn-secondary mini">
                            Retour                
                        </a></span>
                            <div class="flex flex-col justify-center flex-shrink overflow-x-hidden">
                                <h2 class="text-gray-700 text-sm text-center whitespace-nowrap overflow-ellipsis overflow-x-hidden transition duration-200 max-w-full"><span>
                    En ligne
                </span></h2>
                            </div>
                            <div id="profile-header-icons" class="flex-shrink-0 flex items-center overflow-hidden"><button title="Suivre" class="focus:outline-none"><i aria-hidden="true" class="fak fa-c-mute text-xl md:text-2xl"></i></button> <button onclick="event.preventDefault();
                                                                                                                                                                        document.getElementById('logout-form').submit();" title="Contacte-moi" class="focus:outline-none text-danger"><i class="fas fa-power-off ml-4 text-xl md:text-2xl"></i></button></div>
                        </div>
                    </div>
                    <div class="relative px-4 md:px-0 flex items-center md:flex-col"><span class="hidden md:block absolute left-0"><a href="{{ url()->previous() }}" class="cursor-pointer text-2xl focus:outline-none"><i aria-hidden="true" class="fak fa-c-arrow-left"></i></a></span>
                        <a class="mr-4 md:mr-0 cursor-pointer" href="#" data-bs-toggle="modal"
                data-bs-target="#profilePicModal">
                            <div class="bg-gray-600 rounded-full  mr-4 md:mr-0  relative inline-block "><img src="{{ asset('storage/'.Auth::user()->avatar) }}" alt="{{ ucfirst(strtolower(Auth::user()->name)) }}" class="h-24 md:h-36 w-24 md:w-36 rounded-full object-cover">
                                <div><span class="w-3 h-3 absolute bg-green border-2 border-white top-0 right-0 mt-2 md:mt-4 mr-2 md:mr-4 rounded-full"></span></div>
                                <div class="absolute bottom-0 w-full flex justify-center -mb-1"><span class="px-2 border-2 border-white bg-gray-100 text-primary text-xxs whitespace-nowrap rounded-full">
                            Appart. privé            </span></div>
                            </div>
                        </a>
                        <div class="grid grid-cols-3 md:absolute md:right-0 md:top-0 py-2">
                            <div class="flex flex-col md:flex-row text-sm">
                                <span class="font-semibold">
                                    {{count($gallery)}}
                                </span> 
                                <span class="text-gray-700 md:ml-2">
                                    Photos           
                                </span>
                            </div>
                            <div class="flex flex-col md:flex-row text-sm">
                                <span id="girl-nb-followers" class="font-semibold">
                                    {{ count(Auth::user()->abonnes) }}
                                </span> 
                                <span class="text-gray-700 md:ml-2">
                                    Abonnés           
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap md:flex-nowrap md:flex-col justify-between items-center p-4 md:mb-4">
                        <div class="flex flex-col w-1/2 md:w-auto md:text-center">
                            <h1 class="font-semibold md:font-bold text-tiny md:text-2xl flex items-center md:justify-center">
                                <div class="truncate">{{ ucfirst(strtolower(Auth::user()->name)) }}</div>
                                <div class="ml-1 flex-shrink-0 flex items-center"><i data-tippy-theme="premium" data-tippy-max-width="135" data-tippy-content="Photos récentes par BemyGirl" aria-hidden="true" class="fak fa-c-verified md:text-base text-sm text-primary"></i> <img height="16" src="https://www.bemygirl.ch/images/lock.png"
                                        srcset="https://www.bemygirl.ch/images/lock.png 1x, https://www.bemygirl.ch/images/lock-2x.png 2x" data-tippy-theme="private-content" data-tippy-max-width="135" data-tippy-content="Contenu privé" class="paid-content-icon"></div>
                            </h1>
                            <span class="text-gray-700 text-sm leading-none">
                        {{ Auth::user()->escort->country }}
                                                        , <a target="_blank" href="https://www.bemygirl.ch/fr/escorts/geneve">{{ Auth::user()->escort->location }}</a></span>
                        </div>
                        <div class="flex justify-end w-1/2 md:w-auto md:mt-6 md:order-last"><span class="mr-2"><button onclick="event.preventDefault();
                                                                                                                                                                        document.getElementById('logout-form').submit();" class=" btn-secondary  mini d-none d-md-block" id="logout_button">
                                       <i class="fas fa-power-off mr-2"></i> Déconnexion
                                    </button></span> 
                                    <button class="btn-primary mini" id="dash_options_button">
                                        <i class="fas fa-user-cog mr-1"></i> <i class="fas fa-sort-down"></i>
                                    </button>
                                    <span id="" class="font-semibold">
                                        <div class="ml-auto flex items-center">
                                            <div class="relative z-20">
                                                <div
                                                    class="icon-wrapper flex justify-center items-center rounded-full group cursor-pointer flex-shrink-0 h-10 w-10">
                                                </div>
                                                <div id="dash_options_dropdown"
                                                    class="absolute bg-white top-12 right-0 flex flex-col w-64 h-74 rounded-lg shadow text-dark"
                                                    style="display: none;">
                                                    <div class="bg-gray-100 p-4 flex justify-between rounded-t-lg">
                                                        <div class="flex flex-col"><span class="text-sm text-gray-800">Crédit</span> <span
                                                                class="text-2xl font-bold">
                                                                0
                                                            </span></div>
                                                        <div><a class="text-primary hover:text-primary-hover cursor-pointer text-sm" id="wallet_modalBtn">
                                                                Gérer
                                                            </a></div>
                                                    </div>
                                                    <ul>
                                                        <li id="parametersButton"
                                                            class="px-4 h-10 flex justify-start items-center hover:bg-tertiary cursor-pointer"><a
                                                                class="flex items-center h-full w-full"><i aria-hidden="true"
                                                                    class="w-6 text-center mr-3 fak fa-c-gear"></i> <span>Paramètres</span></a></li>
                                                        <li id="user_modify_password_button"
                                                            class="px-4 h-10 flex justify-start items-center hover:bg-tertiary cursor-pointer"><a
                                                                class="flex items-center h-full w-full"><i aria-hidden="true"
                                                                    class="w-6 text-center mr-3 fak fa-c-lock"></i> <span>Mot de
                                                                    passe</span></a></li>
                                                        <li class="px-4 h-10 flex justify-start items-center hover:bg-tertiary cursor-pointer"><a id="documents_modalBtn"
                                                                class="flex items-center h-full w-full"><i aria-hidden="true"
                                                                    class="w-6 text-center mr-3 fak fa-c-contract"></i> <span>Factures</span></a></li>
                                                        <li class="px-4 h-10 flex justify-start items-center hover:bg-tertiary cursor-pointer"><a href="{{ route('contact') }}"
                                                                class="flex items-center h-full w-full"><i aria-hidden="true"
                                                                    class="w-6 text-center mr-3 fak fa-c-mail"></i> <span>Support</span></a></li>
                                                        <li class="px-4 h-10 flex justify-start items-center hover:bg-tertiary cursor-pointer"><a href="{{ route('faq') }}"
                                                                class="flex items-center h-full w-full"><i aria-hidden="true"
                                                                    class="w-6 text-center mr-3 fak fa-c-gear"></i> <span>FAQ</span></a></li>
                                                        <li class="px-4 h-10 flex justify-start items-center hover:bg-tertiary cursor-pointer text-red-600">
                                                            <a href="#"
                                                                onclick="event.preventDefault();
                                                                                                                                                                        document.getElementById('logout-form').submit();"
                                                                class="flex items-center h-full w-full"><i aria-hidden="true"
                                                                    class="w-6 text-center mr-3 fak fa-c-disconnect"></i> <span>Se déconnecter</span></a>
                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf</form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                
                        </div>
                        <div class="md:text-center mt-4 md:mt-6 md:max-w-prose ">
                            <p class="text-sm">
                                <span id="" class="font-semibold">Biographie 🤭: </span>
                                @if(Auth::user()->escort->biography == "")
                                    {{ 'Hi! I\'m available 🔥 SEXY GIRL ('.Auth::user()->escort->origin.') ❤️‍🔥🔥❤️‍🔥 Nothing is boring with me 🔥🥂💋💦🍑🍾🥳🔥😍 private apartment 💋🥂💋' }}
                                @else
                                    {{ Auth::user()->escort->biography }}
                                @endif
                            </p> <span class="text-xs text-gray-700">
                                    Mis à jour il y a {{ Auth::user()->escort->updated_at->diffForHumans() }}
                                </span>
                        </div>
                       @if(session()->has('success'))
                        <div class="alert alert-success flex justify-end w-1/2 md:w-auto md:mt-6 md:order-last" role="alert" style="border-left: 14px solid #55b56d!important">
                            {{session()->get('success')}}
                        </div>
                        @endif
                        @if(session()->has('fail'))
                        <div class="alert alert-danger flex justify-end w-1/2 md:w-auto md:mt-6 md:order-last" role="alert" style="border-left: 14px solid red!important">
                            {{session()->get('fail')}}
                        </div>
                        @endif
                        @if (count($errors))
                        <div class="alert alert-danger flex justify-end w-1/2 md:w-auto md:mt-6 md:order-last" role="alert" style="border-left: 14px solid red!important">
                            @foreach ($errors->all() as $error)
                            <p>{{$error}}</p>
                            @endforeach
                        </div>
                        @endif
                       </div>
                        </div>
                    </div>
                        <escort-nav-grid-component escort-id="{{ Auth::user()->id }}" escort-name="{{ Auth::user()->name }}" escort-infos="{{ json_encode($infos) }}"></escort-nav-grid-component>
                    <div data-v-12291c58="" class="modal outline-none" id="contactModal" role="dialog" aria-labelledby="modalTitle" aria-describedby="modalDescription" tabindex="-1" style="display: none;">
                        <div data-v-12291c58="" class="modal__backdrop"></div>
                        <div data-v-12291c58="" class="modal__dialog md:rounded-xl md:max-h-9/10">
                            <!---->
                            <div data-v-12291c58="" class="modal__body p-5">
                                <div class="justify-center mt-8 xs:mt-10">
                                    <div class="flex flex-col justify-center items-center">
                                        <div class="bg-gray-600 rounded-full  relative inline-block border border-primary p-0.5"><img src="{{ asset('storage/'.Auth::user()->avatar) }}" alt="{{ ucfirst(strtolower(Auth::user()->name)) }}" class="h-28 w-28 xs:h-36 xs:w-36 rounded-full object-cover">
                                            <div><span class="w-3 h-3 absolute bg-green border-2 border-white top-0 right-0 mt-4 mr-4 rounded-full"></span></div>
                                        </div>
                                        <h2 class="font-bold text-2xl xs:text-2xl mt-4">
                                            {{ ucfirst(strtolower(Auth::user()->name)) }}
                                        </h2> <span class="text-gray-700 text-sm leading-tight">
                                        {{ Auth::user()->escort->country }}
                                                                , {{ Auth::user()->escort->location }}
                                                        </span></div>
                                    <div class="mt-8 pb-28">
                                        <ul class="grid md:flex md:justify-center md:items-center grid-cols-2 gap-0 w-40 xs:w-48 gap-y-6 mx-auto">
                                            <li class="flex flex-col items-center justify-center w-20 h-20 xs:w-24 xs:h-24 md:hidden">
                                                <a href="tel:{{ Auth::user()->escort->contact }}" target="_blank">
                                                    <div class="flex justify-center items-center w-12 h-12 xs:w-16 xs:h-16 rounded-full bg-tertiary text-primary hover:bg-primary hover:text-tertiary text-xs"><i class="fak fa-c-phone fa-2x" aria-hidden="true"></i></div>
                                                </a>
                                                <a target="_blank" href="tel:{{ Auth::user()->escort->contact }}">
                                                    <div class="py-2 text-xs text-gray-700">Appel</div>
                                                </a>
                                            </li>
                                            <li class="flex flex-col items-center justify-center w-20 h-20 xs:w-24 xs:h-24 md:hidden">
                                                <a href="sms:{{ Auth::user()->escort->contact }}?&amp;body=Hello {{ ucfirst(strtolower(Auth::user()->name)) }}, j'ai vu ton magnifique profil sur JustLadies ❤️" target="_blank">
                                                    <div class="flex justify-center items-center w-12 h-12 xs:w-16 xs:h-16 rounded-full bg-tertiary text-primary hover:bg-primary hover:text-tertiary text-xs"><i class="fak fa-c-sms fa-2x" aria-hidden="true"></i></div>
                                                </a>
                                                <a target="_blank" href="sms:{{ Auth::user()->escort->contact }}?&amp;body=Hello {{ ucfirst(strtolower(Auth::user()->name)) }}, j'ai vu ton magnifique profil sur JustLadies ❤️">
                                                    <div class="py-2 text-xs text-gray-700">SMS</div>
                                                </a>
                                            </li>
                                            <li class="flex flex-col items-center justify-center w-20 h-20 xs:w-24 xs:h-24 ">
                                                <a href="{{ route('chat') }}">
                                                    <div class="flex justify-center items-center w-12 h-12 xs:w-16 xs:h-16 rounded-full bg-tertiary text-primary hover:bg-primary hover:text-tertiary text-xs"><i class="fak fa-c-chat fa-2x" aria-hidden="true"></i></div>
                                                </a>
                                                <a href="{{ route('chat') }}">
                                                    <div class="py-2 text-xs text-gray-700">JL Messenger</div>
                                                </a>
                                            </li>
                                            <li onclick="logContactAttempt('whatsapp')" class="flex flex-col items-center justify-center w-20 h-20 xs:w-24 xs:h-24 md:hidden">
                                                <a href="whatsapp://send?phone={{ Auth::user()->escort->contact }}&amp;text=Hello+{{ Auth::user()->name }}%2C+j%27ai+vu+ton+magnifique+profil+sur+JustLadies+%E2%9D%A4%EF%B8%8F" target="_blank">
                                                    <div class="flex justify-center items-center w-12 h-12 xs:w-16 xs:h-16 rounded-full bg-tertiary text-primary hover:bg-primary hover:text-tertiary text-xs"><i class="fak fa-c-whatsapp fa-2x" aria-hidden="true"></i></div>
                                                </a>
                                                <a target="_blank" href="whatsapp://send?phone={{ Auth::user()->escort->contact }}&amp;text=Hello+{{ Auth::user()->name }}%2C+j%27ai+vu+ton+magnifique+profil+sur+JustLadies+%E2%9D%A4%EF%B8%8F">
                                                    <div class="py-2 text-xs text-gray-700">WhatsApp</div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 px-8 w-full max-w-120">
                                        <div class="flex">
                                            <div class="rounded-full bg-gray-100 w-full mr-2 hidden md:flex h-8 justify-center items-center text-sm text-gray-700 font-semibold px-4"><i class="fak fa-c-phone mr-2" aria-hidden="true"></i> <span class="truncate">{{ Auth::user()->escort->contact }}</span></div>
                                            <div class="flex rounded-full bg-gray-100 w-full md:max-w-60 ml-2 md:ml-0 h-8 text-center justify-center items-center text-sm text-gray-700 font-semibold px-4"><a href="http://maps.google.com/?q={{ Auth::user()->escort->location }}" target="_blank" title="{{ Auth::user()->escort->location }}" class="flex justify-center items-center w-full"><i class="fak fa-c-locker mr-2" aria-hidden="true"></i> <span class="truncate">{{ Auth::user()->escort->country }}, {{ Auth::user()->escort->location }}</span></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!----><button data-v-12291c58="" type="button" class="modal__close"><h3 data-v-12291c58=""><i data-v-12291c58="" class="fak fa-c-close" aria-hidden="true"></i></h3></button></div>
                    </div>
                </div>
            </div>
            
            <div data-v-12291c58="" id="parameters_modal" role="dialog" aria-labelledby="modalTitle" aria-describedby="modalDescription" tabindex="-1" class="modal outline-none" style="display: none;">
                <div data-v-12291c58="" class="modal__backdrop"></div>
                <div data-v-12291c58="" class="modal__dialog md:rounded-xl md:max-h-9/10">
                    <div data-v-12291c58="" class="modal__header">
                        <h2 class="font-bold">Paramètres</h2>
                    </div>
                    <div data-v-12291c58="" class="modal__body p-5">
                        <div class="h-full">
                            <div class="flex flex-col h-full justify-between">
                                <div class="mb-4">
                                    <div class="flex flex-col mb-4"><label for="language" class="legend mb-2">Langue</label> <select name="language" id="language" required="required" class="form-input h-10"><option value="fr">Français</option> <option value="en">English</option> <option value="es">Español</option> <option value="de">Deutsch</option></select></div>

                                    <div class="flex flex-col">
                                        <label for="email" class="legend mb-2">Email</label> <input name="email" type="email" id="email" readonly class="form-input h-10" value="{{ Auth::user()->email }}">
                                    </div>
                                    <div class="flex mt-4">
                                        <div data-v-2a6544ec="" class="toggle-wrapper">
                                            <div data-v-2a6544ec="" class="toggle-switch bg-tertiary">
                                                <div data-v-2a6544ec="" class="circle"></div>
                                            </div>
                                        </div>
                                        <div class="cursor-pointer">Recevoir des notifications par e-mail</div>
                                    </div>
                                     <button disabled type="button" class="flex justify-center items-center mt-8 w-full btn-primary">
                                                Confirmer les modifications
                                            </button>
                                    </div>
                                    <div class="alert alert-warning" role="alert">
                                        Veuillez contacter l'administrateur pour modifier cette section!
                                    </div>
                                <div>
                                    <div class="mb-4 bg-gray-600 h-0.5 w-full"></div> <strong>Supprimer mon
                                                compte</strong>
                                    <p class="mt-4">
                                        Attention cette action est irréversible!
                                    </p> <button class="mt-4 rounded-xl w-full p-2 border border-red-danger bg-white text-red-danger" id="deleteMyAccount">Supprimer
                                                mon compte</button></div>
                            </div>
                            <div data-v-95b7e92a="" id="user_account_deletion_alert" role="dialog" tabindex="-1" class="alert overflow-x-hidden overflow-y-auto fixed inset-0 z-1000 h-auto text-sm" style="display: none;">
                                <div data-v-95b7e92a="" class="alert__backdrop fixed inset-0 z-1051 bg-black bg-opacity-70"></div>
                                <div data-v-95b7e92a="" class="alert__wrapper relative z-2060 h-full flex flex-col justify-center items-center">
                                    <div data-v-95b7e92a="" class="alert__dialog bg-white flex flex-col w-4/5 md:w-80 max-h-9/10 rounded-lg relative shadow">
                                        <div data-v-95b7e92a="" class="alert__header text-lg font-bold px-6 py-4">
                                            <h3 class="text-base mb-4">Supprimer mon compte</h3>
                                        </div>
                                        <div class="alert__body overflow-auto flex flex-1 flex-col items-stretch px-6 py-2">
                                            <p class="text-gray-700 mb-4">
                                                Attention cette action est irréversible. Êtes-vous sur de vouloir supprimer votre compte ?
                                            </p>
                                        </div>
                                        <div data-v-95b7e92a="" class="alert__footer px-6 py-4">
                                            <div class="flex items-end"><button type="button" class="mr-2 p-2 flex items-center justify-center btn btn-secondary modal__close">
                                                            Annuler
                                                        </button> <button onclick="event.preventDefault();  alert('Action impossible');" type="button" class="py-2 px-4 bg-red-danger rounded-lg text-white">
                                                            Supprimer
                                                        </button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <button data-v-12291c58="" type="button" class="modal__close"><h3 data-v-12291c58=""><i data-v-12291c58="" aria-hidden="true" class="fak fa-c-close"></i></h3></button></div>
            </div>
            <div data-v-95b7e92a="" id="user_modify_password_alert" role="dialog" tabindex="-1" class="alert overflow-x-hidden overflow-y-auto fixed inset-0 z-1000 h-auto text-sm" style="display: none;">
                <div data-v-95b7e92a="" class="alert__backdrop fixed inset-0 z-1051 bg-black bg-opacity-70"></div>
                <div data-v-95b7e92a="" class="alert__wrapper relative z-2060 h-full flex flex-col justify-center items-center">
                    <div data-v-95b7e92a="" class="alert__dialog bg-white flex flex-col w-4/5 md:w-80 max-h-9/10 rounded-lg relative shadow">
                        <div data-v-95b7e92a="" class="alert__header text-lg font-bold px-6 py-4">
                            <h3 class="text-base">Modifier le mot de passe</h3>
                        </div>
                        <form action="{{ route('users.escort.reset.password', Auth::user()->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="from" value="password">
                            <div data-v-95b7e92a="" class="alert__body overflow-auto flex flex-1 flex-col items-stretch px-6 py-2">
                                <div class="h-full">
                                    <div class="flex flex-col h-full justify-between">
                                        <div class="mb-3">
                                            <div class="flex flex-col mb-4"><input name="current_password" type="password" id="current_password" required="required" placeholder="Mot de passe actuel" class="form-input h-10"></div>
                                            <div class="flex flex-col mb-3"><input name="password" type="password" id="password" required="required"
                                                    placeholder="Nouveau mot de passe" class="form-input h-10">
                                            </div>
                                            <div class="flex flex-col mb-3"><input name="password_confirmation" type="password" id=password_confirmation" required="required"
                                                    placeholder="Confirmer mot de passe" class="form-input h-10"></div>
                                            {{-- <div class="flex flex-col mb-4"><input name="password_email" type="email" id="password_email" required="required" placeholder="Votre email actuel" class="form-input h-10"></div> --}}
                                        </div>
                                        {{-- <div class="alert alert-secondary" role="alert">
                                            Un message contenant un lien de réinitialisation de mot de passe vous sera envoyé si l'email renseigné est correct.
                                        </div> --}}
                                        <div class="flex justify-end mb-1"><button class="mr-2 p-2 flex items-center btn btn-secondary justify-center modal__close">
                                                        Annuler
                                                    </button> <button type="submit"  class="btn-primary h-10 flex items-center">
                                                        Confirmer
                                                    </button></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                        <div data-v-95b7e92a="" class="alert__footer"></div>
                    </div>
                </div>
            </div>
            <div data-v-12291c58="" data-v-19ae8626="" id="wallet_modal" role="dialog" aria-labelledby="modalTitle" aria-describedby="modalDescription" tabindex="-1" class="modal outline-none" style="display: none;">
                <div data-v-12291c58="" class="modal__backdrop"></div>
                <div data-v-12291c58="" class="modal__dialog md:rounded-xl md:max-h-9/10">
                    <div data-v-12291c58="" class="modal__header border-gray-600 border-b">
                        <h2 data-v-19ae8626="" class="font-bold">Portefeuille</h2>
                    </div>
                    <div data-v-12291c58="" class="modal__body">
                        <div data-v-19ae8626="" class="flex justify-evenly items-start p-5">
                            <div data-v-19ae8626="" class="left w-2/3 flex flex-col justify-center items-center"><i data-v-19ae8626="" aria-hidden="true" class="fak fa-c-coins opacity-30 pb-1"></i>
                                <p data-v-19ae8626="" class="text-xl font-bold">0</p>
                                <p data-v-19ae8626="" class="text-xs text-gray-700">
                                    Solde actuel
                                </p> <button data-v-72737ed7="" id="topup_creditBtn" data-v-19ae8626="" class="flex justify-center items-center mt-2 btn-primary mini">
                                            Achat de crédits
                                        </button></div>
                        </div>
                        <hr data-v-19ae8626="" thin="true" class="border-gray-600">
                        <div data-v-19ae8626="" id="transactions" class="p-5 overflow-y-auto">
                            <h4 data-v-19ae8626="" class="font-semibold mb-2">Transactions</h4>
                        </div>
                        <div data-v-95b7e92a="" data-v-772aa419="" data-v-19ae8626="" id="topup-credit-alert" role="dialog" tabindex="-1" class="alert overflow-x-hidden overflow-y-auto fixed inset-0 z-1000 h-auto text-sm" style="display: none;">
                            <div data-v-95b7e92a="" class="alert__backdrop fixed inset-0 z-1051 bg-black bg-opacity-70"></div>
                            <div data-v-95b7e92a="" class="alert__wrapper relative z-2060 h-full flex flex-col justify-center items-center">
                                <div data-v-95b7e92a="" class="alert__dialog bg-white flex flex-col w-4/5 md:w-80 max-h-9/10 rounded-lg relative shadow">
                                    <div data-v-95b7e92a="" class="alert__header text-lg font-bold px-6 py-4">
                                        <div data-v-772aa419="" class="absolute -top-6 left-5 bg-white p-0.5 rounded-xl">
                                            <div data-v-772aa419="" class="font-normal h-12 w-12 inline-flex justify-center items-center bg-primary bg-opacity-10 rounded-lg"><i data-v-772aa419="" aria-hidden="true" class="fak fa-c-topline text-3xl text-primary"></i></div>
                                        </div>
                                        <h3 data-v-772aa419="" class="font-bold text-lg mt-6">Achat de crédits
                                        </h3>
                                    </div>
                                    <div data-v-95b7e92a="" class="alert__body overflow-auto flex flex-1 flex-col items-stretch px-6 py-2">
                                        <div data-v-772aa419="" class="flex flex-col mb-4"><label data-v-772aa419="" class="legend mb-2">Crédits</label> 
                                            <select id="amount" name="amount" required="required" class="form-input h-10"><option data-v-772aa419="" value="20">
                                                            20 crédits
                                                        </option> <option data-v-772aa419="" value="50">
                                                            50 crédits
                                                        </option> <option data-v-772aa419="" value="100">
                                                            100 crédits
                                                        </option> <option data-v-772aa419="" value="150">
                                                            150 crédits
                                                        </option> <option data-v-772aa419="" value="200">
                                                            200 crédits
                                                        </option> <option data-v-772aa419="" value="300">
                                                            300 crédits
                                                        </option> <option data-v-772aa419="" value="400">
                                                            400 crédits
                                                        </option> <option data-v-772aa419="" value="500">
                                                            500 crédits
                                                        </option> <option data-v-772aa419="" value="750">
                                                            750 crédits
                                                        </option> <option data-v-772aa419="" value="1000">
                                                            1000 crédits
                                                        </option></select></div>
                                    </div>
                                    <div data-v-95b7e92a="" class="alert__footer px-6 py-4">
                                        <div data-v-772aa419="" class="flex justify-between mb-1 text-xs text-gray-700"><span data-v-772aa419="">TVA (7.7%)</span> <span data-v-772aa419="">CHF 3.85</span></div>
                                        <div data-v-772aa419="" class="flex justify-between text-xs text-gray-700"><span data-v-772aa419="">Total</span> <span data-v-772aa419="">CHF
                                                        53.85</span></div>
                                        <div data-v-772aa419="" class="flex justify-end mt-4"><button type="button" data-v-772aa419="" class="mr-2 p-2 flex items-center justify-center modal__close">
                                                        Annuler
                                                    </button> <button disabled data-v-72737ed7="" data-v-772aa419="" class="flex justify-center items-center w-1/2 w-full btn-primary"><span data-v-772aa419="" data-v-72737ed7="">Achat indisponible</span></button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-v-95b7e92a="" data-v-19ae8626="" role="dialog" tabindex="-1" id="payment-success-alert" class="alert overflow-x-hidden overflow-y-auto fixed inset-0 z-1000 h-auto text-sm" style="display: none;">
                            <div data-v-95b7e92a="" class="alert__backdrop fixed inset-0 z-1051 bg-black bg-opacity-70"></div>
                            <div data-v-95b7e92a="" class="alert__wrapper relative z-2060 h-full flex flex-col justify-center items-center">
                                <div data-v-95b7e92a="" class="alert__dialog bg-white flex flex-col w-4/5 md:w-80 max-h-9/10 rounded-lg relative shadow">
                                    <div data-v-95b7e92a="" class="alert__header text-lg font-bold px-6 py-4">
                                        <h3 class="text-base">Information</h3>
                                    </div>
                                    <div data-v-95b7e92a="" class="alert__body overflow-auto flex flex-1 flex-col items-stretch px-6 py-2">
                                        Votre paiement a bien été traité et votre commande est confirmée.<br data-v-19ae8626=""><br data-v-19ae8626=""> Merci pour votre achat.
                                    </div>
                                    <div data-v-95b7e92a="" class="alert__footer px-6 py-4"><button data-v-72737ed7="" class="flex justify-center items-center ml-auto w-full btn-secondary"><span data-v-72737ed7="">Fermer</span></button></div>
                                </div>
                            </div>
                        </div>
                        <div data-v-95b7e92a="" data-v-19ae8626="" role="dialog" tabindex="-1" id="payment-error-alert" class="alert overflow-x-hidden overflow-y-auto fixed inset-0 z-1000 h-auto text-sm" style="display: none;">
                            <div data-v-95b7e92a="" class="alert__backdrop fixed inset-0 z-1051 bg-black bg-opacity-70"></div>
                            <div data-v-95b7e92a="" class="alert__wrapper relative z-2060 h-full flex flex-col justify-center items-center">
                                <div data-v-95b7e92a="" class="alert__dialog bg-white flex flex-col w-4/5 md:w-80 max-h-9/10 rounded-lg relative shadow">
                                    <div data-v-95b7e92a="" class="alert__header text-lg font-bold px-6 py-4">
                                        <h3 class="text-base">Information</h3>
                                    </div>
                                    <div data-v-95b7e92a="" class="alert__body overflow-auto flex flex-1 flex-col items-stretch px-6 py-2">
                                        Vous avez annulé votre paiement ou une erreur inattendu a été rencontré.
                                        <br data-v-19ae8626=""><br data-v-19ae8626=""> Vous avez des problèmes pour payer votre annonce? Merci de contacter notre support par le chat ou WhatsApp: +41799606969
                                    </div>
                                    <div data-v-95b7e92a="" class="alert__footer px-6 py-4"><button data-v-72737ed7="" class="flex justify-center items-center ml-auto w-full btn-secondary"><span data-v-72737ed7="">Fermer</span></button></div>
                                </div>
                            </div>
                        </div>
                    </div> <button data-v-12291c58="" type="button" class="modal__close"><h3 data-v-12291c58=""><i data-v-12291c58="" aria-hidden="true" class="fak fa-c-close"></i></h3></button></div>
            </div>
            <div data-v-12291c58="" data-v-670333e2="" class="modal outline-none" id="documents-modal" role="dialog"
                aria-labelledby="modalTitle" aria-describedby="modalDescription" tabindex="-1" style="display: none;">
                <div data-v-12291c58="" class="modal__backdrop"></div>
                <div data-v-12291c58="" class="modal__dialog md:rounded-xl md:max-h-9/10">
                    <div data-v-12291c58="" class="modal__header">
                        <h2 data-v-670333e2="" class="font-bold">Factures</h2>
                    </div>
                    <div data-v-12291c58="" class="modal__body p-5"><span data-v-670333e2=""
                            class="font-semibold text-tiny opacity-30 mb-1">Factures</span> </div>
                    <!----> <button data-v-12291c58="" type="button" class="modal__close">
                        <h3 data-v-12291c58=""><i data-v-12291c58="" class="fak fa-c-close"></i></h3>
                    </button>
                </div>
            </div> 
        </div>
    </div>

    <script>
        window.userName = @json(Auth::user()->name);
        window.escortInfos = @json(Auth::user()->escort);
        window.gallery = @json($gallery);
    </script>
@endsection
