<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sentiment Analysis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <label for="days">Days</label>
            <input id="days" type="number" wire:model="last_n_days" class="ml-2 mb-10 rounded" min="1">
        
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <div>
                <div class="p-6 bg-white border-b border-gray-200" style="height: 32rem;"">
                    <livewire:livewire-pie-chart key="{{ $pieChartModel->reactiveKey() }}" :pie-chart-model="$pieChartModel" />
                </div>
            </div>
        </div>
    </div>
</div>
