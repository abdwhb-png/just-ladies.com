{{-- user info and avatar --}}
<div class="avatar av-l chatify-d-flex" style="background-image: url('{{ asset('storage/'.Auth::user()->avatar) }}');"></div>
<p class="info-name">{{ config('chatify.name') }}</p>
<div class="messenger-infoView-btns">
    {{-- <a href="#" class="default"><i class="fas fa-camera"></i> default</a> --}}
    <a href="#" class="danger delete-conversation"><i class="fas fa-trash-alt"></i> Supprimer Conversation</a>
</div>
{{-- shared photos --}}
<div class="messenger-infoView-shared">
    <p class="messenger-title">Photos partagées</p>
    <div class="shared-photos-list"></div>
</div>
