@if($get == 'users')
<table class="messenger-list-item" data-contact="{{ $user->id }}">
    <tr data-action="0">
        {{-- Avatar side --}}
        <td style="position: relative">
            @if($user->active_status)
            <span class="activeStatus"></span>
            @endif
            <div class="avatar av-m " style="background-image: url('{{ $user->avatar }}');">
            </div>
        </td>
        {{-- center side --}}
        <td>
            <p data-id="{{ $user->id }}" data-type="user">
                {{ strlen($user->name) > 12 ? trim(substr($user->name,0,12)).'..' : $user->name }}
                {{-- <span>{{ $lastMessage->created_at->diffForHumans() }}</span> --}}
                <span class="w-20 overflow-hidden text-xxs text-right flex-shrink-0 text-gray-700">
                    {{ $lastMessage->created_at->diffForHumans() }}
                </span>
            </p>
            <span>
                {{-- Last Message user indicator --}}
                {!!
                $lastMessage->from_id == Auth::user()->id
                ? '<span class="lastMessageIndicator">Moi :</span>'
                : ''
                !!}
                {{-- Last message body --}}
                @if($lastMessage->attachment == null)
                {!!
                strlen($lastMessage->body) > 30
                ? trim(substr($lastMessage->body, 0, 30)).'..'
                : $lastMessage->body
                !!}
                @else
                <span class="fas fa-file"></span> Attachment
                @endif
            </span>
            {{-- New messages counter --}}
            {!! $unseenCounter > 0 ? "<b>".$unseenCounter."</b>" : '' !!}
        </td>

    </tr>
</table>
@endif