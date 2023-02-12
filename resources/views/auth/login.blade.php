@extends('layouts.auth')

@section('title', 'Connexion à votre compte JustLadies - Escorts premium en Suisse et en France')
@section('content')
    <div
        class="full-wrapper w-full min-h-screen md:min-h-0 md:mx-auto md:max-w-102 pb-8 p-4 md:rounded-2xl bg-white md:my-8">
        <form class="" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="flex flex-col justify-between items-center p-4 w-full">
                <div class="logo pt-2 pb-2">
                    <a href="/"><img src="{{ asset('img/auth_logo.png') }}" alt="JustLadies Logo"
                            style="height: 150px;"></a>
                </div>
                <div class="w-full">
                    <div class="flex flex-col mb-4">
                        <label class="legend mb-2" for="email">E-mail</label>
                        <input value="{{ old('email') }}" name="email" class="form-input h-12 @error('email') is-invalid @enderror" type="email" autocomplete="email" autofocus id="email" required="">

                        @error('email')
                            <span style="color: red" class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="flex flex-col">
                        <label class="legend mb-2" for="password">Mot de passe</label>
                        <input class="form-input h-12 @error('password') is-invalid @enderror" name="password" type="password" required="" id="password" autocomplete="current-password">

                        @error('password')
                            <span style="color: red" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="flex justify-between text-sm mt-2">
                            <div class="inline-flex items-center">
                                <input
                                    class="form-checkbox h-5 w-5 text-primary rounded border-gray-800 focus:ring-offset-0 focus:ring-1 cursor-pointer"
                                    name="remember" type="checkbox" id="checkbox-rememberme" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label ml-2" for="checkbox-rememberme">Se souvenir de
                                    moi</label>
                            </div>
                            <div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                            @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col mt-10 w-full">
                    <button class="btn-primary big" type="submit">Se connecter</button>
                    <span class="text-xs text-center text-gray-700 my-2">ou</span>
                </div>
            </div>
        </form>
        <div class="flex flex-col w-full">
            <a href="{{ route('members-registration') }}" class="btn-secondary big">S'inscrire gratuitement</a>
            <a href="{{ route('escorts-casting') }}"
                        class="btn-secondary big mt-2">S'inscrire comme escort</a>
            <a href="/" class="md:hidden mt-8 text-center underline"><i
                            class="fak fa-c-arrow-left"></i></a>
        </div>
    </div>
@endsection
