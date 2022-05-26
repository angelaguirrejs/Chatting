<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                        <div class="flex max-w-md mx-auto overflow-hidden bg-white rounded-lg shadow-lg">
                            <div class="w-1/3 bg-cover" style="background-image: url('https://cdn.pixabay.com/photo/2016/08/31/11/54/icon-1633249_960_720.png')"></div>

                            <div class="w-2/3 p-4 md:p-4">
                                <h1 class="text-2xl font-bold text-gray-800 ">Users</h1>

                                <p class="mt-2 text-sm text-gray-600">Number of registered users on Chatting</p>

                                <div class="flex justify-between mt-3 item-center">
                                    <h1 class="text-lg font-bold text-gray-700 md:text-xl">{{ $registered_users }}</h1>
                            
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
