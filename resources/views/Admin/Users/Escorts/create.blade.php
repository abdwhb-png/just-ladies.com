@extends('layouts.admin.app')

@section('title', 'Add Escort')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Inscrire une Escorte') }} <i class="bi bi-gender-female"></i></div>
                <create-escort-component></create-escort-component>
            </div>
        </div>
    </div>
</div>
@endsection
