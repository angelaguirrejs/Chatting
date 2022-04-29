<div class="bg-gray-100 w-9/12">
    <header class="px-20 py-6 border-b flex">
        <div class="flex flex-grow">
            <div class="w-12 mr-4 relative">
                <img class="rounded-full" src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                <div class="absolute bg-green-400 p-1 rounded-full bottom-0 border-gray-800 border-2"></div>
            </div>
            <div class="self-center">
                <p class="font-bold flex-grow">Nombre</p>
                <small class="text-gray-700">Online</small>
            </div>
        </div>
        <div>
            <a>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                  </svg>
            </a>
        </div>
    </header>
    {{-- En of header --}}
    <main class="py-6 px-20 overflow-auto h-3/4">
        <div class="flex mb-12">
            <img class="rounded-full w-12 mr-4 self-end" src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
            <div class="flex flex-col">
                <p class="bg-white text-gray-800 text-sm p-6 w-96 rounded-3xl rounded-bl-none">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laboriosam tempora esse sequi. Voluptate eaque totam asperiores aspernatur itaque reiciendis nesciunt sit ipsa nemo aut enim necessitatibus, illo dicta sapiente cumque!
                </p>
                <small class="text-gray-500">09;55 AM</small>
            </div>
        </div>
        {{-- End of message --}}
        <div class="flex mb-12">
            <img class="rounded-full w-12 mr-4 self-end" src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
            <div class="flex flex-col">
                <p class="bg-white text-gray-800 text-sm p-6 w-96 rounded-3xl rounded-bl-none">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laboriosam tempora esse sequi. Voluptate eaque totam asperiores aspernatur itaque reiciendis nesciunt sit ipsa nemo aut enim necessitatibus, illo dicta sapiente cumque!
                </p>
                <small class="text-gray-500">09;55 AM</small>
            </div>
        </div>
        {{-- End of message --}}
        <div class="flex mb-12">
            <img class="rounded-full w-12 mr-4 self-end" src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
            <div class="flex flex-col">
                <p class="bg-white text-gray-800 text-sm p-6 w-96 rounded-3xl rounded-bl-none">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laboriosam tempora esse sequi. Voluptate eaque totam asperiores aspernatur itaque reiciendis nesciunt sit ipsa nemo aut enim necessitatibus, illo dicta sapiente cumque!
                </p>
                <small class="text-gray-500">09;55 AM</small>
            </div>
        </div>
        {{-- End of message --}}
        <div class="flex mb-12 flex-row-reverse">
            <img class="rounded-full w-12 ml-4 self-end" src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
            <div class="flex flex-col">
                <p class="bg-purple-600 text-white text-sm p-6 w-96 rounded-3xl rounded-br-none">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laboriosam tempora esse sequi. Voluptate eaque totam asperiores aspernatur itaque reiciendis nesciunt sit ipsa nemo aut enim necessitatibus, illo dicta sapiente cumque!
                </p>
                <small class="text-gray-500 self-end">09;55 AM</small>
            </div>
        </div>
        {{-- End of message --}}
    </main>
    
    @livewire('chat.send-message')

</div>
