<div class="flex py-6 px-20 border-t">
    <input wire:model="body" class="border-none px-4 py-2 bg-gray-100 w-full focus:outline-none" type="text" placeholder="Type here...">
    <svg class="w-6 mr-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
    </svg>
    <a class="bg-purple-600 text-white rounded px-4 py-2" wire:click="sendMessage">
        Enviar
    </a>
</div>