<aside class="bg-white w-3/12 p-6">
    <h1 class="text-2xl mb-8">Teams Chat</h1>
    <div class="flex overflow-auto w-full mb-8">
        <div class="self-center text-center mr-4">
            <div class="w-12 mb-2 relative">
                <img class="rounded-full" src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                <div class="absolute bg-green-400 p-1 rounded-full bottom-0 border-gray-800 border-2"></div>
            </div>
            <small>Nombre</small>
        </div>
        <div class="self-center text-center mr-4">
            <div class="w-12 mb-2 relative">
                <img class="rounded-full" src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                <div class="absolute bg-green-400 p-1 rounded-full bottom-0 border-gray-800 border-2"></div>
            </div>
            <small>Nombre</small>
        </div>
        <div class="self-center text-center mr-4">
            <div class="w-12 mb-2 relative">
                <img class="rounded-full" src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                <div class="absolute bg-green-400 p-1 rounded-full bottom-0 border-gray-800 border-2"></div>
            </div>
            <small>Nombre</small>
        </div>
        <div class="self-center text-center mr-4">
            <div class="w-12 mb-2 relative">
                <img class="rounded-full" src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                <div class="absolute bg-green-400 p-1 rounded-full bottom-0 border-gray-800 border-2"></div>
            </div>
            <small>Nombre</small>
        </div>
        <div class="self-center text-center mr-4">
            <div class="w-12 mb-2 relative">
                <img class="rounded-full" src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                <div class="absolute bg-green-400 p-1 rounded-full bottom-0 border-gray-800 border-2"></div>
            </div>
            <small>Nombre</small>
        </div>
        <div class="self-center text-center mr-4">
            <div class="w-12 mb-2 relative">
                <img class="rounded-full" src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                <div class="absolute bg-green-400 p-1 rounded-full bottom-0 border-gray-800 border-2"></div>
            </div>
            <small>Nombre</small>
        </div>
        <div class="self-center text-center mr-4">
            <div class="w-12 mb-2 relative">
                <img class="rounded-full" src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                <div class="absolute bg-green-400 p-1 rounded-full bottom-0 border-gray-800 border-2"></div>
            </div>
            <small>Nombre</small>
        </div>
        <div class="self-center text-center mr-4">
            <div class="w-12 mb-2 relative">
                <img class="rounded-full" src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                <div class="absolute bg-green-400 p-1 rounded-full bottom-0 border-gray-800 border-2"></div>
            </div>
            <small>Nombre</small>
        </div>
    </div>
    {{-- End of online contacts --}}
    <div class="overflow-auto h-4/5">
        @foreach ($conversations as $conversation)
            <div wire:key="{{ $conversation->id }}" class="flex bg-gray-100 rounded p-4 mb-4" wire:click="$emit('chatUserSelected', {{ $conversation }}, {{ $this->getChatUserInstance($conversation)->id }})">
                <img class="rounded-full w-12 mr-4" src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                <div class="w-full overflow-hidden">
                    <div class="flex">
                        <p class="font-bold flex-grow">{{ $this->getChatUserInstance($conversation)->name }}</p>
                        <small class="text-gray-700">
                            {{ $conversation->messages->last() != null ? $conversation->messages->last()->created_at->shortAbsoluteDiffForHumans() : '' }}
                        </small>
                    </div>
                    <small class="block overflow-ellipsis overflow-hidden whitespace-nowrap text-gray-700">
                        {{ $conversation->messages->last() != null ? $conversation->messages->last()->body : '' }}
                    </small>
                </div>
            </div>
        @endforeach
    </div>
</aside>
