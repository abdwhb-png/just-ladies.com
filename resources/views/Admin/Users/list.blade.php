@extends('layouts.Admin.app')

@section('title', 'Users List')
@section('content')
  <div class="container">
    <h3>
      <small class="text-muted">All Users List ({{ $count_all_users }}) : M({{ $count_all_members }}) -- E({{ $count_all_escorts }}) </small>
    </h3>
  <autocomplete-component from-page="users"></autocomplete-component>
  @if(session()->has('success'))
  <div class="alert alert-success" role="alert" style="border-left: 14px solid #55b56d!important">
    {{session()->get('success')}}
  </div>
  @endif
  @if(session()->has('fail'))
  <div class="alert alert-danger" role="alert" style="border-left: 14px solid red!important">
    {{session()->get('fail')}}
  </div>
  @endif
  @error('email')
     <div class="alert alert-danger" role="alert" style="border-left: 14px solid red!important">
          {{ $message }}
      </div>
  @enderror
  @error('name')
     <div class="alert alert-danger" role="alert" style="border-left: 14px solid red!important">
          {{ $message }}
      </div>
  @enderror
  @error('password')
     <div class="alert alert-danger" role="alert" style="border-left: 14px solid red!important">
          {{ $message }}
      </div>
  @enderror
  @error('monnetisation')
  <div class="alert alert-danger" role="alert" style="border-left: 14px solid red!important">
    {{ $message }}
  </div>
  @enderror
  <div class="my-2">
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
      {{ __('ADD USER') }}
    </a>
  </div>
  {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col"><i class="bi bi-person-circle"></i></th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
          <th scope="col">_ _</th>
          <th scope="col">Time</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
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
              <td><i class="bi bi-person-badge"></i> {{ $user->role->name }}</td>
              <td>
                {{-- Editer --}}
                <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#edit_{{ $user->id }}">
                  Editer
                </button>

                <!-- Editer_Modal -->
                <div class="modal fade" id="edit_{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title text-uppercase" id="editLabel">Editer {{ $user->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="mb-3">
                              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}" autocomplete="email" placeholder="Name">
                              @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" placeholder="Email">
                              @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if($user->role->id == 3)
                            <div class="mb-3">
                              <label for="monnetisation" class="form-label">Compte Vendu ?</label>
                              <select required class="form-select @error('monnetisation') is-invalid @enderror" name="monnetisation"
                                id="monnetisation">
                                <option>Choisir</option>
                                <option @if($user->monnetisation) selected @endif value="1">Oui</option>
                                <option @if(!$user->monnetisation) selected @endif value="0">Non</option>
                              </select>
                              @error('monnetisation')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                            @endif
                            <div class="mb-3">
                              {{-- <a href="{{ route('password.request') }}">Remember Password ?</a> --}}
                              <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}">Modifier le mot de passe ?</a>
                            </div>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                          </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- Supprimer --}}
                <div class="modal fade" id="delete_{{ $user->id }}" aria-hidden="true" aria-labelledby="deleteLabel" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title text-danger text-uppercase" id="deleteLabel">Supprimer {{ $user->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Veux-tu réellement supprimer?
                      </div>
                      <div class="modal-footer">
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-primary">Oui</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <a class="btn btn-danger mx-2" data-bs-toggle="modal" href="#delete_{{ $user->id }}" role="button"><i class="bi bi-trash-fill"></i></a>

                @if($user->monnetisation)
                <button type="button" class="btn btn-success mx-2">
                  <i class="bi bi-currency-dollar"></i>
                </button>
                @endif
              </td>
              <td>
                <div class="row">CR: {{ $user->created_at->diffForHumans() }}</div>
                <div class="row">UP: {{ $user->updated_at->diffForHumans() }}</div>
              </td>
            </tr>
        @endforeach
      </tbody>
    </table>
    {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
  </div>
@endsection
