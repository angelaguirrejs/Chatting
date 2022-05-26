<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Carbon\Carbon;
use Livewire\Component;

class SentimentAnalysis extends Component
{
    public $last_n_days;

    public function mount()
    {
        $this->last_n_days = 7;
    }

    public function render()
    {
        if($this->last_n_days == '')
        {
            $this->last_n_days = 0;
        }

        $date = Carbon::now()->subDays($this->last_n_days);

        $negativeMessage = Message::where('sentiment', 'negative')
                                    ->where('created_at', '>=', $date)
                                    ->count();

        $positiveMessage = Message::where('sentiment', 'positive')
                                    ->where('created_at', '>=', $date)->count();

        $pieChartModel = 
                            (new PieChartModel())
                                ->setTitle('Messages by sentiment')
                                ->addSlice('Negative', $negativeMessage, '#EF3E36')
                                ->addSlice('Positive', $positiveMessage, '#00BBF9')
                                ->setOpacity(1);

        return view('livewire.sentiment-analysis', compact('pieChartModel'))->layout('layouts.app');
    }
}
