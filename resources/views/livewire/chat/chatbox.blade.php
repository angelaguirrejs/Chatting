<div class="bg-gray-100 w-9/12">
    <header class="px-20 py-6 border-b flex">
        @if ($selectedConversation)
            <div class="flex flex-grow">
                <div class="w-12 mr-4 relative">
                    <img class="rounded-full" src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                    <div class="absolute bg-green-400 p-1 rounded-full bottom-0 border-gray-800 border-2"></div>
                </div>
                <div class="self-center">
                    <p class="font-bold flex-grow">{{ $receiverInstance->name }}</p>
                    <small class="text-gray-700">Online</small>
                </div>
            </div>
        @else
            <div class="flex flex-grow">
                <div class="self-center">
                    <p class="font-bold flex-grow">Selecciona una conversasion</p>
                </div>
            </div>
        @endif
        <div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </a>
            </form>
        </div>
    </header>
    {{-- En of header --}}
    <main id="scrroll-bottom" class="py-6 px-20 overflow-auto h-3/4">
        @if ($selectedConversation)
            @foreach ($messages as $message)
                @if ($message->sender_id != auth()->user()->id)
                    <div wire:key="{{ $message->id }}" class="flex mb-12">
                        <img class="rounded-full w-12 mr-4 self-end" src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                        <div class="flex flex-col">
                            <p class="bg-white text-gray-800 text-sm p-6 w-96 rounded-3xl rounded-bl-none">
                                {{ $message->body }}
                            </p>
                            <small class="text-gray-500">09;55 AM</small>
                        </div>
                    </div>
                @else
                    <div wire:key="{{ $message->id }}" class="flex mb-12 flex-row-reverse">
                        <img class="rounded-full w-12 ml-4 self-end" src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                        <div class="flex flex-col">
                            <p class="bg-purple-600 text-white text-sm p-6 w-96 rounded-3xl rounded-br-none">
                                {{ $message->body }}
                            </p>
                            <small class="text-gray-500 self-end">09;55 AM</small>
                        </div>
                    </div>
                @endif
            @endforeach
        @else
            
        @endif
    </main>
    
    @if ($selectedConversation)
        @livewire('chat.send-message')
    @endif
</div>
