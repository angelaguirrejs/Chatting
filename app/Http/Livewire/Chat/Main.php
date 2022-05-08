<?php

namespace App\Http\Livewire\Chat;

use App\Models\Conversation;
use Livewire\Component;

class Main extends Component
{
    public $conversation;

    public function mount(Conversation $conversation)
    {
        $this->conversation = $conversation;
    }

    public function render()
    {
        return view('livewire.chat.main')
                ->layout('layouts.guest');
    }
}
