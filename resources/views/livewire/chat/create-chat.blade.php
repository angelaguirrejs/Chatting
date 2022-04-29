<div>
    <ul>
        @foreach ($friends as $friend)
            <li wire:click='checkConversation({{ $friend->id }})'>{{ $friend->name }}</li>
        @endforeach
    </ul>
</div>
