@extends('layouts.admin.app')

@section('title', 'Edit Escort')

@section('content')
<div class="container-fluid">
    <h3>
        <small class="text-muted">Abonnés de {{ $escort->name }} ({{ count($all_abonnes) }}) </small>
    </h3>
    {!! $abonnes->withQueryString()->links('pagination::bootstrap-5') !!}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col"><i class="bi bi-person-circle"></i></th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($abonnes as $user)
            <tr id="{{ $user->id }}">
                <th scope="row">{{ $user->id }}</th>
                <th scope="row">
                    <div class="relative float-left h-8 bg-gray-100 w-8 mr-1 rounded-full overflow-hidden">
                        <img src="{{ asset('/storage/'.$user->avatar) }}"
                            class="absolute top-1/2 transform -translate-y-1/2 rounded-full object-cover z-10" />
                    </div>
                </th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $abonnes->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
@endsection