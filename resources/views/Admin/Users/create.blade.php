@extends('layouts.admin.app')

@section('title', 'Add Escort')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Inscrire une Escorte') }} <i class="bi bi-gender-female"></i></div>

                <div class="card-body">
                    <form action="{{ route('admin.users.store') }}">
                        @csrf
                        @method('PUT')
                        <div id="step1">
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nom
                                    d\'utilisateur') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required
                                            aria-describedby="button-addon2">
                                    </div>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Addresse Email')
                                    }}</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <i class="bi bi-envelope-fill input-group-text"></i>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required
                                            autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mot de passe')
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
                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role')
                                }}</label>
                        
                            <div class="col-md-6">
                                <div class="input-group">
                                    <i class="bi bi-person-badge input-group-text"></i>
                        
                                    <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" required>
                                        <option disabled selected>Choisir le rôle</option>
                                        @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : '' }}>
                                            {{ strtoupper($role->name) }}</option>
                                        @endforeach 
                                    </select>
                        
                                    @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('AJOUTER') }}
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