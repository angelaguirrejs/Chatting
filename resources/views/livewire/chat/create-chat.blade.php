<div>
    <header class="shadow-sm">
        <div class="max-w-screen-xl p-4 mx-auto">
            <div class="flex items-center justify-between space-x-4 lg:space-x-10">
                <div class="flex lg:w-0 lg:flex-1">
                    <span class="w-1/4 h-10 text-center pt-2 rounded-lg font-bold">Chatting</span>
                </div>

                <nav class="hidden space-x-8 text-sm font-medium md:flex">
                    <a class="text-gray-500" href="{{ route('chat') }}">Back to chat</a>
                </nav>

                <div class="items-center justify-end flex-1 hidden space-x-4 sm:flex">
                </div>

                <div class="lg:hidden">
                    <button class="p-2 text-gray-600 bg-gray-100 rounded-lg" type="button">
                        <span class="sr-only">Open menu</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>
    <div class="mx-auto max-w-sm content-center mt-10">
        <input type="text" class="w-full mb-10 rounded" placeholder="Buscar por email..." wire:model="email">
        <ul>
            @foreach ($friends as $friend)
                <li wire:click='checkConversation({{ $friend->id }})'>
                    <div class="flex bg-gray-100 rounded p-4 mb-4">
                        <img class="rounded-full w-12 mr-4" src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                        <div class="w-full overflow-hidden">
                            <div>
                                <p class="font-bold">{{ $friend->name }}</p>
                                <small class="text-gray-700">
                                   {{ $friend->email }}
                                </small>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    
</div>