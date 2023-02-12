@extends('layouts.admin.app')

@section('title', 'Edit User')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if($user->role_id == 1 || $user->role_id == 2)<i class="bi bi-person-circle"></i>
                    {{ __('Modifier '.$user->name) }} @endif
                    @if($user->role_id == 3)<i class="bi bi-gender-female"></i>
                    {{ __('Modifier '.$user->name) }} @endif
                    @if($user->role_id == 4)<i class="bi bi-gender-male"></i>
                    {{ __('Modifier '.$user->name) }} @endif
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.reset.password', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="from" value="{{ str_replace(url('/'), '', url()->previous()) }}">
                        <div id="step1">
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Nouveau mot de passe')
                                    }}</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <i class="bi bi-key input-group-text"></i>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{
                                    __('Confirmer Mot de passe') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <i class="bi bi-key-fill input-group-text"></i>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enregistrer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection