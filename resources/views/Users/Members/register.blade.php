@extends('layouts.auth')

@section('title', 'Devenir membre gratuitement')
@section('content')
    <div
			class="full-wrapper w-full min-h-screen md:min-h-0 md:mx-auto md:max-w-102 pb-8 p-4 md:rounded-2xl bg-white md:my-8">
			@if(session()->has('error'))
				<div class="alert alert-danger" role="alert" style="border-left: 14px solid red!important">
					Ooooops!!! Non autorisé!
				</div>
				<div class="my-4 py-5 text-danger">
					{{session()->get('error')}}
				</div>
			@else
				<form class="min-h-full" method="POST" action="{{ route('members-registration') }}">
					@csrf
					<div class="flex flex-col justify-between items-center px-4 min-h-full w-full">
						<div class="relative flex justify-center py-8 px-4 w-full">
							<div
								class="absolute left-0 top-1/2 transform -translate-y-1/2 h-10 w-10 flex justify-center items-center">
								<a href="{{ url()->previous() }}
												">
									<i class="fak fa-c-arrow-left text-2xl"></i>
								</a>
							</div>

							<div class="text-center">
								Devenir Membre </div>
						</div>
						<div class="w-full">
							<input type="hidden" name="_token" value="oFkExxX00vIR1iTTI5qvttwn9XFQCw5ZXM3gofp3">
							<div class="flex flex-col mb-4 ">
								<label class="legend mb-2" for="email">Nom d'utilisateur</label>
								<input value="" name="username" class="form-input h-12 " type="text" id="username"
									required="">
							</div>
							<div class="flex flex-col mb-4 ">
								<label class="legend mb-2" for="email">E-mail</label>
								<input value="" name="email" class="form-input h-12 " type="text" id="email" required="">
							</div>

							<div class="flex flex-col ">
								<label class="legend mb-2" for="password">Mot de passe</label>
								<div class="relative">
									<div
										class="absolute right-4 top-1/2 transform -translate-y-1/2 h-12 w-4 flex justify-center items-center">
										<i class="fak fa-c-show"></i>
									</div>
									<input class="w-full form-input h-12 " name="password" type="password" required=""
										id="password">
								</div>
							</div>
						</div>
						<div class="flex flex-col mt-4 w-full">
							<button class="relative btn-primary" type="submit">
								Confirmer mon inscription </button>
							<p class="text-xs text-gray-800 mt-4 text-center">
								En cliquant sur le bouton "Confirmer mon inscription", vous indiquez avoir pris connaissance
								et accepté les Conditions Générales d'Utilisation </p>
							<a href="" class="text-xs mt-4 text-center text-primary">Conditions d'utilisation</a>
						</div>
					</div>
				</form>
			@endif
		</div>
@endsection
