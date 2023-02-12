@extends('layouts.users.app')

@section('content')
    <div id="dash" style="display: none;">
        <div>
            <div
                class="md:container md:transform md:left-1/2 md:-translate-x-1/2 h-18 flex justify-between md:absolute md:w-full items-end md:items-start py-3 px-4 z-20">
                <span>
                    <h2 class="capitalize font-bold mt-6 md:hidden">{{ Auth::user()->name }}</h2>
                </span>
                <div class="ml-auto flex items-center">
                    <div class="relative z-20">
                        <div id="dash_options_button"
                            class="icon-wrapper flex justify-center items-center rounded-full group cursor-pointer flex-shrink-0 hover:bg-gray-100 h-10 w-10">
                            <i class="fak fa-c-ellipsis px-4 text-2xl" aria-hidden="true"></i>
                        </div>
                        <div id="dash_options_dropdown"
                            class="absolute bg-white top-12 right-0 flex flex-col w-64 h-74 rounded-lg shadow text-dark"
                            style="display: none;">
                            <div class="bg-gray-100 p-4 flex justify-between rounded-t-lg">
                                <div class="flex flex-col"><span class="text-sm text-gray-800">Crédit</span>
                                    <span class="text-2xl font-bold">
                                        0
                                    </span>
                                </div>
                                <div><a
                                        class="text-primary hover:text-primary-hover cursor-pointer text-sm" id="wallet_modalBtn">
                                        Gérer
                                    </a></div>
                            </div>
                            <ul>
                                <li id="parametersButton"
                                    class="px-4 h-10 flex justify-start items-center hover:bg-tertiary cursor-pointer">
                                    <a class="flex items-center h-full w-full"><i
                                            class="w-6 text-center mr-3 fak fa-c-gear"
                                            aria-hidden="true"></i>
                                        <span>Paramètres</span></a>
                                </li>
                                <li id="user_modify_password_button"
                                    class="px-4 h-10 flex justify-start items-center hover:bg-tertiary cursor-pointer">
                                    <a class="flex items-center h-full w-full"><i
                                            class="w-6 text-center mr-3 fak fa-c-lock"
                                            aria-hidden="true"></i> <span>Mot de
                                            passe</span></a>
                                </li>
                                <li
                                    class="px-4 h-10 flex justify-start items-center hover:bg-tertiary cursor-pointer">
                                    <a class="flex items-center h-full w-full"><i
                                            class="w-6 text-center mr-3 fak fa-c-contract"
                                            aria-hidden="true"></i>
                                        <span>Factures</span></a>
                                </li>
                                <li
                                    class="px-4 h-10 flex justify-start items-center hover:bg-tertiary cursor-pointer">
                                    <a class="flex items-center h-full w-full"><i
                                            class="w-6 text-center mr-3 fak fa-c-mail"
                                            aria-hidden="true"></i>
                                        <span>Support</span></a>
                                </li>
                                <li
                                    class="px-4 h-10 flex justify-start items-center hover:bg-tertiary cursor-pointer">
                                    <a class="flex items-center h-full w-full"><i
                                            class="w-6 text-center mr-3 fak fa-c-gear"
                                            aria-hidden="true"></i>
                                        <span>FAQ</span></a>
                                </li>
                                <li
                                    class="px-4 h-10 flex justify-start items-center hover:bg-tertiary cursor-pointer text-red-600">
                                    <a href="#" class="flex items-center h-full w-full" onclick="event.preventDefault();
                                                                                                                                                                        document.getElementById('logout-form').submit();"><i
                                            class="w-6 text-center mr-3 fak fa-c-disconnect"
                                            aria-hidden="true"></i>
                                        <span>Se déconnecter</span></a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf</form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex md:flex-col items-center p-4">
                <div
                    class="bg-gray-600 rounded-full mr-4 md:mr-0 relative inline-block flex-shrink-0 md:z-20">
                    <div class="h-24 w-24 rounded-full flex justify-center items-center capitalize" style="background-image: url('{{ Chatify::getUserWithAvatar(Auth::user())->avatar }}');">
                        <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->avatar }}">
                    </div>
                    <!---->
                </div>
                <h2 class="capitalize font-bold mt-6 hidden md:block">{{ Auth::user()->name }}</h2>
                <div class="grid grid-cols-2 gap-4 md:mt-4">
                    <div class="flex flex-col md:flex-row text-sm"><span class="font-semibold md:mr-1">
                            {{ count($escorts) }}
                        </span> <span class="text-gray-700">
                            Suivie
                        </span></div>
                    <div class="flex flex-col justify-end md:flex-row text-sm"><span
                            class="font-semibold md:mr-1">
                            0
                        </span> <span class="text-gray-700">
                            Crédit
                        </span></div>
                </div>
            </div>
        </div>
        <div class="h-full">
            <nav class="h-12 flex items-end justify-center pb-2 sticky bg-white z-10 border-b md:border-b-0 border-gray-600"
                style="top: 0px;">
                <ul class="w-full md:max-w-xs grid gap-1 px-4 grid-cols-2">
                    <li class="mx-6 text-center"><a title="following"
                            class="focus:outline-none group cursor-pointer text-2xl text-dark"><i
                                class="fak fa-c-star" aria-hidden="true"></i></a></li>
                    <li class="mx-6 text-center"><a title="paid-content"
                            class="focus:outline-none group cursor-pointer text-2xl text-gray-700 hover:text-gray-800"><i
                                class="fak fa-c-lock" aria-hidden="true"></i></a></li>
                </ul>
            </nav>
            <div id="tabs" class="overflow-hidden">
                <div class="h-full relative">
                    <section id="public-gallery">
                        <div class="p-4">
                            <div>
                                <div class="
                                grid grid-cols-3
                                sm:grid-cols-4
                                md:grid-cols-4
                                lg:grid-cols-5
                                xl:grid-cols-5
                                2xl:grid-cols-6
                                gap-4
                                lg:gap-8">
                                @foreach($escorts as $escort)
                                    <a href="{{ '/girls/'.$escort->name.'/'.$escort->id }}">
                                        <div
                                            class="flex flex-col justify-center items-start transform transition-all duration-300 hover:scale-102">
                                            <div
                                                class="relative bg-gray-100 w-full overflow-hidden rounded-lg pb-default-ratio loaded">
                                                <img src="{{ asset('storage/'.$escort->avatar) }}"
                                                    data-url="{{ asset('storage/'.$escort->avatar) }}"
                                                    alt="{{ $escort->name }}"
                                                    class="w-full h-full absolute flex-shrink-0 object-cover bg-gray-100">
                                                <!---->
                                            </div>
                                            <div class="mt-2 text-sm">{{ $escort->name }}</div>
                                            <div class="text-xs text-gray-700 truncate">
                                                {{ $escort->escort->location.', '.$escort->escort->country }}
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                                </div>
                                <!---->
                            </div>
                        </div>
                    </section>
                    <section id="paid-content" style="display: none;">
                        <div class="md:p-4">
                            <div class="relative">
                                <div class="flex flex-col justify-center items-center mx-auto w-auto h-80">
                                    <div
                                        class="rounded-full w-20 h-20 p-4 bg-gray-100 text-dark flex justify-center items-center mb-4">
                                        <i class="fak fa-c-lock fa-2x" aria-hidden="true"></i>
                                    </div> <span class="font-bold px-4 text-center">Vous n’avez pas de
                                        contenu privé</span>
                                </div>
                                <div id="feed-wrapper-paid-content"
                                    class="fixed inset-0 z-50 bg-white overflow-y-auto h-screen"
                                    style="display: none;">
                                    <div class="top-0 sticky z-30 w-full bg-white">
                                        <div class="relative flex flex-row p-6 items-center justify-center">
                                            <button
                                                class="flex md:hidden absolute left-0 mr-2 px-4 items-center"><i
                                                    class="far fa-arrow-left text-2xl"
                                                    aria-hidden="true"></i></button>
                                            <button
                                                class="absolute left-0 md:flex hidden ml-2 items-center h-8 bg-tertiary text-sm px-5 rounded-lg focus:outline-none">
                                                Retour
                                            </button> <span
                                                class="flex justify-center items-center h-10 text-center text-xs text-gray-700">Contenu
                                                privé</span>
                                        </div>
                                    </div>
                                    <div id="gallery-feed" class="mx-auto h-full">
                                        <div id="feed" class="pb-16"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div data-v-95b7e92a=""
            class="alert overflow-x-hidden overflow-y-auto fixed inset-0 z-1000 h-auto text-sm"
            id="user_modify_password_alert" role="dialog" tabindex="-1" style="display: none;">
            <div data-v-95b7e92a="" class="alert__backdrop fixed inset-0 z-1051 bg-black bg-opacity-70">
            </div>
            <div data-v-95b7e92a=""
                class="alert__wrapper relative z-2060 h-full flex flex-col justify-center items-center">
                <div data-v-95b7e92a=""
                    class="alert__dialog bg-white flex flex-col w-4/5 md:w-80 max-h-9/10 rounded-lg relative shadow">
                    <div data-v-95b7e92a="" class="alert__header text-lg font-bold px-6 py-4">
                        <h3 class="text-base">Modifier le mot de passe</h3>
                    </div>
                    <div data-v-95b7e92a=""
                        class="alert__body overflow-auto flex flex-1 flex-col items-stretch px-6 py-2">
                        <div class="h-full">
                            <div class="flex flex-col h-full justify-between">
                                <div class="mb-4">
                                    <div class="flex flex-col mb-4"><input name="old_password"
                                            type="password" id="old_password" required="required"
                                            placeholder="Ancien mot de passe" class="form-input h-10">
                                    </div>
                                    <div class="flex flex-col mb-4"><input name="password" type="password"
                                            id="password" required="required"
                                            placeholder="Nouveau mot de passe" class="form-input h-10">
                                    </div>
                                </div>
                                <div class="flex justify-end mb-4"><button
                                        class="mr-2 p-2 flex items-center justify-center">
                                        Annuler
                                    </button> <button class="btn-primary h-10 flex items-center">
                                        Confirmer
                                    </button></div>
                            </div>
                        </div>
                    </div>
                    <div data-v-95b7e92a="" class="alert__footer"></div>
                </div>
            </div>
        </div>
        <div data-v-12291c58="" class="modal outline-none" id="parameters_modal" role="dialog"
            aria-labelledby="modalTitle" aria-describedby="modalDescription" tabindex="-1"
            style="display: none;">
            <div data-v-12291c58="" class="modal__backdrop"></div>
            <div data-v-12291c58="" class="modal__dialog md:rounded-xl md:max-h-9/10">
                <div data-v-12291c58="" class="modal__header">
                    <h2 class="font-bold">Paramètres</h2>
                </div>
                <div data-v-12291c58="" class="modal__body p-5">
                    <div class="h-full">
                        <div class="flex flex-col h-full justify-between">
                            <div class="mb-4">
                                <div class="flex flex-col mb-4"><label for="language"
                                        class="legend mb-2">Langue</label>
                                    <select name="language" id="language" required="required"
                                        class="form-input h-10">
                                        <option value="fr">Français</option>
                                        <option value="en">English</option>
                                        <option value="es">Español</option>
                                        <option value="de">Deutsch</option>
                                    </select>
                                    <!---->
                                </div>
                                <div class="flex flex-col"><label for="email"
                                        class="legend mb-2">Email</label> <input name="email" type="email"
                                        id="email" required="required" class="form-input h-10">
                                </div>
                                <div class="flex mt-4">
                                    <div data-v-2a6544ec="" class="toggle-wrapper">
                                        <div data-v-2a6544ec="" class="toggle-switch bg-tertiary">
                                            <div data-v-2a6544ec="" class="circle"></div>
                                        </div>
                                    </div>
                                    <div class="cursor-pointer">Recevoir des notifications par e-mail</div>
                                </div> <button data-v-72737ed7="" disabled="disabled"
                                    class="flex justify-center items-center mt-8 w-full btn-primary">
                                    Confirmer les modifications
                                </button>
                            </div>
                            <div>
                                <div class="mb-4 bg-gray-600 h-0.5 w-full"></div> <strong>Supprimer mon
                                    compte</strong>
                                <p class="mt-4">
                                    Attention cette action est irréversible!
                                </p> <button
                                    class="mt-4 rounded-xl w-full p-2 border border-red-danger bg-white text-red-danger">Supprimer
                                    mon compte</button>
                            </div>
                        </div>
                        <div data-v-95b7e92a=""
                            class="alert overflow-x-hidden overflow-y-auto fixed inset-0 z-1000 h-auto text-sm"
                            id="user_account_deletion_alert" role="dialog" tabindex="-1"
                            style="display: none;">
                            <div data-v-95b7e92a=""
                                class="alert__backdrop fixed inset-0 z-1051 bg-black bg-opacity-70">
                            </div>
                            <div data-v-95b7e92a=""
                                class="alert__wrapper relative z-2060 h-full flex flex-col justify-center items-center">
                                <div data-v-95b7e92a=""
                                    class="alert__dialog bg-white flex flex-col w-4/5 md:w-80 max-h-9/10 rounded-lg relative shadow">
                                    <div data-v-95b7e92a=""
                                        class="alert__header text-lg font-bold px-6 py-4">
                                        <h3 class="text-base mb-4">Supprimer mon compte</h3>
                                    </div>
                                    <div data-v-95b7e92a=""
                                        class="alert__body overflow-auto flex flex-1 flex-col items-stretch px-6 py-2">
                                        <p class="text-gray-700 mb-4">
                                            Attention cette action est irréversible. Êtes-vous sur de
                                            vouloir supprimer
                                            votre compte ?
                                        </p>
                                    </div>
                                    <div data-v-95b7e92a="" class="alert__footer px-6 py-4">
                                        <div class="flex items-end"><button
                                                class="mr-2 p-2 flex items-center justify-center">
                                                Annuler
                                            </button> <button
                                                class="py-2 px-4 bg-red-danger rounded-lg text-white">
                                                Supprimer
                                            </button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!----> <button data-v-12291c58="" type="button" class="modal__close">
                    <h3 data-v-12291c58=""><i data-v-12291c58="" class="fak fa-c-close"
                            aria-hidden="true"></i></h3>
                </button>
            </div>
        </div>
        <div data-v-12291c58="" data-v-19ae8626="" class="modal outline-none" id="wallet_modal"
            role="dialog" aria-labelledby="modalTitle" aria-describedby="modalDescription" tabindex="-1"
            style="display: none;">
            <div data-v-12291c58="" class="modal__backdrop"></div>
            <div data-v-12291c58="" class="modal__dialog md:rounded-xl md:max-h-9/10">
                <div data-v-12291c58="" class="modal__header border-gray-600 border-b">
                    <h2 data-v-19ae8626="" class="font-bold">Portefeuille</h2>
                </div>
                <div data-v-12291c58="" class="modal__body">
                    <div data-v-19ae8626="" class="flex justify-evenly items-start p-5">
                        <div data-v-19ae8626=""
                            class="left w-2/3 flex flex-col justify-center items-center"><i
                                data-v-19ae8626="" class="fak fa-c-coins opacity-30 pb-1"
                                aria-hidden="true"></i>
                            <p data-v-19ae8626="" class="text-xl font-bold">0</p>
                            <p data-v-19ae8626="" class="text-xs text-gray-700">
                                Solde actuel
                            </p> <button data-v-72737ed7="" data-v-19ae8626=""
                                class="flex justify-center items-center mt-2 btn-primary mini">
                                Achat de crédits
                            </button>
                        </div>
                        <!---->
                    </div>
                    <hr data-v-19ae8626="" class="border-gray-600" thin="true">
                    <div data-v-19ae8626="" id="transactions" class="p-5 overflow-y-auto">
                        <h4 data-v-19ae8626="" class="font-semibold mb-2">Transactions</h4>
                    </div>
                    <!---->
                    <div data-v-95b7e92a="" data-v-772aa419="" data-v-19ae8626=""
                        class="alert overflow-x-hidden overflow-y-auto fixed inset-0 z-1000 h-auto text-sm"
                        id="topup-credit-alert" role="dialog" tabindex="-1" style="display: none;">
                        <div data-v-95b7e92a=""
                            class="alert__backdrop fixed inset-0 z-1051 bg-black bg-opacity-70"></div>
                        <div data-v-95b7e92a=""
                            class="alert__wrapper relative z-2060 h-full flex flex-col justify-center items-center">
                            <div data-v-95b7e92a=""
                                class="alert__dialog bg-white flex flex-col w-4/5 md:w-80 max-h-9/10 rounded-lg relative shadow">
                                <div data-v-95b7e92a="" class="alert__header text-lg font-bold px-6 py-4">
                                    <div data-v-772aa419=""
                                        class="absolute -top-6 left-5 bg-white p-0.5 rounded-xl">
                                        <div data-v-772aa419=""
                                            class="font-normal h-12 w-12 inline-flex justify-center items-center bg-primary bg-opacity-10 rounded-lg">
                                            <i data-v-772aa419=""
                                                class="fak fa-c-topline text-3xl text-primary"
                                                aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <h3 data-v-772aa419="" class="font-bold text-lg mt-6">Achat de crédits
                                    </h3>
                                </div>
                                <div data-v-95b7e92a=""
                                    class="alert__body overflow-auto flex flex-1 flex-col items-stretch px-6 py-2">
                                    <div data-v-772aa419="" class="flex flex-col mb-4"><label
                                            data-v-772aa419="" class="legend mb-2">Crédits</label> <select
                                            data-v-772aa419="" id="amount" name="amount" type="number"
                                            required="required" tabindex="100" class="form-input h-10">
                                            <option data-v-772aa419="" value="20">
                                                20 crédits
                                            </option>
                                            <option data-v-772aa419="" value="50">
                                                50 crédits
                                            </option>
                                            <option data-v-772aa419="" value="100">
                                                100 crédits
                                            </option>
                                            <option data-v-772aa419="" value="150">
                                                150 crédits
                                            </option>
                                            <option data-v-772aa419="" value="200">
                                                200 crédits
                                            </option>
                                            <option data-v-772aa419="" value="300">
                                                300 crédits
                                            </option>
                                            <option data-v-772aa419="" value="400">
                                                400 crédits
                                            </option>
                                            <option data-v-772aa419="" value="500">
                                                500 crédits
                                            </option>
                                            <option data-v-772aa419="" value="750">
                                                750 crédits
                                            </option>
                                            <option data-v-772aa419="" value="1000">
                                                1000 crédits
                                            </option>
                                        </select></div>
                                </div>
                                <div data-v-95b7e92a="" class="alert__footer px-6 py-4">
                                    <div data-v-772aa419=""
                                        class="flex justify-between mb-1 text-xs text-gray-700"><span
                                            data-v-772aa419="">TVA (7.7%)</span> <span
                                            data-v-772aa419="">CHF 3.85</span>
                                    </div>
                                    <div data-v-772aa419=""
                                        class="flex justify-between text-xs text-gray-700"><span
                                            data-v-772aa419="">Total</span> <span data-v-772aa419="">CHF
                                            53.85</span></div>
                                    <div data-v-772aa419="" class="flex justify-end mt-4"><button
                                            data-v-772aa419=""
                                            class="mr-2 p-2 flex items-center justify-center">
                                            Annuler
                                        </button> <button data-v-72737ed7="" data-v-772aa419=""
                                            class="flex justify-center items-center w-1/2 w-full btn-primary"><span
                                                data-v-772aa419="" data-v-72737ed7="">Acheter 50
                                                crédits</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-v-95b7e92a="" data-v-19ae8626=""
                        class="alert overflow-x-hidden overflow-y-auto fixed inset-0 z-1000 h-auto text-sm"
                        role="dialog" tabindex="-1" id="payment-success-alert" style="display: none;">
                        <div data-v-95b7e92a=""
                            class="alert__backdrop fixed inset-0 z-1051 bg-black bg-opacity-70"></div>
                        <div data-v-95b7e92a=""
                            class="alert__wrapper relative z-2060 h-full flex flex-col justify-center items-center">
                            <div data-v-95b7e92a=""
                                class="alert__dialog bg-white flex flex-col w-4/5 md:w-80 max-h-9/10 rounded-lg relative shadow">
                                <div data-v-95b7e92a="" class="alert__header text-lg font-bold px-6 py-4">
                                    <h3 class="text-base">Information</h3>
                                </div>
                                <div data-v-95b7e92a=""
                                    class="alert__body overflow-auto flex flex-1 flex-col items-stretch px-6 py-2">
                                    Votre paiement a bien été traité et votre commande est confirmée.<br
                                        data-v-19ae8626=""><br data-v-19ae8626="">
                                    Merci pour votre achat.
                                </div>
                                <div data-v-95b7e92a="" class="alert__footer px-6 py-4"><button
                                        data-v-72737ed7=""
                                        class="flex justify-center items-center ml-auto w-full btn-secondary"><span
                                            data-v-72737ed7="">Fermer</span></button></div>
                            </div>
                        </div>
                    </div>
                    <div data-v-95b7e92a="" data-v-19ae8626=""
                        class="alert overflow-x-hidden overflow-y-auto fixed inset-0 z-1000 h-auto text-sm"
                        role="dialog" tabindex="-1" id="payment-error-alert" style="display: none;">
                        <div data-v-95b7e92a=""
                            class="alert__backdrop fixed inset-0 z-1051 bg-black bg-opacity-70"></div>
                        <div data-v-95b7e92a=""
                            class="alert__wrapper relative z-2060 h-full flex flex-col justify-center items-center">
                            <div data-v-95b7e92a=""
                                class="alert__dialog bg-white flex flex-col w-4/5 md:w-80 max-h-9/10 rounded-lg relative shadow">
                                <div data-v-95b7e92a="" class="alert__header text-lg font-bold px-6 py-4">
                                    <h3 class="text-base">Information</h3>
                                </div>
                                <div data-v-95b7e92a=""
                                    class="alert__body overflow-auto flex flex-1 flex-col items-stretch px-6 py-2">
                                    Vous avez annulé votre paiement ou une erreur inattendu a été
                                    rencontré.<br data-v-19ae8626=""><br data-v-19ae8626="">
                                    Vous avez des problèmes pour payer votre annonce? Merci de contacter
                                    notre support par
                                    le chat ou WhatsApp: +41799606969
                                </div>
                                <div data-v-95b7e92a="" class="alert__footer px-6 py-4"><button
                                        data-v-72737ed7=""
                                        class="flex justify-center items-center ml-auto w-full btn-secondary"><span
                                            data-v-72737ed7="">Fermer</span></button></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!----> <button data-v-12291c58="" type="button" class="modal__close">
                    <h3 data-v-12291c58=""><i data-v-12291c58="" class="fak fa-c-close"
                            aria-hidden="true"></i></h3>
                </button>
            </div>
        </div>
        <div data-v-12291c58="" data-v-670333e2="" class="modal outline-none" id="documents-modal"
            role="dialog" aria-labelledby="modalTitle" aria-describedby="modalDescription" tabindex="-1"
            style="display: none;">
            <div data-v-12291c58="" class="modal__backdrop"></div>
            <div data-v-12291c58="" class="modal__dialog md:rounded-xl md:max-h-9/10">
                <div data-v-12291c58="" class="modal__header">
                    <h2 data-v-670333e2="" class="font-bold">Factures</h2>
                </div>
                <div data-v-12291c58="" class="modal__body p-5"><span data-v-670333e2=""
                        class="font-semibold text-tiny opacity-30 mb-1">Factures</span> </div>
                <!----> <button data-v-12291c58="" type="button" class="modal__close">
                    <h3 data-v-12291c58=""><i data-v-12291c58="" class="fak fa-c-close"
                            aria-hidden="true"></i></h3>
                </button>
            </div>
        </div>
    </div>
@endsection
